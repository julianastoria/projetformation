<?php $this->layout('layout', ['title' => 'Accueil Annautisma']) ?>


<?php $this->start('main_content') ?>
<header class="jumbotron">
	<h1 class="text-center">Annautisma</h1>
	<h2 class="text-center">Site de note-annuaire de l'autisme en France</h2>
	<div class="row">
		<div class="col-md-8 col-md-offset-4">
			<button class="btn btn-purple btn-md" id="savoir">En savoir plus</button>
		</div>
	</div>
</header>

<div class="container-fluid">
	<div class="row">
	<!-- Méthode pour mettre un élément au milieu grâce au colonne -->
	<div class="col-md-3 col-md-offset-4">
		<form class="form-horizontal">
		<h3 class="text-center">Recherche :</h3>
			<input class="form-control" type="text" name="search"><br>
			<button class="btn btn-purple">Envoyer</button>
		</form>
	</div>
	</div>
</div>

<div class="container-fluid">
	<h2 class="text-center regions">Derniers éléments ajoutés :</h2><br>
	<a class="afficher" href="#">Afficher</a>
		
			<div class="row">
				<div class="col-md-3">
					<div class="thumbnail">
						<div class="caption">
							<img class="img-responsive" src="http://vdenain.etab.ac-lille.fr/wp-content/themes/Villars/jdgallery/slides/2.jpg">
							<a href="#"><h4>Collège villars Denain(59), Hauts-de-France</h4></a>
							<!-- rajouter la classe fa-pour agrandir l'étoile -->
							<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
						</div>
					</div>
				</div>

						<div class="col-md-3">
							<div class="thumbnail doc">
								<div class="caption">
									<a href="#"><h4>docteur j-m, Paris(75), Ile-De-France</h4></a>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
								</div>
							</div>	
						</div>

						<div class="col-md-3">
							<div class="thumbnail">
								<div class="caption">
									<img class="img-responsive" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTp3lwQqIA5Skt7xn4v9NySIWuoG32ZDObuFgdrAb2DFVbdLLOYCA">
									<a href="#"><h4>SESSAD Saint-Saulve(59), Hauts-de-France</h4></a>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="thumbnail">
								<div class="caption">
									<img class="img-responsive" src="http://association-makako.fr/wp-content/uploads/2016/11/IMG_7742.jpg">
									<a href="#"><h4>Ulis du Collège Martin Nadaud, Guéret(23), Nouvelle-Aquitaine</h4></a>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
									<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
								</div>
							</div>
						
				</div>
			</div>
		
	


	<h2 class="text-center regions">Eléments les plus recommandés :</h2>
	<a class="afficher" href="#">Afficher</a>
		
			<div class="row">
				<div class="col-md-3">
					<div class="thumbnail doc">
						<div class="caption">
							<img class="img-responsive" src="">
							<a href="#"><h4>Park si on(02), Hauts-de-France</h4></a>
							<i class="fa fa-2x fa-star" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="thumbnail">
						<div class="caption">
							<img class="img-responsive" src="http://www.jds.fr/medias/image/college-pierre-pflimlin-17115-470-0.jpg">
							<a href="#"><h4>Collège Pierre Pflimlin(68), Alsace</h4></a>
							<i class="fa fa-2x fa-star" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-half-o" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="thumbnail">
						<div class="caption">
							<img class="img-responsive" src="http://www.apeidouai.asso.fr/images/etablissements/ime-de-montigny-en-ostrevent.JPG">
							<a href="#"><h4>IME Les papillons blancs du douaisis Montigny-en-Ostrevent(59), Hauts-de-France</h4></a>
							<i class="fa fa-2x fa-star" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-half-o" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
						</div>
					</div>
				</div>

				<div class="col-md-3">
					<div class="thumbnail">
						<div class="caption">
							<img class="img-responsive" src="http://www.clg-rosa-parks-marseille.ac-aix-marseille.fr/spip/sites/www.clg-rosa-parks-marseille/spip/local/cache-vignettes/L565xH375/rosa_park_BIS-300a4.jpg">
							<a href="#"><h4>ULIS du collège Rosa Parks(35), Bretagne</h4></a>
							<i class="fa fa-2x fa-star" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
							<i class="fa fa-2x fa-star-o" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</div>

	

<?php $this->stop('main_content') ?>