<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if(isset($uzenet)) { ?>
            <h1><?= $uzenet ?></h1>
            <?php if($ujra) { ?>
                <a href="belepes.tpl.php">Please try again!</a>
            <?php } ?>
        <?php } ?>
    </body>  
</html>