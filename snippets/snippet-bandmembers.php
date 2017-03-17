<?php
$counter = 0;
  // check if the repeater field has rows of data
  if( have_rows('bandmember') ):
    // loop through the rows of data
    while ( have_rows('bandmember') ) : the_row();

      if ($counter === 0) {
        $class = 'bandmember--first';
      } else {
        $class = '';
      }

    ?>
    <?php if ($counter === 1) { ?>
      <h2>De liefdes</h2>
    <?php } ?>
      <article class="<?php echo $class; ?> bandmember">
        <?php
          $image = get_sub_field('image');
          if( !empty($image) ):
        ?>
          <div class="bandmember--img-container">
            <img class="bandmember--img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          </div>
        <?php endif; ?>
        <div class="bandmember--info">
          <h3 class="bandmember--name"><?php the_sub_field('name'); ?></h3>
          <p class="bandmember--role"><?php the_sub_field('role'); ?></p>
          <?php  $text = get_sub_field('about'); ?>
          <div class="bandmember--text overflow--text"> <?php echo apply_filters('the_excerpt', $text); ?> </div>
        </div>
      </article>
<?php
    $counter ++;
    endwhile;
  endif;
?>
