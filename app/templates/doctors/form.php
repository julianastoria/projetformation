<br/>
<form method="POST">


	
	<div class="row">
		<div class="col-md-4 col-md-offset-4">

			<div class="form-group">
				<label for="firstname">Prénom : </label>
				<input type="text" id="firstname" name="firstname" class="form-control" value=""/>
			</div>


			<div class="form-group">
				<label for="lastname">Nom de famille : </label>
				<input type="text" id="lastname" name="lastname" class="form-control" value=""/>
			</div>
			


			<div class="form-group">
				<label for="address">Adresse postale : </label>
				<input type="text" id="address" name="address" class="form-control" value=""/>
			</div>


			<div class="form-group">
				<label for="postal_code">Code postal : </label>
				<input type="text" id="postal_code" name="postal_code" class="form-control" value=""/>
			</div>


			<div class="form-group">
				<label for="city">Ville : </label>
				<input type="text" id="city" name="city" class="form-control" value=""/>
			</div>


			<!-- À faire entrer par l'utilisateur ou à faire faire automatiquement à la machine ? Est-ce possible ? -->
			<div class="form-group">
				<label for="departement">Département : </label>
				<input type="text" id="departement" name="departement" class="form-control" value=""/>
			</div>
			


			<div class="form-group">
				<label for="tel">Téléphone : </label>
				<input type="tel" id="tel" name="tel" class="form-control" value=""/>
			</div>


			<div class="form-group">
				<label for="email">Adresse email : </label>
				<input type="email" id="email" name="email" class="form-control" value=""/>
			</div>


			<div class="form-group">
				<label for="site">Site web : </label>
				<input type="url" id="site" name="site" class="form-control" value="http://"/>
			</div>
			
			


			<div class="form-group">
				<label for="category">Catégorie : </label>
				<select id="category" name="category" class="form-control">
				<!-- La classe hidden permet de masquer dans une catégorie les champs après avoir saisi une option -->
					<option class="hidden" value="nothing">--</option>
					<option value="Psychologue">Psychologue</option>
					<option value="Généraliste">Généraliste</option>
					<option value="Dentiste">Dentiste</option>
				</select>
			</div>

			<div id="types_autisme" class="form-group hidden">

				<label>Les types d'autisme : </label>

				<div class="checkbox">
					<label>
						<input type="checkbox" id="haut_niveau" name="haut_niveau"/>
						Haut Niveau
					</label>
				</div>

				<div class="checkbox">
					<label>
						<input type="checkbox" id="asperger" name="asperger"/>
						Asperger
					</label>
				</div>

				<div class="checkbox">
					<label>
						<input type="checkbox" id="atypique" name="atypique"/>
						Atypique
					</label>
				</div>

			</div>

			<button class="btn btn-purple" type="submit">Envoyer</button>
		</div>

	</div>

</form>