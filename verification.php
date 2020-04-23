<?php

require("header.php");

$mon_tab  = array();
$_SESSION['mon_tab'] = $mon_tab;

?>
<section id="noGame">
	<table class="table">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Questions</th>
				<th scope="col">Reponses</th>
				<th scope="col">Explciations</th>
				<th scope="col">Niveau</th>
				<th scope="col">Lien</th>
				<th scope="col">Statut</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$count = 0;
			$result= $BDD->query('SELECT * from reponses ORDER by status');
			while ($donnees = $result->fetch())
			{
				$safeQuestion =  html_entity_decode(htmlspecialchars_decode($donnees['question']));
				$count = $count + 1;
				?>
				<tr id="<?php echo $donnees['id'];?>">
					<form action="verification.php" method="post" accept-charset="utf-8">
						<div class="form-group">
							<th scope="row"><?php echo $count;?></th>
							<td>
								<textarea class="form-control" name="question" id="question" id="exampleFormControlTextarea1"><?php echo html_entity_decode(htmlspecialchars_decode($donnees['question']));?></textarea>
							</td>
							<td>		
								<select class="form-control" name="reponse" id="reponse">
									<?php 
									if ($donnees['reponse']=='VRAI'){?>
										<option value="VRAI" selected>Vrai</option>
										<option value="FAUX">Faux</option>
										<?php
									}
									elseif ($donnees['reponse']=='FAUX') {?>
										<option value="VRAI">Vrai</option>
										<option value="FAUX" selected>Faux</option>
										<?php
									}
									?>
								</select>
							</td>
							<td>
								<textarea class="form-control" name="explication" id="explication" id="exampleFormControlTextarea1"><?php echo html_entity_decode(htmlspecialchars_decode($donnees['explication']));?></textarea>
							</td>
							<td>
								<select class="form-control" name="niveau" id="niveau">
									<?php
									if ($donnees['niveau']==1) {?>
										<option value="1" selected>Niveau 1</option>
										<option value="2">Niveau 2</option>
										<option value="3">Niveau 3</option>
										<?php
									}
									elseif ($donnees['niveau']==2) {?>
										<option value="1">Niveau 1</option>
										<option value="2" selected>Niveau 2</option>
										<option value="3">Niveau 3</option>
										<?php
									}
									elseif ($donnees['niveau']==3) {?>
										<option value="1">Niveau 1</option>
										<option value="2">Niveau 2</option>
										<option value="3" selected>Niveau 3</option>
										<?php
									}
									?>
								</select>
							</td>
							<td>
								<textarea class="form-control" name="lien" id="lien"><?php echo html_entity_decode(htmlspecialchars_decode($donnees['lien']));?></textarea>
							</td>
							<td>

								<select class="form-control" name="status" id="status">
									<option value="Vérifiée">Vérifier</option>
									<option value="A vérifier">à vérifier</option>
									<option value="Rejetée">Rejeter</option>
								</select>
								<?php
								if (html_entity_decode(htmlspecialchars_decode($donnees['status']))=="Vérifiée") {
									?>
									<small class="form-text text-success"><?php echo html_entity_decode(htmlspecialchars_decode($donnees['status']));?></small>							
									<?php 
								}elseif (html_entity_decode(htmlspecialchars_decode($donnees['status']))=="A vérifier") {
									?>
									<small class="form-text text-warning"><?php echo html_entity_decode(htmlspecialchars_decode($donnees['status']));?></small>
									<?php
								}
								elseif (html_entity_decode(htmlspecialchars_decode($donnees['status']))=="Rejetée") {
									?>
									<small class="form-text text-danger"><?php echo html_entity_decode(htmlspecialchars_decode($donnees['status']));?></small>
									<?php
								}?>

							</td>
							<td>
								<input type="hidden" name="id" value="<?php echo $donnees['id'];?>">
								<button type="submit" name="verif" class="btn btn-outline-dark" value="<?php echo $donnees['id'];?>">Vérifier</button>
							</td>
						</div>
					</form>
					<?php 
					$ID = isset($_POST['id']) ? $_POST['id'] : NULL;
					$safeQuestion = htmlspecialchars(htmlentities(isset($_POST["question"]) ? $_POST["question"] : NULL, ENT_QUOTES), ENT_QUOTES);
					$safeReponse = htmlspecialchars(htmlentities(isset($_POST["reponse"]) ? $_POST["reponse"] : NULL, ENT_QUOTES), ENT_QUOTES);
					$safeExplication = htmlspecialchars(htmlentities(isset($_POST["explication"]) ? $_POST["explication"] : NULL, ENT_QUOTES), ENT_QUOTES);
					$safeNiveau = htmlspecialchars(htmlentities(isset($_POST["niveau"]) ? $_POST["niveau"] : NULL, ENT_QUOTES), ENT_QUOTES);
					$safeStatut = htmlspecialchars(htmlentities(isset($_POST["status"]) ? $_POST["status"] : NULL, ENT_QUOTES), ENT_QUOTES);
					$safeLien = htmlspecialchars(htmlentities(isset($_POST["lien"]) ? $_POST["lien"] : NULL, ENT_QUOTES), ENT_QUOTES);
					if ($safeQuestion!='' and $safeReponse!='' and $safeExplication!='' and $safeNiveau!='' and $safeStatut!=''){


						$BDD-> query("UPDATE reponses SET question='$safeQuestion', reponse='$safeReponse', explication='$safeExplication', niveau='$safeNiveau', lien = '$safeLien', status='$safeStatut' Where id='$ID'");

						header('Location: verification.php');

					}
					?>
				</tr>
				<?php 
			}
			?>
		</tbody>
	</table>
</section>




<?php
require('footer.php');
?>