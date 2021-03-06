<?php
//turn on sleeping features
  //adding support for a featured image for multiple post types listed
add_theme_support('post-thumbnails', array('post', 'gallery', 'video'));

//adding a logo to the theme. 'custom_logo()'
add_theme_support( 'custom-logo', array(
  'width'   =>  200,
  'height'  =>  50,
));

//1.adding a customizable header image *don't forget to show it in the header.php file :)
add_theme_support('custom-header', array(
  'width' =>  1366,
  'flex-width'  =>  true,
  'height'  =>  400,
  'flex-height' => true,
  'default-image' =>  get_template_directory_uri() . '/images/headers/default.jpg',
  'uploads' =>  true,
));
//2.register the default header image
register_default_headers( array(
  'explore' => array(
    'url' =>  '%s/images/headers/default.jpg',
    'thumbnail_url' =>  '%s/images/headers/default-thumbnail.jpg',
    'description' =>  __('Explore', 'monster23'),
  )
));
//adding a customizable Background
add_theme_support('custom-background');

//creates a post format for the gallery and its images
add_theme_support('post-formats', array('gallery', 'image', 'video'));

//improving RSS Fed Links. *required since a blog is utilized
add_theme_support('automatic-feed-links');

//improve title tag for SEO(feeds google :D) and inserts using the wp_head(); & *remember to remove the <title> from header.php
add_theme_support('title-tag');

//improve the markup of Wordpress generated code
add_theme_support('html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption',));

//changing the excerpt length and customization
function monster23_excerpt_length($length){
  //short Excerpt for Search Results!
  if( is_search()){
  return 20; //words yo
}else{
  return 40; //words for blog
  }
}
add_filter('excerpt_length', 'monster23_excerpt_length');

//improving UX of replying to comments
function monster23_comments_reply(){
  wp_enqueue_script('comment_reply');
}
add_action('wp_enqueue_scripts', 'monster23_comments_reply');
/*
 * Registering new font awesome script
 */
function monster23_scripts(){
  wp_enqueue_script('font-awesome','https://use.fontawesome.com/ea07c8ffc1.js', array(), '4.7.0', true );
}
add_action('wp_enqueue_scripts', 'monster23_scripts');
/*
 *Helper function to handle pagination. Call in any template file.
 */
function monster23_pagination(){
if(! is_singular()){
  //archive pagination
  if(function_exists('the_posts_pagination')){
    the_posts_pagination();
  }else{
    echo '<div class="pagination">';
    previous_post_link('<i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i>');
    next_post_link('<i class="fa fa-arrow-right" aria-hidden="true"></i>');
    echo '</div>';
  }
}else{
  //single pagination
  echo '<div class="pagination">';
  previous_post_link('%link', '<i class="fa fa-arrow-left fa-2x" aria-hidden="true"></i>');//one Older post
  next_post_link('%link', '<i class="fa fa-arrow-right fa-2x" aria-hidden="true"></i>');
  echo '</div>';
}
}//end of monster23_pagination

/**
  *Create two menu locations. Display them with wp_nav_menu() in your templates
*/
function monster23_menus(){
  register_nav_menus( array(
    'main_menu' => 'Main Navigation',
    'utility_menu' => 'Utility Menu',
    'footer_menu' =>  'Footer Menu',
  ));
}
add_action( 'init', 'monster23_menus');

/*
 *==REGISTER WIDGET AREAS(Dynamic Sidebars)
 * Call dynamic_sidebar() in ze templates to display them :)
 */
 function monster23_widget_areas(){
   register_sidebar( array(
     'name' =>  'Home Sidebar',
     'id' =>  'home-sidebar',
     'description'  => 'Appears on the Home Page only, showing the users login success and search widget.',
     'before_widget'  =>  '<section id="%S1s" class="widget %2$s">',
     'before_title' =>  '<h3 class="widgettitle">',
     'after_title'  =>  '</h3>',
     'after_widget' =>  '</section>',
   ));
   register_sidebar( array(
     'name' =>  'Home Blurb Area',
     'id' =>  'blurbs-sidebar',
     'description'  => 'Appears on the Home Page only, showing the users the most recent uploads and gallery imports. Max three at a time!',
     'before_widget'  =>  '<section id="%S1s" class="widget %2$s">',
     'before_title' =>  '<h3 class="widgettitle">',
     'after_title'  =>  '</h3>',
     'after_widget' =>  '</section>',
   ));
   register_sidebar( array(
     'name' => 'Blog Sidebar',
     'id' => 'blog-sidebar',
     'description'  =>  'Appears next to blog and archive pages',
     'before_widget'  =>  '<section id="%S1s" class="widget %2$s"',
     'before_title' =>  '<h3 class="widgettitle">',
     'after_title'  =>  '</h3>',
     'after_widget' =>  '</section>',
   ));
   register_sidebar( array(
     'name' => 'Event Sidebar',
     'id' => 'event-sidebar',
     'description'  =>  'Appears next to events and important dates pages',
     'before_widget'  =>  '<section id="%S1s" class="widget %2$s"',
     'before_title' =>  '<h3 class="widgettitle">',
     'after_title'  =>  '</h3>',
     'after_widget' =>  '</section>',
   ));
 }//end of function monster23_widget_areas
 add_action('widgets_init', 'monster23_widget_areas');
 /**
  * CUSTOMIZATION API Additions - custom colors, fonts, layouts, etc....
  */
add_action('customize_register', 'monster23_customizer');
function monster23_customizer( $wp_customize ){
  //register all sections, settings, and controls here:
  //TODO: Do I need to add a third logo to display a thumbnail version of the primary logo???*
  //adding Second custom logo!
  $wp_customize->add_setting('secondary_logo');

  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'secondary_logo_control', array(
    'label' =>  'Secondary Logo',
    'section' =>  'title_tagline', //built in 'site identity' section
    'settings'  =>  'secondary_logo',
  )));
  //adding Second custom logo!
  $wp_customize->add_setting('tertiary_logo');

  $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'tertiary_logo_control', array(
    'label' =>  'Tertiary Logo',
    'section' =>  'title_tagline', //built in 'site identity' section
    'settings'  =>  'tertiary_logo',
    'context' =>  'alt text',
  )));
  //adding layout options (custom header size?)
  $wp_customize->add_section('monster23_layout', array(
    'title' =>  'Layout',
    'capability'  =>  'edit_theme_options',
    'priority'  =>  100,
  ));
  $wp_customize->add_setting('header_size', array(
    'default' =>  'large',
  ));
  $wp_customize->add_control( new WP_Customize_Control($wp_customize, 'header_size_control', array(
    'label'     =>  'Header Height',
    'section'   =>  'monster23_layout',
    'settings'  =>  'header_size',
    'type'      =>  'radio',
    'choices'   =>  array(
        'small'   =>  'Small',
        'medium'  =>  'Medium',
        'large'   =>  'Large',
    ),
  )));
}//end of monster23_customizer
/**
  * Customized CSS - This displays ze customizer changes
  */
add_action( 'wp_head', 'monster23_custom_css');
function monster23_custom_css(){
  switch(get_theme_mod('header_size')){
    case 'small':
      $size = '20vh';
    break;
    case 'medium':
      $size = '30vh';
    break;
    default:
      $size = '40vh';
  }//end of switch
  ?>
  <style type="text/css">
  @media screen and (min-width: 700px){
    #header{
      min-height: <?php echo $size; ?>;
    }
  }
  </style>
  <?php
}//end of monster23_custom_css

/**
  * HELPER Functions to show custom secondary & tertiary logos
  */
function monster23_secondary_logo(){
   //wp stores as an attachment post :)
   $logo = get_theme_mod( 'secondary_logo');
   if($logo){
    echo '<img src="' . $logo . '" alt="" />';
  }
}//end of monster23_seondary_logo

function monster23_tertiary_logo(){
   $logo = get_theme_mod( 'tertiary_logo');
  if($logo){
   echo '<img src="' . $logo . '" alt="" />';
  }
}//end of monster23_tertiary_logo
