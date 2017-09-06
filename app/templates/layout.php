<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<div class="container">
		<header>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>

	<script src="<?= $this->assetUrl('js/jquery.js'); ?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.js'); ?>" type="text/javascript" charset="utf-8"></script>
	
	<?= $this->section('main_script') ?>
</body>
</html>