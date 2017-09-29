<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<div class="alert-danger">
		<?php foreach ($errors as $error): ?>
			<ul>
				<li><?= $error ?></li>
			</ul>
		<?php endforeach ?>
	</div>

	<div class="row">
		<div class="col-md-5 col-lg-4 col-md-offset-3 col-lg-offset-4">

			<h2 class="text-center">Inscription :</h2>

			<form method="post" action="<?= $this->url('user_signup') ?>">
				<div class="form-group">
					<label for="email">Identifiant (Adresse Mail) : </label>
					<input type="email" name="email" class="form-control" id="email" value="<?= $email ?>" aria-required="true"><br/>
				</div>
				<fieldset>
					<legend class="hide_access">Mot de passe :</legend>
					<div class="form-group">
						<label for="password">Mot de passe :</label>
						<input type="password" class="form-control" name="password" id="password" aria-required="true">
					</div>

					<div class="form-group">
						<label for="repeat_password">Répétez le mot de passe :</label>
						<input type="password" class="form-control" name="repeat_password" id="repeat_password" aria-required="true">
					</div>
				</fieldset>
				<fieldset>
					<legend class="hide_access">Informations personnelles :</legend>
					<div class="form-group">
						<label for="firstname">Prénom :</label>
						<input type="text" name="firstname" class="form-control" id="firstname" value="<?= $firstname ?>" aria-required="true">
					</div>

					<div class="form-group">
						<label for="lastname">Nom :</label>
						<input type="text" name="lastname" class="form-control" id="lastname" value="<?= $lastname ?>" aria-required="true">
					</div>
					<fieldset>
						<legend>Date de naissance :</legend>
						<div class="row">
							<label for="birth_day" class="hide_access">Jour de naissance</label>							
							<select class="col-md-3" id="birth_day" aria-required="true">
								<option class="hidden" value="nothing">--</option>
								<?php for($i=1;$i<31;$i++) : ?>
									<option value="<?= $i ?>"><?= $i ?></option>
								<?php endfor ; ?>
							</select>
							<label for="birth_month" class="hide_access">Mois de naissance</label>
							<select class="col-md-3 col-md-offset-1" id="birth_month" aria-required="true">
								<option class="hidden" value="nothing">--</option>
								<?php for($i=1;$i<13;$i++) : ?>
									<option value="<?= $i ?>"><?= $i ?></option>
								<?php endfor ; ?>
							</select>
							<label for="birth_year" class="hide_access">Année de naissance</label>
							<select class="col-md-3 col-md-offset-1" id="birth_year" aria-required="true">
								<option class="hidden" value="nothing">----</option>
								<?php for($i=1900;$i<=date('Y');$i++) : ?>
									<option value="<?= $i ?>"><?= $i ?></option>
								<?php endfor ; ?>
							</select>
						</div>
					</fieldset>
					<div class="form-group">
						<label for="id_departement">Département</label>
						<select class="form-control" name="id_departement" id="id_departement" aria-required="true">
						<?php $last_region=null; ?>
						<option class="hidden" value="nothing">--</option>
						<?php foreach ($departements as $key => $departement): ?>
							<?php $new_region=$departement['region'] ?>
							<?php if ($new_region===$last_region)  : ?>
								
								<option value="<?= $departement['id'] ?>"><?= $departement['name'] ?></option>
							<?php else :  ?>
								<optgroup label="<?= $new_region ?>"></optgroup>
								<option value="<?= $departement['id'] ?>"><?= $departement['name'] ?></option>
							<?php endif; ?>
							<?php $last_region=$new_region; ?>
						<?php endforeach ?>
						</select><br/>
					</div>

					<div class="form-group">
						<label for="id_autism">Autismes</label>
						<select class="form-control" name="id_autism" id="id_autism" aria-required="true">
							<option class="hidden" value="nothing">--</option>
							<?php foreach ($autisms as $key => $autism): ?>

							<option value="<?= $autism['id'] ?>"><?= $autism['name'] ?></option>
							<?php endforeach ?>
						</select><br/>						
					</div>

					<div class="form-group">
						<label for="situation">Situation</label>
						<select class="form-control" name="situation" id="situation" aria-required="true">
							<option class="hidden" value="nothing">--</option>
							<option value="autiste">Autiste</option>
							<option value="parent d'autiste">Parent d'autiste</option>
							<option value="medecin">Medecin</option>
						</select><br/>
					</div>
				</fieldset>
				<button class="btn btn-purple" type="submit">S'inscrire<span class='hide_access'>Renvoie vers la page de profil</span></button>
			</form>

		</div>
	</div>
	

<?php $this->stop('main_content') ?>