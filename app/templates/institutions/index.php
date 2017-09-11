<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<h2 class="text-center"><?= $title ?></h2>
		<div class="row">
		
	<?php foreach ($institutions as $key => $institution) : ?>
			
			<div class="col-md-3">
				<div class="thumbnail">
					<img src="<?=$institution['photos'] ?>" alt="photo de <?= $institution['name'] ?>">

					<div class="caption">

						<a href="<?= $this->url('institution_details', ['id' => $institution['id']]); ?>">
							<h3 class="index"><?= $institution['name']; ?></h3>
						</a>

						<p><?= $institution['name_institution_category']; ?></p>

						<p><?= $institution['name_departement'] ?></p>

						<p><?= $institution['average']; ?></p>

					</div>
					<a href="<?= $this->url('create_institution_note', ['id' => $institution['id']]) ?>">Noter</a>
				</div>
			</div>

		
	<?php endforeach; ?>

		</div>
 <?php $this->stop('main_content') ?>