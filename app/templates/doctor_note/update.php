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
	<form method="POST" action="<?= $this->url('edit_doctor_note',['id'=>$id]) ?>">
		<div class="rows">
			<div class="col-md-5 col-lg-4 col-md-offset-3 col-lg-offset-4">

		<div class="form-group">
			<label id="sub_notes1"><?= $title_sub_notes1 ?> :</label>
			<input class="form-control" type="number" name="sub_notes1" id="sub_notes1" value="<?= $sub_notes1 ?>">
		</div>
		<div class="form-group">
			<label id="sub_notes2"><?= $title_sub_notes2 ?> :</label>
			<input class="form-control" type="number" name="sub_notes2" id="sub_notes2" value="<?= $sub_notes2 ?>">
		</div>
		<div class="form-group">
			<label id="sub_notes3"><?= $title_sub_notes3 ?> :</label>
			<input class="form-control" type="number" name="sub_notes3" id="sub_notes3" value="<?= $sub_notes3 ?>">
		</div>
		<div class="form-group">
			<label for="title_comment">Titre</label>
			<input class="form-control" type="text" name="title_comment" id="title_comment" value="<?= $title_comment ?>">
		</div>
		<div class="form-group">
			<label for="comment">Commentaires :</label>
			<textarea class="form-control" name="comment" id="comment" rows="20" cols="50"><?= $comment ?></textarea>
		</div>
		<button type="submit" class="btn btn-purple">Envoyer</button>
			<div/>
		</div>
	</form>
<?php $this->stop('main_content') ?>