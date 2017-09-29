<br/>
<form method="POST">
	
	<div class="row">
		<div class="col-md-5 col-lg-4 col-md-offset-3 col-lg-offset-4">

			<div class="form-group">
				<label for="firstname">Prénom : </label>
				<input type="text" id="firstname" name="firstname" class="form-control" value="<?= $firstname; ?>"/>
			</div>


			<div class="form-group">
				<label for="lastname">Nom de famille : </label>
				<input type="text" id="lastname" name="lastname" class="form-control" value="<?= $lastname; ?>"/>
			</div>
			

			<div class="form-group">
				<label for="address">Adresse postale : </label>
				<input type="text" id="address" name="address" class="form-control" value="<?= $address; ?>"/>
			</div>


			<div class="form-group">
				<label for="postal_code">Code postal : </label>
				<input type="text" id="postal_code" name="postal_code" class="form-control" value="<?= $postal_code; ?>"/>
			</div>


			<div class="form-group">
				<label for="city">Ville : </label>
				<input type="text" id="city" name="city" class="form-control" value="<?= $city; ?>"/>
			</div>


			<!-- À faire entrer par l'utilisateur ou à faire faire automatiquement à la machine ? Est-ce possible ? -->
			<div class="form-group">
				<label for="departement">Département : </label>
				<input type="text" id="departement" name="departement" class="form-control" value="<?= $departement; ?>"/>
			</div>
			


			<div class="form-group">
				<label for="tel">Téléphone : </label>
				<input type="tel" id="tel" name="tel" class="form-control" value="<?= $tel; ?>"/>
			</div>


			<div class="form-group">
				<label for="email">Adresse email : </label>
				<input type="email" id="email" name="email" class="form-control" value="<?= $email; ?>"/>
			</div>


			<div class="form-group">
				<label for="site">Site web : </label>
				<input type="url" id="site" name="site" class="form-control" placeholder="http://" value="<?= $site; ?>"/>
			</div>
			




			<div class="form-group">
				<label for="category">Catégorie : </label>
				<select id="category" name="category" class="form-control">
				<!-- La classe hidden permet de masquer dans une catégorie les champs après avoir saisi une option -->
					<option class="hidden" value="nothing">--</option>
					<option <?= ($category == "Psychologue") ? 'selected' : null ?> value="Psychologue">Psychologue</option>
					<option <?= ($category == "Généraliste") ? 'selected' : null ?> value="Généraliste">Généraliste</option>
					<option <?= ($category == "Dentiste") ? 'selected' : null ?> value="Dentiste">Dentiste</option>
				</select>
			</div>

			<div id="types_autisme" class="form-group <?= $checkbox_hidden; ?>">

				<label for="types_autisme">Les types d'autisme : </label>

				<div class="checkbox">
					<label for="haut_niveau">
						<input <?= isset($autisms['haut_niveau']) ? 'checked' : null ?> type="checkbox" id="haut_niveau" name="haut_niveau"/>
						Haut Niveau
					</label>
				</div>

				<div class="checkbox">
					<label for="asperger">
						<input <?= isset($autisms['asperger']) ? 'checked' : null ?> type="checkbox" id="asperger" name="asperger"/>
						Asperger
					</label>
				</div>

				<div class="checkbox">
					<label for="atypique">
						<input <?= isset($autisms['atypique']) ? 'checked' : null ?> type="checkbox" id="atypique" name="atypique"/>
						Atypique
					</label>
				</div>
			</div>

			<button class="btn btn-purple" type="submit">Créer<span class="sr-only">le médecin</span></button>
		</div>

	</div>

</form>