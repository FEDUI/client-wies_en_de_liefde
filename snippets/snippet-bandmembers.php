<?php
$counter = 0;
  // check if the repeater field has rows of data
  if( have_rows('bandmember') ):
    // loop through the rows of data
    while ( have_rows('bandmember') ) : the_row();

      if ($counter === 0) { $class = 'bandmember--first'; }

    ?>
      <li class="<?php echo $class; ?>">
        <h2 class="bandmember--name"><?php the_sub_field('name'); ?></h2>
        <p class="bandmember--role"><?php the_sub_field('role'); ?></p>
        <div class="bandmember--text"> <?php the_sub_field('about'); ?> </div>

        <?php
          $image = get_sub_field('image');
          if( !empty($image) ):
        ?>
          <div class="bandmember--img-container">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          </div>
        <?php endif; ?>
      </li>
<?php
    $counter ++;
    endwhile;
  endif;
?>
