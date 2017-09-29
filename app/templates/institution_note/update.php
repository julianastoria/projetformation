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
	<form method="POST">

		<div class="row">
			<div class="col-md-5 col-lg-4 col-md-offset-3 col-lg-offset-4">	
				
				<div class="form-group">
					<label for="sub_notes1"><?= $title_sub_notes1 ?> :</label>
					<select class="form-control" name="sub_notes1" id="sub_notes1">
						<?php for ($i=1;$i<6;$i++) : ?>
							<option value="<?= $i ?>"><?= $i ?></option>
						<?php endfor; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="sub_notes2"><?= $title_sub_notes2 ?> :</label>
					<select class="form-control" name="sub_notes2" id="sub_notes2">
						<?php for ($i=1;$i<6;$i++) : ?>
							<option value="<?= $i ?>"><?= $i ?></option>
						<?php endfor; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="sub_notes3"><?= $title_sub_notes3 ?> :</label>
					<select class="form-control" name="sub_notes3" id="sub_notes3">
						<?php for ($i=1;$i<6;$i++) : ?>
							<option value="<?= $i ?>"><?= $i ?></option>
						<?php endfor; ?>
					</select>
				</div>
				<div class="form-group">
					<label for="title_comment">Titre :</label>
					<input class="form-control" type="text" name="title_comment" id="title_comment" value="<?= $title_comment ?>">
				</div>
				<div class="form-group">
					<label for="comment">Commentaires :</label>
					<textarea class="form-control" name="comment" id="comment"><?= $comment ?></textarea>
				</div>
				<button class="btn btn-purple" type="submit">Envoyer</button>
			</div>
		</div>
	</form>
<?php $this->stop('main_content') ?>