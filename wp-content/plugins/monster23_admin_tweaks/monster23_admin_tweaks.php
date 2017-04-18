<?php
/*
 * Plugin Name: Monster23 Admin Tweaks
 * Description: Customizes the Login Form, Register form, and Admin Screens
 * Author: Ariel Aguilar
 * Version: 0.1
 * License: GPLv3
 */
 // Save Zis Shit for My Website Yo!
 /**
   * TODO: Must be Logged IN to view the website otherwise register and wait for confirmation code from admin aka ME >:)
   * Style the Login, Register, and Forgot Password Fomrs with an external stylesheet ^_^
   */

function monster23_login_style(){
  $style_url  = plugins_url('css/login.css',  __FILE__);
  //put zis on ze page // handle, url
  wp_enqueue_style( 'login_css', $style_url );
}
add_action('login_enqueue_scripts', 'monster23_login_style');

//change the "wordpress.org" link on the logo
function  monster23_login_logo_link(){
  return home_url();
}
add_filter( 'login_headerurl', 'monster23_login_logo_link');

//change the tooltip on the login logo
function monster23_login_logo_title(){
  return 'Go Back To ' .  get_bloginfo( 'name' );
}
add_filter('login_headertitle', monster23_login_logo_title);
function monster23_modify_toolbar($wp_admin_bar){
 //get rid of wordpress logo and its dropdown menu
 $wp_admin_bar->remove_node('wp-logo');
 //add our own 'help' Button
}
add_action( 'admin_bar_menu', 'monster23_modify_toolbar', 999);
/*
 * Remove Unwanted Dashboard Widgets and Add My Own
 */
function monster23_dashboard_widgets(){
  //id of the box, screen located on, column
  //remove widget boxes using parameters above
  remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
  remove_meta_box('dashboard_primary', 'dashboard', 'side');
  //$id, $title, $callback, $screen, $context, $priority, $callback_args
  //add widget boxes here using parameters above
}
add_action('admin_init', 'monster23_dashboard_widgets');

/*
 *== REGISTRATION FORM THINGS
 */
//1.Add the new form elements
add_action('register_form', 'monster23_register_form');
function monster23_register_form(){
  //add first name field
  $first_name = ( ! empty( $_POST['first_name'])) ? trim( $_POST['first_name']) : '';
  ?>
  <label for="first_name"><?php _e( 'First Name', 'mydomain' ) ?><br />
  <input type="text" name="first_name" id="first_name" class="input" value="<?php echo esc_attr( wp_unslash( $first_name ) ); ?>" size="25" /></label>
  </p>
  <?php
  //last name field
  $last_name = ( ! empty( $_POST['last_name'])) ? trim( $_POST['last_name']) : '';
  ?>
  <label for="last_name"><?php _e( 'Last Name', 'mydomain' ) ?><br />
  <input type="text" name="last_name" id="last_name" class="input" value="<?php echo esc_attr( wp_unslash( $last_name ) ); ?>" size="25" /></label>
  </p>
  <?php
  //password field
  $user_pass = ( ! empty( $_POST['user_pass'])) ? trim( $_POST['user_pass']) : '';
  ?>
  <label for="user_pass"><?php _e( 'Create Password', 'mydomain' ) ?><br />
  <input type="text" name="user_pass" id="user_pass" class="input" value="<?php echo esc_attr( wp_unslash( $user_pass ) ); ?>" size="25" /></label>
  </p>
  <?php
}//end of monster23_register_form
//2.Add Validation. All fields are required.
add_filter('registration_errors', 'monster23_registration_errors', 10, 3);
function monster23_registration_errors($errors, $sanitized_user_login, $user_email){
  //first name field
  if( empty($_POST['first_name']) || ! empty($_POST['first_name']) && trim($_POST['first_name']) == ''){
    $errors->add('first_name_error', __('<strong>ERROR</strong> : You Must Include A First Name.', 'mydomain'));
  }
  return $errors;
  //last name field
  if( empty($_POST['last_name']) || ! empty($_POST['last_name']) && trim($_POST['last_name']) == ''){
    $errors->add('last_name_error', __('<strong>ERROR</strong> : You Must Include A Last Name.', 'mydomain'));
  }
  return $errors;
  //password field
  if( empty($_POST['user_pass']) || ! empty($_POST['user_pass']) && trim($_POST['user_pass']) == ''){
    $errors->add('user_pass_error', __('<strong>ERROR</strong> : You Must Create A Password.', 'mydomain'));
  }
  return $errors;
}//end of mosnter23_registration_errors
//3.Save the extra Registration User Meta.
add_action('user_register', 'monster23_user_register');
function monster23_user_register($user_id){
  if( ! empty($_POST['first_name'])){
    update_user_meta($user_id,'first_name', trim($_POST['first_name']));
  }
  if( ! empty($_POST['last_name'])){
    update_user_meta($user_id,'last_name', trim($_POST['last_name']));
  }
  if( ! empty($_POST['user_pass'])){
    update_user_meta($user_id,'user_pass', trim($_POST['user_pass']));
  }
}//end of mosnter23_user_register









//TODO: Edit the user interface for ze contributors :) (mom and peoples) :)
