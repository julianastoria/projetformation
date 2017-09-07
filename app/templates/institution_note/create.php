<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<div class="alert-danger">
		<?php foreach ($errors as $error): ?>
			<ul>
				<li><?= $error ?></li>
			</ul>
		<?php endforeach ?>
	</div>
	<h2 class="text-center"><?= $title ?></h2><br>

	<div class="row">
		<div class="col-md-3 col-md-offset-4">

	<form method="POST" action="<?= $this->url('create_institution_note',['id'=>$id]) ?>">
		<div class="form-group">
			<label><?= $sub_notes1 ?> :</label>
			<input class="form-control" type="number" name="note" id="note">
		</div>
		<div class="form-group">
			<label><?= $sub_notes2 ?> :</label>
			<input class="form-control" type="number" name="sub_note2" id="note">
		</div>
		<div class="form-group">
			<label><?= $sub_notes3 ?> :</label>
			<input class="form-control" type="number" name="sub_note3" id="note">
		</div>
		<div class="form-group">
			<label id="comment">Commentaires :</label>
			<textarea class="form-control" name="comment" id="comment" rows="20" cols="50"></textarea>
		</div>
		<button type="submit" class="btn btn-purple">Envoyer</button>
	</form>

		</div>
	</div>
<?php $this->stop('main_content') ?>