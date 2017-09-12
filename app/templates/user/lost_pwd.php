<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<h2 class="text-center">Envoi d'un nouveau mot de passe :</h2><br>
		<div class="row">
			<div class="col-md-5 col-lg-4 col-md-offset-3 col-lg-offset-4">
	
	<form method="post" action="<?= $this->url('lost_pwd') ?>">
		<div class="form-group">
			<label for="email">Adresse mail :</label>
			<input class="form-control" type="email" name="email" id="email">
		</div>
		<div class="form-group">
			<button class="btn btn-purple" type="submit" class="btn btn-default">Envoyer</button>
		</div>
	</form>

	</div>
		</div>
<?php $this->stop('main_content') ?>