<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<!-- Habari theme: Closure by Sebastian Pascu, http://ic3berg.de -->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title><?php if($request->display_entry && isset($post)) { echo "{$post->title} | "; } ?><?php Options::out( 'title' ) ?></title>
  <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php $theme->feed_alternate(); ?>" />
  <link rel="edit" type="application/atom+xml" title="Atom Publishing Protocol" href="<?php URL::out( 'atompub_servicedocument' ); ?>" />
  <link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php URL::out( 'rsd' ); ?>" />
  <script type="text/javascript" src="<?php Site::out_url('scripts'); ?>/jquery.js"></script>
  <script src="<?php Site::out_url( 'theme' ); ?>/scripts/jquery.pngfix.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?php Site::out_url( 'theme' ); ?>/scripts/fixpngs.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript" src="<?php Site::out_url( 'theme' ); ?>/closure.js"></script>
  <link rel="stylesheet" href="<?php Site::out_url( 'theme' ); ?>/style.css" type="text/css" media="screen" title="Closure" charset="utf-8" />
  <?php $theme->header(); ?>
</head>

<body onload="">
	<div id="container">
		<!-- header -->
		<div id="header">
			<h1 class="white"><?php Options::out( 'title' ) ?></h1>
			<h4 class="light-gray"><?php Options::out('tagline') ?> </h4>
			<div id="header-photo">
			 <img id="header-slideshow" src="<?php Site::out_url( 'theme' ); ?>/images/header-photos/1.png" alt="" width="751" height="177" />
			</div>
		</div>
		<!-- end header -->
		
		<!-- menu / thinbox -->
		<div id="thinbox">
			<div id="thinbox-body">
			  <div style="float: right; margin-right: 20px"><span class="light-gray" style="cursor: pointer" id="toggle-more-info">✚</span></div>
			  <ul id="menu">
			    <li><a href="<?php Site::out_url( 'habari' ); ?>">Home</a></li>
    			<?php foreach ( $pages as $page ): ?>
    		    <li><a href="<?php echo $page->permalink; ?>" title="<?php echo $page->title; ?>"><?php echo $page->title; ?></a></li>
    			<?php endforeach; ?>
			  </ul>
			  <div id="more-info">
    			<h2>Latest posts</h2>
    			<ul>
    				<?php foreach ( $latest_posts as $entry ): ?>
    				<li><a href="<?php echo $entry->permalink ?>" title="<?php echo $entry->title ?>"><?php echo $theme->filter_post_title_excerpt($entry->title_out) ?></a> on <?php echo Format::nice_date( $entry->pubdate )?></li>
    				<?php endforeach; ?>
    			</ul>
			  </div> <!-- end #more-info -->
			</div> <!-- end thinbox-body -->
			<div id="thinbox-footer"></div>
		</div>
		<!-- end thinbox -->
