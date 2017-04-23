<?php
$counter = 0;
  // check if the repeater field has rows of data
  if( have_rows('affaire') ): ?>
    <div class="affaires">
      <?php // loop through the rows of data
      while ( have_rows('affaire') ) : the_row(); ?>
        <article class="affaire">
          <?php
            $image = get_sub_field('image');
            if( !empty($image) ):
          ?>
            <div class="affaire--img-container">
              <img class="affaire--img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
            </div>
          <?php endif; ?>

          <div class="affaire--info">
            <h3 class="affaire--name"><?php the_sub_field('name'); ?></h3>
            <p class="affaire--role"><?php the_sub_field('role'); ?></p>
            <div class="affaire--text overflow--text"> <?php the_sub_field('about'); ?> </div>
          </div>
        </article>
  <?php
      $counter ++;
    endwhile; ?>
  </div>
<?php endif; ?>
