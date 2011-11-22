<?php get_header(); ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />

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
 

<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
<article id="content">
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="judul">
<h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>
</section>
</div>
<p><?php echo limit_words(get_the_excerpt(), '30'); ?></p>
</article>
<?php endwhile; else : ?><?php endif; ?>
<?php get_footer(); ?>