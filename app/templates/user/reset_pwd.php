<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<form method="post">
		<div class="form-group">
			<label for="password"></label>
			<input type="password" name="password" id="password">
		</div>
		<div class="form-group">
			<label for="repeat_password"></label>
			<input type="password" name="repeat_password" id="repeat_password">
		</div>
		<button type="submit">Envoyer</button>
	</form>
<?php $this->stop('main_content') ?>