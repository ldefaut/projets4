<?php


require("header.php");


?>

<section class="page">
	<div class="parts text-center h-75">
		<div class="container">
			<?php if ($_SESSION['pseudo']==NULL){
				?>
				<h1>Un nouveau mot de passe vient d'être généré. Vous pouvez le retrouver dans vos mails. Regardez dans les spams.</h1>
				<div class="vert-align">
					<div class="container-fluid">
						<div class="row">
							<div class="col-6">
								<div class="group-btn">
									<a href="./index.php">
										<button class="btn btn-light">
											Recommencer une partie
										</button>
									</a>
								</div>
							</div>
							<div class="col-6">
								<div class="group-btn">
									<a href="./connexion.php">
										<button class="btn btn-light">
											Se Connecter
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			else{
				?>
				<h1>Votre nouveau mot de passe a bien été défini.</h1>
				<div class="vert-align">
					<div class="container-fluid">
						<div class="row">
							<div class="col-6 ml-auto mr-auto">
								<div class="group-btn">
									<a href="./index.php">
										<button class="btn btn-light">
											Aller à l'accueil
										</button>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			?>
		</div>
		
		
		
	</div>
	<div class="bandeau">
		<div class="move">			
		</div>		
	</div>
	<div class="parts">
	</div>

</section>




<?php

require('footer.php');
?>
