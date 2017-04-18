<aside id="sidebar">
  <!-- WIDGET AREA!
if there are widgets show them, otherwisde do fallback content and don't forget to register_sidebar() in the functions.php -->
  <section id="user_stuff" class="widget user">
    <?php
    $current_user =  wp_get_current_user();
    if( is_user_logged_in()){
      echo $current_user->user_firstname;
    }
     ?>
  </section>
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
    //show the most recent published posts
    wp_get_recent_posts( array(
      'numberposts' => 3,
      'offset' => 0,
      'category' => 0,
      'orderby' => 'post_date',
      'order' => 'DESC',
      'post_type' =>  'post',
      'post_status' =>  'publish, private',
      'supress_filters' => true,
    ), ARRAY_A ); ?>
  </section>
</aside>
