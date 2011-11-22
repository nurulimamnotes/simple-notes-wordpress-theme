<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<title><?php if (is_home()) { echo bloginfo('name');}
elseif (is_404()) { echo '404 Not Found';}
elseif (is_category()) { echo 'Category : '; wp_title('');}
elseif (is_search()) { echo 'Search Results';}
elseif ( is_day() || is_month() || is_year() ) { echo 'Archives'; wp_title('');}
else { echo wp_title('');} ?></title>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">

<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>