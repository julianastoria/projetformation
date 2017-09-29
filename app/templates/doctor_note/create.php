<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<div class="alert-danger">
		<?php foreach ($errors as $error): ?>
			<ul>
				<li><?= $error ?></li>
			</ul>
		<?php endforeach ?>
	</div>
	<h2 class="text-center"><?= $title ?></h2>
	<form method="POST" action="<?= $this->url('create_doctor_note',['id'=>$id]) ?>">
		<div class="row">
		<div class="col-md-5 col-lg-4 col-md-offset-3 col-lg-offset-4">

				<div class="form-group">
					<label id="sub_notes1"><?= $title_sub_notes1 ?> :</label>
					<select name="sub_notes1" id="sub_notes1" class="form-control notes">
						<?php for ($i=1;$i<6;$i++) : ?>
							<option class="note" value="<?= $i ?>"><?= $i ?></option>
						<?php endfor; ?>
					</select>
				</div>

				<div class="form-group">
					<label id="sub_notes2"><?= $title_sub_notes2 ?> :</label>
					<select name="sub_notes2" id="sub_notes2" class="form-control notes">
						<?php for ($i=1;$i<6;$i++) : ?>
							<option class="note" value="<?= $i ?>"><?= $i ?></option>
						<?php endfor; ?>
					</select>
				</div>

				<div class="form-group">
					<label id="sub_notes3"><?= $title_sub_notes3 ?> :</label>
					<select name="sub_notes3" id="sub_notes3" class="form-control notes">
						<?php for ($i=1;$i<6;$i++) : ?>
							<option class="note" value="<?= $i ?>"><?= $i ?></option>
						<?php endfor; ?>
					</select>
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
	</form>
<?php $this->stop('main_content') ?>