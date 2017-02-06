<nav class="main-header--nav nav">
  <?php
    wp_nav_menu( array(
        'menu'              => 'Main menu',
        'theme_location'    => 'header',
        'depth'             => 2,
        'menu_class'        => 'nav',
        'container'         => false
    ));
  ?>
</nav>
