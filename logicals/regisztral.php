<?php
if (isset($_POST['bejelentkezes']) && isset($_POST['jelszo']) && isset($_POST['csaladi_nev']) && isset($_POST['uto_nev'])) {
    try {
        $dbh = new PDO(
            'mysql:host=mysql.omega:3306;dbname=rendszergazda',
            'rendszergazda',
            'WpwU7LYE',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8 COLLATE utf8_general_ci');

        // Létezik már a felhasználói név?
        $sqlSelect = "select id from felhasznalok where bejelentkezes = :bejelentkezes";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(':bejelentkezes' => $_POST['bejelentkezes']));
        if ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $uzenet = "A felhasználói név már foglalt!";
            $ujra = "true";
        } else {
            // Ha nem létezik, akkor regisztráljuk
            $sqlInsert = "insert into felhasznalok(id, csaladi_nev, bejelentkezes, uto_nev, jelszo)
                          values(0, :csaladi_nev, :bejelentkezes, :uto_nev,  :jelszo)";
            $stmt = $dbh->prepare($sqlInsert);
            $stmt->execute(array(
                ':csaladi_nev' => $_POST['csaladi_nev'], ':bejelentkezes' => $_POST['bejelentkezes'],
                ':uto_nev' => $_POST['uto_nev'], ':jelszo' => sha1($_POST['jelszo'])
            ));
            if ($count = $stmt->rowCount()) {
                $newid = $dbh->lastInsertId();
                $uzenet = "A regisztrációja sikeres.<br>Azonosítója: {$newid}";
                $ujra = false;
            } else {
                $uzenet = "A regisztráció nem sikerült.";
                $ujra = true;
            }
        }
    } catch (PDOException $e) {
        $uzenet = "Hiba: " . $e->getMessage();
        $ujra = true;
    }
} else {
    header("Location: .");
}
