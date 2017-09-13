<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

	<h2 class="text-center">Connexion :</h2><br>
	<div class="alert-danger text-center" role="alert">
	<?= $error ?>
	</div>
	<div class="row">
		<div class="col-md-5 col-lg-4 col-md-offset-3 col-lg-offset-4">
			<form method="post" action="<?= $this->url('user_signin') ?>">
				<div class="form-group">
					<label>Identifiant (Adresse Mail) : </label>
					<input class="form-control" type="text" name="email" id="email" value="<?= $email ?>">
				</div>
				<div class="form-group">
					<label>Mot de passe :</label>
					<input type="password" class="form-control" name="password" id="password">
				</div>
				<button class="btn btn-purple" type="submit">Se connecter</button>
			</form><br>
			<a class="pwd" href="<?= $this->url('lost_pwd') ?>">Mot de passe oublié ?</a>
		</div>
	</div>
<?php $this->stop('main_content') ?>