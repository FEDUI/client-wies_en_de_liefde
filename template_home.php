<?php
/*
	Template Name: Home
*/
?>

<?php get_header(); ?>

<main class="home">
	<section class="home--introduction">
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
		<?php Template::Render('./snippets/snippet-calendar'); ?>
	</section>

	<?php
		$prevTitle = get_field("bus-preview-title");
		$prevText = get_field("bus-preview-text");
		$prevImg = get_field('bus-preview-img');
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

	<section class="home--section contact">
		<h2 class="home--sub-title contact--title">Contact</h2>
		<div class="contact--text">
			<img src="" alt="">
		</div>
		<div class="">
			<!-- render content -->
			<p class="f-contact--text">
	      Voor het boeken van Wies en de Liefde met bus,
	      een huiskamerconcert of een optreden van Wies en de Liefde (zonder bus) kan je
	      contact opnemen met Wies Kavelaar via <a href="mailto:boekingen@wiesendeliefde.nl">boekingen@wiesendeliefde.nl</a> of <a href="06-47138297">06-47138297.</a>
	    </p>
	    <p class="f-contact--text">
	      Voor algemene vragen, of als het de bezigheden van individuele bandleden aangaat, kan je mailen naar: <a href="mailto:info@wiesendeliefde.nl">info@wiesendeliefde.nl</a>
	    </p>
		</div>
	</section>

</main>


<?php get_footer(); ?>
