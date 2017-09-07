<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<div class="alert-danger">
		<?php foreach ($errors as $error): ?>
			<ul>
				<li><?= $error ?></li>
			</ul>
		<?php endforeach ?>
	</div>
	<h2><?= $title ?></h2>
	<form method="POST" action="<?= $this->url('create_doctor_note',['id'=>$id]) ?>">
		<div class="form-group">
			<label id="sub_notes1"><?= $title_sub_notes1 ?> :</label>
			<input type="number" name="sub_notes1" id="sub_notes1" value="<?= $sub_notes1 ?>">
		</div>
		<div class="form-group">
			<label id="sub_notes2"><?= $title_sub_notes2 ?> :</label>
			<input type="number" name="sub_notes2" id="sub_notes2" value="<?= $sub_notes2 ?>">
		</div>
		<div class="form-group">
			<label id="sub_notes3"><?= $title_sub_notes3 ?> :</label>
			<input type="number" name="sub_notes3" id="sub_notes3" value="<?= $sub_notes3 ?>">
		</div>
		<div class="form-group">
			<label for="title_comment">Titre</label>
			<input type="text" name="title_comment" id="title_comment" value="<?= $title_comment ?>">
		</div>
		<div class="form-group">
			<label id="comment">Commentaires :</label>
			<textarea name="comment" id="comment" rows="20" cols="50"><?= $comment ?></textarea>
		</div>
		<button type="submit" class="btn btn-default">Envoyer</button>
	</form>
<?php $this->stop('main_content') ?>