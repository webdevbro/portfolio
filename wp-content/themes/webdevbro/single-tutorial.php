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

<?php
  while (have_posts()) : the_post();
  $image = get_field('feat_image');
  $imageAlt = $image['alt'];
  $imageThumb = $image['sizes']['portfolio_square'];
  $imageFull = $image['sizes']['portfolio_feat'];
?>
  <div class="metabox metabox--position-up metabox--with-home-link">
    <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('tutorial'); ?>"><i class="fab fa-buffer"></i> Tutorials Archive </a> <span class="metabox__main"><?php the_title(); ?></span></p>
  </div>


    <!-- GENERIC CONTENT -->
    <div class="generic-content">
       <img src="<?php echo $image['url']; ?>" alt="<?php echo $imageAlt; ?>">
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

