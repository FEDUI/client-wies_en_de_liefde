<?php
/*
	Template Name: News
*/
?>

<?php get_header(); ?>

<main class="home">
	<h1><?php echo get_the_title(); ?></h1>

  <section class="news">

    <video src="https://www.facebook.com/wiesendeliefde/videos/683604655146338/" autoplay poster="posterimage.jpg">

    </video>


		<h2>Laatste nieuws</h2>
		<ul class="news-overview">
		</ul>



	</section>


  <script id="news-template" type="text/x-handlebars-template">
  	{{#each this}}
  		<li class="news-overview--item news-item news-item--{{this.type}}">
  			{{#if this.url}}<a href="{{url}}" class="news-item--link" target="_blank">{{/if}}
  				{{#if this.event}}<h2 class="news-item--title">Optreden</h2>{{/if}}
  				{{#if this.image}}
  					<div class="news-item--img-container">
  						{{#each this.image}}
  							<img src="{{this}}" class="news-item--img" alt="{{#if this.text}}{{text}}{{/if}}" />
  						{{/each}}
  					</div>
  				{{/if}}
  				{{#if this.text}}<p class="news-item--text">{{text}}</p>{{/if}}
  			{{#if this.url}}</a>{{/if}}
  		</li>
  	{{/each}}
  </script>
</main>


<?php get_footer(); ?>
