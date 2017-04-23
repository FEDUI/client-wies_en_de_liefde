<footer class="footer">
  <div class="footer--greetz">
    <img class="footer--greetz-img" src="<?php echo get_template_directory_uri(); ?>/dist/img/decoration/greetz.png" alt="Kus Wies">
  </div>

  <section class="footer--newsletter">
    <?php dynamic_sidebar( 'footer_bottom_1' ); ?>
  </section>

  <div class="footer--social-media">
    <?php Template::Render('./snippets/snippet-social-media'); ?>
  </div>
</footer>
</body>
</html>
