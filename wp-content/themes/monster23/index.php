<?php get_header(); //includes the header.php - wp function ?>
<main id="content">  
  <h2>Blog</h2>
  <!--Insert "the Loop" Here!  -->
  <?php if( have_posts() ){
  while( have_posts() ){
    the_post(); 
  ?>
    
      <article <?php post_class(); ?>>
        <!-- <img src="" /> -->
          <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <div class="entry-content">
            <?php the_content(); ?>
        </div>
        <div class="postmeta">
          <span class="author">By: <?php the_author(); ?> </span>
          <span class="date"><?php the_date(); ?></span>
          <span class="num-comments"><?php comments_number(); ?> </span>
        </div>
      </article>
        <!-- end .postmeta -->
      <!-- End of ze Post -->

    <!-- end of main#content ^_^  -->
    <?php 
      } //end of while loop
    } //end of if statement
  else{
  echo 'Sorry, no posts to show';
  } ?>    
</main>
  <?php get_sidebar();//including the sidebar :) ?>
  <?php get_footer();//including the footerrr :D ?>
