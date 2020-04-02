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
$role = $resStatus['role'];


if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{
	echo 'Bonjour ' . $_SESSION['pseudo'];
	?>

	<a href="index.php">Index</a>
	<a href="game.php">Jeu</a>
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
	<a href="game.php">Jeu</a>
	<a href="ajouter.php">Ajouter une question</a>
	<a href="connexion.php">Se connecter</a>
	<a href="inscription.php">Créer un compte</a>

	<?php
}

?>

