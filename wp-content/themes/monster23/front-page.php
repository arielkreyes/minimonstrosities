<?php get_header(); //includes the header.php - wp function ?>
<main id="content">  
  <!--TODO: Custom Query To show Important Dates to remember/Coming Up for the girls. :)  -->
  <section class="recent-posts">
  <h3>Recent Blog Posts</h3>
  <!--Insert "the Loop" Here!  -->
  <?php if( have_posts() ){
  while( have_posts() ){
    the_post(); 
  ?>
      <article <?php post_class(); ?>>
          <div class="entry-content">
            <?php the_content(); ?>
        </div>
      </article>
        <!-- end .postmeta -->
      <!-- End of ze Post -->
    <?php 
      } //end of while loop
    } //end of if statement
  else{
  echo 'Sorry, no posts to show';
  } ?>      
</section>
<!-- end of normal blog posts!  -->
<section class="recent-gallery">
  <h3>Gallery Uploads</h3>
<!--Insert "the Loop" Here!  -->
<?php
 //New Query
 $query = new WP_Query(array(
   'post_type'  =>  'gallery',
   'orderby'  =>  'date',
   'order'  =>  'DESC',
   'post_per_page'  =>  3,
));
 //The Loop! Heyah.
 if( $query->have_posts() ){
   echo '<article>';
   while($query->have_posts()){
    $query->the_post();
    the_post_thumbnail('thumbnail');
    echo '<h4>' . get_the_title() . '</h4>';
    the_author();
    the_date();
  }
  echo '</article>';
  /* Restore Original Post Data */
  wp_reset_postdata();
}else{
  echo 'Sorry, No New Gallery Uploads.';
}
?>

</section>
</main>  
<!-- end of main#content ^_^  -->
  <?php get_sidebar('home');//including the sidebar :) ?>
  <?php get_footer();//including the footerrr :D ?>
