<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<h2><?= $title ?></h2>
	<form method="post">
		<div class="form-group">
			<label for="name">Nom :</label>
			<input type="" name="name" id="name" value="<?= $name ?>">
		</div>
		<div class="form-group">
			<label for="address">Addresse :</label>
			<input type="" name="address" id="address" value="<?= $address ?>">
		</div>
		<div class="form-group">
			<label for="postal_code">Code Postal :</label>
			<input type="" name="postal_code" id="postal_code" value="<?= $postal_code ?>">
		</div>
		<div class="form-group">
			<label for="city">Ville :</label>
			<input type="" name="city" id="city" value="<?= $city ?>">
		</div>
		<div class="form-group">
			<label for="tel">Télephone :</label>
			<input type="" name="tel" id="tel" value="<?= $tel ?>">
		</div>
		<div class="form-group">
			<label for="email">Email :</label>
			<input type="" name="email" id="email" value="<?= $email?>">
		</div>
		<div class="form-group">
			<label for="site">Site :</label>
			<input type="" name="site" id="site" value="<?= $site ?>">
		</div>
		<div class="form-group">
			<label for="id_departement">Département :</label>
			<select name="id_departement" id="id_departement">
				<option value="59">Nord</option>
				<option value="62">Pas De Calais</option>
			</select>
		</div>
		<div class="form-group">
			<label for="photos">photos :</label>
			<input type="" name="photos" id="photos" value="<?= $photos ?>">
		</div>
		<div class="form-group">
			<label for="type_institution">Institution :</label>
			<input type="" name="type_institution" id="type_institution" value="<?= $type_institution ?>">
		</div>
		<div class="form-group">
			<label for="id_institution_category">Catégorie :</label>
			<input type="" name="id_institution_category" id="id_institution_category" value="<?= $id_institution_category ?>">
		</div>
		<button type="submit">Envoyer</button>
	</form>
<?php $this->stop('main_content') ?>