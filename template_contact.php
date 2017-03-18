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
    <?php
      if ( have_posts() ) {
      	while ( have_posts() ) {
      		the_post();
          the_content();
      	}
      }
    ?>
  </article>

  <!-- Loop thrue the social media items -->
  <section class="contact--item social-media">
    <ul class="social-media--list">
      <?php
        // check if the repeater field has rows of data
        if( have_rows('social_media_links') ):
          // loop through the rows of data
          while ( have_rows('social_media_links') ) : the_row();
          ?>
            <li class="social-media--item">
              <a href="<?php the_sub_field('link'); ?>" class="social-media--link">
                <?php $image = get_sub_field('img');
                if( !empty($image) ): ?>
                    <img class="social-media--img" src="<?php echo $image['url']; ?>" alt="Icoon van <?php the_sub_field('name'); ?>" />
                <?php endif; ?>
              </a>
            </li>
      <?php
          $counter ++;
          endwhile;
        endif;
      ?>
    </ul>
  </section>
</main>


<?php get_footer(); ?>
