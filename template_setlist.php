<?php
/*
Template Name: Setlist
*/
?>


<?php get_header(); ?>

<main>
  <!-- Loop thrue the social media items -->
  <section class="setlist">
    <?php $setlistTitle = get_field('setlist-title'); ?>
    <?php if( !empty($setlistTitle) ): ?>
      <h1 class="setlist--title"><img class="setlist--title-img" src="<?php echo $setlistTitle['url']; ?>" alt="Wies en de liefde - Setlist" /></h1>
    <?php endif; ?>

    <ul class="setlist--list">
      <?php
        // check if the repeater field has rows of data
        if( have_rows('setlist') ):
          // loop through the rows of data
          while ( have_rows('setlist') ) : the_row();
          ?>
          <li class="setlist--item">
            <div class="setlist--img-container">
              <?php $image = get_sub_field('image');
                    $extraImage = get_sub_field('extra-img');
              if( !empty($image) ): ?>
                <img class="setlist--img" src="<?php echo $image['url']; ?>" alt="<?php the_sub_field('title'); ?>" />
              <?php endif;
              if( !empty($extraImage) ): ?>
                <img class="setlist--img-extra" src="<?php echo $extraImage['url']; ?>" alt="Extra toevoeging tot het setlistitem" />
              <?php endif; ?>
            </div>

            <?php if ( get_sub_field('link') ) { ?>
              <div class="frame frame--hide">
                <button class="frame--remove">
                  X
                </button>
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
