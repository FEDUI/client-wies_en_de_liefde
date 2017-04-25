<!DOCTYPE html>
<html>
<head>
	<title>Wies en de Liefde</title>
	<?php wp_head(); ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Wies en de liefde">
  <meta name="keywords" content="Muziek,de liefde,Wies en de Liefde,Bus,Buslading Muziek">
  <meta name="author" content="Wies Kavelaar">
</head>
<body>
	<?php
		$headerLogo = get_field('mood-logo');
	?>
	<header class="main-header">
		<button class="main-header--button menu-toggle">
			<?php Template::Render('icon-hamburger'); ?>
			<span class="menu-toggle--name">Menu</span>
		</button>

		<?php if ($headerLogo) { ?>
			<img class="main-header--img logo" src="<?php echo $headerLogo['url']; ?>" alt="">
		<?php } ?>

		<?php Template::Render('main-nav'); ?>

		<h1 class="main-header--title">
			<img class="main-header--img" src="<?php echo get_template_directory_uri(); ?>/dist/img/logo/logo.png" alt="Logo van Wies en de Liefde">
		</h1>
	</header>
