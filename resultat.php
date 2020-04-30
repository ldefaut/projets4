<?php
require('header.php');
$Result = isset($_POST["Result"]) ? $_POST["Result"] : NULL;
if ($Result == NULL) {
	$Result=0;
}
?>
<section id="resultat" class="page">
	<div class="container-fluid h-100">
		<div class="row h-100">
			<div class="col-12">
				<div class="row h-100">
					<div class="col-6">
						<div class="vert-align">
							<h3>Vous avez eu un score de</h3>
						</div>
					</div>
					<div class="col-6">
						
					</div>
				</div>
			</div>
			<div class="col-12">
				<div class="container-fluid h-100">
					<div class="row h-100">
						<div class="col-6">
							<div class="vert-align">
								<div class="text mt-auto mb-auto">
									<h1>COVID<br/><?php echo $Result ?>/19</h1>
								</div>
							</div>
						</div>
						<div class="col-6">
							<div class="vert-align text-result text-left">
								<?php if ($Result==0) {
									?>
									<h2>0/19… Rien ne va.</h2><br/>
									<p>Vous n’avez jamais vérifié vos sources et croyez le premier article qui vient à vous. Vous devez faire attention aux fake-news, ça peut être dangereux pour vous dans le cas contraire. <br/><br/>Voici quelques sites qui peuvent vous aider à mieux connaître l’information dans le monde, et à voir lesquels de vos articles sont vrais ou faux : <br/><a href="https://www.cdc.gov/" target="_blank">Center of Desease Control and Prevention</a>, <a href="https://factuel.afp.com/" target="_blank">AFPFactuel</a> ou encore <a href="https://factcheckeu.info/fr/about" target="_blank">FactCheckEU</a>.</p>
									<?php
								}
								elseif ($Result<10) {
									?>
									<h2>C’est pas encore ça… </h2><br/>
									<p>Vous avez fait un score de <?php echo $Result;?>/19. Vous ne faites pas vraiment attention à vos sources et vous vous laissez convaincre pas le premier article. <br/><br/>Nous vous conseillons de vérifier la véracité de votre article grâce aux sites suivants : <br/><a href="https://www.cdc.gov/" target="_blank">Center of Desease Control and Prevention</a>, <a href="https://factuel.afp.com/" target="_blank">AFPFactuel</a> ou encore <a href="https://factcheckeu.info/fr/about" target="_blank">FactCheckEU</a>.</p>
									<?php
								}
								elseif ($Result<19) {
									?>
									<h2>Pas mal !</h2><br/>
									<p>Votre score de <?php echo $Result;?>/19 témoigne de votre envie d’avoir une source sûre. Vous savez démêler le vrai du faux. <br/><br/>Pour devenir parfait dans la vérification d’un article, vous pouvez consulter les sites de  : <a href="https://www.cdc.gov/" target="_blank">Center of Desease Control and Prevention</a>, <a href="https://factuel.afp.com/" target="_blank">AFPFactuel</a> ou encore <a href="https://factcheckeu.info/fr/about" target="_blank">FactCheckEU</a> qui vérifient et recensent les articles. </p>
									<?php
								}
								elseif ($Result==19) {
									?>
									<h2>Excellent, vous avez fait le score parfait !</h2><br/>
									<p>Vous savez rester bien informer tout en vérifiant constamment vos sources. Les fakes-news ne peuvent pas vous atteindre !<br/><br/> Continuez de vérifier vos infos sur <a href="https://www.cdc.gov/" target="_blank">Center of Desease Control and Prevention</a>, <a href="https://factuel.afp.com/" target="_blank">AFPFactuel</a> ou encore <a href="https://factcheckeu.info/fr/about" target="_blank">FactCheckEU</a>.</p>
									<?php
								}
								?>
								<div class="container-fluid p-0">
									<div class="row">
										<div class="col-6 p-0">
											<div class="group-btn">
												<a href="./index.php">
													<button class="btn btn-light">
														Recommencer une partie
													</button>
												</a>
											</div>
										</div>
										<div class="col-6 p-0">
											<div class="group-btn">
												<a href="./ajouter.php">
													<button class="btn btn-light">
														Ajouter une question
													</button>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 h-25">
				<div class="vert-align">

				</div>
			</div>
		</div>
	</div>
</section>

<div class="d-none" id ="result"><?php echo $Result?>
</div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v6.0"></script>


<?php 
require('footer.php');
?>
