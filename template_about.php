<?php
/*
Template Name: About
*/
?>


<?php get_header(); ?>

<main>
  <h1><?php echo get_the_title(); ?></h1>

  <section>
    <ul class="bandmember">
      <?php Template::Render('./snippets/snippet-bandmembers'); ?>
    </ul>

    <ul class="affaire">
      <?php Template::Render('./snippets/snippet-affaires'); ?>
    </ul>
</section>

</main>

<?php get_footer(); ?>
