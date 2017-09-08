<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	<?php  var_dump($_SESSION); ?>
<?php $this->stop('main_content') ?>