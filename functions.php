<?php

// header menu
add_action('after_setup_theme', function () {
    register_nav_menus([
      'primary_menu' => __('Primary Menu', 'gps-theme'),
    ]);
});


// footer menu
function register_footer_menus() {
  register_nav_menus([
    'footer_menu_products'  => __('Footer Menu Products', 'haldinbiotech'),
    'footer_menu_solutions' => __('Footer Menu Solutions', 'haldinbiotech'),
    'footer_menu_company'   => __('Footer Menu Company', 'haldinbiotech'),
  ]);
}
add_action('after_setup_theme', 'register_footer_menus');

// dropdown header menu
require get_template_directory() . '/inc/class-bootstrap-navwalker.php';

function gps_enqueue_assets() {

    /* Bootstrap CSS */
    wp_enqueue_style(
      'bootstrap-css',
      'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css',
      [],
      '5.3.2'
    );
  
    /* Font Awesome 5 */
    wp_enqueue_style(
      'fontawesome-5',
      'https://use.fontawesome.com/releases/v5.15.4/css/all.css',
      [],
      '5.15.4'
    );

    /* Theme Style */
    wp_enqueue_style(
      'gps-style',
      get_stylesheet_uri(),
      ['bootstrap-css', 'fontawesome-5'],
      '1.0'
    );
  
    /* Bootstrap JS */
    wp_enqueue_script(
      'bootstrap-js',
      'https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js',
      [],
      '5.3.2',
      true
    );
  
  }
  add_action('wp_enqueue_scripts', 'gps_enqueue_assets');
  
//   Swipper JS Slide Carousel
function gps_enqueue_swiper() {

    // Swiper CSS
    wp_enqueue_style(
      'swiper-css',
      'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.css',
      [],
      '12.0'
    );
  
    // Swiper JS
    wp_enqueue_script(
      'swiper-js',
      'https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js',
      [],
      '12.0',
      true // FOOTER
    );
  
    // Init Swiper (custom)
    wp_enqueue_script(
      'swiper-init',
      get_template_directory_uri() . '/js/swiper-init.js',
      ['swiper-js'], // ← PENTING
      '1.0',
      true
    );
  }
  add_action('wp_enqueue_scripts', 'gps_enqueue_swiper');
  

//   google fonts
function gps_enqueue_google_fonts() {

    wp_enqueue_style(
      'google-font-cabin',
      'https://fonts.googleapis.com/css2?family=Cabin:ital,wght@0,400..700;1,400..700&display=swap',
      [],
      null
    );

  
  }
add_action('wp_enqueue_scripts', 'gps_enqueue_google_fonts');


add_filter('allowed_block_types_all', function ($allowed_blocks, $editor_context) {
  return true; // allow ALL Gutenberg blocks
}, 10, 2);

// featured image gutenberg
add_theme_support('post-thumbnails', ['post', 'page']);
add_action('after_setup_theme', function () {
  add_theme_support('post-thumbnails');
});


function gpslands_theme_setup() {
  add_theme_support('editor-styles');
  add_theme_support('wp-block-styles');
  add_theme_support('align-wide');
}
add_action('after_setup_theme', 'gpslands_theme_setup');


// SVG UPload
function allow_svg_upload($mimes) {
  $mimes['svg']  = 'image/svg+xml';
  $mimes['svgz'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'allow_svg_upload');



function gps_extract_images_from_blocks($blocks, &$results = []) {
  foreach ($blocks as $block) {

    if ($block['blockName'] === 'core/image' && !empty($block['attrs']['id'])) {

      $img_id = $block['attrs']['id'];
      $link   = null;
      $caption = '';

      $html = render_block($block);

      // ambil link
      if (preg_match('/<a[^>]+href=["\']([^"\']+)["\']/', $html, $matches)) {
        $link = $matches[1];
      }

      // ambil caption dari figcaption
      if (preg_match('/<figcaption[^>]*>(.*?)<\/figcaption>/', $html, $cap)) {
        $caption = wp_strip_all_tags($cap[1]);
      }

      $results[] = [
        'id'      => $img_id,
        'link'    => $link,
        'caption' => $caption
      ];
    }

    if (!empty($block['innerBlocks'])) {
      gps_extract_images_from_blocks($block['innerBlocks'], $results);
    }
  }

  return $results;
}



// remove wp footer
function remove_footer_admin () {
  echo '';
}
add_filter('admin_footer_text', 'remove_footer_admin');


// Remove update notifications nag
remove_action('admin_notices', 'update_nag', 3);


// Languange Switcher
function gpslands_enqueue_lang_script() {

  wp_enqueue_script(
      'gpslands-lang', 
      get_template_directory_uri() . '/js/lang.js',
      array(), 
      '1.0.0', 
      true 
  );

}
add_action('wp_enqueue_scripts', 'gpslands_enqueue_lang_script');

function gpslands_enqueue_custom_styles() {

  // Responsive CSS
  wp_enqueue_style(
      'gpslands-responsive',
      get_template_directory_uri() . '/css/responsive.css',
      array('gps-style'), // load setelah main style
      filemtime(get_template_directory() . '/css/responsive.css')
  );

  // Animation CSS
  wp_enqueue_style(
      'gpslands-animation',
      get_template_directory_uri() . '/css/animation.css',
      array('gps-style'),
      filemtime(get_template_directory() . '/css/animation.css')
  );

}
add_action('wp_enqueue_scripts', 'gpslands_enqueue_custom_styles');

// vendor animation
function gpslands_enqueue_aos() {

  wp_enqueue_style(
      'aos-css',
      'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css',
      array(),
      '2.3.4'
  );

  wp_enqueue_script(
      'aos-js',
      'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js',
      array(),
      '2.3.4',
      true
  );

  wp_add_inline_script(
      'aos-js',
      'document.addEventListener("DOMContentLoaded", function(){ AOS.init({ duration: 800, once: true }); });'
  );

}
add_action('wp_enqueue_scripts', 'gpslands_enqueue_aos');

// Redirect after login
function custom_login_redirect($redirect_to, $request, $user) {

  if (isset($user->roles) && is_array($user->roles)) {

      // Jika admin
      if (in_array('administrator', $user->roles)) {
          return admin_url('upload.php');
      }

      // Jika editor
      if (in_array('editor', $user->roles)) {
          return admin_url('upload.php');
      }

  }

  return $redirect_to;
}
add_filter('login_redirect', 'custom_login_redirect', 10, 3);
// Redirect dashboard to media page
function redirect_dashboard_to_media() {
  global $pagenow;

  if (is_admin() && $pagenow == 'index.php') {
      wp_redirect(admin_url('upload.php'));
      exit;
  }
}
add_action('admin_init', 'redirect_dashboard_to_media');