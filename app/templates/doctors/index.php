<?php $this->layout('layout', ['title' => 'Liste des médecins']) ?>

<?php $this->start('main_content') ?>
	<h2 class="text-center">Liste des médecins</h2>
		<div class="row">
		
	<?php foreach ($doctors as $key => $doctor) : ?>
			
			<div class="col-md-3 col-sm-4">
				<div class="thumbnail">
					<!-- <img src="..." alt="..."> -->

					<div class="caption">

						<a href="<?= $this->url('doctor_details', ['id' => $doctor['id']]); ?>">

						<h3 class=" text-center index"><?= "Dr. ".$doctor['lastname']; ?></h3>

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
		      <a href="<?= $this->url('doctors_index') ?>?page=<?= $page-1 ?>" aria-label="Previous" <?= ($page===1) ? 'hidden' : null ?> >
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>

		     <?php for($i = $page-2 ; $i <= $page+2 ; $i++) : ?>
		     	<?php if ($i>0 && $i<=$page_max) : ?>
		    		<li><a href="<?= $this->url('doctors_index') ?>?page=<?= $i ?>"><?= $i ?></a></li>
		    	<?php endif; ?>
		    <?php endfor; ?>
		    <li>
		      <a href="<?= $this->url('doctors_index') ?>?page=<?= $page+1 ?>" aria-label="Next"<?= $page===$page_max ? 'hidden' : null ?>>
		        <span aria-hidden="true">&raquo;</span>
		      </a>

   				 </li>
  			</ul>
		</nav>
	</div>
 
 <?php $this->stop('main_content') ?>