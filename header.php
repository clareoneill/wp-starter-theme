<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php wp_title(''); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<a href="<?php echo home_url( '/' ); ?>">Home Page</a>
<?php
  // Uncomment to show menu
  // wp_nav_menu( array( 'menu' => 'Main' ) );
?>