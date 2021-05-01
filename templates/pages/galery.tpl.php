
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-body text-center">
                    <h1 class="h1-responsive font-weight-bold text-center my-4">Gallery</h1>

                    <?php
               
    $MAPPA = './images/';
    $TIPUSOK = array ('.jpg', '.png');
    $MEDIATIPUSOK = array('image/jpeg', 'image/png');
    $DATUMFORMA = "Y.m.d. H:i";
    $MAXMERET = 500*1024;
	$uzenet = array();   
	
	 $kepek = array();
    $olvaso = opendir($MAPPA);
    while (($fajl = readdir($olvaso)) !== false) {
        if (is_file($MAPPA.$fajl)) {
            $vege = strtolower(substr($fajl, strlen($fajl)-4));
            if (in_array($vege, $TIPUSOK)) {
                $kepek[$fajl] = filemtime($MAPPA.$fajl);
            }
        }
    }
    closedir($olvaso);

    // Űrlap ellenőrzés:
    if (isset($_POST['kuld'])) {
        //print_r($_FILES);
        foreach($_FILES as $fajl) {
            if ($fajl['error'] == 4);   // Nem töltött fel fájlt
            elseif (!in_array($fajl['type'], $MEDIATIPUSOK))
                $uzenet[] = " Nem megfelelő típus: " . $fajl['name'];
            elseif ($fajl['error'] == 1   // A fájl túllépi a php.ini -ben megadott maximális méretet
                        or $fajl['error'] == 2   // A fájl túllépi a HTML űrlapban megadott maximális méretet
                        or $fajl['size'] > $MAXMERET) 
                $uzenet[] = " Túl nagy állomány: " . $fajl['name'];
            else {
                $vegsohely = $MAPPA.strtolower($fajl['name']);
                if (file_exists($vegsohely))
                    $uzenet[] = " Már létezik: " . $fajl['name'];
                else {
                    move_uploaded_file($fajl['tmp_name'], $vegsohely);
                    $uzenet[] = ' Ok: ' . $fajl['name'];
                }
            }
        }        
    }
	
    
    // Megjelenítés logika:
?>
    <div id="galeria">
   
    <?php
    arsort($kepek);
    foreach($kepek as $fajl => $datum)
    {
    ?>
        <div class="kep">
            <a href="<?php echo $MAPPA.$fajl ?>">
                <img src="<?php echo $MAPPA.$fajl ?>">
            </a>            
            <p>Name:  <?php echo $fajl; ?></p>
            <p>Date:  <?php echo date($DATUMFORMA, $datum); ?></p>
        </div>
    <?php
    }
    ?>

<?php
    // Alkalmazás logika:
    include('config.inc.php');
    $uzenet = array();   

    // Űrlap ellenőrzés:
    if (isset($_POST['kuld'])) {
        //print_r($_FILES);
        foreach($_FILES as $fajl) {
            if ($fajl['error'] == 4);   // Nem töltött fel fájlt
            elseif (!in_array($fajl['type'], $MEDIATIPUSOK))
                $uzenet[] = " Nem megfelelő típus: " . $fajl['name'];
            elseif ($fajl['error'] == 1   // A fájl túllépi a php.ini -ben megadott maximális méretet
                        or $fajl['error'] == 2   // A fájl túllépi a HTML űrlapban megadott maximális méretet
                        or $fajl['size'] > $MAXMERET) 
                $uzenet[] = " Túl nagy állomány: " . $fajl['name'];
            else {
                $vegsohely = $MAPPA.strtolower($fajl['name']);
                if (file_exists($vegsohely))
                    $uzenet[] = " Már létezik: " . $fajl['name'];
                else {
                    move_uploaded_file($fajl['tmp_name'], $vegsohely);
                    $uzenet[] = ' Ok: ' . $fajl['name'];
                }
            }
        }        
    }
    // Megjelenítés logika:
?>
            </div>
        </div>
    </div>
</div>