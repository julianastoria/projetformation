<?php $this->layout('layout', ['title' => $title." - Page ".$page."/".$page_max]) ?>

<?php $this->start('main_content') ?>
	<h1 class="text-center"><?= $title ?></h1>
		<div class="row">
		
	<?php foreach ($institutions as $key => $institution) : ?>
			
			<div class="col-md-3 col-sm-4">
				<div class="thumbnail">
					<img src="<?=$institution['photos'] ?>" alt="photo de <?= $institution['name'] ?>">

					<div class="caption">

						<a href="<?= $this->url('institution_details', ['id' => $institution['id']]); ?>">
							<h3 class="index">Détails de "<?= $institution['name']; ?>"</h3>
						</a>

						<p><?= $institution['name_institution_category']; ?></p>

						<p><?= $institution['name_departement'] ?></p>

						<p><?= $institution['average']; ?></p>

					</div>
					<a href="<?= $this->url('create_institution_note', ['id' => $institution['id']]) ?>" aria-label="Noter <?= $institution['name'] ?>">Noter</a>
				</div>
			</div>

		
	<?php endforeach; ?>

		</div>
		<div class="text-center">
		<nav aria-label="Page navigation">

		  <ul class="pagination">
		    <li>
		      <a href="<?= $this->url('institutions_index') ?>?page=<?= $page-1 ?>" aria-label="Page précédente" <?= ($page===1) ? 'hidden' : null ?> >
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>

		     <?php for($i = $page-2 ; $i <= $page+2 ; $i++) : ?>
		     	<?php if ($i>0 && $i<=$page_max) : ?>
		    		<li><a href="<?= $this->url('institutions_index') ?>?page=<?= $i ?>" aria-label="Page <?= $i ?>"><?= $i ?></a></li>
		    	<?php endif; ?>
		    <?php endfor; ?>
		    <li>
		      <a href="<?= $this->url('institutions_index') ?>?page=<?= $page+1 ?>" aria-label="Page suivante"<?= $page===$page_max ? 'hidden' : null ?>>
		        <span aria-hidden="true">&raquo;</span>
		      </a>

   				 </li>
  			</ul>
		</nav>
	</div>
 <?php $this->stop('main_content') ?>