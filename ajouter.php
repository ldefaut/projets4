<?php

require("header.php");


?>
<h1>Ajouter une question</h1>
<?php

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{

	?>
	<form action="ajouter.php" autocomplete="off" method="post" accept-charset="utf-8">
		<label for="question">Question : </label><input type="text" name="question" id="question"><br/>
		<label for="reponse">Reponse : </label>
		<select name="reponse" id="reponse">
			<option value="VRAI">Vrai</option>
			<option value="FAUX">Faux</option>}
		</select>
		<br/>
		<label for="explain">Explication : </label><input type="text" name="explication" id="explication"><br/>
		<label for="niveau">Niveau : </label> 
		<select name="niveau" id="niveau">
			<option value="1">Niveau 1</option>
			<option value="2">Niveau 2</option>
			<option value="3">Niveau 3</option>
		</select>
		<button type="submit" value="envoyer">Envoyer</button>
	</form>

	<?php
	$maxID = $BDD -> query('SELECT COUNT(*) from reponses');
	$idmax= (int)$maxID->fetchColumn();

	if ((isset($_POST['question']) ? $_POST['question'] : NULL)!='' AND (isset($_POST['reponse']) ? $_POST['reponse'] : NULL)!='' AND (isset($_POST['explication']) ? $_POST['explication'] : NULL)!='' AND (isset($_POST['niveau']) ? $_POST['niveau'] : NULL)!=''){
		$Question= $_POST['question'];
		$Reponse = $_POST['reponse'];
		$Explication = $_POST['explication'];
		$Niveau = $_POST['niveau'];


		$maxID = $BDD -> query('SELECT MAX( id ) from reponses');
		$idmax= (int)$maxID->fetchColumn();
		$NewID = $idmax+1	;

		$BDD-> query("INSERT INTO reponses(question, reponse, explication, niveau, id) VALUES('$Question', '$Reponse', '$Explication', '$Niveau', '$NewID')");

		header('Location: http://projets4/ajouter.php');

	}
}
else{
	echo "vous n'etes pas connecté";
	?>
	<a href="connexion.php">Se connecter</a>
	<a href="inscription.php">Créer un compte</a>
	<?php
}
// echo $idmax	;
