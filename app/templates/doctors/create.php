<?php $this->layout('layout', ['title' => 'Ajouter un médecin']) ?>

<?php $this->start('main_content') ?>
	<h2 class="text-center">Ajouter un médecin :</h2>
	<?php include_once('form.php'); ?>
<?php $this->stop('main_content') ?>


<!-- AJAX pour récupérer le département -->
<?php $this->start('main_script') ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#postal_code").on("focusout", function() {
			alert("$(this).val()");
			console.log("$(this).val()");
		});
	});
</script>
<?php $this->stop('main_script') ?>