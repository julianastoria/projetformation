<?php $this->layout('layout', ['title' => 'Modifier les données du médecin']) ?>

<?php $this->start('main_content') ?>
	<h2 class="text-center">Modifier les données du médecin :</h2>
	<?php include_once('form.php');
$this->stop('main_content') ?>


<?php $this->start('main_script') ?>
<script type="text/javascript">
	$(document).ready(function()
	{
		// AJAX pour récupérer le département
		$("#postal_code").on("blur", function()
		{
			var pc = $(this).val();
			var url = "<?= $this->url('ajax_departement'); ?>";

			// On charge l'adresse /ajax/departements/
			$.ajax(url, {
				type: 'GET',
				data: {
					pc: pc
				},
				success: function(response) {
					if (response){
						$('[name="departement"]').val(response.name);
					} else {
						$('[name="departement"]').val('');
					}
				}
			});
		});


		// AJAX pour afficher/cacher les checbox type_autisme
		$("#category").on("change", function()
		{
			// alert($(this).val());

			if ($(this).val() == 'psychologue')
			{
				$("#types_autisme").removeClass("hidden");
			} else {
				$("#types_autisme").addClass("hidden");
			}
		});
	});
</script>
<?php $this->stop('main_script') ?>