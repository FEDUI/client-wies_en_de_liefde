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

    <a href="https://www.facebook.com/pg/wiesendeliefde/events/" class="calendar--more more see-more--action" target="_blank">Bekijk alle evenementen</a>
  </section>

</main>

<?php get_footer(); ?>
