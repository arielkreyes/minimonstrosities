<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" />
    <?php wp_head(); //this is a hook. required for plugins admin bar to work ?>
    <link href="https://fonts.googleapis.com/css?family=Dosis:300,400,600,700|Rochester" rel="stylesheet" />
  </head>
  <body <?php body_class(); ?>>
      <header role="banner" id="header">
        <div class="header-bar">
        <?php
        if(function_exists('the_custom_logo')){
          if( has_custom_logo()){
            the_custom_logo();
          }else{
            //show title of the website
            ?>
            <h1 class="site-title"><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
            <?php
          }//end of else statement
        }//end of function_exists
        ?>
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" class="header-image" alt=""/>
        <?php wp_nav_menu( array(
          'theme_location' => 'main_menu',
          'container' => 'nav', //div, nav or false
          'menu_class' => 'menu', //ul class="menu"
        )); ?>
        </div>
      </header>
    <div class="wrapper">
