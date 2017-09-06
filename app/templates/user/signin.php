<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

	<h2 class="text-center">Connexion :</h2><br>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<form method="post" action="<?= $this->url('user_signin') ?>">
				<div class="form-group">
					<label>Identifiant (Adresse Mail) : </label>
					<input type="text" name="email" id="email" value="<?= $email ?>">
				</div>
				<div class="form-group">
					<label>Mot de passe :</label>
					<input type="password" name="password" id="password">
				</div>
				<button class="btn btn-purple" type="submit">Se connecter</button>
			</form><br>
			<a class="pwd" href="<?= $this->url('lost_pwd') ?>">Mot de passe oublié ?</a>
		</div>
	</div>
<?php $this->stop('main_content') ?>