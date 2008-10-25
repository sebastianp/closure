<h3 class="white">Search</h3>
<form method="get" id="searchform" action="<?php echo URL::out('display_search'); ?>">
<input class="pad2 border1 dark-gray" type="text" name="criteria" />
<input class="pad2 border1 dark-gray" type="submit" name="go" value="Go" />
</form>

<h3 class="white">Tags</h3>
<div style="width: 96%">
<ul class="inline no-list-style">
<?php foreach( $taglist as $tag ): ?>
	<li class="inline"><a href="<?php echo $tag->url; ?>" title="<?php echo $tag->text; ?>" rel="tag"><?php echo $tag->text; ?></a></li>
<?php endforeach; ?>
</ul>
</div>