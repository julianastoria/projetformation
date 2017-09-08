<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<div class="alert-danger">
		<?php foreach ($errors as $error): ?>
			<ul>
				<li><?= $error ?></li>
			</ul>
		<?php endforeach ?>
	</div>
	<form method="POST">
		<div class="form-group">
			<label for="note"></label>
			<input type="number" name="note" id="note">
		</div>
		<div class="form-group">
			<label><?= $title_sub_notes1 ?> :</label>
			<select name="sub_notes1" id="sub_notes1">
				<?php for ($i=1;$i<6;$i++) : ?>
					<option value="<?= $i ?>"><?= $i ?></option>
				<?php endfor; ?>
			</select>
		</div>
		<div class="form-group">
			<label><?= $title_sub_notes2 ?> :</label>
			<select name="sub_notes1" id="sub_notes2">
				<?php for ($i=1;$i<6;$i++) : ?>
					<option value="<?= $i ?>"><?= $i ?></option>
				<?php endfor; ?>
			</select>
		</div>
		<div class="form-group">
			<label><?= $title_sub_notes3 ?> :</label>
			<select name="sub_notes1" id="sub_notes3">
				<?php for ($i=1;$i<6;$i++) : ?>
					<option value="<?= $i ?>"><?= $i ?></option>
				<?php endfor; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="title_comment">Titre :</label>
			<input type="text" name="title_comment" id="title_comment" value="<?= $title_comment ?>">
		</div>
		<div class="form-group">
			<label id="comment">Commentaires :</label>
			<textarea name="comment" id="comment"><?= $comment ?></textarea>
		</div>
		<button class="btn btn-purple" type="submit">Envoyer</button>
	</form>
<?php $this->stop('main_content') ?>