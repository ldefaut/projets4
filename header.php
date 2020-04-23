<?php 
$url = $_SERVER['PHP_SELF']; 
$reg = '#^(.+[\\\/])*([^\\\/]+)$#';
define('onestla', preg_replace($reg, '$2', $url)); 
$rest = ucwords(substr(onestla, 1, -4));
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Covid 19/19 - <?php echo $rest;?></title>
	<link rel="stylesheet" href="./lib/bootstrap-4.4.1/css/bootstrap.css">
	<link href="./css/style.css" rel="stylesheet">
</head>
<body>

	<?php

	try {
		$BDD  = new PDO('mysql:	host=localhost;
			dbname=projet;
			charset=utf8', 
			'root', '');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

	session_start();

	$coID = isset($_SESSION['id']) ? $_SESSION['id'] : NULL;
	$coPseudo = isset($_SESSION['pseudo']) ? $_SESSION['pseudo'] : NULL;

	$status = $BDD->query("SELECT email, role from connexion where id='$coID' and pseudo='$coPseudo'");
	$resStatus= $status->fetch();
	$role = html_entity_decode(htmlspecialchars_decode($resStatus['role'], ENT_QUOTES), ENT_QUOTES);


	if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
	{
		?>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Accueil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="ajouter.php">Ajouter une question</a>
					</li>
					<?php
					if ($role=="admin" or $role=="superadmin"){
						?>
						<li class="nav-item">
							<a class="nav-link" href="verification.php">Verifier une question</a>
						</li>
						<?php
					}
					?>
					<?php
					if ($role=="superadmin"){
						?>
						<li class="nav-item">
							<a class="nav-link" href="superAdmin.php">Gérer les comptes</a>
						</li>
						<?php
					}
					?>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<?php
						echo '<strong class="nav-link active">Bonjour ' . $_SESSION['pseudo'].'</strong>';
						?>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="deconnexion.php">Se Déconnecter</a>
					</li>
				</ul>
			</div>
		</nav>

		<?php
	}
	else{
		?>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Accueil</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="ajouter.php">Ajouter une question</a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="connexion.php">Se connecter</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="inscription.php">Créer un compte</a>
					</li>
				</ul>
			</div>
		</nav>


		<?php
	}

	?>

