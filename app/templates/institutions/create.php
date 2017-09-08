<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<h2 class="text-center"><?= $title ?></h2><br>
	<form method="post">

	<div class="row">
		<div class="col-md-3 col-md-offset-4">
			<div class="form-group">
				<label for="name">Nom :</label>
				<input class="form-control" type="" name="name" id="name" value="<?= $name ?>">
			</div>
			<div class="form-group">
				<label for="address">Adresse :</label>
				<input class="form-control" type="" name="address" id="address" value="<?= $address ?>">
			</div>
			<div class="form-group">
				<label for="postal_code">Code Postal :</label>
				<input class="form-control" type="" name="postal_code" id="postal_code" value="<?= $postal_code ?>">
			</div>
			<div class="form-group">
				<label for="city">Ville :</label>
				<input class="form-control" type="" name="city" id="city" value="<?= $city ?>">
			</div>
			<div class="form-group">
				<label for="tel">Télephone :</label>
				<input class="form-control" type="" name="tel" id="tel" value="<?= $tel ?>">
			</div>
			<div class="form-group">
				<label for="email">Email :</label>
				<input class="form-control" type="" name="email" id="email" value="<?= $email?>">
			</div>
			<div class="form-group">
				<label for="site">Site :</label>
				<input class="form-control" type="" name="site" id="site" value="<?= $site ?>">
			</div>
			<div class="form-group">
				<label for="id_departement">Département :</label>
				<select class="form-control" name="id_departement" id="id_departement">
					<option value="59">Nord</option>
					<option value="62">Pas De Calais</option>
				</select>
			</div>
			<div class="form-group">
				<label for="photos">photos :</label>
				<input class="form-control" type="" name="photos" id="photos" value="<?= $photos ?>">
			</div>
			<div class="form-group">
				<label for="type_institution">Institution :</label>
				<input class="form-control" type="" name="type_institution" id="type_institution" value="<?= $type_institution ?>">
			</div>
			<div class="form-group">
				<label for="id_institution_category">Catégorie :</label>
				<input class="form-control" type="" name="id_institution_category" id="id_institution_category" value="<?= $id_institution_category ?>">
			</div>
			<button class="btn btn-purple" type="submit">Envoyer</button>

		</div>
	</div>
	</form>
<?php $this->stop('main_content') ?>