<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<div class="alert-danger">
	</div>
	<form method="POST">
		<div class="form-group">
			<label for="note">Note generale</label>
			<input type="number" name="sub_note1" id="note">
		</div>
		<div class="form-group">
			<label><?= $sub_notes1 ?> :</label>
			<input type="number" name="note" id="note">
		</div>
		<div class="form-group">
			<label><?= $sub_notes2 ?> :</label>
			<input type="number" name="sub_note2" id="note">
		</div>
		<div class="form-group">
			<label><?= $sub_notes3 ?> :</label>
			<input type="number" name="sub_note3" id="note">
		</div>
		<div class="form-group">
			<label id="comment">Commentaires :</label>
			<textarea name="comment" id="comment"></textarea>
		</div>
		<button type="submit">Envoyer</button>
	</form>
<?php $this->stop('main_content') ?>