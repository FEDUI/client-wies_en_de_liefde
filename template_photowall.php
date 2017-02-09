<?php
/*
Template Name: photowall
*/
?>


<?php get_header(); ?>




<main>
  <h1>Photo</h1>
  <section class="photowall">
    <ul>
      <li></li>
    </ul>
  </section>

  <section class="pictures">
      <p>Images are loading</p>
      <div>Spinner</div>
  </section>

  <script id="template-instagram" type="text/x-handlebars-template">

  	<ul class="pictures-list">
  		{{#each this}}
  			<li class="pictures-list--item">
          {{#ifCond this.type "photo"}}
            <a class="photo" href="{{this.link}}" target="_blank">
              <figure>
                  <img src="{{this.preview}}" alt="" />
                  <figcaption>{{this.caption}}</figcaption>
              </figure>
            </a>
          {{else}}
            <div class="video {{this.orientation}}">
              <video src="{{this.src}}" controls="true"></video>
              <a href="{{this.link}}">{{this.caption}}</a>
            </div>
          {{/ifCond}}
  			</li>
  		{{/each}}
  	</ul>

  </script>
</main>



<?php get_footer(); ?>
