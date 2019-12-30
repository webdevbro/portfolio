<?php /* SITE FOOTER */ ?>
</div><!-- id="content" class="site-content" -->

<footer id="colophon" class="site-footer">
  <div class="layout__container site-footer__content">

    <div class="site-footer__content--text">
      <p>&copy; Copyright Ronaldo Ortiz - WEBDEVBRO - <?php echo date("Y"); ?></p>
    </div><!-- class="site-footer__text" -->

    <div class="site-footer__content--nav">
      <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e('Footer Social Links Menu', 'webdevbro'); ?>"></nav>
    </div><!-- class="site-footer__nav" -->

  </div>
</footer>

</div><!-- id="page" class="site" -->

<!-- SEARCH OVERLAY -->
<div class="search-overlay">
  <!-- TOP -->
  <div class="search-overlay__top">
    <div class="container">
      <i class="fas fa-search search-overlay__icon" aria-hidden="true"></i>
      <input type="text" class="search-term" placeholder="What are you looking for?" id="search-term" autocomplete="off">
      <i class="fas fa-window-close search-overlay__close" aria-hidden="true"></i>
    </div>
  </div>
  <!-- BOTTOM -->
  <div class="container">
    <div id="search-overlay__results"></div>
  </div>

</div>

<?php wp_footer(); ?>
</body>

</html>
