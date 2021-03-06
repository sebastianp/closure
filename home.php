<?php $theme->display('header'); ?>
<div id="page">
  <!-- sidebar  -->
  <div id="sidebar">
    <!-- darkbox -->
    <div id="darkbox">
      <div id="darkbox-header"></div>
      <div id="darkbox-body">
        <?php include('darkbox.php') ?>
      </div>
      <div id="darkbox-footer"></div>
    </div>

    <!-- lightbox -->
    <div id="lightbox">
      <div id="lightbox-header"></div>
      <div id="lightbox-body">
        <?php include('lightbox.php') ?>
      </div>
      <div id="lightbox-footer"></div>
    </div>							
  </div>
  <!-- end sidebar -->

  <?php foreach ( $posts as $post ) { ?>
    <div class="post <?php echo $post->statusname; ?>" id="post-<?php echo $post->id; ?>">
      <h1 class="cool-blue post-title"><a class="cool-blue" href="<?php echo $post->permalink; ?>" title="<?php echo $post->title; ?>"><?php echo $post->title_out; ?></a></h1>
      <div class="post-meta">Posted on <?php echo $post->pubdate->out('F j, Y'); ?> by <?php echo $post->author->displayname ?> | Tagged with: <?php echo $post->tags_out; ?></div>
      <?php echo $post->content_out; ?>
    </div>
  <?php } ?> <!-- end posts loop -->
  
  <!-- need to clear before nav -->
  <div class="clear">&nbsp;</div>
  
  <!--pagination-->
  <div id="pagenav">
  	<?php $theme->prev_page_link('&laquo; ' . _t('Newer Posts')); ?> <?php $theme->page_selector( null, array( 'leftSide' => 2, 'rightSide' => 2 ) ); ?> <?php $theme->next_page_link('&raquo; ' . _t('Older Posts')); ?>
  </div>
</div> <!-- end page --> 
<?php $theme->display('footer'); ?>
