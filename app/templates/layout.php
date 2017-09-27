<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.css') ?>">
	
	<link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	
</head>
	<body>
	<div class="container-fluid demo">
	<header>

		<!--navbar -->
<nav class="navbar navbar-default navbar-static-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?= $this->url('home') ?>">Annautisma</a>
			<button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#annautisma">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
			<div class="collapse navbar-collapse" id="annautisma">


			<ul class="nav navbar-nav navbar-left">
				<li class="navbar-left"><a href="<?= $this->url('institutions_index') ?>"><i class="fa fa-home visible-xs hidden-sm hidden-md hidden-lg" aria-hidden="true"></i><p class="hidden-xs visible-sm visible-md visible-lg">Etablissements</p></a></li>
				<li class="navbar-left"><a href="<?= $this->url('doctors_index') ?>"><i class="fa fa-user-md visible-xs hidden-sm hidden-md hidden-lg" aria-hidden="true"></i><p class="hidden-xs visible-sm visible-md visible-lg">Médecins</p></a></li>
							 
			</ul>
	

			<ul class=" nav navbar-nav navbar-right">
				<?php if (!isset($_SESSION['user'])) : ?>
					<li class="navbar-right"><a href="<?= $this->url('user_signup') ?>"><i class="fa fa-user-plus bonhomme" aria-hidden="true"></i></a></li>
					<li class="navbar-right"><a href="<?= $this->url('user_signin') ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
				<?php else : ?>	
					<li><a href="<?=$this->url('profile')?>"><?= $_SESSION['user']['firstname'] ?></a></li>
					<li><a href="<?= $this->url('logout') ?>">Deconnexion</a></li>
				<?php endif; ?>
					<li>
					<div class="dropdown">
						<button class="btn btn-blue ajout dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<li class="navbar-left"><a href="#Ajout">Ajout</a></li>
							 <span class="caret"></span>
				  		</button>
				  		 <ul class="dropdown-menu ajouts" aria-labelledby="dropdownMenu4">
						    <li class=""><a href="<?= $this->url('institution_create')?>">Etablissements</a></li>
						    <li class=""><a href="<?= $this->url('doctor_create') ?>">Médecins</a></li>
						</ul>
					</div>
			</li>
		</ul>
		</div>
	</div>
</nav>
</header>
<br>


	

		

		<section>
			<?= $this->section('main_content') ?>
		</section>


		<footer class="container-fluid footer">
			<div class="row">
				<div class="col-md-6">
					<ul class="list-inline">
						<li class="text-left contact"><a href="<?= $this->url('contact') ?>">Contacts</a></li>
						<li class="text-left"><a>à propos</a></li>
						<li class="text-left"><a>Mentions légales</a></li>
					</ul>
				</div>

				<div class="col-md-6">
					<p class="copyright"><i class="fa fa-copyright" aria-hidden="true"></i> Copyright Mouton à 5 pattes, Compéthance, WebForce3, Urbilog 2017 </p>
				</div>	
			</div>
		</footer>
	</div>



	<script src="<?= $this->assetUrl('js/jquery.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.js') ?>" charset="utf-8"></script>
	<?= $this->section('main_script') ?>
	</body>
</html>