<?php
/*
	Template Name: Home
*/
?>

<?php get_header(); ?>

<main class="home">
	<section class="home--section home--introduction">
		<?php the_field('homepage-video'); ?>


		<?php
			if ( have_posts() ) {
				while ( have_posts() ) {
					the_post();
					the_content();
				}
			}
		?>
	</section>

	<section class="home--section">
		<h2 class="home--sub-title">Agenda</h2>
		<div class="calendar">
	    <?php Template::Render('./snippets/snippet-calendar'); ?>

	    <a href="/agenda" class="calendar--more more">Bekijk al onze optredens</a>
	  </div>
	</section>

	<?php
		$prevTitle = get_field("bus-preview-title");
		$prevText = get_field("bus-preview-text");
		$prevLink = get_field('bus-preview-link');
	?>
	<section class="home--section bus-prev">
		<?php if ($prevTitle) { ?> <h2 class="bus-prev--title home--sub-title"><?php echo $prevTitle; ?></h2> <?php } ?>

		<div class="bus-prev--images">
			<?php
	      if( have_rows('bus-preview-images') ):
	        while ( have_rows('bus-preview-images') ) : the_row();
	          $busImage = get_sub_field('bus-preview-image');
	          if( !empty($busImage) ): ?>
	            <div class="impression--card">
	              <img class="impression--img bus-prev--img" src="<?php echo $busImage['url']; ?>" alt="Afbeelding van de bus" />
	            </div>
	          <?php endif;
	        endwhile;
	      endif;
	    ?>
		</div>

		<?php if ($prevText) { ?>
			<?php echo $prevText ?>
		<?php } ?>

		<?php if ($prevLink) { ?>
			<a class="bus-prev--link" href="<?php echo $prevLink ?>">Stap nu maar in</a>
		<?php } ?>

	</section>

	<section class="home--section">
		<h2 class="home--sub-title">Het laatste nieuws</h2>
		<?php Template::Render('./snippets/snippet-news'); ?>
	</section>

	<section class="home--section home--contact contact">
		<h2 class="home--sub-title contact--title">Contact</h2>
		<article class="contact--item">
			<div class="contact--wies-container">
	      <img class="contact--wies" src="<?php echo get_template_directory_uri(); ?>/dist/img/hero/footer-xs.jpg" alt="Afbeelding van Wies Kavelaar">
	    </div>
			<?php
			    // query for the about page
			    $your_query = new WP_Query( 'pagename=contact' );
			    // "loop" through query (even though it's just one page)
			    while ( $your_query->have_posts() ) : $your_query->the_post();
			        the_content();
			    endwhile;
			    // reset post data (important!)
			    wp_reset_postdata();
			?>
	  </article>
	</section>

</main>


<?php get_footer(); ?>
