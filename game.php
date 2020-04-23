<?php

require("header.php");



$Result = intval(isset($_POST["Result"]) ? $_POST["Result"] : NULL);
$Nquest = intval(isset($_POST["Nquest"]) ? $_POST["Nquest"] : NULL);

// $mon_tab = array();
// var_dump($_SESSION['mon_tab']);
$mon_tab = $_SESSION['mon_tab'];
if (count($mon_tab)==0 and $Nquest!=1){
	$Nquest = 1;
	$_POST['Nquest'] = 1;
}



// print_r($Nquest); 


$maxID = $BDD -> query('SELECT COUNT(*) from reponses');
$idmax= (int)$maxID->fetchColumn();

$randID = rand(1, $idmax);
$count = 0;

$getID = $BDD -> query("SELECT id from reponses where status = 'V&amp;eacute;rifi&amp;eacute;e' ORDER BY RAND() limit 1");
$GetId = $getID->fetchColumn();


while (in_array($GetId, $mon_tab)) {
	$getID = $BDD -> query("SELECT id from reponses where status = 'V&amp;eacute;rifi&amp;eacute;e' ORDER BY RAND() limit 1");
	$GetId = $getID->fetchColumn();

}
$result = $BDD ->query("SELECT * FROM reponses where id=".$GetId);



if (count($mon_tab)==$Nquest) {
	array_pop($mon_tab);	

}


array_push($mon_tab, $GetId);


$_SESSION['mon_tab'] = $mon_tab;


while ($donnees = $result->fetch())
{

	$question = html_entity_decode(htmlspecialchars_decode($donnees['question']));
	$reponse = html_entity_decode(htmlspecialchars_decode($donnees['reponse']));
	$explication = html_entity_decode(htmlspecialchars_decode($donnees['explication']));
	?>
	<section id="game" class="page">
		<div class="conteneur">
			<div class="parts">
				
				<img src="./images/logo_accueil.png">
				<div class="container">
					<div class="text-center">

						<h4>Question <?php echo $Nquest?></h4>	
						<h2><?php echo $question;?></h2>

						<br/><br/>
					</div>
				</div>
			</div>
			<div class="bandeau">
				<div class="move">
					
				</div>
			</div>
			<div class="parts">
				<div class="container h-100">
					<div class="row">
						<div class="col-7 ml-auto mr-auto">
							<div class="text-center group-btn">
								<div class="container-fluid">
									<div class="row">
										<div class="col-6">
											<form method="post" action="reponse.php">
												<input type="hidden" name="Nquest" value="<?php echo $Nquest;?>">
												<input type="hidden" name="Result" value="<?php echo $Result;?>">
												<input type="hidden" name="id" value="<?php echo $donnees['id'];?>">

												<input type="submit" name="vrai" value="Vrai" class="btn btn-success"/>
											</form>
										</div>
										<div class="col-6">
											<form method="post" action="reponse.php">
												<input type="hidden" name="Nquest" value="<?php echo $Nquest;?>">
												<input type="hidden" name="Result" value="<?php echo $Result;?>">
												<input type="hidden" name="id" value="<?php echo $donnees['id'];?>">
												<input type="submit" name="faux" value="Faux" class="btn btn-danger"/>											
											</form>
											
										</div>
									</div>
								</form>
							</div>
						</div>						
					</div>
				</div>
			</div>

		</div>	

	</section>


	<?php 
}

$result->closeCursor();
?>

<?php
require('footer.php');
?>
