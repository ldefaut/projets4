<?php

require("header.php");

$mon_tab  = array();
$_SESSION['mon_tab'] = $mon_tab;


if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))
{

	?>
	<div class="container">
		<div class="border rounded p-5 m-5">
			<h1>Ajouter une question </h1><br/><small>Champs obligatoires : *</small><br/><br/>

			<form action="ajouter.php" autocomplete="off" method="post" accept-charset="utf-8">
				<div class="form-group">
					<label for="question">Question : <small>*</small></label><input type="text" class="form-control" name="question" id="question"><br/>
				</div>
				<div class="form-group">
					<label for="reponse">Reponse : <small>*</small></label>
					<select class="form-control" name="reponse" id="reponse">
						<option value="VRAI">Vrai</option>
						<option value="FAUX">Faux</option>}
					</select>
				</div>
				<div class="form-group">
					<br/>
					<label for="explain">Explication : <small>*</small></label><input type="text" class="form-control" name="explication" id="explication"><br/>
				</div>
				<div class="form-group">
					<label for="niveau">Niveau : <small>*</small></label> 
					<select class="form-control" name="niveau" id="niveau">
						<option value="1">Niveau 1</option>
						<option value="2">Niveau 2</option>
						<option value="3">Niveau 3</option>
					</select>
				</div>
				<div class="form-group">
					<label for="lien">Insérez une source à votre question</label>
					<input type="text" class="form-control" name="lien" id="lien">
					<br>
					<label for="titre">Le titre de votre source</label>
					<input type="text" name="titre" id="titre" class="form-control">
				</div>
				<button class="btn btn-primary" type="submit" value="envoyer">Envoyer</button>
			</form>
		</div>
	</div>

	<?php
	$maxID = $BDD -> query('SELECT COUNT(*) from reponses');
	$idmax= (int)$maxID->fetchColumn();

	$safeQuestion = htmlspecialchars(htmlentities(isset($_POST["question"]) ? $_POST["question"] : NULL, ENT_QUOTES), ENT_QUOTES);
	$safeReponse = htmlspecialchars(htmlentities(isset($_POST["reponse"]) ? $_POST["reponse"] : NULL, ENT_QUOTES), ENT_QUOTES);
	$safeExplication = htmlspecialchars(htmlentities(isset($_POST["explication"]) ? $_POST["explication"] : NULL, ENT_QUOTES), ENT_QUOTES);
	$safeNiveau = htmlspecialchars(htmlentities(isset($_POST["niveau"]) ? $_POST["niveau"] : NULL, ENT_QUOTES), ENT_QUOTES);
	$safeLien = htmlspecialchars(htmlentities(isset($_POST["lien"]) ? $_POST["lien"] : NULL, ENT_QUOTES), ENT_QUOTES);
	$safeTitre = htmlspecialchars(htmlentities(isset($_POST["titre"]) ? $_POST["titre"] : NULL, ENT_QUOTES), ENT_QUOTES);


	if ($safeQuestion!='' and $safeReponse!='' and $safeExplication!='' and $safeNiveau!=''){
		print_r($safeExplication);


		$maxID = $BDD -> query('SELECT MAX( id ) from reponses');
		$idmax= (int)$maxID->fetchColumn();
		$NewID = $idmax+1;

		$BDD-> query("INSERT INTO reponses(question, reponse, explication, niveau, id,  lien, titre, status) VALUES('$safeQuestion', '$safeReponse', '$safeExplication', '$safeNiveau', '$NewID', '$safeLien', '$safeTitre', 'A vérifier')");

		header('Location: http://projets4/ajouter.php');

	}
}
else{

	?>
	<h1>Ajouter une question</h1>
	<h4>Pour Ajouter une question, Créez un compte ou Connectez vous</h4>
	<a href="connexion.php" class="btn btn-primary">Se connecter</a>
	<a href="inscription.php" class="btn btn-primary">Créer un compte</a>
	<?php
}
// echo $idmax	;
require('footer.php');