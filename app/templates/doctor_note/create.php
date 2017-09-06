<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<div class="alert-danger">
		<?php foreach ($errors as $error): ?>
			<ul>
				<li><?= $error ?></li>
			</ul>
		<?php endforeach ?>	</div>
	<h2><?= $title ?></h2>
	<form method="POST" action="<?= $this->url('create_doctor_note',['id'=>$id]) ?>">
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
			<textarea name="comment" id="comment" rows="20" cols="50"></textarea>
		</div>
		<button class="btn btn-default" type="submit">Envoyer</button>
	</form>
<?php $this->stop('main_content') ?>