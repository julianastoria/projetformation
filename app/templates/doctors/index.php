<?php $this->layout('layout', ['title' => 'Liste des médecins']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste des médecins</h2>

	<?php foreach ($doctors as $key => $doctor) : ?>
		<div class="row">
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<!-- <img src="..." alt="..."> -->

					<div class="caption">

						<!-- <a href="<?= $this->url('doctor_details', ['id' => $id]); ?>"> -->
						<a href="#">
							<h3><?= "Dr. ".$doctor['lastname']; ?></h3>
						</a>

						<p><?= $doctor['id_doctor_category']; ?></p>

						<p><?= $doctor['id_departement'] ?></p>

						<p>Ici figurera la note (la forme de cette dernière ?)</p>

					</div>
				</div>
			</div>
		</div>
	<?php endforeach;
$this->stop('main_content') ?>