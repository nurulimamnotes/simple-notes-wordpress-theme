<?php
function themeoptions_admin_menu()
{
add_theme_page("Simple Notes", "Simple Notes Options", 'edit_themes', basename(__FILE__), 'themeoptions_page');
}
function themeoptions_page()
{
if ( $_POST['update_themeoptions'] == 'true' ) { themeoptions_update(); }
?>
<div class="wrap">
<div id="icon-themes" class="icon32"><br /></div>
<h2 style="text-shadow:1px 1px 1px #ccc">Simple Notes Menu Management</h2>
<form method="POST" action="">
<input type="hidden" name="update_themeoptions" value="true" />
<h3 style="text-shadow:3px 3px 1px #ccc;font-size:2em;text-align:center">Setting Social Menu</h3>
<table width="100%" border="0">
<tr>
	<td valign="top" width="33%">
<p><label for="feed">RSS Feed</label><br /><input type="text" name="feed" id="feed" size="32" value="<?php echo get_option('simple_feed'); ?>"/></p><p><small><strong>Example : </strong><em>http://www.nurulimam.info/feed/</em></small></p>
	</td>
	<td valign="top" width="33%">
<p><label for="twitter">Twitter</label><br /><input type="text" name="twitter" id="twitter" size="32" value="<?php echo get_option('simple_twitter'); ?>"/></p>
<p><small><strong>Example : </strong><em>http://twitter.com/nurulimamnotes</em></small></p>
	</td>
	<td valign="top" width="33%">
<p><label for="fb">Facebook</label><br /><input type="text" name="fb" id="fb" size="32" value="<?php echo get_option('simple_fb'); ?>"/></p><p><small><strong>Example : </strong><em>http://www.facebook.com/IamStevenTylers</em></small></p>
	</td>
</tr>
</table>
<p><input type="submit" name="search" value="Save" class="button button-primary" /></p></form></div>

	<?php
}
add_action('admin_menu', 'themeoptions_admin_menu');
function themeoptions_update()
{
	update_option('simple_fb', 	$_POST['fb']);
	update_option('simple_feed', 	        $_POST['feed']);
	update_option('simple_twitter', 	$_POST['twitter']);
}
?>
<?php
if ( function_exists('register_sidebar') )
register_sidebar(array(
		'name' => 'Sidebar',
		'description' => 'Add Widget Sidebar',
		'before_widget' => '',
		'after_widget' => '',
		'before_title' => '',
		'after_title' => ''
	));



remove_action('wp_head', 'wp_generator');
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
function removeHeadLinks() {
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
}
function canonical_for_comments() {
 global $cpage, $post;
 if ( $cpage > 1 ) :
  echo "\n";
  echo "<link rel='canonical' href='";
  echo get_permalink( $post->ID );
  echo "' />\n";
 endif;
}
add_action( 'wp_head', 'canonical_for_comments' );
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
add_action('init', 'removeHeadLinks');
add_theme_support('post-thumbnails');
add_theme_support( 'automatic-feed-links' );
add_filter( 'show_admin_bar', '__return_false' );
add_custom_background();
add_editor_style('custom-editor-style.css');
if ( ! isset( $content_width ) ) $content_width = 514;

function limit_words($string, $word_limit) {
	$words = explode(' ', $string);
	return implode(' ', array_slice($words, 0, $word_limit));
}

function blank_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
<li class="<?php if (1 == $comment->user_id) $oddcomment = "authcomment"; echo $oddcomment; ?>">
<div id="comment-<?php comment_ID(); ?>">
<?php echo get_avatar($comment,$size='74',$default='<path_to_url>' ); ?>
<?php comment_author_link() ?>
<?php if ($comment->comment_approved == '0') : ?>
<p>Comment Awaiting Moderation</p>
<br />
<?php endif; ?>
<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?><?php comment_text() ?>
</div>
<?php }?>
<?php
if ( function_exists( 'wp_nav_menu' ) ){
	if (function_exists('add_theme_support')) {
		add_theme_support('nav-menus');
		add_action( 'init', 'register_my_menus' );
		function register_my_menus() {
			register_nav_menus(
				array(
					'main-menu' => __( 'Menu' )
				)
			);
		}
	}
}
function primarymenu(){ ?>
			<div style="color:#f00">
Setup Menu Navigation &rarr; Appearance &rarr; Menus
			</div>
<?php }