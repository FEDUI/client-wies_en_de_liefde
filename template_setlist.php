<?php
/*
Template Name: Setlist
*/
?>


<?php get_header(); ?>

<main>
  <h1 class="main--title"><?php echo get_the_title(); ?></h1>

  <!-- Loop thrue the social media items -->
  <section class="setlist">
    <ul class="setlist--list">
      <?php
        // check if the repeater field has rows of data
        if( have_rows('setlist') ):
          // loop through the rows of data
          while ( have_rows('setlist') ) : the_row();
          ?>
          <li class="setlist--item">
            <?php $image = get_sub_field('image');
            if( !empty($image) ): ?>
              <img class="setlist--img" src="<?php echo $image['url']; ?>" alt="<?php the_sub_field('title'); ?>" />
            <?php endif; ?>

            <?php if ( get_sub_field('link') ) { ?>
              <div class="frame frame--hide">
                <button class="frame--remove">
                  X
                </button>
                <!-- <embed type="video/quicktime" src="#" width="300" height="300"> -->
                <?php the_sub_field('link'); ?>
              </div>
            <?php } ?>
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
