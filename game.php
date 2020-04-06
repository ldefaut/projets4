<?php

require("header.php");


$Nquest = intval(isset($_POST["Nquest"]) ? $_POST["Nquest"] : NULL);
$Result = intval(isset($_POST["Result"]) ? $_POST["Result"] : NULL);

// $mon_tab = array();
// var_dump($_SESSION['mon_tab']);
$mon_tab = $_SESSION['mon_tab'];

$maxID = $BDD -> query('SELECT COUNT(*) from reponses');
$idmax= (int)$maxID->fetchColumn();

$randID = rand(1, $idmax);
$count = 0;

$getID = $BDD -> query("SELECT id from reponses ORDER BY RAND() limit 1");
$GetId = $getID->fetchColumn();


while (in_array($GetId, $mon_tab)) {
	$getID = $BDD -> query("SELECT id from reponses ORDER BY RAND() limit 1");
	$GetId = $getID->fetchColumn();

}
$result = $BDD ->query("SELECT * FROM reponses where id=".$GetId);

array_push($mon_tab, $GetId);
if (count($mon_tab)!=$Nquest) {
	array_pop($mon_tab);	
}

$_SESSION['mon_tab'] = $mon_tab;
print_r($mon_tab);



while ($donnees = $result->fetch())
{

	$question = html_entity_decode(htmlspecialchars_decode($donnees['question']));
	$reponse = html_entity_decode(htmlspecialchars_decode($donnees['reponse']));
	$explication = html_entity_decode(htmlspecialchars_decode($donnees['explication']));
	$count = $count + 1;
	?>
	<div id="<?php echo $count?>">
		<h1>Jeu</h1>
		<br/>
		<p>Question <?php echo $Nquest?></p>	
		<h5><?php echo $question;?></h5>

		<br/><br/>
		<form method="post" action="reponse.php">
			<input type="hidden" name="Nquest" value="<?php echo $Nquest;?>">
			<input type="hidden" name="Result" value="<?php echo $Result;?>">
			<input type="hidden" name="id" value="<?php echo $donnees['id'];?>">
			<input type="submit" name="vrai" value="Vrai" />
			<input type="submit" name="faux" value="Faux" />
		</form>

		<p><?php echo $explication;?></p>
	</div>

	<?php 
}

$result->closeCursor();
?>
