<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<form method="POST">
		<div class="form-group">
			<label for="note"></label>
			<input type="number" name="note" id="note">
		</div>
		<div class="form-group">
			<label><?= $sub_notes1 ?> :</label>
		</div>
		<div class="form-group">
			<label><?= $sub_notes2 ?> :</label>
		</div>
		<div class="form-group">
			<label><?= $sub_notes3 ?> :</label>
		</div>
		<div class="form-group">
			<label id="comment">Commentaires :</label>
			<textarea name="comment" id="comment"></textarea>
		</div>
		<button class="btn btn-purple" type="submit">Envoyer</button>
	</form>
<?php $this->stop('main_content') ?>