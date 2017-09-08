<?php $this->layout('layout', ['title' => 'Détails du médecin']) ?>

<?php $this->start('main_content') ?>
	<h2 class="text-center">Détails de Dr. <?= $doctor['lastname']; ?></h2>
<?php $this->stop('main_content') ?>