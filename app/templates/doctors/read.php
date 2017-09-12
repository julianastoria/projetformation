<?php $this->layout('layout', ['title' => 'Détails du médecin']) ?>

<?php $this->start('main_content') ?>

	<h2 class="text-center">Détails de Dr. <?= $doctor['lastname']; ?></h2>
	<p class="text-center user">Son nom : <?= $doctor['lastname']; ?></p>
	<p class="text-center user">Son prénom : <?= $doctor['firstname']; ?></p>
	<p class="text-center user">Son adresse : <?= $doctor['address']; ?></p>
	<p class="text-center user">Son département : <?= $doctor['name_departement']; ?></p>
	<p class="text-center user">Son numéro de téléphone : <?= $doctor['tel']; ?></p>
	<p class="text-center user">Son email : <?= $doctor['email']; ?></p>
	<p class="text-center user">Son site : </p>
	<p class="text-center user">Son domaine médical : <?= $doctor['name_doctor_category']; ?></p>
	<p class="text-center user">Sa moyenne : <?= $doctor['average']; ?></p>

	
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<a href="<?= $this->url('doctor_update',['id'=>$doctor['id']]) ?>" class="btn btn-purple">Modifier</a>
			<a type="button" data-toggle="modal" data-target="#basicModal" class="btn btn-purple readins">Supprimer</a>
		</div>
	</div>

			<!-- mise en place de la popup modal -->
			<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			        <h2 class="modal-title" id="myModalLabel">Supprimer un médecin ?</h2>
			      </div>
			      <div class="modal-body">
			        <h3 class="supp">Êtes-vous sûr de vouloir supprimer ce médecin ?</h3>
			      </div>
			      
			      <div class="modal-footer">
			      	<form method="POST">	
			       	<button type="submit" class="btn btn-purple" data-dismiss="modal" href="<?= $this->url('doctor_delete',['id'=>$doctor['id']]) ?>" >Oui</button>
		        	<button type="submit" class="btn btn-purple" href="<?= $this->url('doctor_details',['id'=>$doctor['id']]) ?>">Non</button>
		        	</form>
			      </div>
			      </div>
			  </div>
			</div>
		        
<?php $this->stop('main_content') ?>