<?php if (function_exists('have_posts') && have_posts()){
while (have_posts()){
the_post();
ob_start();
the_content();
$contents	= ob_get_contents();
ob_end_clean();
$link	= strip_tags($contents);
$link	= preg_replace('/\s/', '', $link);
if(!preg_match('%^http://%', $link)){
$host	= $_SERVER['HTTP_HOST'];
$dir	= dirname($_SERVER['PHP_SELF']);
$link	= "http://$host$dir/$link";
}
header("Location: $link");
die('');
}
}
?>
<?php wp_link_pages( $args ); ?>
<?php wp_nav_menu(); ?>
<?php comment_form(); ?>