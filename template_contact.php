<?php
/*
Template Name: Contact
*/
?>


<?php get_header(); ?>

<main class="contact">
  <article class="contact--item">
    <h1 class="main--title"><?php echo get_the_title(); ?></h1>

    <!-- loop thrue the content of the page -->
    <div class="contact--wies-container">
      <img class="contact--wies" src="<?php echo get_template_directory_uri(); ?>/dist/img/hero/footer-xs.jpg" alt="Afbeelding van Wies Kavelaar">
    </div>
    <?php
      if ( have_posts() ) {
      	while ( have_posts() ) {
      		the_post();
          the_content();
      	}
      }
    ?>
  </article>


  <section class="contact--item social-media">
    <?php Template::Render('./snippets/snippet-social-media'); ?>
  </section>
</main>


<?php get_footer(); ?>
