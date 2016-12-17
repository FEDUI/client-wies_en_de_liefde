<!DOCTYPE html>
<html>
<head>
	<title>Wies en de Liefde</title>
	<?php wp_head(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<header class="main-header">
		<button class="main-header--button menu-toggle">Menu</button>
		<div class="main-header--container">
			<div class="main-header--img-container">
				<!-- Set featured img in the logo -->
				<img class="main-header--img" src="" alt="">
			</div>


			<?php Template::Render('main-nav'); ?>
		</div>

		<!-- title -->
		<h1 class="main-header--title">Wies en de Liefde</h1>
	</header>
