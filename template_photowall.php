<?php
/*
Template Name: photowall
*/
?>


<?php get_header(); ?>

<main>
  <h1>Photo</h1>
  <section class="photowall">

  </section>

  <script id="calendar-template" type="text/x-handlebars-template">
  		{{#each this}}
  			<li class="calendar-list--item {{#if this.done}}past{{/if}}">
  				<a href="{{link}}" target="_blank">
  					<div class="date">
  						<span class="month">{{date.monthName}}</span>
  						<span class="day">{{date.day}}</span>
  					</div>
  					<div class="location">
  						<h2 class="title">{{title}}</h2>
  						<p class="detail">{{locationName}} / {{city}}</p>
  					</div>
  				</a>
  			</li>
  		{{/each}}

  	<a href="" class="event-button">Bekijk alle evenementen</a>
  </script>
</main>

<?php get_footer(); ?>
