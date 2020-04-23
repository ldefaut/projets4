<?php
require('header.php');

$Nquest = isset($_POST["Nquest"]) ? $_POST["Nquest"] : NULL;
$Nquest = $Nquest +1;
$Result = isset($_POST["Result"]) ? $_POST["Result"] : NULL;

$id = isset($_POST["id"]) ? $_POST["id"] : NULL;

$vrai = strtoupper(isset($_POST["vrai"]) ? $_POST["vrai"] : NULL);
$faux = strtoupper(isset($_POST["faux"]) ? $_POST["faux"] : NULL);

$result = $BDD -> query("SELECT reponse, explication, lien, titre from reponses where id ='$id'");

$donnees = $result-> fetch();
$reponse = $donnees['reponse'];
$explication = html_entity_decode(htmlspecialchars_decode($donnees['explication']));
$lien = html_entity_decode(htmlspecialchars_decode($donnees['lien']));
$titre = html_entity_decode(htmlspecialchars_decode($donnees['titre']));

if (!empty($vrai))
	$cliqued = $vrai;
else
	$cliqued = $faux;

$Numero = $Nquest - 1;
$maxID = $BDD -> query("SELECT COUNT(*) from reponses where status = 'V&amp;eacute;rifi&amp;eacute;e'");
$idmax= (int)$maxID->fetchColumn();

?>


<section id="rep" class="page">
	<div class="conteneur">
		<div class="parts">
			<div class="container-fluid h-100">
				<div class="row h-100">
					<?php 
					if ($cliqued == $reponse) {
						?>
						<div class="col-5 h-100">
							<div class="container-fluid h-100">
								<img src="../images/medecin_content.png" class="medecin">
							</div>

						</div>
						<div class="col-7">
							<div class="container-fluid h-100">
								<p>



									<?php



									echo $reponse." : Vous avez raison<br/>".$explication;
									$Result = $Result + 1;
									if ($lien!='') {
										if ($titre!='') {
											?>
											<br/>
											<br/>
											En apprendre davantage : <a href="<?php echo $lien ?>"><?php echo $titre?></a> 
											<?php
										}
										else {
											?>
											En apprendre davantage sur <a href="<?php echo $lien ?>"><?php echo $lien?></a> 
											<?php
										}
									}
									?>
								</p>
							</div>
						</div>
						<?php
					}
					else{
						?>
						<div class="col-5 h-100">
							<div class="container-fluid h-100">
								<img src="../images/medecin_enerve.png" class="medecin">
							</div>
						</div>
						<div class="col-7">
							<div class="container-fluid h-100">
								<p>


									<?php



									echo $reponse." : Vous avez tort<br/>".$explication;

									if ($lien!='') {
										if ($titre!='') {
											?>
											<br/>
											<br/>
											En apprendre davantage : <a href="<?php echo $lien ?>"><?php echo $titre?></a> 
											<?php
										}
										else {
											?>
											En apprendre davantage sur <a href="<?php echo $lien ?>"><?php echo $lien?></a> 
											<?php
										}
									}
									?>
								</p>
							</div>
						</div>
						<?php
					}

					?>
				</div>
			</div>
		</div>
		<?php 
		if ($cliqued == $reponse) {
			?>
			<div class="bandeau vrai">
				<div class="ml-auto mr-auto">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>				
			</div>
			<?php 
		}
		else{
			?>
			<div class="bandeau faux">
				<div class="ml-auto mr-auto">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
			<?php
		}
		?>
		<div class="parts">
			<div class="container h-100">
				<div class="row">
					
					<div class="col-7 ml-auto mr-auto">
						<div class="group-btn">
							<div class="container-fluid">
								<div class="row">
									<div class="col-12">
										<?php 
										if ($Nquest==20 or $Nquest >$idmax){
											$mon_tab = array();
											$_SESSION['mon_tab'] = $mon_tab;
											?>
											<form action="resultat.php" method="post" accept-charset="utf-8">
												<input type="hidden" name="Result" value="<?php echo $Result;?>">
												<input class="btn btn-light" type="submit" value="Resultat">
											</form>
											<?php
										}
										else {
											?>

											<form action="game.php" method="post" accept-charset="utf-8">
												<input type="hidden" name="Result" value="<?php echo $Result;?>">
												<input type="hidden" name="Nquest" value="<?php echo $Nquest;?>">
												<input class="btn btn-light" type="submit" value="Question suivante">
											</form>
											<?php
										}
										?>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</section>


<div class="d-none" id ="result"><?php echo $Result?>
</div>

<div class="d-none" id ="numero"><?php echo $Numero?>
</div>
<?php

require('footer.php');
?>

