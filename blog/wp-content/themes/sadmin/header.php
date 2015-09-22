<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  <?php language_attributes(); ?>>

<head>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php printf(__('%s RSS Feed', 'yiw'), get_bloginfo('name')); ?>" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="alternate" type="application/atom+xml" title="<?php printf(__('%s Atom Feed', 'yiw'), get_bloginfo('name')); ?>" href="<?php bloginfo('atom_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<meta name="title" content="Software arredamento è la soluzione per realizzare il tuo sito di arredamento" />
	<meta name="keywords" content="software arredamento, software arredamento interni, software per arredare casa, software per arredare, software arredare casa, software arredo casa" />
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="description" content="<?php if ( is_single() ) {
		single_post_title('', true); 
	} else {
		bloginfo('name'); echo " - "; bloginfo('description');
	}
	?>" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
	
	<meta property="og:title" content="<?php global $page, $paged; wp_title( '&laquo;', true, 'right' ); bloginfo( 'name' ); if ( $paged >= 2 || $page >= 2 ) echo ' &raquo; ' . sprintf( __( 'Page %s' ), max( $paged, $page ) ); ?>" />
	<?php if (is_single()OR is_page()) { ?>
		<meta property="og:type" content="article" />
		<meta property="og:url" content="<?php the_permalink() ?>" />
	<?php }else{ ?>
		<meta property="og:type" content="website" />
		<meta property="og:url" content="<?php bloginfo('siteurl'); ?>/" />
	<?php } ?>
		<meta property="og:site_name" content="<?php bloginfo('name'); ?>" />
		<meta property="og:description" content="<?php if ( is_single() ) {	single_post_title('', true); } else { bloginfo('name'); echo " - "; bloginfo('description'); }	?>" />
	<?php if (is_single()&& has_post_thumbnail()) { ?>
		<meta property="og:image" content="<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 300, 300 ), false, '' ); echo $src[0]; ?>" />
		<meta property="og:image:width" content="200" />
		<meta property="og:image:height" content="200" />	
	<?php }else{ ?>
		<meta property="og:image" content="<?php bloginfo('template_directory'); ?>/immagini/sfondologo.jpg" />
		<meta property="og:image:width" content="200" />
		<meta property="og:image:height" content="200" />
	<?php } ?>
	
	<?php include "../analitycs.php"; ?>
</head>

<body>
	<?php wp_footer(); ?>
<div class="generale">
	<div class="header">
		<!-- Header -->
		<div class="menu">
			<div class="bottone"><a id="csshome1" href="http://www.softwarearredamento.com" class="bottone"><div>Home</div></a></div>
			<div class="bottone"><a href="http://www.softwarearredamento.com/acquista.html" class="bottone"><div>Acquista</div></a></div>
			<div class="bottone"><a href="http://www.softwarearredamento.com/galleria.html" class="bottone"><div>Galleria</div></a></div>
			<div class="bottoneattivo"><a href="http://www.softwarearredamento.com/blog/" class="bottoneattivo"><div>Blog</div></a></div>
			<div class="bottone"><a href="http://www.softwarearredamento.com/guida/index.html" class="bottone"><div>Guida</div></a></div>
			<div class="bottone"><a href="http://www.arkosoft.it" class="bottone"><div>Supporto</div></a></div>
		</div>
		<div class="logo">&nbsp;</div>
	</div>