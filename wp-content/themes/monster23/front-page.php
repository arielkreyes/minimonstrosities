<?php get_header(); //includes the header.php - wp function ?>
<main id="content">
  <section class="permanent">
    <h2>Welcome!</h2>
    <p><?php bloginfo('description'); ?></p>
  </section>
  <!--TODO: Custom Query To show Important Dates to remember/Coming Up for the girls. :)  -->

  <!--Insert "the Loop" Here!  -->
  <?php dynamic_sidebar('blurbs-sidebar');//including the recents area:) ?>
<!-- end of normal blog posts!  -->
</main>
<!-- end of main#content ^_^  -->
  <?php get_sidebar('home');//including the sidebar :) ?>
  <?php get_footer();//including the footerrr :D ?>
