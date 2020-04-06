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
	<link rel="stylesheet" href="./lib/bootstrap-4.3.1/bootstrap.css">
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
		echo 'Bonjour ' . $_SESSION['pseudo'];
		?>

		<a href="index.php">Accueil</a>
		<a href="ajouter.php">Ajouter une question</a>
		<?php
		if ($role=="admin"){
			?>
			<a href="verification.php">Verifier une question</a>
			<?php
		}

		?>
		<a href="deconnexion.php">Se Déconnecter</a>
		<?php
	}
	else{
		?>
		<a href="index.php">Index</a>
		<a href="ajouter.php">Ajouter une question</a>
		<a href="connexion.php">Se connecter</a>
		<a href="inscription.php">Créer un compte</a>

		<?php
	}

	?>

