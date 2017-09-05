<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scare=1">

	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.css') ?>">
	
</head>
<body>
	<div class="container">
		

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
				<li>
					<div class="dropdown">
						<button class="btn btn-blue dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<li class="text-uppercase navbar-left"><a href="#Etablissements"><i class="fa fa-home visible-xs" aria-hidden="true"></i><p class="hidden-xs">Etablissements</p></a></li>
							 <span class="caret"></span>
				  		</button>
				  		<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						    <li><a href="#">IME</a></li>
						    <li><a href="#">SESSAD</a></li>
						    <li><a href="#">ULIS</a></li>
						</ul>
					</div>
				</li>

			<li>
				<div class="dropdown">
					<button class="btn btn-blue dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<li class="text-uppercase navbar-left"><a href="#Medecins"><i class="fa fa-user-md visible-xs" aria-hidden="true"></i><p class="hidden-xs">Médecins</p></a></li>
							 <span class="caret"></span>
				  		</button>
				  		 <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						    <li><a href="#">Généraliste</a></li>
						    <li><a href="#">Psychologue/Psychiatre</a></li>
						    <li><a href="#">Dentiste</a></li>
						</ul>
					</div>
				</li>


				<li>
					<div class="dropdown">
						<button class="btn btn-blue dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<li class="text-uppercase navbar-left"><a href="#Ecoles"><i class="fa fa-child visible-xs" aria-hidden="true"></i><p class="hidden-xs">Ecoles</p></a></li>
							 <span class="caret"></span>
				  		</button>
				  		 <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						    <li><a href="#">Maternelle</a></li>
						    <li><a href="#">Primaire</a></li>
						    <li><a href="#">Collège</a></li>
						    <li><a href="#">Lycée</a></li>
						</ul>
				</div>
			</li>
			</ul>

			<ul class=" nav navbar-nav navbar-right">
				<li class="text-uppercase navbar-right"><a href="<?= $this->url('user_signup') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
					<li class="text-uppercase navbar-right"><a href="<?= $this->url('user_signin') ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>


					<li>
					<div class="dropdown">
						<button class="btn btn-blue dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<li class="text-uppercase navbar-left">Ajout</li>
							 <span class="caret"></span>
				  		</button>
				  		 <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
						    <li><a href="<?= $this->url('instution_create')?>">Etablissements</a></li>
						    <li><a href="<?= $this->url('doctor_create') ?>">Médecins</a></li>
						</ul>
				</div>
			</li>
		</ul>
		</div>
	</div>
</nav>
<div class="clearfix"></div>


		<header>
			
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer class="container">
			<div class="row">
				<div class="col-md-6">
					<ul class="list-inline">
						<li class="text-left"><a href="<?= $this->url('contact') ?>">Contacts</a></li>
						<li class="text-left"><a href="<?= $this->url('a_propos') ?>">à propos</a></li>
						<li class="text-left"><a href="<?= $this->url('mentions_legales') ?>">Mentions légales</a></li>
					</ul>
				</div>

				<div class="col-md-6">
					<p class=><i class="fa fa-copyright" aria-hidden="true"></i> Copyright Mouton à 5 pattes, Compéthance, WebForce3, Urbilog 2017 </p>
				</div>	
			</div>
		</footer>
	</div>

	<script src="<?= $this->assetUrl('js/jquery.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.js') ?>" charset="utf-8"></script>
</body>
</html>