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
	<form method="post">
		<div class="form-group">
			<label for="name">Nom :</label>
			<input type="text" name="name" id="name" value="<?= $name ?>">
		</div>
		<div class="form-group">
			<label for="address">Addresse :</label>
			<input type="text" name="address" id="address" value="<?= $address ?>">
		</div>
		<div class="form-group">
			<label for="postal_code">Code Postal :</label>
			<input type="text" name="postal_code" id="postal_code" value="<?= $postal_code ?>">
		</div>
		<div class="form-group">
			<label for="city">Ville :</label>
			<input type="" name="city" id="city" value="<?= $city ?>">
		</div>
		<div class="form-group">
			<label for="tel">Télephone :</label>
			<input type="text" name="tel" id="tel" value="<?= $tel ?>">
		</div>
		<div class="form-group">
			<label for="email">Email :</label>
			<input type="email" name="email" id="email" value="<?= $email?>">
		</div>
		<div class="form-group">
			<label for="site">Site :</label>
			<input type="url" name="site" id="site" value="<?= $site ?>" placeholder="http://">
		</div>
		<div class="form-group">
			<label for="photos">photos :</label>
			<input type="url" name="photos" id="photos" value="<?= $photos ?>" placeholder="http://">
		</div>
		<div class="form-group">
			<label for="type_institution">Institution :</label>
			<select id="type_institution" name="type_institution">
				<option value="École">Ecole</option>
				<option value="Établissement spécialisé">Etablissement Spécialisés</option>
			</select>
		</div>
		<div class="form-group">
			<label for="id_institution_category">Catégorie :</label>
			<select name="id_institution_category" id="id_institution_category">
				<?php foreach ($institution_categories as $key => $institution_category): ?>
					<option value="<?= $institution_category['id'] ?>"><?= $institution_category['name'] ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<button type="submit" class="btn btn-purple">Envoyer</button>
	</form>
<?php $this->stop('main_content') ?>