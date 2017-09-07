<?php $this->layout('layout', ['title' => 'Liste des établissements']) ?>

<?php $this->start('main_content') ?>
	<h2>Liste des établissements</h2>
	<?php foreach ($institutions as $institution): ?>
		<?php foreach ($institution as $key => $value): ?>
			<?= $key ?> <?= $value ?> <br/>
 		<?php endforeach ?><br/>
	<?php endforeach ?>
<?php $this->stop('main_content') ?>