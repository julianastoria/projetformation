<?php $this->layout('layout', ['title' => 'Liste des médecins']) ?>

<?php $this->start('main_content') ?>
	<h2 class="text-center">Liste des médecins</h2>
		<div class="row">
			
		
	<?php foreach ($doctors as $key => $doctor) : ?>
			
			<div class="col-md-3">
				<div class="thumbnail">
					<!-- <img src="..." alt="..."> -->

					<div class="caption">

						<a href="<?= $this->url('doctor_details', ['id' => $doctor['id']]); ?>">
							<h3 class="index"><?= "Dr. ".$doctor['lastname']; ?></h3>
						</a>

						<p><?= $doctor['name_doctor_category']; ?></p>

						<p><?= $doctor['name_departement'] ?></p>

						<p><?= $doctor['average']; ?></p>

					</div>
				</div>
			</div>
		
	<?php endforeach; ?>
			
		</div>
<?php $this->stop('main_content') ?>