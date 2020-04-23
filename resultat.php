<?php
require('header.php');
$Result = isset($_POST["Result"]) ? $_POST["Result"] : NULL;

?>
<section id="resultat" class="page">
	<div class="parts">
		<div class="container h-100">
			<div class="text">
				<h3>Vous avez eu un score de</h3>
				<br/>
				<h1><?php echo $Result ?>/19</h1>
				<br/>
				
			</div>
		</div>
	</div>
	<div class="bandeau">
		<div class="move">
			
		</div>
	</div>
	<div class="parts">
		<div class="container h-100">
			<div class="boutons">
				<a href="./index.php">
					<button class="btn btn-light">
						Recommencer une partie
					</button>
				</a>
				<!-- <div class="fb-share-button" data-href="https://covid19sur19.fr/resultat.php" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fcovid19sur19.fr%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Partager</a></div> -->
				<a href="./ajouter.php">
					<button class="btn btn-light">
						Ajouter une question
					</button>
				</a>

			</div>
		</div>
	</div>
</section>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v6.0"></script>


<?php 
require('footer.php');
?>
