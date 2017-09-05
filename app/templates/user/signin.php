<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<form method="post" action="<?= $this->url('user_signin') ?>">
		<div class="form-group">
			<label>Identifiant (Adresse Mail) : </label>
			<input type="text" name="email" id="email" value="<?= $email ?>">
		</div>
		<div class="form-group">
			<label>Mot de passe :</label>
			<input type="password" name="password" id="password">
		</div>
		<button type="submit">Se connecter</button>
	</form>
<?php $this->stop('main_content') ?>