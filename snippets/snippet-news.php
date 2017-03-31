<section class="news">
  <ul class="news-overview">
    <?php Template::Render('./snippets/spinner'); ?>
  </ul>
</section>


<script id="news-template" type="text/x-handlebars-template">
  {{#each this}}
    <li class="news-overview--item news-item news-item--{{this.type}} {{#if this.text}}includes-text{{/if}}">
      {{#if this.url}}<a href="{{url}}" class="news-item--link" target="_blank">{{/if}}
        {{#if this.image}}
          <div class="news-item--img-container">
            {{#each this.image}}
              <img src="{{this}}" class="news-item--img" alt="{{#if this.text}}{{text}}{{/if}}" />
            {{/each}}
            {{#if this.event}}<h2 class="news-item--title">Optreden</h2>{{/if}}
          </div>
        {{/if}}
        {{#if this.text}}
          <div class="news-item--text-container">
            <p class="news-item--text">{{text}}</p>
          {{#if this.toLarge}}<span> ...</span>{{/if}}
          </div>
        {{/if}}
      {{#if this.url}}</a>{{/if}}
    </li>
  {{/each}}
  <li class="news-overview--item news-item includes-text">
    <a href="{{url}}" class="news-item--link see-more" target="_blank">
      <p class="news-item--text">Bekijk al ons nieuws</p>
    </a>
  </li>
</script>
