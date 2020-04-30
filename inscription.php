<?php
require('header.php');

$mon_tab  = array();
$_SESSION['mon_tab'] = $mon_tab;
?>

<section id="formulaire" class="page">
	

	<div class="parts">
		
	</div>
	<div class="bandeau">
		<div class="move"></div>
	</div>
	<div class="parts">
		
	</div>

	<div class="formulaire">
		
		<div class="container-fluid">
			<div class="row h-100">
				<div class="col-4 p-5">
					<img src="./images/logo_accueil.png">                   
				</div>
				<div class="col-8">
					<div class="vert-align m-3">
						<h1 class="mb-3">Inscription</h1>
						<form action="inscription.php" method="POST">

							<div class="form-group">
								<label for="username"><b>Nom d'utilisateur</b></label>
								<input type="text" class="form-control" placeholder="Entrer le nom d'utilisateur" name="username" id="username" required>
							</div>
							<div class="form-group">
								<label for="email"><b>Adresse Email</b></label>
								<input type="email" class="form-control" placeholder="Entrer le nom d'utilisateur" name="email" id="email" required>
							</div>
							<div class="form-group">
								<label for="password"><b>Mot de passe</b></label>
								<input type="password" class="form-control" placeholder="Entrer le mot de passe" id="password" name="password" required>
							</div>
							<div class="form-group">
								<label for="conf-password"><b>Confirmation du mot de passe</b></label>
								<input type="password" class="form-control" placeholder="Confirmez le mot de passe" id="conf-password" name="conf-password" required>
							</div>
							<input class="btn btn-primary" type="submit" id='submit' value='Créer un compte'>
						</form>
					</div>
				</div>
			</div>
		</div>
		
	</div>
</section>


<?php 

$pseudo = htmlspecialchars(htmlentities(isset($_POST["username"]) ? $_POST["username"] : NULL, ENT_QUOTES), ENT_QUOTES);
$email = htmlspecialchars(htmlentities(isset($_POST["email"]) ? $_POST["email"] : NULL, ENT_QUOTES), ENT_QUOTES);
$password = htmlspecialchars(htmlentities(isset($_POST["password"]) ? $_POST["password"] : NULL, ENT_QUOTES), ENT_QUOTES);
$passwordConf = htmlspecialchars(htmlentities(isset($_POST["conf-password"]) ? $_POST["conf-password"] : NULL, ENT_QUOTES), ENT_QUOTES);

$verif_email = $BDD->query("SELECT COUNT(*) from connexion where email='$email'");
$Nverif_email = (int) $verif_email->fetchColumn();

if ($Nverif_email==0) {
	if($password==$passwordConf and $pseudo!='' and $email !='' and $password!='' and $passwordConf!=''){

		$pass_hache = password_hash($password, PASSWORD_DEFAULT);

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
require('footer.php');
?>


