<?php
/*
Template Name: photowall
*/
?>


<?php get_header(); ?>




<main>
  <h1 class="main--title"><?php echo get_the_title(); ?></h1>
  
  <section class="pictures">
      <?php Template::Render('./snippets/spinner'); ?>
  </section>

  <script id="template-instagram" type="text/x-handlebars-template">

  	<ul class="pictures--list">
  		{{#each this}}
  			<li class="pictures--item">
          {{#ifCond this.type "photo"}}
            <a class="insta" href="{{this.link}}" target="_blank">
              <img class="insta--img" src="{{this.preview}}" alt="" />
            </a>
          {{else}}
            <div class="insta--video--container {{this.orientation}}">
              <video class="insta--video" src="{{this.src}}" controls="true"></video>
              <!-- <a href="{{this.link}}">{{this.caption}}</a> -->
            </div>
          {{/ifCond}}
  			</li>
  		{{/each}}
  	</ul>

  </script>
</main>



<?php get_footer(); ?>
