<?php


require("header.php");

$maxID = $BDD -> query('SELECT COUNT(*) from reponses');
$idmax= (int)$maxID->fetchColumn();

?>

<h1>Covid 19/19</h1>
<h3>Il y a <?php echo $idmax ?> questions dans la base de donnée</h3>
