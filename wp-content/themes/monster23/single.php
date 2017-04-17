<?php get_header(); ?>
<main id="content">
  <?php
  if ( have_posts() ) {
  	while ( have_posts() ) {
  		the_post();
  		?>
  <h2 class="page-title"><?php the_title(); ?></h2>
    <h4 class="postmeta">By: <?php the_author(); the_date();?></h4>
    <?php the_post_thumbnail('medium'); ?>
  <div class="entry-content">
    <?php the_content(); ?>
  </div>

  <?php
      } // end while
      // TODO: add the "likes" plugin or make my own?? :D
      monster23_pagination();
      comments_template( '/comments.php', true);
    } // end if
  ?>
</main>
<?php get_sidebar('page'); ?>
<?php get_footer(); ?>
