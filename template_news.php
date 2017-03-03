<?php
/*
	Template Name: News
*/
?>

<?php get_header(); ?>

<main class="home">
	<h1><?php echo get_the_title(); ?></h1>

  <section class="news">
		<ul class="news-overview">
		</ul>



	</section>


  <script id="news-template" type="text/x-handlebars-template">
  	{{#each this}}
  		<li class="news-overview--item news-item news-item--{{this.type}} {{#if this.text}}includes-text{{/if}}">
  			{{#if this.url}}<a href="{{url}}" class="news-item--link" target="_blank">{{/if}}
  				{{#if this.event}}<h2 class="news-item--title">Optreden</h2>{{/if}}
  				{{#if this.image}}
  					<div class="news-item--img-container">
  						{{#each this.image}}
  							<img src="{{this}}" class="news-item--img" alt="{{#if this.text}}{{text}}{{/if}}" />
  						{{/each}}
  					</div>
  				{{/if}}
  				{{#if this.text}}
						{{#if this.toLarge}}<div class="news-item--text-container">{{/if}}
							<p class="news-item--text">{{text}}</p>
						{{#if this.toLarge}}<span> ...</span></div>{{/if}}
					{{/if}}
  			{{#if this.url}}</a>{{/if}}
  		</li>
  	{{/each}}
  </script>
</main>


<?php get_footer(); ?>
