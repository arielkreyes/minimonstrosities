<aside id="sidebar">
  <!-- WIDGET AREA!
if there are widgets show them, otherwisde do fallback content and don't forget to register_sidebar() in the functions.php -->
  <section id="search" class="widget">
    <?php get_search_form(); ?>
  </section>
  <!-- Calendar Stuffs -->
  <section id="calendar" class="widget">
    <h3 class="widgettitle">calendar</h3>
    <?php get_calendar(); ?>
  </section>
  <section id="recentposts" class="widget">
    <h3 class="widgettitle">recent stories</h3>
    <?php
    global $post;
    $args = array( 'posts_per_page' => 5, 'order'=> 'DESC', 'orderby' => 'date' );
    $postslist = get_posts( $args );
    foreach ( $postslist as $post ) :
      setup_postdata( $post ); ?>
    	<a href="<?php the_permalink(); ?>"><div>
    		<h5><?php the_date(); ?></h5>
    		<br />
    		<p><?php the_title(); ?></p>
    	</div>
    </a>
    <?php
    endforeach;
    wp_reset_postdata();
    ?>
  </section>
</aside>
