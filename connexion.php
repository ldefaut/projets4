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
                        <h1 class="mb-3">Connexion</h1>
                        <form action="connexion.php" method="POST">
                            <div class="container-lg">
                                <div class="form-group">
                                    <label for="username"><b>Nom d'utilisateur</b></label>
                                    <input class="form-control" type="text" placeholder="Entrer le nom d'utilisateur" name="username" id="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="password"><b>Mot de passe</b></label>
                                    <input class="form-control" type="password" placeholder="Entrer le mot de passe" id="password" name="password" required>
                                    <a href="./reset.php">Mot de passe oublié ?</a>
                                </div>
                            </div>
                            <input class="btn btn-primary" type="submit" id='submit' value='Se connecter' >
                        </form>



                        <?php

                        $username = htmlspecialchars(htmlentities(isset($_POST["username"]) ? $_POST["username"] : NULL, ENT_QUOTES), ENT_QUOTES);
                        $password = htmlspecialchars(htmlentities(isset($_POST["password"]) ? $_POST["password"] : NULL, ENT_QUOTES), ENT_QUOTES);

                        $req = $BDD->query("SELECT * FROM connexion WHERE pseudo ='$username'");
                        $resultat = $req->fetch();

// Comparaison du pass envoyé via le formulaire avec la base
                        $isPasswordCorrect = password_verify($password, $resultat['pass']);

                        if (!$resultat)
                        {
                            echo 'Mauvais identifiant ou mot de passe !';
                        }
                        else
                        {
                            if ($isPasswordCorrect and $username!='') {
                                // session_start();
                                $_SESSION['id'] = $resultat['id'];
                                $_SESSION['pseudo'] = $username;
                                echo 'Vous êtes connecté !';
                                if ($resultat['reset']=='true') {
                                    header('Location: reset2.php');
                                }
                                else{
                                    header('Location: index.php');
                                }
                            }
                            else {
                                if ($username!='') {
                                    echo 'Mauvais identifiant ou mot de passe !';
                                }
                            }
                        }

                        require('footer.php');
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

</section>