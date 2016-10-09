<?php
/*
	Template Name: Home
*/
?>

<?php get_header(); ?>

<main class="home">
	<section class="page-header">
		<!-- video or img -->
		<iframe src="https://www.youtube.com/embed/SkzVbueWuy4" frameborder="0"></iframe>
	</section>

	<section class="calendar">
		<h2>Agenda</h2>
		<ul class="eventList"></ul>
		<a href="" class="event-button">Bekijk alle evenementen</a>
	</section>

	<section class="hero-link-to">
		<a href="#">
			<h2>Buslading Muziek</h2>
			<p>Stap in</p>
		</a>
	</section>

	<section class="news">
		<h2>Laatste nieuws</h2>
		<ul class="news-overview">
		</ul>
	</section>

</main>

<script id="calendar-template" type="text/x-handlebars-template">
	{{#each this}}
		<li {{#if this.done}}class="past"{{/if}}>
			<a href="{{link}}">
				<div class="date">
					<span class="date-month">{{date.monthName}}</span>
					<span class="date-day">{{date.day}}</span>
					<span class="date-year">{{date.year}}</span>
				</div>
				<div class="location">
					<p class="location-name">{{locationName}}</p>
					<p class="location-city">{{city}}</p>
				</div>
			</a>
		</li>
	{{/each}}
</script>

<script id="news-template" type="text/x-handlebars-template">
	{{#each this}}
		<li class="news-overview--item">
			{{#if this.url}}<a href="{{url}}">{{/if}}
				{{#if this.event}}<h2>Optreden</h2>{{/if}}
				{{#if this.image}}
					<div class="img-container">
						{{#each this.image}}
							<img src="{{this}}" alt="" />
						{{/each}}
					</div>
				{{/if}}
				{{#if this.text}}<p>{{text}}</p>{{/if}}
			{{#if this.url}}</a>{{/if}}
		</li>
	{{/each}}
</script>

<?php get_footer(); ?>
