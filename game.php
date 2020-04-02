<?php

require("header.php");

$maxID = $BDD -> query('SELECT COUNT(*) from reponses');
$idmax= (int)$maxID->fetchColumn();

$randID = rand(1, $idmax);

$result = $BDD ->query('SELECT * FROM reponses ORDER BY RAND() limit 1');
while ($donnees = $result->fetch())
{
	?>

	<h1>Jeu</h1>
	<h5><?php echo $donnees['question'];?></h5>

	<br/><br/>
	<h3><?php echo $donnees['reponse'];?></h3>

	<p><?php echo $donnees['explication'];?></p>

	<?php 
}



$result->closeCursor();