<?php get_header(); //includes the header.php - wp function ?>
<main id="content">
  <h2><?php wp_title(''); ?></h2>

  <!--Insert "the Loop" Here!  -->
  <?php if( have_posts() ){
  while( have_posts() ){
    the_post();
  ?>

      <article <?php post_class(); ?>>
        <a href="<?php the_permalink(); ?>">
        <div class="info-wrap">
          <h3 class="entry-title"><?php the_title(); ?></h3>
          <div class="entry-content">
            <?php if(is_singular()){
              //single post, page, attachment, etc
              the_content();
              wp_link_pages( array(
                'before'  =>  '<div class="pagination">
                Keep Reading:',
                'after' =>  '</div>',
                'pagelink'  =>  '<span%</span>',
              ));
            }else{
              the_excerpt();
            }//end of else  ?>
          </div>
            <div class="postmeta">
              <span class="author">by: <?php the_author(); ?> </span>
              <span class="date"><?php the_date(); ?></span>
              <span class="num-comments"><?php comments_number(); ?> </span>
              <span class="title-tag"><?php get_the_tags(); ?></span>
            </div>
          </div>
        </a>
      </article>
        <!-- end .postmeta -->
      <!-- End of ze Post -->
    <?php
      } //end of while loop
      monster23_pagination();
      comments_template('/comments.php', true);
    } //end of if statement
  else{
  echo 'Sorry, no posts to show';
  } ?>
</main>
<!-- end of main#content ^_^  -->
  <?php get_sidebar();//including the sidebar :) ?>
  <?php get_footer();//including the footerrr :D ?>
