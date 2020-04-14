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
		<div class="container h-100">

			<div class="row h-100">  
				<div class="col-lg-5 col-12 mt-auto mb-auto">
					<img src="./images/logo_accueil.png" class="img-fluid img_acc">
				</div>
				<div class="col-lg-7 col-12 mt-auto mb-auto">
					<h5>Qu'est ce que le Covid-19 ?</h5>
					<p>
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent maximus luctus pulvinar. Mauris eget tortor non felis tincidunt suscipit. Phasellus vitae nibh a eros ullamcorper fermentum. Praesent pellentesque pellentesque semper. Sed commodo mauris a purus commodo dignissim. Maecenas elementum quis enim sed mattis. Ut id metus eu ipsum pharetra scelerisque. Maecenas vitae vehicula urna, sed accumsan purus. Aliquam quis lacus id risus consectetur tincidunt et vel augue.
					</p>
				</div>
			</div>
		</div>
	</div>
	<div class="bandeau">
		<div class="move">			
		</div>		
	</div>
	<div class="parts">
		<div class="container h-100">
			<div class="row h-100">
				<div class="col-6 mt-auto mb-auto">
					<h4>Testez vos connaissances</h4><br/>
					<h2>19 Questions</h2><br/>
				</div>
				<div class="col-6 mt-auto mb-auto">
					<button class="btn btn-success">VRAI</button><button class="btn btn-danger">FAUX</button>

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

</section>




<?php

require('footer.php');
?>
