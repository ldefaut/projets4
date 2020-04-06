<?php


require("header.php");

$maxID = $BDD -> query('SELECT COUNT(*) from reponses');
$idmax= (int)$maxID->fetchColumn();
$_SESSION['mon_tab'] = '';
$mon_tab  = array();
$_SESSION['mon_tab'] = $mon_tab;
?>

<h1>Covid 19/19</h1>

<form action="game.php" method="post" accept-charset="utf-8">
	<input type="hidden" name="tab" value="">
	<input type="hidden" name="Nquest" value="1">
	<input type="hidden" name="Result" value="1">
	<input type="submit" value="Commencer le jeu">
</form>

<h3>Il y a <?php echo $idmax ?> questions dans la base de donnée</h3>
