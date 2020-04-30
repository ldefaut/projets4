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
                        <h1 class="mb-3">Modifiez votre mot de passe</h1>
                        <form action="reset2.php" method="POST">
                            <div class="container-lg">
                                <div class="form-group">
                                    <label for="password"><b>Mot de passe</b></label>
                                    <input type="password" class="form-control" placeholder="Entrer le mot de passe" id="password" name="password" required>
                                </div>
                                <div class="form-group">
                                    <label for="conf-password"><b>Confirmation du mot de passe</b></label>
                                    <input type="password" class="form-control" placeholder="Confirmez le mot de passe" id="conf-password" name="conf-password" required>
                                </div>
                            </div>
                            <input class="btn btn-primary" type="submit" id='submit' value='Se connecter' >
                        </form>



                        <?php

                        $password = htmlspecialchars(htmlentities(isset($_POST["password"]) ? $_POST["password"] : NULL, ENT_QUOTES), ENT_QUOTES);
                        $pass_hache = password_hash($password, PASSWORD_DEFAULT);
                        $passwordConf = htmlspecialchars(htmlentities(isset($_POST["conf-password"]) ? $_POST["conf-password"] : NULL, ENT_QUOTES), ENT_QUOTES);
                        $id = $_SESSION['id'];
                        if ($password==$passwordConf and $password!='' and $passwordConf!='') {
                            $BDD -> query("UPDATE connexion set pass = '$pass_hache', reset = 'false' where id = '$id'");
                            header("Location: resetend.php");
                        }
                        else{
                            echo "Choisissez des mots de passe correspondants";
                        }

                        require('footer.php');
                        ?>


                    </div>
                </div>
            </div>
        </div>
    </div>

</section>