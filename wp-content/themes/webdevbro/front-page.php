<?php /* INDEX PAGE */ ?>
<?php get_header(); ?>

<!-- ABOUT SECTION -->
<section id="about" class="layout about">
  <div class="layout__container">

    <div class="about__content">

      <div class="about__content--img">
        <img src="<?php echo get_theme_file_uri("/images/rony.jpg"); ?>" alt="Ronaldo Ortiz - Freelance Web Developer">
      </div>
      <div class="about__content--text">
        <h2>My name is <strong>Ronaldo</strong> Ortiz</h2>
        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>
        <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>
        <a href="#contact" class="contactButton contactButton__dark">GET IN TOUCH</a>
      </div>

    </div><!-- class="about" -->

  </div><!-- class="layout__container" -->


</section>

<!-- PORTFOLIO SECTION -->
<section id="portfolio" class="layout portfolio">
  <div class="layout__container">
    <div class="portfolio__content">
      <div class="portfolio__content--heading">
        <h2><a href="<?php echo get_post_type_archive_link("portfolio"); ?>">Portfolio</a></h2>
      </div>
      <div class="portfolio__content--filter">
        <ul id="filters">
          <li><a href="#" data-filter="*" class="current">ALL</a></li>
          <li><a href="#" data-filter=".htmlcss">HTML & CSS</a></li>
          <li><a href="#" data-filter=".js">JavaScript</a></li>
          <li><a href="#" data-filter=".node">Node.js</a></li>
          <li><a href="#" data-filter=".php">PHP </a></li>
        </ul>
      </div>
      <!-- ITEMS -->
      <?php
        $args = array(
          'post_type'         => 'portfolio',
        );
        $portfolioItems = new WP_Query($args)
      ?>
      <div class="itemsContainer">
        <ul class="items">
        <?php
          while ($portfolioItems->have_posts()) : $portfolioItems->the_post();
            $image = get_field('feat_image');
            $imageAlt = $image['alt'];
            $imageThumb = $image['sizes']['portfolio_square'];
            $imageFull = $image['sizes']['portfolio_feat'];

        ?>
          <li onclick="" class="<?php echo get_field('class_filter'); ?>">
            <div class="item">
                <img src="<?php echo $imageThumb; ?>" alt="<?php echo $imageAlt; ?>" width="250" height="250">
                <h2 class="item__title"><?php echo get_the_title(); ?></h2>
                <div class="icons">
                  <a href="<?php echo $image['url']; ?>" title="View image" class="openButton" data-fancybox data-caption="This is the sample picture"><i class="fa fa-search"></i></i></a>
                  <a href="<?php the_permalink(); ?>" class="projectLink" target="_blank"><i class="fa fa-link"></i></i></a>
                </div><!-- class="icons" -->
                <div class="imageOverlay"></div>
            </div>
        </li>


        <?php endwhile; ?>
        </ul>
        <?php wp_reset_postdata(); ?>
      </div><!-- class="itemsContainer" -->


    </div><!-- class="portfolio__content" -->
  </div><!-- class="layout__container" -->

</section>

<!-- SKILLS SECTION -->
<section id="skills" class="layout skills">
  <div class="layout__container">

    <div class="skills__content">

      <div class="skills__content--text">
        <h2>Technical <strong>Skills</strong></h2>
        <p>A "self assesment" of my current skills and experience</p>

        <div class="owl-carousel owl-theme">

          <div class="skill">
            <span class="chart" data-percent="95">
              <span class="percent">95</span>
              <canvas height="152" width="152"></canvas>
            </span>
            <h4>HTML & CSS</h4>
            <p>Used in most websites along with WordPress</p>
          </div>
          <div class="skill">
            <span class="chart" data-percent="80">
              <span class="percent">80</span>
              <canvas height="152" width="152"></canvas>
            </span>
            <h4>JavaScript</h4>
            <p>Used in most websites along with WordPress</p>
          </div>
          <div class="skill">
            <span class="chart" data-percent="73">
              <span class="percent">73</span>
              <canvas height="152" width="152"></canvas>
            </span>
            <h4>PHP</h4>
            <p>Used in most websites along with WordPress</p>
          </div>
          <div class="skill">
            <span class="chart" data-percent="39">
              <span class="percent">39</span>
              <canvas height="152" width="152"></canvas>
            </span>
            <h4>Vue.js</h4>
            <p>Used in most websites along with WordPress</p>
          </div>

        </div>

      </div><!-- class="skills__text" -->

    </div><!-- class="skills" -->

  </div><!-- class="layout__container" -->


</section>

<!-- STATS SECTION -->
<section id="stats" class="stats">

  <div class="stats__container">

    <div class="stats__container--item">
      <div class="stats-item__wrap">
        <div class="stats-item__wrap--icon">
          <i class="fas fa-mug-hot"></i>
        </div>
        <div class="stats-item__wrap--text">
          <h2 id="counter0" class="counterList">1369</h2>
          <h3>Coffee cups</h3>
        </div>
      </div><!-- class="stats-item__wrap"> -->
    </div><!-- class="stats-item"> -->

    <div class="stats__container--item">
      <div class="stats-item__wrap">
        <div class="stats-item__wrap--icon">
          <i class="fas fa-user-friends"></i>
        </div>
        <div class="stats-item__wrap--text">
          <h2 id="counter1" class="counterList">48</h2>
          <h3>Satisfied Customers</h3>
        </div>
      </div><!-- class="stats-item__wrap"> -->
    </div><!-- class="stats-item"> -->

    <div class="stats__container--item">
      <div class="stats-item__wrap">
        <div class="stats-item__wrap--icon">
          <i class="fas fa-tasks"></i>
        </div>
        <div class="stats-item__wrap--text">
          <h2 id="counter2" class="counterList">39</h2>
          <h3>Projects finished</h3>
        </div>
      </div><!-- class="stats-item__wrap"> -->
    </div><!-- class="stats-item"> -->

    <div class="stats__container--item">
      <div class="stats-item__wrap">
        <div class="stats-item__wrap--icon">
          <i class="fas fa-laptop-code"></i>
        </div>
        <div class="stats-item__wrap--text">
          <h2 id="counter3" class="counterList">8320</h2>
          <h3>Hours of coding</h3>
        </div>
      </div><!-- class="stats-item__wrap"> -->
    </div><!-- class="stats-item"> -->

  </div><!-- class="stats__container"> -->

</section>

<!-- CONTACT SECTION -->
<section id="contact" class="layout contact">
  <div class="contact__container">
    <p class="contact__container--intro">Let's talk!</p>
    <p class="contact__container--phone">Phone / WhatsApp: <span>(591) 77799006</span></p>
    <p class="contact__container--email">Email: <span>rortiz@webdevbro.com</span></p>
  </div>
</section>


<?php get_footer(); ?>
