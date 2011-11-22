<?php get_header(); ?>

<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php echo get_template_directory_uri(); ?>/form.css" />

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

<section class="judul">
<h2 style="font-size:4em"><?php printf( __( 'Search Results : %s', 'blank' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
</section>

<?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
<article id="content">
<section class="judul">
<h3 style="font-size:3em"><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
</section>
<p><?php echo limit_words(get_the_excerpt(), '30'); ?></p>
</article>
<?php endwhile; ?>
<?php else : ?>
<section class="judul">
<h3 style="font-size:3em"><?php printf( __( '%s Not Found', 'blank' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
</section>
<?php get_search_form(); ?>
<div style="clear:both"></div>
<article id="content">
<?php
$artikel = array( 'numberposts' => '5' );
$catatan_terbaru = wp_get_recent_posts( $artikel );
foreach( $catatan_terbaru as $tulisan ){
echo '<section class="judul"><h2 style="font-size:2em"><a href="' . get_permalink($tulisan["ID"]) . '" title="See article about '.$tulisan["post_title"].'" >' .   $tulisan["post_title"].'</a></h2>
</section>';}
?>
</article>
<?php endif; ?>

<?php get_footer(); ?>