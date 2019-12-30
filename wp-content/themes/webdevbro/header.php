<?php /* SITE HEADER */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="profile" href="https://gmpg.org/xfn/11">
  <?php wp_head(); ?>
  <style>
    @media only screen and (max-width: 529px) {
      #navbarCollapse {
        display: none;
      }
    }
    @media only screen and (min-width: 530px) {
      /* #navbarCollapse {
        display: block !important;
      } */
    }
  </style>

</head>

<body <?php body_class(); ?>>

  <div id="page" class="site">
    <!-- HEADER -->
    <header id="masthead" class="<?php if(is_front_page()) { echo "site-header-fp"; } else { echo "site-header"; } ?>">
      <?php if (is_front_page()) : ?>
      <div id="slides" class="slides">

        <div class="overlay"></div>

        <ul class="slides-container">
          <li>
            <img src="<?php echo get_theme_file_uri("/images/slide1.jpg"); ?>" alt="Slide 1">
            <div class="container"></div>
          </li>
          <li>
            <img src="<?php echo get_theme_file_uri("/images/slide2.jpg"); ?>" alt="Slide 1">
            <div class="container"></div>
          </li>
          <li>
            <img src="<?php echo get_theme_file_uri("/images/slide3.jpg"); ?>" alt="Slide 1">
            <div class="container"></div>
          </li>
        </ul>

        <div class="titleMessage">
          <div class="headingfp">
            <p class="main">RONALDO ORTIZ</p>
            <p class="sub string"></p>
          </div>
        </div>

        <nav class="slides-navigation">
          <a href="#" class="next"></a>
          <a href="#" class="prev"></a>
        </nav>

      </div>

      <?php else : ?>

      <div class="container">
        <div class="header-container">
          <!-- LOGO -->
          <div class="header-container__logo">
            <h1 class="header-container__logo--text"><a href="<?php echo site_url(); ?>">WEBDEVBRO <span class="header-container__logo--sub">Full Stack <strong>Web Developer</strong><span></a></h1>
          </div>

          <div class="header-container__menu group">
            <nav class="main-navigation">
              <ul>
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li <?php if(get_post_type() == "post") { echo "class='current-menu-item'"; } ?>><a href="<?php echo site_url('/blog'); ?>">Blog</a></li>
                <li <?php if (get_post_type() == "portfolio") { echo "class='current-menu-item'"; } ?>><a href="<?php echo get_post_type_archive_link('portfolio'); ?>">Portfolio</a></li>
              </ul>
            </nav>
          </div>
          <a href="#" class="js-search-trigger header-container__search-trigger"><i class="fas fa-search" aria-hidden="true"></i></a>
          <span class="header-container__small-menu"><i class="header-container__small-menu-trigger fas fa-bars" aria-hidden="true"></i></span>
        </div> <!-- class="header-container" -->
      </div> <!-- class="container" -->

      <?php endif; ?>

      <?php if (is_front_page()) : ?>
      <div class="wrapper site-header__top">
        <div class="site-header__container">
          <nav class="navbar">
            <button class="navbar-toggle" type="button">
              <span class="navbar-toggle-icon"><i class="fas fa-bars"></i></span>
              <span class="navbar-toggle-icon"><img src="<?php echo get_theme_file_uri("/images/icons/menu.png"); ?>" alt="Menu Bar"></span>
            </button>
            <div id="navbarCollapse" class="navbar-collapse">
              <ul class="navbar-ul">
                <li class="navbar-item current">
                  <a href="#portfolio" class="nav-link">Portfolio</a>
                </li>
                <li class="navbar-item">
                  <a href="#skills" class="nav-link">Skills</a>
                </li>
                <li class="navbar-item">
                  <a href="#stats" class="nav-link">Stats</a>
                </li>
                <li class="navbar-item">
                  <a href="#contact" class="nav-link">Contact</a>
                </li>
                <li class="navbar-item">
                  <a href="<?php echo site_url("/blog"); ?>" class="nav-link">Blog</a>
                </li>
                <li class="navbar-item">
                  <a href="<?php echo get_post_type_archive_link("portfolio"); ?>" class="nav-link">Portfolio Archive</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
      <?php endif; ?>

    </header>

    <div id="content" class="site-content">
