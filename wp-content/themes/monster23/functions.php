<?php
//turn on sleeping features

//adding support for a featured image
add_theme_support('post-thumbnails');

//adding a logo to the theme. 'custom_logo()'
add_theme_support( 'custom-logo', array(
  'width'   =>  319,
  'height'  =>  140,
));

//adding a customizable header image *don't forget to show it in the header.php file :)
add_theme_support('custom-header', array(
  'width' =>  960,
  'height'  =>  500,
  'flex-width'  =>  true,
  'flex-height' => true,
));

//adding a customizable Background
add_theme_support('custom-background');

//creates a post format for the gallery and its images
add_theme_support('post-formats', array('image', 'video'));

//improving RSS Fed Links. *required since a blog is utilized
add_theme_support('automatic-feed-links');

//improve title tag for SEO(feeds google :D) and inserts using the wp_head(); & *remember to remove the <title> from header.php
add_theme_support('title-tag');

//improve the markup of Wordpress generated code
add_theme_support('html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption',));


/**
  *Create two menu locations. Display them with wp_nav_menu() in your templates
*/
function monster23_menus(){
  register_nav_menus( array(
    'main_menu' => 'Main Navigation',
    'utility_menu' => 'Utility Menu',
  ));
}
add_action( 'init', 'monster23_menus');

/*
 *==REGISTER WIDGET AREAS(Dynamic Sidebars)
 * Call dynamic_sidebar() in ze templates to display them :)
 */
 function monster23_widget_areas(){
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
   register_sidebar( array(
     'name' => 'Login Area',
     'id' => 'login-area',
     'description'  =>  'Login Page - User must be logged in to view the website',
     'before_widget'  =>  '<nav id="%S1s" class="widget %2$s"',
     'before_title' =>  '<h3 class="widgettitle">',
     'after_title'  =>  '</h3>',
     'after_widget' =>  '</nav>',
   ));
 }//end of function aka_widget_areas
 add_action('widgets_init', 'monster23_widget_areas');

 /*
  *==USER REGISTRATION FORM
  */
//1.adding the form elements!
add_action( 'register_form', 'monster23_register_form');
function monster23_register_form(){
  $first_name = ( ! empty( $_POST['first_name'])) ? trim($_POST['first_name']) : '';
  $last_name = ( ! empty( $_POST['last_name'])) ? trim($_POST['last_name']) : '';

  ?>
  <p>
    <label for="first_name">First Name<br/>
      <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr(wp_unslash($first_name)); ?>" size="40"/></label>
  </p>
  <p>
    <label for="last_name">Last Name<br/>
      <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr(wp_unslash($last_name)); ?>" size="40"/></label>
  </p>
  <?php
}
//2.add validation. Make sure required elements are inputted by user
add_filter('registration_errors', 'monster23_registration_errors', 10, 3);
function monster23_registration_errors($errors, $sanitized_user_login, $user_email){
  if(empty($_POST['first_name']) || ! empty($_POST['first_name']) && trim($_POST['first_name']) == ''){
    $errors->add('first_name_error', _('<strong>ERROR</strong>: You Must Include a First Name.', 'mydomain'));
  }
    return $errors;

  if(empty($_POST['last_name']) || ! empty($_POST['last_name']) && trim($_POST['last_name']) == ''){
    $errors->add('last_name_error', _('<strong>ERROR</strong>: You Must Include a Last Name.', 'mydomain'));
  }
    return $errors;
  }
  //3. Finally, save our extra registration user meta in ze database?
  add_action('user_register', 'monster23_user_register');
  function monster23_user_register($user_id){
    if(! empty($_POST['first_name'])){
      update_user_meta($user_id, 'first_name', trim($_POST['first_name']));
    }
    if(! empty($_POST['last_name'])){
      update_user_meta($user_id, 'last_name', trim($_POST['last_name']));
    }
  }
