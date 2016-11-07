<?php 

/*
	Header
	Authors: Tyler Cunningham, Trent Lapinski
	Creates the theme header. 
	Copyright (C) 2011 CyberChimps
	Version 2.0
*/

/* Call globals. */	

	global $themename, $themeslug, $options;

/* End globals. */

/* Define variables. */	

	$blogtitle = $options[$themeslug.'_home_title'];
	$homekeywords = $options[$themeslug.'_home_keywords'];
	$homedescription = $options[$themeslug.'_home_description'];
	$favicon = $options['file2'];
	$title = get_post_meta($post->ID, 'seo_title' , true);
	$pagedescription = get_post_meta($post->ID, 'seo_description' , true);
	$keywords = get_post_meta($post->ID, 'seo_keywords' , true);

/* End variable definition. */	

/* Establish fonts. */	

	if ($options[$themeslug.'_font'] == "" AND $options[$themeslug.'_custom_font'] == "") {
		$font = 'Arial';
	}
			
	else {
		$font = $options[$themeslug.'_font']; 
	}
	
	$fontstrip =  preg_replace("[^A-Za-z0-9]", " ", $font );
/* End fonts. */	

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes('xhtml'); ?>>

<head profile="http://gmpg.org/xfn/11">
	
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="distribution" content="global" />
<meta name="language" content="en" />

<!-- Blog Page SEO options -->
	<?php if ($blogtitle != '' AND is_front_page()): ?>
		<meta name="title" content="<?php echo $blogtitle ?>" />
	<?php endif; ?> 
	
	<?php if ($homedescription != '' AND is_front_page()): ?>
		<meta name="description" content="<?php echo $homedescription ?>" />
	<?php endif; ?>	
	
	<?php if ($homekeywords != '' AND is_front_page()): ?>
		<meta name="keywords" content="<?php echo $homekeywords ?>" />
	<?php endif; ?>
<!-- Blog Page SEO options -->


<!-- Page SEO options -->
	<?php if ($title != '' AND !is_front_page()): ?>
		<meta name="title" content="<?php echo $title ?>" />
	<?php endif; ?> 
	
	<?php if ($pagedescription != '' AND !is_front_page()): ?>
		<meta name="description" content="<?php echo $pagedescription ?>" />
	<?php endif; ?>	
	
	<?php if ($keywords != '' AND !is_front_page()): ?>
		<meta name="keywords" content="<?php echo $keywords ?>" />
	<?php endif; ?>
<!-- Page SEO options -->


<link rel="shortcut icon" href="<?php echo stripslashes($favicon['url']); ?>" type="image/x-icon" />
<!--<link rel="stylesheet" href="<?php //bloginfo('stylesheet_url'); ?>" type="text/css" />-->
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />


<link href='http://fonts.googleapis.com/css?family=<?php echo $font ?>' rel='stylesheet' type='text/css' />

 	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
    
	<?php wp_head(); ?>
	
</head>

<body style="font-family:'<?php echo $fontstrip ?>', Helvetica, serif ;" <?php body_class(); ?> >
  
	<div class="container wrapper">
		
			<div id="header">
				<div id="headerwrap">
					<div id="header_right">
							
								<?php get_template_part('icons', 'header'); ?>
							
					</div><!-- end header_right -->
							<div id="sitename">
								<h1 class="sitename"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?> </a></h1>
							</div>
				</div><!-- end headerwrap -->
				<?php get_template_part('nav', 'header' ); ?>
			</div><!-- end header -->

			<div id="main" class="col-md-12">
			
