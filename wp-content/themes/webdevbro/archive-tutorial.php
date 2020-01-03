<?php /* ARCHIVE TEMPLATE */ ?>
<?php get_header(); ?>

<!-- BANNER FOR INTERNAL PAGES -->
<?php
  page_banner(array(
    'title'     => "Tutorial Archive",
    'subtitle'  => "Web Development Tutorials",
    'photo'     => get_theme_file_uri('/images/bg/header_banner.jpg')
  ));
?>

<!-- ABOUT SECTION -->
<div class="container container--narrow page-section">
  <div class="portfolio-grid">
    <?php
      while (have_posts()) : the_post();
      $image = get_field('feat_image');
      $imageAlt = $image['alt'];
      $imageThumb = $image['sizes']['portfolio_square'];
      $imageFull = $image['sizes']['portfolio_feat'];
    ?>
      <div class="portfolio-grid__item">
        <h2 class="headline headline--medium headline--post-title">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <div class="portfolio-grid__content">
          <a href="<?php the_permalink(); ?>"><img src="<?php echo $imageThumb; ?>" alt="<?php echo $imageAlt; ?>"></a>
          <?php if (has_excerpt()) { echo get_the_excerpt(); } else { echo "<p>" .  wp_trim_words(get_the_content(), 18, " [...]") . "</p>"; } ?>

          <p><a class="btn btn--blue" href="<?php the_permalink(); ?>">Expand &raquo;</a></p>
        </div>
      </div>
    <?php endwhile; ?>
  </div><!-- class="portfolio-grid" -->


<!-- PAGINATION -->
<?php
  echo paginate_links(array(
    'prev_text'     => __('<< Previus'),
    'next_text'     => __('Next >>'),
    'type'          => 'plain'
  ));
?>

</div><!-- class="container container--narrow page-section" -->


<?php get_footer(); ?>
