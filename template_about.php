<?php
/*
Template Name: About
*/
?>


<?php get_header(); ?>

<main>
  <h1 class="main--title"><?php echo get_the_title(); ?></h1>

  <section class="bandmembers">
    <?php Template::Render('./snippets/snippet-bandmembers'); ?>

    <h2 class="bandmembers--sub-title">De minnaars van Wies</h2>
    <?php Template::Render('./snippets/snippet-affaires'); ?>

    <h2 class="bandmembers--sub-title">Flirts</h2>
    <?php Template::Render('./snippets/snippet-flirts'); ?>
</section>

</main>

<?php get_footer(); ?>
