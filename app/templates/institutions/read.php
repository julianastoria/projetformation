<?php $this->layout('layout', ['title' =>  $title ]) ?>

<?php $this->start('main_content') ?>
	<h2><?= $title ?></h2>

	<a href="<?= $this->url('institution_update',['id'=>$institution['id']]) ?>" class="btn">Modifier</a>
	<a href="<?= $this->url('institution_delete',['id'=>$institution['id']]) ?>" class="btn">Supprimer</a>

<?php $this->stop('main_content') ?>