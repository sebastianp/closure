<?php

/**
 * @package Ic3berg
 */

// Apply Format::autop() to post content...
Format::apply( 'autop', 'post_content_out' );
// Apply Format::autop() to comment content...
Format::apply( 'autop', 'comment_content_out' );
// Apply Format::tag_and_list() to post tags...
Format::apply( 'tag_and_list', 'post_tags_out' );
// Apply Format::nice_date() to post date...
Format::apply( 'nice_date', 'post_pubdate_out', 'F j, Y g:ia' );

// Excerpt titles in the quickbar
Format::apply( 'post_title_excerpt', 'post_title' );

// Remove the comment on the following line to limit post length on the home page to 1 paragraph or 100 characters
Format::apply_with_hook_params( 'more', 'post_content_out', _t('Read more...'), 100, 1 );

// We must tell Habari to use MyTheme as the custom theme class:
define( 'THEME_CLASS', 'Ic3berg' );

/**
 * A custom theme for K2 output
 */
class Ic3berg extends Theme
{
	public function add_template_vars()
	{
		//Theme Options
		$this->assign( 'show_author' , true ); //Display author in posts
		// How many months should be displayed by the RN Archives plugin
		$this->assign('rn_archives_months', 2);
		// Links list
		$this->assign('links_list',
		  array(
		    'Follow me on Twitter' => 'http://twitter.com/sebastianp',
		    )
		);
		
		if( !$this->template_engine->assigned( 'pages' ) ) {
			$this->assign( 'pages', Posts::get( array( 'content_type' => 'page', 'status' => Post::status( 'published' ), 'nolimit' => 1 ) ) );
		}
		
		// Fetch the last 5 posts, for displaying in the quickbar
		if( !$this->template_engine->assigned( 'latest_posts' ) ) {
			$this->assign( 'latest_posts', Posts::get( array( 'content_type' => 'entry', 'status' => Post::status( 'published' ), 'limit' => 5 ) ) );
		}

		// Fetch the last 5 comments, for displaying in the quickbar
		if( !$this->template_engine->assigned( 'latest_comments' ) ) {
			$this->assign( 'latest_comments', Comments::get( array('status' => Comment::STATUS_APPROVED) ) );
		}
		
		if( !$this->template_engine->assigned( 'taglist' ) ) {
			$this->assign( 'taglist', $this->theme_show_tags() );
		}
		
		// Fetch all the posts
		if( !$this->template_engine->assigned( 'archives' ) ) {
			$this->assign( 'archives', Posts::get( array( 'content_type' => 'entry', 'status' => Post::status( 'published' ) ) ) );
		}
		
		parent::add_template_vars();
	}

  public function custom_comment_class( $comment, $post )
	{
		$class = 'class="comment';
		if ( $comment->status == Comment::STATUS_UNAPPROVED ) {
			$class.= '-unapproved';
		}
		// check to see if the comment is by a registered user
		if ( $u = User::get( $comment->email ) ) {
			$class.= ' by-user comment-author-' . Utils::slugify( $u->displayname );
		}
		if( $comment->email == $post->author->email ) {
			$class.= ' by-post-author';
		}

		$class.= '"';
		return $class;
	}
	public function filter_theme_call_header( $return, $theme )
	{
		if ( User::identify() != FALSE ) {
			Stack::add( 'template_header_javascript', Site::get_url('scripts') . '/jquery.js', 'jquery' );
		}
		return $return;
	}
	
	public function filter_post_title_excerpt( $title, $length = 53 )
	{
		if ( mb_strlen( $title ) > $length ) {
			return (mb_substr( $title, 0, $length-3).'...');
		}
		return $title;
	}
	
	public function theme_show_tags ()
	{
		$sql="
			SELECT t.tag_slug AS slug, t.tag_text AS text, count(tp.post_id) as ttl
			FROM {tags} t
			INNER JOIN {tag2post} tp
			ON t.id=tp.tag_id
			INNER JOIN {posts} p
			ON p.id=tp.post_id AND p.status = ?
			GROUP BY t.tag_slug
			ORDER BY t.tag_text
		";
		$tags= DB::get_results( $sql, array(Post::status('published')) );

		foreach ($tags as $index => $tag) {
			$tags[$index]->url = URL::get( 'display_entries_by_tag', array( 'tag' => $tag->slug ) );
		}
		return $tags;
	}
}

?>
