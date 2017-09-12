<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>

	<h2 class="text-center">Résolution du mot de passe :</h2><br>
	<div class="row">
		<div class="col-md-5 col-lg-4 col-md-offset-3 col-lg-offset-4">

	<form method="post">
		<div class="form-group">
			<label for="password">Nouveau mot de passe :</label>
			<input class="form-control" type="password" name="password" id="password">
		</div>
		<div class="form-group">
			<label for="repeat_password">Répéter le mot de passe :</label>
			<input class="form-control" type="password" name="repeat_password" id="repeat_password">
		</div>
		<button class="btn btn-purple" type="submit">Envoyer</button>
	</form>

		</div>
	</div>
<?php $this->stop('main_content') ?>