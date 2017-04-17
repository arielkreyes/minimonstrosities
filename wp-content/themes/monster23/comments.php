<?php
/*
 *Template for displaying comments and comment form.
 *Include it with comments_template()
 */
 //If the post is password protected, exit this File
 if( post_password_required()){
   return;
 }//end of if statement and exits comments.php
 //split up comment count
 $commentcount = count( $wp_query->comments_by_type['comment']);
 $pingscount = count( $wp_query->comments_by_type['pings']);
 //ping = pings only
 //comment = hooman comments only
 //pings = trackbacks and pingbacks! O.O
?>
<section class="comments">

  <!-- Ternary Operator is a short if statement that is delightfully wonderful -->
  <?php
  $commentcount = get_comments_number();
  $pingscount   = count( $wp_query->comments_by_type['pings']);

  if( comments_open() AND  $commentcount !=0 ){ ?>
  <h4><?php echo $commentcount == 1 ? 'One Comment' : $commentcount . 'Comments'; ?> on this post.</h4>
  <?php }//end of if statement ?>
  <?php if( comments_open()){ ?>

  <a href="#respond" alt="Leave A Comment"><i class="fa fa-plus-circle fa-3x" aria-hidden="true"></i></a>
  <?php }//end of if statement for leave a comment ?>
  <ol>
    <?php wp_list_comments( array(
      'type' => 'comment',//only hooman comments, no pings
    )); ?>
  </ol>
  <?php if( get_comment_pages_count() > 1 ){
    echo '<div class="pagination">';
    paginate_comments_links();
    echo '</div>';
  }//end of pagination if statement ?>
</section>
<section class="comments-form">
  <?php comment_form(); ?>
</section>

<!-- Seperate Pings/Trackbacks from comments and place in own section if they exists -->
<?php if( $pingscount !=0){ ?>
<section class="trackbacks">
  <h4><?php echo $pingscount == 1 ? 'One Site Link Here' : $pingscount . 'Sites Link Here'; ?></h4>
  <ol>
    <?php wp_list_comments( array(
      'type' => 'pings', //trackbacks and pingbacks
      'short_ping' => true,
    )); ?>
  </ol>
</section>
<?php }//end of if statement pingscount ?>
