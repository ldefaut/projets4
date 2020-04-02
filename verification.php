<?php

require("header.php");


?>
<table>
	<thead>
		<tr>
			<th></th>
			<th>Questions</th>
			<th>Reponses</th>
			<th>Explciations</th>
			<th>Niveau</th>
			<th>Statut</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$count = 0;
		$result= $BDD->query('SELECT * from reponses');
		while ($donnees = $result->fetch())
		{
			$count = $count + 1;
			?>
			<tr id="<?php echo $donnees['id'];?>">
				<form action="verification.php" method="post" accept-charset="utf-8">
					<td><?php echo $count;?></td>
					<td>
						<input type="text" name="question" id="question" value="<?php echo $donnees['question'];?>">
					</td>
					<td>		
						<select name="reponse" id="reponse">
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
						<input type="text" name="explication" id="explication" value="<?php echo $donnees['explication'];?>">
					</td>
					<td>
						<select name="niveau" id="niveau">
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
						<?php echo $donnees['status'];?>
						<select name="status" id="status">
							<option value="vérifiée">Vérifier</option>
							<option value="à vérifier">à vérifier</option>
							<option value="rejetée">Rejeter</option>
						</select>
					</td>
					<td>
						<input type="hidden" name="id" value="<?php echo $donnees['id'];?>">
						<button type="submit" name="verif" value="<?php echo $donnees['id'];?>">Vrifier</button>
					</td>
				</form>
				<?php 
				$ID = isset($_POST['id']) ? $_POST['id'] : NULL;

				if ((isset($_POST['question']) ? $_POST['question'] : NULL)!='' AND (isset($_POST['reponse']) ? $_POST['reponse'] : NULL)!='' AND (isset($_POST['explication']) ? $_POST['explication'] : NULL)!='' AND (isset($_POST['niveau']) ? $_POST['niveau'] : NULL)!=''){
					$Question= $_POST['question'];
					$Reponse = $_POST['reponse'];
					$Explication = $_POST['explication'];
					$Niveau = $_POST['niveau'];
					$Statut= $_POST['status'];


					$BDD-> query("UPDATE reponses SET question='$Question', reponse='$Reponse', explication='$Explication', niveau='$Niveau', status='$Statut' Where id='$ID'");

					header('Location: http://projets4/verification.php');

				}?>
			</tr>
			<?php 
		}
		?>
	</tbody>
</table>

