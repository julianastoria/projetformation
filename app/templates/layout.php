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
	<a href="#main" class="hide_access">Aller au contenu</a>
	

	<a href="#footer" class="hide_access">Aller au vers la barre d'informations</a>
	<div class="container-fluid demo">
	
	<header id="header">

		<!--navbar -->
<nav class="navbar navbar-default navbar-static-top" id="nav" role="navigation">
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
					
						<a role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" class="btn btn-blue dropdown-toggle" href="#Etablissements"><i class="fa fa-home visible-xs" aria-hidden="true"></i><p class="hidden-xs">Etablissements</p></a>
						<span class="caret"></span>
						 
							<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu1">
								 <li class="dropdown-submenu">
								 	<a class="dropdown-toggle" data-toggle="dropdown" href="<?= $this->url('institutions_index',['type'=>'etablissementsspe']) ?>">Etablissements spécialisés</a>
										 <ul class="dropdown-menu">
									 		<li><a class="eta" href="<?= $this->url('institutions_index',['type'=>'ime']) ?>">IME</a></li>
									 		<li><a class="eta" href="<?= $this->url('institutions_index',['type'=>'sessad']) ?>">SESSAD</a></li>
									 		<li><a class="eta" href="<?= $this->url('institutions_index',['type'=>'ulis']) ?>">ULIS</a></li>
									 		
										</ul>
								</li>	 		
							

								<li class="dropdown-submenu"><a href="<?= $this->url('institutions_index',['type'=>'ecoles']) ?>">Ecoles</a>
						    		 <ul class="dropdown-menu">
									 		<li><a class="eta" tabindex="-1" href="<?= $this->url('institutions_index',['type'=>'maternelle']) ?>">Maternelle</a></li>
									 		<li><a class="eta" href="<?= $this->url('institutions_index',['type'=>'primaire']) ?>">Primaire</a></li>
									 		<li><a class="eta" href="<?= $this->url('institutions_index',['type'=>'college']) ?>">Collège</a></li>
									 		<li><a class="eta" href="<?= $this->url('institutions_index',['type'=>'lycee']) ?>">Lycée</a></li>
										</ul>
						    	</li>
							</ul>
					
				</div>
			</li>
			


			<li>
				<div class="dropdown">
					
							<a href="#Medecins" class="btn btn-blue dropdown-toggle" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button"><i class="fa fa-user-md visible-xs" aria-hidden="true"></i><p class="hidden-xs">Médecins</p></a>
							 <span class="caret"></span>
				  		
				  		 <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
						    <li><a href="<?= $this->url('doctors_index',['type'=>'generaliste']) ?>">Généraliste</a></li>
						    <li><a href="<?= $this->url('doctors_index',['type'=>'psychiatre']) ?>">Psychologue/Psychiatre</a></li>
						    <li><a href="<?= $this->url('doctors_index',['type'=>'dentiste']) ?>">Dentiste</a></li>
						</ul>
					</div>
				</li>
			</ul>
		
				<form class="col-md-3" id="search">
					<input type="text" name="search" aria-label="rechercher">
					<button class="btn btn-purple">Rechercher</button>
				</form>
			
			<ul class=" nav navbar-nav navbar-right">
				<?php if (!isset($_SESSION['user'])) : ?>
					<li class="navbar-right"><a href="<?= $this->url('user_signup') ?>"><i class="fa fa-user-plus bonhomme" aria-hidden="true"><span class="hide_access"></span></i></a></li>
					<li class="navbar-right"><a href="<?= $this->url('user_signin') ?>"><i class="fa fa-sign-in" aria-hidden="true"></i><span  class="hide_access">Se connecter</span><span aria-hidden="true">Login</span></a></li>
				<?php else : ?>	
					<li><a href="<?=$this->url('profile')?>"><?= $_SESSION['user']['firstname'] ?></a></li>
					<li><a href="<?= $this->url('logout') ?>">Deconnexion</a></li>
				<?php endif; ?>
					<li>
					<div class="dropdown">
		
							<a href="#Ajout" class="btn btn-blue ajout dropdown-toggle" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="button">Ajout <span class="caret"></span></a>
							 
				  		
				  		 <ul class="dropdown-menu ajouts" aria-labelledby="dropdownMenu4">
						    <li><a href="<?= $this->url('institution_create')?>">Etablissements</a></li>
						    <li><a href="<?= $this->url('doctor_create') ?>">Médecins</a></li>
						</ul>
					</div>
			</li>
		</ul>
			</div>
	</div>
</nav>
</header>
<main id="main">


	

		

		<section>
			<?= $this->section('main_content') ?>
		</section>
	</main>
		<footer class="container-fluid footer" role="contentinfo" id="footer">
			<div class="row">
				<div class="col-md-6">
					<ul class="list-inline">
						<li class="text-left contact"><a href="<?= $this->url('contact') ?>">Contacts</a></li>
						<li class="text-left"><a href="#">à propos</a></li>
						<li class="text-left"><a href="#">Mentions légales</a></li>
					</ul>
				</div>

				<div class="col-md-6">
					<p><i class="fa fa-copyright" aria-hidden="true"></i> Copyright Mouton à 5 pattes, Compéthance, WebForce3, Urbilog 2017 </p>
				</div>	
			</div>
		</footer>
	</div>



	<script src="<?= $this->assetUrl('js/jquery.js') ?>" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.js') ?>" charset="utf-8"></script>
	<?= $this->section('main_script') ?>
	</body>
</html>