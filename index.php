<?php


require("header.php");

$status = 'V&amp;eacute;rifi&amp;eacute;e';

$maxID = $BDD -> query("SELECT COUNT(*) from reponses where status ='$status'");
$idmax= (int)$maxID->fetchColumn();
$_SESSION['mon_tab'] = '';
$mon_tab  = array();
$_SESSION['mon_tab'] = $mon_tab;
?>

<!-- <canvas id="tp__canvas"></canvas> -->
<section id="home" class="page">
	<div class="parts">
		<div class="container-lg h-100">

			<div class="row h-100">  
				<div class="col-lg-5 col-12 mt-auto mb-auto">
					<img src="./images/logo_accueil.png" class="img-fluid img_acc">
				</div>
				<div class="col-lg-7 col-12 mt-auto mb-auto">
					<h3>Qu'est ce que le Covid-19 ?</h3>
					<br>
					<p>
						Non, le covid-19 n’est pas une invention des scientifiques chinois pour mettre le monde sous leur domination. Non, Emmanuel Macron n’a pas commandé le virus pour remporter les élections municipales sans qu’elles aient lieu. Non, le désinfectant ne doit pas être injecté dans le corps pour guérir du coronavirus. <br/><br/>

						Le terme de Coronavirus désigne un « virus à couronne », qui est dû à l’apparence de petits bulbes à la surface du virus, ressemblant à la couronne solaire. Il existerait jusqu’à 5000 types de Coronavirus, qui forment la sous-famille des Orthocoronavinae. Leurs principaux hôtes sont les mammifères volants au sang chaud (chauve-souris) et peuvent se transmettre que par contact entre les goutelette respiratoires, à cause de la toux ou des éternuements.  
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="references d-none d-lg-block">
		<p class="m-0 text-center">Toutes les questions sont issues de sources vérifiées. Pour vérifier vos sources, il existe des sites de facts-checking, comme <a href="https://www.cdc.gov/" target="_blank">Center of Desease Control and Prevention</a>, <a href="https://factuel.afp.com/" target="_blank">AFPFactuel</a> ou encore <a href="https://factcheckeu.info/fr/about" target="_blank">FactCheckEU</a>.</p>
	</div>
	<div class="bandeau">
		<div class="move">			
		</div>		
	</div>
	<div class="references d-block d-lg-none pt-1 pb-1">
		<p class="m-0 text-center">Toutes les questions sont issues de sources vérifiées. Pour vérifier vos sources, il existe des sites de facts-checking, comme <a href="https://www.cdc.gov/" target="_blank">Center of Desease Control and Prevention</a>, <a href="https://factuel.afp.com/" target="_blank">AFPFactuel</a> ou encore <a href="https://factcheckeu.info/fr/about" target="_blank">FactCheckEU</a>.</p>
	</div>
	<div class="parts">
		<div class="container-lg h-100">
			<div class="row h-100">
				<div class="col-5 mt-auto mb-auto">
					<h3>Testez vos connaissances</h3><br/>
					<h2 class="text-uppercase">quizz<br/> de 19 Questions</h2>
				</div>
				<div class="col-7 mt-auto mb-auto">
					<div class="group-btn">
						<div class="container-fluid">
							<div class="row">
								<div class="col-6">
									<button class="btn btn-success">VRAI</button>
								</div>
								<div class="col-6">
									<button class="btn btn-danger">FAUX</button>
								</div>
								<div class="col-12">
									<form action="game.php" method="post" accept-charset="utf-8">
										<input type="hidden" name="tab" value="">
										<input type="hidden" name="Nquest" value="1">
										<input type="hidden" name="Result" value="0">
										<input class="btn btn-light" type="submit" value="Je joue !">
									</form>
								</div>
							</div>
						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>

</section>




<?php

require('footer.php');
?>
