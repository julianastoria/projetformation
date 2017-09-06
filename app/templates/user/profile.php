<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<?php foreach ($_SESSION['user'] as $key => $value): ?>
		<?= $key ?> : <?= $value ?><br/>
	<?php endforeach ?>
<?php $this->stop('main_content') ?>