<?php
/*
	Template Name: Home
*/
?>

<?php get_header(); ?>

<main class="home">
	<!-- <iframe src="" width="" height=""></iframe> -->
	<!-- normal content -->

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
	<section class="home--section bus-prev" style="background-image: url(<?php echo $prevImg['url']; ?>)">
		<?php if ($prevLink) { ?> <a class="bus-prev--link" href="<?php echo $prevLink ?>"> <?php } ?>
			<?php if ($prevTitle) { ?> <h2 class="bus-prev--title"><?php echo $prevTitle; ?></h2> <?php } ?>
			<?php if ($prevText) { ?>
				<div class="bus-prev--text">
					<?php echo $prevText ?>
				</div>
			<?php } ?>
		<?php if ($prevLink) { ?> </a> <?php } ?>

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
