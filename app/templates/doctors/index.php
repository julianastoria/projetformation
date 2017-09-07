<?php $this->layout('layout', ['title' => 'Liste des médecins']) ?>

<?php $this->start('main_content') ?>
	<h2 class="text-center">Liste des médecins</h2>

	<?php foreach ($doctors as $doctor) : ?>
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<!-- <img src="..." alt="..."> -->

					<div class="caption">

						<a href="<?= $this->url('doctor_details', ['id' => $doctor['id']]); ?>">
						<h3><?= "Dr. ".$doctor['lastname']; ?></h3>
						</a>

						<p><?= $doctor['name_doctor_category']; ?></p>

						<p><?= $doctor['name_departement']; ?></p>

						<p><?= $doctor['average']; ?></p>

					</div>
				</div>
			</div>
		</div>
	<?php endforeach;
$this->stop('main_content') ?>