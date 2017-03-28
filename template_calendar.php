<?php
/*
Template Name: Calendar
*/
?>


<?php get_header(); ?>

<main>
  <h1 class="main--title"><?php echo get_the_title(); ?></h1>
  <section class="calendar">
    <?php Template::Render('./snippets/snippet-calendar'); ?>

    <a href="" class="calendar--more more">Bekijk alle evenementen</a>
  </section>

</main>

<?php get_footer(); ?>
