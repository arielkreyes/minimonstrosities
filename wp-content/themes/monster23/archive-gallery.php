<?php get_header(); //includes the header.php - wp function ?>
<main id="content">
  <h2><?php wp_title(''); ?></h2>
  <!--Insert "the Loop" Here!  -->
  <?php if( have_posts() ){
    while( have_posts() ){
      the_post();
      ?>
      <article class="gallery">
        <?php get_the_post_thumbnail('thumbnail'); ?>
        <div class="entry-content">
          <?php the_date(); ?>
        </div>
      </article>
      <!-- End of ze Post -->
      <?php
    } //end of while loop
  } //end of if statement
  else{
    echo 'Sorry, no posts to show';
  } ?>
</main>
<!-- end of main#content ^_^  -->
<?php get_sidebar();//including the sidebar :) ?>
<?php get_footer();//including the footerrr :D ?>
