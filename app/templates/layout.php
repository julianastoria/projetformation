<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.css') ?>">
	
</head>
<body>
	<div class="container-fluid">
		

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
							<li class="navbar-left"><a href="#Etablissements"><i class="fa fa-home visible-xs" aria-hidden="true"></i><p class="hidden-xs">Etablissements</p></a></li>
							 <span class="caret"></span>
				  		</button>
				  		<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
						    <li><a href="<?= $this->url('institutions_index',['type'=>'ime']) ?>">IME</a></li>
						    <li><a href="<?= $this->url('institutions_index',['type'=>'sessad']) ?>">SESSAD</a></li>
						    <li><a href="<?= $this->url('institutions_index',['type'=>'ulis']) ?>">ULIS</a></li>
						</ul>
					</div>
				</li>

			<li>
				<div class="dropdown">
<<<<<<< HEAD
					<button class="btn btn-blue dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<li class="text-uppercase navbar-left"><a href="#Medecins"><i class="fa fa-user-md visible-xs" aria-hidden="true"></i><p class="hidden-xs">Médecins</p></a></li>
=======
					<button class="btn btn-blue dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<li class="navbar-left"><a href="#Medecins"><i class="fa fa-user-md visible-xs" aria-hidden="true"></i><p class="hidden-xs">Médecins</p></a></li>
>>>>>>> develop
							 <span class="caret"></span>
				  		</button>
				  		 <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
						    <li><a href="<?= $this->url('doctors_index',['type'=>'generaliste']) ?>">Généraliste</a></li>
						    <li><a href="<?= $this->url('doctors_index',['type'=>'psychiatre']) ?>">Psychologue/Psychiatre</a></li>
						    <li><a href="<?= $this->url('doctors_index',['type'=>'dentiste']) ?>">Dentiste</a></li>
						</ul>
					</div>
				</li>


				<li>
					<div class="dropdown">
<<<<<<< HEAD
						<button class="btn btn-blue dropdown-toggle" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<li class="text-uppercase navbar-left"><a href="#Ecoles"><i class="fa fa-child visible-xs" aria-hidden="true"></i><p class="hidden-xs">Ecoles</p></a></li>
=======
						<button class="btn btn-blue dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<li class="navbar-left"><a href="#Ecoles"><i class="fa fa-child visible-xs" aria-hidden="true"></i><p class="hidden-xs">Ecoles</p></a></li>
>>>>>>> develop
							 <span class="caret"></span>
				  		</button>
				  		 <ul class="dropdown-menu" aria-labelledby="dropdownMenu3">
						    <li><a href="<?= $this->url('institutions_index',['type'=>'maternelle']) ?>">Maternelle</a></li>
						    <li><a href="<?= $this->url('institutions_index',['type'=>'primaire']) ?>">Primaire</a></li>
						    <li><a href="<?= $this->url('institutions_index',['type'=>'college']) ?>">Collège</a></li>
						    <li><a href="<?= $this->url('institutions_index',['type'=>'lycee']) ?>">Lycée</a></li>
						</ul>
				</div>
			</li>
			</ul>

			<ul class=" nav navbar-nav navbar-right">
<<<<<<< HEAD
				<li class="text-uppercase navbar-right"><a href="<?= $this->url('user_signup') ?>"><i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
					<li class="text-uppercase navbar-right"><a href="<?= $this->url('user_signin') ?>"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
=======
				<li class="text-uppercase navbar-right"><a href="#inscription"><i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
					<li class="navbar-right"><a href="#connexion"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a></li>
>>>>>>> develop


					<li>
					<div class="dropdown">
						<button class="btn btn-blue dropdown-toggle" type="button" id="dropdownMenu4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
<<<<<<< HEAD
							<li class="text-uppercase navbar-left">Ajout</li>
=======
							<li class="navbar-left"><a href="#Ajout">Ajout</a></li>
>>>>>>> develop
							 <span class="caret"></span>
				  		</button>
				  		 <ul class="dropdown-menu" aria-labelledby="dropdownMenu4">
						    <li><a href="<?= $this->url('institution_create')?>">Etablissements</a></li>
						    <li><a href="<?= $this->url('doctor_create') ?>">Médecins</a></li>
						</ul>
					</div>
			</li>
		</ul>
		</div>
	</div>
</nav>



		

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer class="container-fluid footer">
			<div class="row">
				<div class="col-md-6">
					<ul class="list-inline">
<<<<<<< HEAD
						<li class="text-left"><a href="<?= $this->url('contact') ?>">Contacts</a></li>
						<li class="text-left"><a href="<?= $this->url('a_propos') ?>">à propos</a></li>
						<li class="text-left"><a href="<?= $this->url('mentions_legales') ?>">Mentions légales</a></li>
=======
						<li class="text-left contact"><a href="#">Contacts</a></li>
						<li class="text-left"><a href="#">à propos</a></li>
						<li class="text-left"><a href="#">Mentions légales</a></li>
>>>>>>> develop
					</ul>
				</div>

				<div class="col-md-6">
					<p class=><i class="fa fa-copyright" aria-hidden="true"></i> Copyright Mouton à 5 pattes, Compéthance, WebForce3, Urbilog 2017 </p>
				</div>	
			</div>
		</footer>
	</div>


	<script src="<?= $this->assetUrl('js/jquery.js') ?>" charset="utf-8"></script>
	<script type="text/javascript" src="<?= $this->assetUrl('js/jquery.barrating.min.js') ?>"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.js') ?>" charset="utf-8"></script>
	<?= $this->section('main_script') ?>
</body>
</html>