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
	<div class="col-md-3 col-md-offset-4">

			<h2 class="text-center">Inscription :</h2><br>

			<form method="post" action="<?= $this->url('user_signup') ?>">
				<div class="form-group">
					<label for="email">Identifiant (Adresse Mail) : </label>
					<input type="email" name="email" class="form-control" id="email" value="<?= $email ?>"><br/>
				</div>

				<div class="form-group">
					<label for="password">Mot de passe :</label>
					<input type="password" class="form-control" name="password" id="password"><br/>
				</div>

				<div class="form-group">
					<label for="repeat_password">Répétez le mot de passe :</label>
					<input type="password" class="form-control" name="repeat_password" id="repeat_password"><br/>
				</div>

				<div class="form-group">
					<label for="firstname">Prenom :</label>
					<input type="text" name="firstname" class="form-control" id="firstname" value="<?= $firstname ?>"><br/>
				</div>

				<div class="form-group">
					<label for="lastname">Nom :</label>
					<input type="text" name="lastname" class="form-control" id="lastname" value="<?= $lastname ?>"><br/>
				</div>

				<div class="form-group">
					<label for="birthday">Date de naissance : </label>
				<input type="date" name="birthday" class="form-control" id="birthday" value="<?= $birthday ?>"><br/>
				</div>

				<div class="form-group">
					<label for="id_departement">Departement</label>
					<select class="form-control" name="id_departement" id="id_departement">
					<?php foreach ($departements as $key => $departement): ?>
						<option value="<?= $departement['id'] ?>"><?= $departement['name'] ?></option>
					<?php endforeach ?>
					</select><br/>
				</div>

				<div class="form-group">
					<label for="autism">Autismes</label>
					<select class="form-control" name="id_autism" id="id_autism">
						<?php foreach ($autisms as $key => $autism): ?>
						<option value="<?= $autism['id'] ?>"><?= $autism['name'] ?></option>
						<?php endforeach ?>
					</select><br/>						
				</div>

				<div class="form-group">
					<label for="situation">Situation</label>
					<select class="form-control" name="situation">
					<option class="hidden" value="nothing">--</option>
						<option value="autiste">Autiste</option>
						<option value="parent d'autiste">Parent d'autiste</option>
						<option value="medecin">Medecin</option>
					</select><br/>
				</div>

				<button class="btn btn-purple" type="submit">S'inscrire</button>
			</form>
		</div>
	</div>
	

<?php $this->stop('main_content') ?>