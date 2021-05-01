<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    
                    <?php if (isset($row)) { ?>
                        <?php if ($row) { ?>
                            <h1>Logged in:</h1>
                            ID: <strong><?= $row['id'] ?></strong><br><br>
                            Name: <strong><?= $row['csaladi_nev'] . " " . $row['uto_nev'] ?></strong>
                        <?php } else { ?>
                            <h1>Login failed!</h1>
                            <a href="?oldal=belepes">Please try again!</a>
                        <?php } ?>
                    <?php } ?>
                    <?php if (isset($errormessage)) { ?>
                        <h2><?= $errormessage ?></h2>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>