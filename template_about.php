<?php
/*
Template Name: About
*/
?>


<?php get_header(); ?>

<main>
  <h1><?php echo get_the_title(); ?></h1>

  <section class="bandmembers">
    <?php Template::Render('./snippets/snippet-bandmembers'); ?>

    <h2>De minnaars van Wies</h2>
    <?php Template::Render('./snippets/snippet-affaires'); ?>
</section>

</main>

<?php get_footer(); ?>
