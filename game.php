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

$randID = rand(1, $idmax);

$result = $BDDreponse ->query('SELECT * FROM reponses WHERE id='.$randID);
while ($donnees = $result->fetch())
{
	?>

	<h1>Jeu</h1>

	<a href="index.php">Index</a>
	<a href="ajouter.php">Ajouter une question</a>
	<h5><?php echo $donnees['question'];?></h5>

	<br/><br/>
	<h3><?php echo $donnees['reponse'];?></h3>

	<p><?php echo $donnees['explication'];?></p>

	<?php 
}



$result->closeCursor();