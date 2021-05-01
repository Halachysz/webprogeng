<?php session_start(); ?>
<?php if(file_exists('./logicals/'.$keres['fajl'].'.php')) { include("./logicals/{$keres['fajl']}.php"); } ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title><?= $ablakcim['cim'] . ( (isset($ablakcim['mottó'])) ? ('|' . $ablakcim['mottó']) : '' ) ?></title>
	<link rel="stylesheet" href="./styles/stilus.css" type="text/css">
	 <!-- Font Awesome -->
	 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/stilus.css">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	<?php if(file_exists('./styles/'.$keres['fajl'].'.css')) { ?><link rel="stylesheet" href="./styles/<?= $keres['fajl']?>.css" type="text/css"><?php } ?>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark" >

	<header>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"><span class="navbar-toggler-icon"></span></button>
		<?php foreach ($oldalak as $url => $oldal) { ?>
						<?php if(! isset($_SESSION['login']) && $oldal['menun'][0] || isset($_SESSION['login']) && $oldal['menun'][1]) { ?>
							<div class="collapse navbar-collapse" id="collapsibleNavbar">
<ul class="navbar-nav">
							<li class="nav-item">
						 	<a class="navbar-brand <?= (($oldal == $keres) ? 'active' : '') ?> " href="<?= ($url == '/') ? '.' : ('?oldal=' . $url) ?>">
							<?= $oldal['szoveg'] ?></a>
							</li>
</ul>
						<?php } ?>
					<?php } ?>
		
		<?php if(isset($_SESSION['login'])) { ?><h3 class="text-white"> <strong>Bejlentkezve:</strong><?= $_SESSION['csn']." ".$_SESSION['un']." (".$_SESSION['login'].")" ?></h3><?php } ?>
	</header>
	</nav>
    <div id="wrapper">
        
        <div id="content">
            <?php include("./templates/pages/{$keres['fajl']}.tpl.php"); ?>
        </div>
    </div>
    <footer>
	<div class="container">
<p class="text-center"> 
<?php if(isset($lablec['copyright'])) { ?>&copy;&nbsp;<?= $lablec['copyright'] ?> <?php } ?>
		&nbsp;
        <?php if(isset($lablec['ceg'])) { ?><?= $lablec['ceg']; ?><?php } ?>

	</p>
</div>
    </footer>
</body>
</html>
