<?php
/*
Template Name: Calendar
*/
?>


<?php get_header(); ?>

<main>
  <h1 class="main--title"><?php echo get_the_title(); ?></h1>

  <?php Template::Render('./snippets/snippet-calendar'); ?>  
</main>

<?php get_footer(); ?>
