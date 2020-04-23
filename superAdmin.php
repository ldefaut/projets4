<?php

require("header.php");

$mon_tab  = array();
$_SESSION['mon_tab'] = $mon_tab;

?>
<section id="noGame">
	

	<input type="text" id="searchBar" onkeyup="myFunction()" placeholder="Rechercher un utilisateur ou une adresse E-mail" class="form-control mt-2 mb-5">
	<table class="table" id="table">
		<thead>
			<tr>
				<th scope="col"></th>
				<th scope="col">Utilisateur</th>
				<th scope="col">Adresse E-mail</th>
				<th scope="col">Date d'Inscription</th>
				<th scope="col">Rôle</th>
				<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php
			$count = 0;
			$result= $BDD->query('SELECT * from connexion ORDER by date_inscription DESC');
			while ($donnees = $result->fetch())
			{
				$count = $count + 1;
				$originalDate = $donnees['date_inscription'];
				$timestamp = strtotime($originalDate);
				$newDate = date("d F Y", $timestamp); 
				?>
				<tr id="<?php echo $donnees['id'];?>">
					<form action="superAdmin.php" method="post" accept-charset="utf-8">
						<div class="form-group">
							<th scope="row"><?php echo $count;?></th>
							<td>
								<p><?php echo $donnees['pseudo'];?></p>
							</td>
							<td>
								<p><?php echo $donnees['email'];?></p>
							</td>
							<td>
								<p><?php echo $newDate;?></p>
							</td>
							<td>
								<?php
								if (html_entity_decode(htmlspecialchars_decode($donnees['role']))=="utilisateur") {
									?>
									<select class="form-control" name="role">
										<option value="utilisateur" selected>Utilisateur</option>
										<option value="admin">Administrateur</option>
									</select>
									<small class="form-text">Utilisateur</small>							
									<?php 
								}elseif (html_entity_decode(htmlspecialchars_decode($donnees['role']))=="admin") {
									?>
									<select class="form-control" name="role">
										<option value="utilisateur">Utilisateur</option>
										<option value="admin" selected>Administrateur</option>
									</select>
									<small class="form-text text-primary">Administrateur</small>
									<?php
								}
								elseif (html_entity_decode(htmlspecialchars_decode($donnees['role']))=="superadmin") {
									?>
									<select class="form-control" name="role">
										<option value="superadmin" selected>Super Administrateur</option>
									</select>
									<small class="form-text text-success">Super Adrministrateur</small>
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
					$safeRole = htmlspecialchars(htmlentities(isset($_POST["role"]) ? $_POST["role"] : NULL, ENT_QUOTES), ENT_QUOTES);
					if ($safeRole!='') {
						$BDD-> query("UPDATE connexion SET role='$safeRole' Where id='$ID'");

						header('Location: superAdmin.php');
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