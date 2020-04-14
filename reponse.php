<?php
require('header.php');

$Nquest = isset($_POST["Nquest"]) ? $_POST["Nquest"] : NULL;
$Nquest = $Nquest +1;
$Result = isset($_POST["Result"]) ? $_POST["Result"] : NULL;

$id = isset($_POST["id"]) ? $_POST["id"] : NULL;

$vrai = strtoupper(isset($_POST["vrai"]) ? $_POST["vrai"] : NULL);
$faux = strtoupper(isset($_POST["faux"]) ? $_POST["faux"] : NULL);

$result = $BDD -> query("SELECT reponse, explication from reponses where id ='$id'");

$donnees = $result-> fetch();
$reponse = $donnees['reponse'];
$explication = html_entity_decode(htmlspecialchars_decode($donnees['explication']));

if (!empty($vrai))
	$cliqued = $vrai;
else
	$cliqued = $faux;

if ($cliqued == $reponse) {
	echo "<br/>Vous avez raison : ".$reponse."<br/>".$explication;
	$Result = $Result + 1;
}
else{
	echo "<br/>Vous avez tort : ".$reponse."<br/>".$explication;
}


if ($Nquest==4){
	$mon_tab = array();
	$_SESSION['mon_tab'] = $mon_tab;
	?>
	<form action="resultat.php" method="post" accept-charset="utf-8">
		<input type="hidden" name="Result" value="<?php echo $Result;?>">
		<input type="submit" value="Resultat">
	</form>
	<?php
}
else {
	?>

	<form action="game.php" method="post" accept-charset="utf-8">
		<input type="hidden" name="Result" value="<?php echo $Result;?>">
		<input type="hidden" name="Nquest" value="<?php echo $Nquest;?>">
		<input type="submit" value="Question suivante">
	</form>
	<?php
}

require('footer.php');
?>

