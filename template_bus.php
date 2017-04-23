<?php
/*
Template Name: Buslading-muziek
*/
?>


<?php get_header(); ?>

<main class="bus">
  <h1 class="main--title"><?php echo get_the_title(); ?></h1>

  <!-- iframe about bus -->
  <section class="bus--movie">
    <iframe class="bus--movie-frame" width="560" height="315" src="https://www.youtube.com/embed/WdGmTUzkPjQ?ecver=1" frameborder="0" allowfullscreen></iframe>
  </section>

  <!-- text about bus -->
  <article class="bus--article">
    <?php
      if ( have_posts() ) {
      	while ( have_posts() ) {
      		the_post();
          the_content();
      	}
      }
    ?>
  </article>

  <!-- three poloroids of the bus -->
  <section class="bus--impression impression">
    <?php
      if( have_rows('bus-impression') ):
        while ( have_rows('bus-impression') ) : the_row();
          $image = get_sub_field('img');
          if( !empty($image) ): ?>
            <div class="impression--card">
              <img class="impression--img" src="<?php echo $image['url']; ?>" alt="afbeelding van de bus" />
            </div>
          <?php endif;
        endwhile;
      endif;
    ?>
  </section>
</main>

<?php get_footer(); ?>
