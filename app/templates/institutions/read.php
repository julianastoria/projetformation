<?php $this->layout('layout', ['title' =>  $title ]) ?>

<?php $this->start('main_content') ?>
	<h2><?= $title ?></h2>

	<?php for ($i=0;$i<count($notes);$i++) : ?>

		<?php foreach ($notes[$i] as $key => $note): ?>

			<div>
				<?php if ($key==='main_note' || $key==='sub_notes' || $key==='post_date' || $key==='title_comment' || $key==='comment') : ?>
				<div>
					<h2><?= $key ?></h2>
					<p><?= $note ?></p>
				</div>
			</div>
			<?php endif; ?>
			
		<?php endforeach ?>
		
	<?php endfor; ?>	

	<div>	
		<a href="<?= $this->url('institution_update',['id'=>$institution['id']]) ?>" class="btn">Modifier</a>
		<a href="<?= $this->url('institution_delete',['id'=>$institution['id']]) ?>" class="btn">Supprimer</a>
	</div>

<?php $this->stop('main_content') ?>