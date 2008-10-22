<!-- comments -->
<?php
if ( ! defined('HABARI_PATH' ) ) { die( _t('Please do not load this page directly. Thanks!') ); }
?>
    <hr>
    
    <div class="comments">
     <h4><span id="comments"><?php echo $post->comments->moderated->count; ?> <?php _e('responses to this post'); ?></span> (<span class="commentsrsslink"><a href="<?php echo $post->comment_feed_link; ?>" title="comments atom feed"><?php _e('atom feed'); ?></a></span>)</h4>

     <ul id="commentlist">
<?php 
if ( $post->comments->moderated->count ) {
	foreach ( $post->comments->moderated as $comment ) {

?>
      <li id="comment-<?php echo $comment->id; ?>" <?php echo $theme->custom_comment_class( $comment, $post ); ?>>
       <a href="#comment-<?php echo $comment->id; ?>" class="counter" title="<?php _e('comment permalink'); ?>">#<?php echo $comment->id; ?></a>
       by
       <span class="commentauthor"><a href="<?php echo $comment->url; ?>" rel="external"><?php echo $comment->name; ?></a></span>
       <small class="comment-meta"> said on <?php $comment->date->out('F j, Y g:ia'); ?><?php if ( $comment->status == Comment::STATUS_UNAPPROVED ) : ?> <em><?php _e('In moderation'); ?></em><?php endif; ?></small>
       
       <div class="comment-content">
        <?php echo $comment->content_out; ?>
        
       </div>
      </li>

<?php 
	}
}
else { ?>
      <li><?php _e('There are currently no comments.'); ?></li>
<?php } ?>
     </ul>

<?php if ( ! $post->info->comments_disabled ) { include_once( 'commentform.php' ); } ?>

     <hr>
    
    </div>
<!-- /comments -->
