<?php /* SINGLE PORTFOLIO PAGE */ ?>
<?php get_header(); ?>

<!-- BANNER FOR INTERNAL PAGES -->
<?php
  page_banner(array(
    'title'     => "",
    'subtitle'  => "",
    'photo'     => get_theme_file_uri('/images/bg/header_banner.jpg')
  ));
?>

<!-- ABOUT SECTION -->
<div class="container container--narrow page-section">

<?php while (have_posts()) : the_post(); ?>

    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog'); ?>"><i class="fab fa-buffer"></i> Blog Home </a> <span class="metabox__main"> Posted by <?php the_author_posts_link(); ?> on <?php the_time('M j, Y'); ?> in <?php echo get_the_category_list('|'); ?></span></p>
    </div>


    <!-- GENERIC CONTENT -->
    <div class="generic-content">
      <?php the_content(); ?>
    </div>

<?php endwhile; ?>

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

