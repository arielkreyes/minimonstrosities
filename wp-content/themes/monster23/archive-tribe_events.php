<?php 
get_header(); //includes the header.php - wp function 
?>

<main id="content">  
  <h2><?php wp_title(''); ?></h2>
  <!--Insert "the Loop" Here!  -->
  <?php if( have_posts() ){
  while( have_posts() ){
    the_post(); 
  ?>
    <!-- end of main#content ^_^  -->
    <?php 
      } //end of while loop
    } //end of if statement
  else{
  echo 'Sorry, no posts to show';
  } ?>    
</main>
  <?php get_sidebar('event');//including the sidebar :) ?>
  <?php get_footer();//including the footerrr :D ?>
