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
		<!-- <iframe src="https://www.youtube.com/embed/TL2cu_F80co" frameborder="0"></iframe> -->
	</section>

	<section class="calendar">
		<h2>Agenda</h2>
		<ul>
			<li>
				<a href="#">
					<div class="date">
						<span class="date-month">Aug</span>
						<span class="date-day">12</span>
						<span class="date-year">2016</span>
					</div>
					<div class="location">
						<p class="location-name">Cultureel Centrum de Beiengaarde</p>
						<p class="location-city">Bergen aan Zee</p>
					</div>
				</a>
			</li>
			<li>
				<a href="#">
					<div class="date">
						<span class="date-month">Sep</span>
						<span class="date-day">5</span>
						<span class="date-year">2016</span>
					</div>
					<div class="location">
						<p class="location-name">020</p>
						<p class="location-city">Amsterdam</p>
					</div>
				</a>
			</li>
			<li>
				<a href="#">
					<div class="date">
						<span class="date-month">Dec</span>
						<span class="date-day">5</span>
						<span class="date-year">2016</span>
					</div>
					<div class="location">
						<p class="location-name">Sinterklaas avondconcert</p>
						<p class="location-city">Egmond</p>
					</div>
				</a>
			</li>
			<li class="past">
				<a href="#">
					<div class="date">
						<span class="date-month">Jul</span>
						<span class="date-day">30</span>
						<span class="date-year">2017</span>
					</div>
					<div class="location">
						<p class="location-name">Tivoli - Rondo</p>
						<p class="location-city">Utrecht</p>
					</div>
				</a>
			</li>
		</ul>
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
			<li class="news-overview--item">
				<a href="#">
					<div class="img-container">
						<img src="http://unsplash.it/400" alt="" />
					</div>
					<p>// KUNST10DAAGSE BUSTOUR W&❤️ \\</p>
					<p>Dank aan De Flessenpost & Harry Steunenberg voor het plaatsen van dit fijne artikel!</p>
					<p>We hopen jullie natuurlijk allemaal te zien in ons theater op wielen! Ook het moment om jullie veel nieuw werk te laten horen en jullie op te warmen voor ons eerste album ❤️</p>
				</a>
			</li>
			<li class="news-overview--item">
				<a href="#">
					<div class="img-container">
						<img src="http://unsplash.it/400" alt="" />
					</div>
					<p>Just another day @ the office ♥️</p>
				</a>
			</li>
			<li class="news-overview--item">
				<a href="#">
					<div class="img-container">
						<img src="http://unsplash.it/400" alt="" />
					</div>
					<p>// Wies en de Liefde Kunst10Daagse BusTour \\</p>
					<p>Fijn nieuws! We hebben een vergunning gekregen om met ons rijdende theatertje midden op het plein in Bergen te staan tijdens de Kunst10Daagse in Oktober.</p>
					<p>We spelen 5 dagen in totaal, 3 muziekvoorstellingen per dag, dus koop je kaartje bij de chauffeur en stap maar in! </p>
				</a>
			</li>
		</ul>
	</section>

</main>

<?php get_footer(); ?>
