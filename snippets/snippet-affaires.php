<?php
$counter = 0;
  // check if the repeater field has rows of data
  if( have_rows('affaire') ):
    // loop through the rows of data
    while ( have_rows('affaire') ) : the_row();

      if ($counter === 0) { $class = 'affaire--first'; }

    ?>
      <li class="<?php echo $class; ?>">
        <h2 class="affaire--name"><?php the_sub_field('name'); ?></h2>
        <p class="affaire--role"><?php the_sub_field('role'); ?></p>
        <div class="affaire--text"> <?php the_sub_field('about'); ?> </div>

        <?php
          $image = get_sub_field('image');
          if( !empty($image) ):
        ?>
          <div class="affaire--img-container">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
          </div>
        <?php endif; ?>
      </li>
<?php
    $counter ++;
    endwhile;
  endif;
?>
