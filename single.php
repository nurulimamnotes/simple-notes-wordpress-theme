<?php get_header(); ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/single.css" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/wordpress.css" />

<script type='text/javascript'  style="display:none">addComment={moveForm:function(d,f,i,c){var m=this,a,h=m.I(d),b=m.I(i),l=m.I("cancel-comment-reply-link"),j=m.I("comment_parent"),k=m.I("comment_post_ID");if(!h||!b||!l||!j){return}m.respondId=i;c=c||false;if(!m.I("wp-temp-form-div")){a=document.createElement("div");a.id="wp-temp-form-div";a.style.display="none";b.parentNode.insertBefore(a,b)}h.parentNode.insertBefore(b,h.nextSibling);if(k&&c){k.value=c}j.value=f;l.style.display="";l.onclick=function(){var n=addComment,e=n.I("wp-temp-form-div"),o=n.I(n.respondId);if(!e||!o){return}n.I("comment_parent").value="0";e.parentNode.insertBefore(o,e);e.parentNode.removeChild(e);this.style.display="none";this.onclick=null;return false};try{m.I("comment").focus()}catch(g){}return false},I:function(a){return document.getElementById(a)}};</script>

</head>
<body <?php body_class(); ?>>
<header id="header">
	<div>
		<h1 style="font-size:200%;margin-left:10px"><a href="<?php echo home_url()?>" title="<?php bloginfo( 'description' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<nav id="icon">
		<a href="<?php echo get_option('simple_feed'); ?>" id="feed" class="icons" title="Subscribe Via RSS" rel="nofollow" target="_blank">Subscribe RSS Feed</a>
		<a href="<?php echo get_option('simple_twitter'); ?>" id="twitter" class="icons" title="Follow me on Twitter" rel="nofollow" target="_blank">Follow me on Twitter</a>
		<a href="<?php echo get_option('simple_fb'); ?>" id="fb" class="icons" title="Add me on Facebook" rel="nofollow" target="_blank">Add me on Facebook</a>
		</nav>
		<nav>
<?php wp_nav_menu( array( 'theme_location' => 'main-menu', 'container_id' => 'navigation', 'fallback_cb'=>'primarymenu') );?>
		</nav>
	</div>
</header>
 

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article id="content">
<section class="judul">
<h2 style="font-size:3em"><?php the_title(); ?></h2>
</section>
<p><?php the_content(); ?></p>
<?php wp_link_pages( array( 'before' => '<div class="page">' . __( 'Pages : ', 'blank' ), 'after' => '</div>' ) ); ?>
<section class="bawah">
<div id="pagination">
<?php previous_post_link('%link', '&larr;', TRUE); ?>
<?php next_post_link('%link', '&rarr;', TRUE); ?>
</div>
<p style="padding-bottom:5px">Created By : <?php the_author_posts_link(); ?><br />Date : <?php the_time('j - F - Y'); ?></p>
</section>
<p style="display:none"><?php the_tags(); ?></p>
<?php comments_template(); ?>
</article>
<?php endwhile; else: ?>
<?php _e('Sorry, There is no article', 'blank'); ?>
<?php endif; ?>
<?php the_post_thumbnail(); ?>
<?php posts_nav_link(); ?>
<?php paginate_links(); ?>
<?php next_posts_link(); ?>
<?php previous_posts_link(); ?>
<?php get_footer(); ?>