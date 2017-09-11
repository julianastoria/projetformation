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
	<form method="post">

		<div class="row">
			<div class="col-md-4 col-md-offset-4">	

				<div class="form-group">
					<label for="name">Nom :</label>
					<input class="form-control" type="text" name="name" id="name" value="<?= $name ?>">
				</div>
				<div class="form-group">
					<label for="address">Addresse :</label>
					<input class="form-control" type="text" name="address" id="address" value="<?= $address ?>">
				</div>
				<div class="form-group">
					<label for="postal_code">Code Postal :</label>
					<input class="form-control" type="text" name="postal_code" id="postal_code" value="<?= $postal_code ?>">
				</div>
				<div class="form-group">
					<label for="city">Ville :</label>
					<input class="form-control" type="" name="city" id="city" value="<?= $city ?>">
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
					<input class="form-control" type="text" name="site" id="site" value="http://">
				</div>
				<div class="form-group">
					<label for="photos">photos :</label>
					<input class="form-control" type="text" name="photos" id="photos" value="http://">
				</div>
				<div class="form-group">
					<label for="type_institution">Institution :</label>
					<select class="form-control" id="type_institution" name="type_institution">
						<option value="École">Ecole</option>
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
		<button type="submit" class="btn btn-purple">Envoyer</button>
			</div>
		</div>
	</form>
<?php $this->stop('main_content') ?>