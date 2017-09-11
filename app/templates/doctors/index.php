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
							<h3 class=" text-centerindex"><?= "Dr. ".$doctor['lastname']; ?></h3>
						</a>

						<p><?= $doctor['name_doctor_category']; ?></p>

						<p><?= $doctor['name_departement'] ?></p>

						<p><?= $doctor['average']; ?></p>

					</div>
					<a href="<?= $this->url('create_doctor_note', ['id' => $doctor['id']]) ?>">Noter</a>
				</div>
			</div>

		
	<?php endforeach; ?>

		</div>

	<div class="text-center">
		<nav aria-label="Page navigation">
		  <ul class="pagination">
		    <li>
		      <a href="<?= $this->url('doctors_index', ['page' => $page - 1]); ?>" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>
		     <?php for($i = 1; $i <= 5; $i++) { ?>
		    <li><a href="<?= $this->url('doctors_index', ['page' => $i]) ?>"><?= $i ?></a></li>
		    <?php } ?>
		    <li>
		      <a href="<?= $this->url('doctors_index', ['page' => $page + 1]); ?>" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
   				 </li>
  			</ul>
		</nav>
	</div>
 
 <?php $this->stop('main_content') ?>