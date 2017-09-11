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

	<a href="<?= $this->url('doctor_update',['id'=>$doctor['id']]) ?>" class="btn">Modifier</a>
	<a href="<?= $this->url('doctor_delete',['id'=>$doctor['id']]) ?>" class="btn">Supprimer</a>


<?php $this->stop('main_content') ?>