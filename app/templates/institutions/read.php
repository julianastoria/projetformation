<?php $this->layout('layout', ['title' =>  $title ]) ?>

<?php $this->start('main_content') ?>

	<h2 class="text-center"><?= $title ?></h2>

	<p class="text-center user">Le nom : <?= $institution['name']; ?></p>
	<p class="text-center user">L'adresse : <?= $institution['address']; ?></p>
	<p class="text-center user">L'email : <?= $institution['email']; ?></p>
	<p class="text-center user">Le site : <?= $institution['site']; ?></p>
	<p class="text-center user">Le numéro de téléphone : <?= $institution['tel']; ?></p>
	<p class="text-center user">Le ou les photos : <br><img src="<?= $institution['photos']; ?>"></p>
	<p class="text-center user">Le type d'institution : <?= $institution['type_institution']; ?></p><br>

	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<a class="btn btn-purple" href="<?= $this->url('institution_update',['id'=>$institution['id']]) ?>" class="btn">Modifier</a>
			<a class="btn btn-purple readins" href="<?= $this->url('institution_delete',['id'=>$institution['id']]) ?>" class="btn">Supprimer</a>
		</div>
	</div>

	<?php for ($i=0;$i<count($main_notes);$i++) : ?>
		<div class="container">
			<h2>Notes de : <?= $user[$i] ?></h2>
			<h3>Note principale : <?= $main_notes[$i] ?></h3>

			<h3><?= $title_sub_notes1 ?> : <?= $sub_notes1[$i] ?></h3>	
			<h3><?= $title_sub_notes2 ?> : <?= $sub_notes2[$i] ?></h3>
			<h3><?= $title_sub_notes3 ?> : <?= $sub_notes3[$i] ?></h3>
			<h3><?= $title_comment[$i] ?></h3>
			<h4><?= $comment[$i] ?></h4>

			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<a href="<?= $this->url('edit_institution_note',['id'=>$id_user[$i]]) ?>" class="btn btn-purple">Modifier</a>
					<a href="<?= $this->url('delete_institution_note',['id'=>$id_user[$i]]) ?>" class="btn btn-purple readins">Supprimer</a>
				</div>
			</div>
	
		</div>
	<?php endfor; ?>


<?php $this->stop('main_content') ?>