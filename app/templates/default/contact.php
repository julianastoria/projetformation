<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<form method="post">
		<div class="form-group">
			<label for="email">Email :</label>
			<input type="email" name="email" id="email">
		</div>
		<div class="form-group">
			<label id="message">Message :</label>
			<textarea name="message" id="message"></textarea>
		</div>
		<button type="submit">Envoyer</button>
	</form>
<?php $this->stop('main_content') ?>