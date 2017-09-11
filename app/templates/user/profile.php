<?php $this->layout('layout', ['title' => $title]) ?>

<?php $this->start('main_content') ?>
	
	<h2 class="text-center profile"><?= $title ?></h2><br><br>

	<p class="text-center user">Prénom : <?= $user['firstname'] ?></p>
	<p class="text-center user">Nom : <?= $user['lastname'] ?></p>
	<p class="text-center user">Email : <?= $user['email'] ?></p>
	<p class="text-center user">Anniversaire : <?= $user['birthday'] ?></p>
	<p class="text-center user">Situation vis-à-vis du handicap : <?= $user['situations'] ?></p>
	<p class="text-center user">Type d'autisme : <?= $autism ?></p>
	<p class="text-center user">Département : <?= $departement ?></p>

	<?php $this->stop('main_content') ?>