<?php
/*
	Template Name: Home
*/
?>

<?php get_header(); ?>

<main class="home">
	<h1 class="main--title"><?php echo get_the_title(); ?></h1>

	<section class="home--section">
		<h2 class="home--sub-title">Onze laatste optredens</h2>
		<?php Template::Render('./snippets/snippet-calendar'); ?>
	</section>

	<?php
		$prevTitle = get_field("bus-preview-title");
		$prevText = get_field("bus-preview-text");
		$prevImg = get_field('bus-preview-img');
		$prevLink = get_field('bus-preview-link');
	?>
	<section class="home--section bus-prev" style="background-image: url(<?php echo $prevImg['url']; ?>)">
		<?php if ($prevLink) { ?> <a class="bus-prev--link" href="<?php echo $prevLink ?>"> <?php } ?>
			<?php if ($prevTitle) { ?> <h2 class="bus-prev--title"><?php echo $prevTitle; ?></h2> <?php } ?>
			<?php if ($prevText) { ?>
				<div class="bus-prev--text">
					<?php echo $prevText ?>
				</div>
			<?php } ?>
		<?php if ($prevLink) { ?> </a> <?php } ?>

	</section>

	<section class="home--section">
		<h2 class="home--sub-title">Het laatste nieuws</h2>
		<?php Template::Render('./snippets/snippet-news'); ?>
	</section>

</main>


<?php get_footer(); ?>
