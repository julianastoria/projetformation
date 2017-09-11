<?php $this->layout('layout', ["title" => "Accueil - Annautisma"]) ?>


<?php $this->start('main_content') ?>
<header class="jumbotron">
	<h1 class="text-center">Annautisma</h1>
	<h2 class="text-center">Phrase d'accroche pour définir en une ou deux ligne le site en question.</h2>
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
			<input class="form-control" type="text" name="search"><br>
			<button class="btn btn-purple">Envoyer</button>
		</form>
	</div>
	</div>
</div>

<div class="container-fluid">
	<h2 class="text-center regions">Derniers éléments ajoutés :</h2><br>
	<a class="afficher" href="#">Afficher</a>
		<figure class="zoomarticle">
			<div class="row">
				<div class="col-md-3">
					<img class="img-responsive" src="http://vdenain.etab.ac-lille.fr/wp-content/themes/Villars/jdgallery/slides/2.jpg">
					<a href="#"><h4>Collège villars Denain(59), Hauts-de-France</h4></a>
				</div>

				<div class="col-md-3">
					<img class="img-responsive beau" src="https://previews.123rf.com/images/spawn101/spawn1010905/spawn101090500016/4913803-Mignon-dessin-anim-recherche-d-un-m-decin-Banque-d'images.jpg">
					<a href="#"><h4>docteur j-m, Paris(75), Ile-De-France</h4></a>
				</div>

				<div class="col-md-3">
					<img class="img-responsive" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTp3lwQqIA5Skt7xn4v9NySIWuoG32ZDObuFgdrAb2DFVbdLLOYCA">
					<a href="#"><h4>SESSAD Saint-Saulve(59), Hauts-de-France</h4></a>
				</div>

				<div class="col-md-3">
					<img class="img-responsive" src="http://association-makako.fr/wp-content/uploads/2016/11/IMG_7742.jpg">
					<a href="#"><h4>Ulis du Collège Martin Nadaud, Guéret(23), Nouvelle-Aquitaine</h4></a>
				</div>
			</div>

		</figure>


	<h2 class="text-center regions">Eléments les plus recommandés :</h2>
	<a class="afficher" href="#">Afficher</a>
		<figure class="zoomarticle">
			<div class="row">
				<div class="col-md-3">
					<img class="img-responsive" src="data:image/jpeg;base64,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">
					<a href="#"><h4>Park si on(02), Hauts-de-France</h4></a>
					<i class="fa fa-star-o" aria-hidden="true"></i>
				</div>

				<div class="col-md-3">
					<img class="img-responsive" src="http://www.jds.fr/medias/image/college-pierre-pflimlin-17115-470-0.jpg">
					<a href="#"><h4>Collège Pierre Pflimlin(68), Alsace</h4></a>
				</div>

				<div class="col-md-3">
					<img class="img-responsive" src="http://www.apeidouai.asso.fr/images/etablissements/ime-de-montigny-en-ostrevent.JPG">
					<a href="#"><h4>IME Les papillons blancs du douaisis Montigny-en-Ostrevent(59), Hauts-de-France</h4></a>
				</div>

				<div class="col-md-3">
					<img class="img-responsive" src="http://www.clg-rosa-parks-marseille.ac-aix-marseille.fr/spip/sites/www.clg-rosa-parks-marseille/spip/local/cache-vignettes/L565xH375/rosa_park_BIS-300a4.jpg">
					<a href="#"><h4>ULIS du collège Rosa Parks(35), Bretagne</h4></a>
				</div>
			</div>

		</figure>
<?php $this->stop('main_content') ?>