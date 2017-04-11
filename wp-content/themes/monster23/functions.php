<?php
//turn on sleeping features

//adding support for a featured image for multiple post types listed
add_theme_support('post-thumbnails', array('post', 'gallery', 'video'));

//adding a logo to the theme. 'custom_logo()'
add_theme_support( 'custom-logo', array(
  'width'   =>  200,
  'height'  =>  200,
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
add_theme_support('post-formats', array('image', 'video'));

//improving RSS Fed Links. *required since a blog is utilized
add_theme_support('automatic-feed-links');

//improve title tag for SEO(feeds google :D) and inserts using the wp_head(); & *remember to remove the <title> from header.php
add_theme_support('title-tag');

//improve the markup of Wordpress generated code
add_theme_support('html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption',));

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
    previous_posts_link('&larr; Newer Posts');
    next_posts_link('Older Posts &rarr;');
    echo '</div>';
  }
}else{
  //single pagination
  echo '<div class="pagination">';
  previous_post_link('%link', '<i class="fa fa-arrow-left" aria-hidden="true"></i>Newer Post');//one Older post
  next_post_link('%link', 'Older Posts <i class="fa fa-arrow-right" aria-hidden="true"></i>');
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

 /*
  *==USER REGISTRATION FORM
  */
//1.adding the form elements!
add_action( 'register_form', 'monster23_register_form');
function monster23_register_form(){
  $first_name = ( ! empty( $_POST['first_name'])) ? trim($_POST['first_name']) : '';
  $last_name = ( ! empty( $_POST['last_name'])) ? trim($_POST['last_name']) : '';
  $user_pass = ( ! empty( $_POST['user_pass'])) ? trim($_POST['user_pass']) : '';

  ?>
  <p>
    <label for="first_name">First Name<br/>
      <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr(wp_unslash($first_name)); ?>" size="40"/></label>
  </p>
  <p>
    <label for="last_name">Last Name<br/>
      <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr(wp_unslash($last_name)); ?>" size="40"/></label>
  </p>
  <p>
    <label for="user_pass">Create a Password<br/>
      <input type="password" name="user_pass" id="user_pass" class="input" value="<?php echo esc_attr(wp_unslash($user_pass)); ?>" size="40"/></label>
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

    if(empty($_POST['user_pass']) || ! empty($_POST['user_pass']) && trim($_POST['user_pass']) == ''){
      $errors->add('user_pass_error', _('<strong>ERROR</strong>: You Must Create A Password.', 'mydomain'));
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
