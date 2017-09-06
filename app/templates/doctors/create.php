<?php $this->layout('layout', ['title' => 'Ajouter un médecin']) ?>

<?php $this->start('main_content') ?>
	<h2 class="text-center">Ajouter un médecin :</h2>
	<?php include_once('form.php'); ?>
<?php $this->stop('main_content') ?>


<!-- AJAX pour récupérer le département -->
<?php $this->start('main_script') ?>
<script type="text/javascript">
	$(document).ready(function()
	{
		$("#postal_code").on("blur", function()
		{
			var pc = $(this).val();
			var url = "<?= $this->url('ajax_departement'); ?>";

			
			//a/lert(postal_c);
			// $("#departement").val().append();


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
					//console.log(response);

					// sendToHTML(response);
				}
			});
		});
	});
</script>
<?php $this->stop('main_script') ?>