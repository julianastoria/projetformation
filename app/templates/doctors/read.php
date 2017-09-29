<?php $this->layout('layout', ['title' => 'Détails du docteur '. $doctor['lastname']]) ?>

<?php $this->start('main_content') ?>
	<main>
	<h1 class="text-center">Détails de Dr. <?= $doctor['lastname']; ?></h1>
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
			<a type="button" href="<?= $this->url('doctor_update',['id'=>$doctor['id']]) ?>" title="Modifier le docteur <?= $doctor['lastname']; ?>" class="btn btn-purple" id="modif">Modifier</a>
			<button type="button" name="button" title="supprimer le docteur <?= $doctor['lastname']; ?>" data-toggle="modal" data-target="#basicModal" class="btn btn-purple readins" id="delete">Supprimer</button>
		</div>
	</div>

			<!-- mise en place de la popup modal -->
			<div class="modal fade" id="basicModal" tabindex="0" role="dialog" aria-labelledby="basicModal" id="close">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="submit" class="close" data-dismiss="modal">&times;<span class="sr-only">fermer la fenêtre de  confirmation de suppression</span></button>
			        <h1 class="modal-title" id="myModalLabel" tabindex="0">Supprimer un médecin ?</h1>
			      </div>
			      <div class="modal-body">
			        <p class="supp">Êtes-vous sûr de vouloir supprimer ce médecin ?</p>
			      </div>
			      
			      <div class="modal-footer">
			      	<form method="POST" action="<?= $this->url('doctor_delete',['id'=>$doctor['id']]) ?>">	
			       		<button type="submit" class="btn btn-purple" id="yes">Oui <span class="sr-only">Supprimer <?= $doctor['lastname']; ?> </span></button>
		        		<!-- <a class="btn btn-purple" href="<?= $this->url('doctor_details',['id'=>$doctor['id']]) ?>">Non</a> -->
		        		<button class="btn btn-purple" data-dismiss="modal" id="no">Non <span class="sr-only">Ne pas supprimer <?= $doctor['lastname']; ?></span></button>
		        	</form>
			      </div>
			      </div>
			  </div>
			</div>
		    </main>
<?php $this->stop('main_content') ?>

<?php $this->start('main_script') ?>

<script type="text/javascript">	
	$(document).ready(function(){

		$("#delete").click(function() { 
  			setTimeout(function () {
    
      $("#myModalLabel").focus();
      }, 10);
	});

	$("#modif").click(function() {
		setTimeout(function () {
    	 }, 10);
	});

	});
</script>

<?php $this->stop('main_script') ?>