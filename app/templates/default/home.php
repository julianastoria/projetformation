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
	<h2 class="text-center regions">Derniers établissements ajoutés :</h2><br>
	<a class="afficher" href="#">Afficher</a>

		<div class="row">
			<?php foreach ($institutions as $key => $institution): ?>
				<div class="col-md-3">
					<div class="thumbnail">
						<div class="caption">
							<img class="img-responsive" src="<$= $institution['photos'] ?>" alt=¨"Photo de <?= $institution['name'] ?>">
							<a href="<?= $this->url('institution_details',['id'=>$institution['id']]) ?>"><h4><?= $institution['name'] ?></h4></a>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
				</div>

	<h2 class="text-center regions">Derniers médecins ajoutés :</h2>
	<a class="afficher" href="#">Afficher</a>
			<div class="row">
				<?php foreach ($doctors as $key => $doctor): ?>
					<div class="col-md-3">
					<div class="thumbnail">
						<div class="caption">
							<img class="img-responsive" src="<$= $doctor['photos'] ?>" alt=¨"Photo de <?= $doctor['firstname'] ?>">
							<a href="<?= $this->url('doctor_details',['id'=>$doctor['id']]) ?>"><h4>Dr <?= $doctor['lastname'] ?><?= $doctor['firstname'] ?></h4></a>
						</div>
					</div>
				</div>
				<?php endforeach ?>
			</div>

	</div>

<?php $this->stop('main_content') ?>