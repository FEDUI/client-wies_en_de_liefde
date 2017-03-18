<?php
/*
Template Name: Calendar
*/
?>


<?php get_header(); ?>

<main>
  <h1 class="main--title"><?php echo get_the_title(); ?></h1>

  <section class="calendar">
		<ul class="calendar--list eventList"></ul>

		<a href="" class="calendar--more more">Bekijk alle evenementen</a>
	</section>

</main>

<script id="calendar-template" type="text/x-handlebars-template">
  {{#each this}}
    <li class="calendar--list-item calendar-item {{#if this.done}}past{{/if}}">
      <a class="calendar-item--link" href="{{link}}">
        <div class="calendar-item--date date">
          <span class="date--month">{{date.monthName}}</span>
          <span class="date--day">{{date.day}}</span>
        </div>
        <div class="calendar-item--location">
          <p class="location--name">{{locationName}}</p>
          <p class="location--city">{{city}}</p>
        </div>
      </a>
    </li>
  {{/each}}
</script>

<?php get_footer(); ?>
