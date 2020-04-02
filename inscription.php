<?php
require('header.php');
?>

<form action="inscription.php" method="POST">
	<h1>Inscription</h1>

	<label for="username"><b>Nom d'utilisateur</b></label>
	<input type="text" placeholder="Entrer le nom d'utilisateur" name="username" id="username" required>

	<label for="email"><b>Adresse Email</b></label>
	<input type="email" placeholder="Entrer le nom d'utilisateur" name="email" id="email" required>

	<label for="password"><b>Mot de passe</b></label>
	<input type="password" placeholder="Entrer le mot de passe" id="password" name="password" required>

	<label for="conf-password"><b>Confirmation du mot de passe</b></label>
	<input type="password" placeholder="Entrer le mot de passe" id="conf-password" name="conf-password" required>

	<input type="submit" id='submit' value='LOGIN' >
</form>

<?php 

// Vérification de la validité des informations
$email=isset($_POST['email']) ? $_POST['email'] : NULL;
$verif_email = $BDD->query("SELECT COUNT(*) from connexion where email='$email'");
$Nverif_email = (int) $verif_email->fetchColumn();
if ($Nverif_email==0) {
	if((isset($_POST['password']) ? $_POST['password'] : NULL)==(isset($_POST['conf-password']) ? $_POST['conf-password'] : NULL)){

		$pass_hache = password_hash(isset($_POST['password']) ? $_POST['password'] : NULL, PASSWORD_DEFAULT);
		$pseudo=isset($_POST['username']) ? $_POST['username'] : NULL;


		$maxID = $BDD -> query('SELECT MAX( id ) from connexion');
		$idmax= (int)$maxID->fetchColumn();
		$NewID = $idmax+1	;

		$req = $BDD->query("INSERT INTO connexion(id, pseudo, pass, email, date_inscription) VALUES('$NewID','$pseudo', '$pass_hache', '$email', CURDATE())");
		header('Location: connexion.php');
		exit;
		echo $pseudo;
	}
	else{
		echo "indiquez des mots de passe correspondants";
	}
}
else{
	if ($email!='') {
		echo "l'Adresse email est deja utilisée";
	}
}
// Hachage du mot de passe



