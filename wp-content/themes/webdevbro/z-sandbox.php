<?php
/* template tags */
add_theme_support('title-tag');
/* post thumbnails in posts and pages */
add_theme_support('post-thumbnails');
add_image_size('portfolio_square', 500, 500, array('center', 'center'));
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
?>


<img src="<?php echo get_theme_file_uri("/images/icons/next-w.png"); ?>" width="50">
<img src="<?php echo get_theme_file_uri("/images/icons/prev-w.png"); ?>" width="50">

<a href="#" class="next" style="background-image: url(<?php echo get_theme_file_uri('images/icons/next-w.png'); ?>)"></a>
<a href="#" class="prev" style="background-image: url(<?php echo get_theme_file_uri('images/icons/prev-w.png'); ?>)"></a>


<!-- PORTFOLIO NEW -->

<li onclick="" class="htmlcss php">
    <div class="item">
        <img src="<?php echo get_theme_file_uri('/images/portfolio/portfolio1-thumb.jpg'); ?>" alt="HTML & CSS examples" width="250" height="250">
        <div class="icons">
        <a href="<?php echo get_theme_file_uri('/images/portfolio/portfolio1-full.jpg'); ?>" title="View image" class="openButton" data-fancybox data-caption="This is the sample picture"><i class="fa fa-search"></i></i></a>
        <a href="#" class="projectLink" target="_blank"><i class="fa fa-link"></i></i></a>
        </div><!-- class="icons" -->
        <div class="imageOverlay"></div>
    </div>
</li>

<li onclick="" class="htmlcss php">
    <div class="item">
        <img src="<?php echo get_theme_file_uri('/images/portfolio/portfolio2-thumb.jpg'); ?>" alt="HTML & CSS examples" width="250" height="250">
        <div class="icons">
        <a href="<?php echo get_theme_file_uri('/images/portfolio/portfolio2-full.jpg'); ?>" title="View image" class="openButton" data-fancybox data-caption="This is the sample picture"><i class="fa fa-search"></i></i></a>
        <a href="#" class="projectLink" target="_blank"><i class="fa fa-link"></i></i></a>
        </div>
        <div class="imageOverlay"></div>
    </div>
</li>

<li onclick="" class="php">
    <div class="item">
        <img src="<?php echo get_theme_file_uri('/images/portfolio/portfolio3-thumb.jpg'); ?>" alt="HTML & CSS examples" width="250" height="250">
        <div class="icons">
        <a href="<?php echo get_theme_file_uri('/images/portfolio/portfolio3-full.jpg'); ?>" title="View image" class="openButton" data-fancybox data-caption="This is the sample picture"><i class="fa fa-search"></i></i></a>
        <a href="#" class="projectLink" target="_blank"><i class="fa fa-link"></i></i></a>
        </div>
        <div class="imageOverlay"></div>
    </div>
</li>

<li onclick="" class="js node">
    <div class="item">
        <img src="<?php echo get_theme_file_uri('/images/portfolio/siobhan-thumb.png'); ?>" alt="Social Media App based on Node.js, Express and MongoDB" width="250" height="250">
        <div class="icons">
        <a href="<?php echo get_theme_file_uri('/images/portfolio/siobhan-full.png'); ?>" title="View image" class="openButton" data-fancybox data-caption="Social Media App based on Node.js, Express and MongoDB"><i class="fa fa-search"></i></i></a>
        <a href="localhost:3000" class="projectLink" target="_blank"><i class="fa fa-link"></i></i></a>
        </div>
        <div class="imageOverlay"></div>
    </div>
</li>

<li onclick="" class="htmlcss js php">
    <div class="item">
        <img src="<?php echo get_theme_file_uri('/images/portfolio/portfolio5-thumb.jpg'); ?>" alt="HTML & CSS examples" width="250" height="250">
        <div class="icons">
        <a href="<?php echo get_theme_file_uri('/images/portfolio/portfolio5-full.jpg'); ?>" title="View image" class="openButton" data-fancybox data-caption="This is the sample picture"><i class="fa fa-search"></i></i></a>
        <a href="#" class="projectLink" target="_blank"><i class="fa fa-link"></i></i></a>
        </div>
        <div class="imageOverlay"></div>
    </div>
</li>

<li onclick="" class="htmlcss">
    <div class="item">
        <img src="<?php echo get_theme_file_uri('/images/portfolio/portfolio6-thumb.jpg'); ?>" alt="HTML & CSS examples" width="250" height="250">
        <div class="icons">
        <a href="<?php echo get_theme_file_uri('/images/portfolio/portfolio6-full.jpg'); ?>" title="View image" class="openButton" data-fancybox data-caption="This is the sample picture"><i class="fa fa-search"></i></i></a>
        <a href="#" class="projectLink" target="_blank"><i class="fa fa-link"></i></i></a>
        </div>
        <div class="imageOverlay"></div>
    </div>
</li>

<!-- PORTFOLIO OLD -->
<div class="portfolio__content--wrap">
    <ul class="grid">
        <li class="grid-item">
            <div>
                <img src="<?php echo get_theme_file_uri('/images/portfolio/portfolio1-thumb.jpg'); ?>" alt="HTML & CSS examples">
                <div class="icons">
                    <a href="<?php echo get_theme_file_uri('/images/portfolio/portfolio1-full.jpg'); ?>" title="View image" class="openButton" data-fancybox data-caption="This is the sample picture"><i class="fa fa-search"></i></i></a>
                    <a href="#" class="projectLink" target="_blank"><i class="fa fa-link"></i></i></a>
                </div>
            </div>
        </li>
        <li class="grid-item">
            <div class="">
                <img src="<?php echo get_theme_file_uri('/images/portfolio/portfolio2-thumb.jpg'); ?>" alt="HTML & CSS examples">
                <div class="icons">
                    <a href="<?php echo get_theme_file_uri('/images/portfolio/portfolio2-full.jpg'); ?>" title="View image" class="openButton" data-fancybox data-caption="This is the sample picture"><i class="fa fa-search"></i></i></a>
                    <a href="#" class="projectLink" target="_blank"><i class="fa fa-link"></i></i></a>
                </div>
            </div>
        </li>
        <li class="grid-item">
            <div>
                <img src="<?php echo get_theme_file_uri('/images/portfolio/portfolio3-thumb.jpg'); ?>" alt="HTML & CSS examples">
                <div class="icons">
                    <a href="<?php echo get_theme_file_uri('/images/portfolio/portfolio3-full.jpg'); ?>" title="View image" class="openButton" data-fancybox data-caption="This is the sample picture"><i class="fa fa-search"></i></i></a>
                    <a href="#" class="projectLink" target="_blank"><i class="fa fa-link"></i></i></a>
                </div>
            </div>
        </li>
        <li class="grid-item">
            <div>
                <img src="<?php echo get_theme_file_uri('/images/portfolio/portfolio4-thumb.jpg'); ?>" alt="HTML & CSS examples">
                <div class="icons">
                    <a href="<?php echo get_theme_file_uri('/images/portfolio/portfolio4-full.jpg'); ?>" title="View image" class="openButton" data-fancybox data-caption="This is the sample picture"><i class="fa fa-search"></i></i></a>
                    <a href="#" class="projectLink" target="_blank"><i class="fa fa-link"></i></i></a>
                </div>
            </div>
        </li>
        <li class="grid-item">
            <div>
                <img src="<?php echo get_theme_file_uri('/images/portfolio/portfolio5-thumb.jpg'); ?>" alt="HTML & CSS examples">
                <div class="icons">
                    <a href="<?php echo get_theme_file_uri('/images/portfolio/portfolio5-full.jpg'); ?>" title="View image" class="openButton" data-fancybox data-caption="This is the sample picture"><i class="fa fa-search"></i></i></a>
                    <a href="#" class="projectLink" target="_blank"><i class="fa fa-link"></i></i></a>
                </div>
            </div>
        </li>
        <li class="grid-item">
            <div>
                <img src="<?php echo get_theme_file_uri('/images/portfolio/portfolio6-thumb.jpg'); ?>" alt="HTML & CSS examples">
                <div class="icons">
                    <a href="<?php echo get_theme_file_uri('/images/portfolio/portfolio6-full.jpg'); ?>" title="View image" class="openButton" data-fancybox data-caption="This is the sample picture"><i class="fa fa-search"></i></i></a>
                    <a href="#" class="projectLink" target="_blank"><i class="fa fa-link"></i></i></a>
                </div>
            </div>
        </li>
    </ul>
</div>
