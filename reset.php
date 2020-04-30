<?php
require('header.php');

$mon_tab  = array();
$_SESSION['mon_tab'] = $mon_tab;
?>

<section id="formulaire" class="page">
	<div class="parts">

	</div>
	<div class="bandeau">
		<div class="move">

		</div>
	</div>
	<div class="parts">

	</div>

	<div class="formulaire">

		<div class="container-fluid">
			<div class="row h-100">
				<div class="col-4">
					<img src="./images/logo_accueil.png"> 
				</div>
				<div class="col-8">

					<div class="vert-align m-3">
						<h1 class="mb-3">Réinitialisation du mot de passe</h1>
						<form action="reset.php" method="POST">
							<div class="container-lg">
								<div class="form-group">
									<label for="email"><b>Adresse E-mail</b></label>
									<input class="form-control" type="text" placeholder="Entrer votre adresse E-mail" name="email" id="email" required>
								</div>
							</div>
							<input class="btn btn-primary" type="submit" id='submit' value='Réinitialiser son mot de passe' >
						</form>






					</div>
				</div>
			</div>
		</div>
	</div>

</section>

<?php
$verif_email = $BDD->query("SELECT COUNT(*) from connexion where email='$email'");
$Nverif_email = (int) $verif_email->fetchColumn();
$email = htmlspecialchars(htmlentities(isset($_POST["email"]) ? $_POST["email"] : NULL, ENT_QUOTES), ENT_QUOTES);
if ($Nverif_email==1 and $email!='') {

	$NoDecodeEmail = isset($_POST["email"]) ? $_POST["email"] : NULL;

	

	$req = $BDD->query("SELECT * FROM connexion WHERE email ='$email'");
	$resultat = $req->fetch();
	$pseudo = $resultat['pseudo'];


	function passwordGen($nbChar){
		return substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ0123456789'),1, $nbChar); 
	}

	$NewPassword = passwordGen(10);
	$pass_hache = password_hash($NewPassword, PASSWORD_DEFAULT);
	$BDD -> query("UPDATE connexion set pass = '$pass_hache', reset = 'true' where email = '$email'");

	$to      = $NoDecodeEmail;
	$subject = 'Réinitialisation de mot de passe';
	$message = "<html>
	<head>
	<title>Ne pas répondre - Réinitialisation de mot de passe</title>
	</head>
	<body>
	<h5>Bonjour ".$pseudo.", <br/> Vous avez demandé une réinitialisation de votre mot de passe.</h5><br/>
	<br/>
	<p>Un nouveau mot de passe a été généré automatiquement : <br/>
	<h4><strong>".$NewPassword."</strong></h4><br/>
	<p> vous pourez modifier ce mot de passe lors de votre prochaine connexion sur <a href='https://covid19sur19.fr/'>Covid19sur19.fr</a></p>

	<br/>
	<p>A bientôt !</p>

	</body>
	</html>";

	$headers[] = 'MIME-Version: 1.0';
	$headers[] = 'Content-type: text/html; charset=iso-8859-1';

	$headers[] = 'From: Covid 19 sur 19 <covid19sur19@gmail.com>';
	$headers = 'MIME-Version: 1.0'. "\r\n" .
	'Content-type: text/html; charset=iso-8859-1'. "\r\n" .
	'From: Covid 19 sur 19 <covid19sur19@gmail.com>' . "\r\n" .
	'X-Mailer: PHP/' . phpversion();


	mail($to, $subject, $message, $headers);
	header("Location: resetend.php");

}
else{
	echo "L'adresse mail n'existe pas";
}

require('footer.php');
?>
