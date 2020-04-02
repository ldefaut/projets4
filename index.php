<?php

try {
	$BDDreponse  = new PDO('mysql:	host=localhost;
		dbname=projet;
		charset=utf8', 
		'root', '');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}


$maxID = $BDDreponse -> query('SELECT COUNT(*) from reponses');
$idmax= (int)$maxID->fetchColumn();

?>

<h1>Covid 19/19</h1>
<h3>Il y a <?php echo $idmax ?> questions dans la base de donnée</h3>

<a href="ajouter.php">Ajouter une question</a>
<a href="game.php">Joueur à Covid 19/19</a>