<aside id="sidebar">
  <!-- WIDGET AREA!
if there are widgets show them, otherwisde do fallback content and don't forget to register_sidebar() in the functions.php -->
  <section id="search" class="widget">
    <?php get_search_form(); ?>
  </section>

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
      'include' => '',
      'exclude' => '',
      'meta_key' => '',
      'meta_value' =>'',
      'post_type' =>  'post',
      'post_status' =>  'publish, private',
      'supress_filters' => true,
    ), ARRAY_A ); ?>
  </section>
  <section id="categories" class="widget">
    <h3 class="widgettitle">categories</h3>
    <ul>
      <?php
      //show 5 common categories in a flat list
      wp_list_categories( array(
        'depth' => -1,
        'title_li'  => '',
        'number'  => 5,
        'orderby' => 'count', //order by number of posts
        'order' => 'DESC',
        'show_count'  => true,
      )); ?>
    </ul>
  </section>
</aside>
