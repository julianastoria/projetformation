<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<h2 class="text-center">Contacts :</h2>

	<div class="row">
		<div class="col-md-5 col-lg-4 col-md-offset-3 col-lg-offset-4">
	<form method="post">
		<div class="form-group">
			<label for="email">Email :</label>
			<input class="form-control" type="email" name="email" id="email" aria-required="true">
		</div>
		<div class="form-group">
			<label for="message">Message :</label>
			<textarea class="form-control" name="message" id="message" aria-required="true"></textarea>
		</div>
		<button class="btn btn-purple" type="button">Envoyer</button>
	</form>

		</div>
	</div>
<?php $this->stop('main_content') ?>