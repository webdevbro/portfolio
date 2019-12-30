<?php
/* SETUP FUNCTIONS */
if (!function_exists('webdevbro_setup')) {
  function webdevbro_setup() {
    add_theme_support('title-tag');
    /* post thumbnails in posts and pages */
    add_theme_support('post-thumbnails');
    add_image_size('portfolio_square', 500, 500, array('center', 'center'));
    add_image_size('portfolio_feat', 800, 500, array('center', 'center'));
    /* menus */
    register_nav_menus(array(
      'top' => esc_html('Top Menu', 'webdevbro'),
      'social' => esc_html('Social Menu', 'webdevbro')
    ));
    /* valid HTML5 markup */
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption'
    ));
    /* custom logo */
    add_theme_support('custom-logo', array(
      'height' => 250,
      'width' => 250,
      'flex-width' => true,
      'flex-height' => true
    ));
  }
}
add_action('after_setup_theme', 'webdevbro_setup');

/* SCRIPTS */
function webdevbro_scripts() {

  /* BOOTSTRAP */
  // bootstrap css
  // wp_enqueue_style('webdevpro-bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');
  // bootstrap js
  // wp_enqueue_script('webdevbro-bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js', array('jquery'), microtime(), true);
  // bootstrap popper
  // wp_enqueue_script('popper-js', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), microtime(), true);

  // MAIN STYLES
  wp_enqueue_style('webdevbro-styles', get_stylesheet_uri());

  /* superslides */
  wp_enqueue_script('webdevbro-superslides', get_template_directory_uri() . '/js/libs/superslides.js', array('jquery'), microtime(), true);
  /* typed js */
  wp_enqueue_script('webdevbro-typed', get_template_directory_uri() . '/js/libs/typed.js', array('jquery'), microtime(), true);
  /* owl carousel */
  // wp_enqueue_script('webdevbro-owlcarousel', get_template_directory_uri() . '/js/libs/owlcarousel.js', array('jquery'), microtime(), true);
  /* easy pie chart */
  // wp_enqueue_script('webdevbro-easypiechart', get_template_directory_uri() . '/js/libs/easypiechart.js', array('jquery'), microtime(), true);
  /* isotope */
  // wp_enqueue_script('webdevbro-isotope', get_template_directory_uri() . '/js/libs/isotope.js', array('jquery'), microtime(), true);
  /* fancybox js */
  // wp_enqueue_script('webdevbro-fancybox-js', get_template_directory_uri() . '/js/libs/fancybox.js', array('jquery'), microtime(), true);
  /* fancybox css */
  // wp_enqueue_style('webdevbro-fancybox-css', get_template_directory_uri() . '/css/libs/fancybox.css');
  /* bundle scripts */
  wp_enqueue_script('webdevbro-scripts', get_template_directory_uri() . '/js/scripts-bundled.js', NULL, microtime(), true);
  /* google fonts */
  wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Blinker:100,200,300,400,600&display=swap');
  /* font awesome */
  wp_enqueue_script('webdevbro-font-awesome', 'https://kit.fontawesome.com/55c12c7cbf.js');
  /* REST API function */
  wp_localize_script('webdevbro-scripts', 'webdevbroData', array(
    'root_url'      => get_site_url(),
  ));
}
add_action('wp_enqueue_scripts', 'webdevbro_scripts');

/* CUSTOM POST TYPES */
function webdevbro_post_types() {
  // PORTFOLIO POST TYPE
  register_post_type('portfolio', array(
    'supports'   => array('title', 'editor', 'excerpt'),
    'has_archive'   => true,
    'public'  => true,
    'labels'  => array(
      'name'  => 'Portfolio',
      'add_new_item'  => 'Add new Portfolio item',
      'edit_item'     => 'Edit Portfolio item',
      'all_items'     => 'All Portfolio items',
      'singular_name' => 'Portfolio'
    ),
    'menu_icon' => 'dashicons-portfolio',
    /* 'show_in_rest'    => true,
    'supports'        => array('editor') */
  ));

  // PORTFOLIO TAXONOMY
  $labels = array(
    'name'            => 'Topics',
    'singular_name'   => 'Topic',
    'search_items'    => 'Search Topics',
    'all_items'       => 'All Topics',
    'edit_item'       => 'Edit Topic',
    'update_item'     => 'Update Topic',
    'add_new_item'    => 'Add New Topic',
    'new_item_name'   => 'New Topic Name',
    'menu_name'       => 'Topics'
  );
  $args = array(
    'hierarchical'    => true,
    'labels'          => $labels,
    'show_ui'         => true,
    'show_admin_column' => true,
    'query_var'        => true,
    'rewrite'          => array('slug' => 'topic')
  );
  register_taxonomy('topics', 'portfolio', $args);


}
add_action('init', 'webdevbro_post_types');

/* BANNER FOR INTERNAL PAGES */
function page_banner($args = null) {
  if (!$args['title']) {
    $args['title'] = get_the_title();
  }
  if (!$args['subtitle']) {
    $args['subtitle'] = get_field('page_banner_subtitle');
  }
  if ($args['photo'] == "" || !$args['photo']) {
    $args['photo'] = get_theme_file_uri('/images/bg/header_banner.jpg');
  }

?>
  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>)"></div>
    <div class="page-banner__content container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
      <div class="page-banner__intro"><?php echo $args['subtitle']; ?></div>
    </div>
  </div>
<?php
}
