<?php
/*
	Template Name: News
*/
?>

<?php get_header(); ?>

<main>
	<h1 class="main--title"><?php echo get_the_title(); ?></h1>

	<?php Template::Render('./snippets/snippet-news'); ?>  
</main>


<?php get_footer(); ?>
