<!DOCTYPE html><?php
	
	global $post, $post_type;
	$post_type = get_post_type_object($post->post_type);

?><html lang="en">
	<head>
		<title><?php echo $post_type->labels->singular_name; ?> <?php the_title(); ?> - <?php bloginfo('name'); ?></title>
		<meta charset="utf8">
		<meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
