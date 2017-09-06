<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<form method="post" action="<?= $this->url('lost_pwd') ?>">
		<div class="form-group">
			<label for="email">Adresse mail :</label>
			<input type="email" name="email" id="email">
		</div>
		<div class="form-group">
			<button type="submit" class="btn btn-default">Envoyer</button>
		</div>
	</form>
<?php $this->stop('main_content') ?>