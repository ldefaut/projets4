<?php
require('header.php');
?>

<form action="connexion.php" method="POST">

    <h1>Connexion</h1>

    <label for="username"><b>Nom d'utilisateur</b></label>
    <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" id="username" required>

    <label for="password"><b>Mot de passe</b></label>
    <input type="password" placeholder="Entrer le mot de passe" id="password" name="password" required>

    <input type="submit" id='submit' value='LOGIN' >
</form>


<?php


$username = isset($_POST['username']) ? $_POST['username'] : NULL;
$req = $BDD->query("SELECT * FROM connexion WHERE pseudo ='$username'");
// print_r($req);
$resultat = $req->fetch();
// echo $resultat;

// Comparaison du pass envoyé via le formulaire avec la base
$isPasswordCorrect = password_verify(isset($_POST['password']) ? $_POST['password'] : NULL, $resultat['pass']);

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe ! '.$username.' ,'.(isset($_POST['password']) ? $_POST['password'] : NULL).', '.$resultat['pass'].', '.$isPasswordCorrect;
}
else
{
    if ($isPasswordCorrect and $username!='') {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $username;
        echo 'Vous êtes connecté !';
        header('Location: http://projets4/index.php');

    }
    else {
        if ($username!='') {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }
}
