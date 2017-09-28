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
	<form method="post">

	<div class="row">
		<div class="col-md-5 col-lg-4 col-md-offset-3 col-lg-offset-4">
			<div class="form-group">
				<label for="name">Nom :</label>
				<input class="form-control" type="text" name="name" id="name" value="<?= $name ?>">
			</div>

			<div class="form-group">
				<label for="address">Adresse :</label>
				<input class="form-control" type="text" name="address" id="address" value="<?= $address ?>">
			</div>

			<div class="form-group">
				<label for="postal_code">Code Postal :</label>
				<input class="form-control" type="text" name="postal_code" id="postal_code" value="<?= $postal_code ?>">
			</div>

			<div class="form-group">
				<label for="city">Ville :</label>
				<input class="form-control" type="text" name="city" id="city" value="<?= $city ?>">
			</div>

			<div class="form-group">
				<label for="tel">Télephone :</label>
				<input class="form-control" type="text" name="tel" id="tel" value="<?= $tel ?>">
			</div>

			<div class="form-group">
				<label for="email">Email :</label>
				<input class="form-control" type="email" name="email" id="email" value="<?= $email?>">
			</div>

			<div class="form-group">
				<label for="site">Site :</label>
				<input class="form-control" type="url" name="site" id="site" value="<?= $site ?>">
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
				<input class="form-control" type="url" name="photos" id="photos" value="<?= $photos ?>">
			</div>

			<div class="form-group">
				<label for="type_institution">Institution :</label>
				<select class="form-control" id="type_institution" name="type_institution">
					<option value="62">Pas De Calais</option>						<option value="École">Ecole</option>
						<option value="Établissement spécialisé">Etablissement Spécialisés</option>
				</select>

			</div>

			<div class="form-group">
				<label for="id_institution_category">Catégorie :</label>
				<select class="form-control" name="id_institution_category" id="id_institution_category">
				<?php foreach ($institution_categories as $key => $institution_category): ?>
					<option value="<?= $institution_category['id'] ?>"><?= $institution_category['name'] ?></option>
				<?php endforeach ?>
			</select>

		</div>
			<button class="btn btn-purple" type="submit">Créer<span class="sr-only"> l'établissement</span></button>

		</div>
	</div>
</form>
<?php $this->stop('main_content') ?>