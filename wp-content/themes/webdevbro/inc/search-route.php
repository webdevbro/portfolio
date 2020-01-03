<?php
add_action("rest_api_init", "webdevbroRegisterSearch");
function webdevbroRegisterSearch() {
  register_rest_route("webdevbro/v1", "search", array(
    'methods'   => WP_REST_SERVER::READABLE,
    'callback'  => 'webdevbroSearchResults'
  ));
}
function webdevbroSearchResults($data) {
  $mainQuery = new WP_Query(array(
    'post_type' => array('post', 'page', 'portfolio', 'tutorial'),
    's'         => sanitize_text_field( $data["term"])
  ));
  $results = array(
    'miscContent' => array(),
    'portfolio'   => array(),
    'tutorial'   => array()
  );
  while ($mainQuery->have_posts()) {
    $mainQuery->the_post();
    if (get_post_type() == "post" || get_post_type() == "page") {
      array_push($results["miscContent"], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink(),
        'postType'  => get_post_type(),
        'authorName'  => get_the_author(),
        'authorUrl' => get_the_author_link()
      ));
    }
    if (get_post_type() == "portfolio") {
      array_push($results["portfolio"], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink()
      ));
    }
    if (get_post_type() == "tutorial") {
      array_push($results["tutorial"], array(
        'title' => get_the_title(),
        'permalink' => get_the_permalink()
      ));
    }

  }
  return $results;
}



/* dasdasdads */


?>
