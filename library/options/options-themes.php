<?php
/*
	Options	Themes
	Author: Tyler Cunningham
	Establishes the CyberChimps Themes page.
	Copyright (C) 2011 CyberChimps
	Version 2.0

*/


// Add scripts and stylesheet

function enqueue_store_styles() {

 	global $themename, $themeslug, $options;
 	wp_register_style($themeslug.'storecss', get_template_directory_uri(). '/library/options/theme-options.css');


    wp_enqueue_style($themeslug.'storecss');
}

// Add page to the menu
function cyberchimps_store_add_menu() {
	$page = add_theme_page('CyberChimps Store Page', 'CyberChimps Themes', 'administrator', 'themes', 'cyberchimps_store_page_init');


  add_action('admin_print_styles-' . $page, 'enqueue_store_styles');

}

add_action('admin_menu', 'cyberchimps_store_add_menu');

// Create the page
function cyberchimps_store_page_init() {
	$root = get_template_directory_uri();
?>

<div id="contain">
	<div id="themesheader">
		<a href="http://cyberchimps.com" target="_blank"><img src="<?php echo $root ;?>/images/themes/cyberchimps.png" /></a>
		<br />
		<span class="pro"><?php esc_html_e( 'Professional WordPress Themes', 'droidpress' ); ?></span>
		<br /><br />
		<div class="menu">
		<ul>
			<li><a href="http://cyberchimps.com/store/" target="_blank"><?php esc_html_e( 'CyberChimps Store', 'droidpress' ); ?></a></li>
			<li><a href="http://cyberchimps.com/support" target="_blank"><?php esc_html_e( 'Support', 'droidpress' ); ?></a></li>
			<li><a href="http://cyberchimps.com/ifeaturepro/docs/"><?php esc_html_e( 'Documentation', 'droidpress' ); ?></a></li>
			<li><a href="http://cyberchimps.com/forum/" target="_blank"><?php esc_html_e( 'Forum', 'droidpress' ); ?></a></li>
			<li><a href="http://twitter.com/#!/cyberchimps" target="_blank"><?php esc_html_e( 'Twitter', 'droidpress' ); ?></a></li>
			<li><a href="http://www.facebook.com/CyberChimps" target="_blank"><?php esc_html_e( 'Facebook', 'droidpress' ); ?></a></li>
		</ul>
	</div>
	<div style="clear: both;"></div>
	</div>

	<div id="container">

	<div class="theme_images">
		<a href="http://cyberchimps.com/ifeaturepro/" target="_blank"><img src="<?php echo $root ;?>/images/themes/ifeaturepro.png" /></a>
	</div>
	<div class="theme_desciptions">
		<div class="theme_titles"><a href="http://cyberchimps.com/ifeaturepro/" target="_blank"><?php esc_html_e( 'iFeature Pro', 'droidpress' ); ?></a></div>
		<br />
		<?php esc_html_e( 'iFeature Pro turns WordPress into a beautifully designed feature rich Content Management System (CMS). We thought differently when developing iFeature Pro, and took CyberChimps years of experience developing websites for clients and built user friendly settings for the most requested features from the ground up.', 'droidpress' ); ?>
		<br /><br />
		<?php esc_html_e( 'Facebook', 'droidpress' ); ?>
		 <br /><br />
		<div class="buy"><a href="http://cyberchimps.com/ifeaturepro/" target="_blank"><?php esc_html_e( 'Buy iFeature Pro', 'droidpress' ); ?></a></div>
	</div>

	<div class="theme_images">
		<a href="http://cyberchimps.com/businesspro/" target="_blank"><img src="<?php echo $root ;?>/images/themes/bizpro.png" /></a>
	</div>
	<div class="theme_desciptions">
		<div class="theme_titles"><a href="http://cyberchimps.com/businesspro/" target="_blank"><?php esc_html_e( 'Business Pro', 'droidpress' ); ?></a></div>
		<br />
		<?php esc_html_e( 'Business Pro is a Professional WordPress Theme. Business Pro gives your company the tools to turn WordPress into a modern feature rich Content Management System (CMS).', 'droidpress' ); ?>
		<br /><br />
		<?php esc_html_e( 'Business Pro offers intuitive options enabling any business to use WordPress as their content management system. Business Pro offers designers and developers Custom CSS, Import / Export options, and support for CSS3, and HTML5. Even if you are not a designer, Business Pro is built to be business friendly.', 'droidpress' ); ?>
		<br /><br />
		<div class="buy"><a href="http://cyberchimps.com/businesspro" target="_blank"><?php esc_html_e( 'Buy Business Pro', 'droidpress' ); ?></a></div>
	</div>

	<div class="theme_images">
		<a href="http://cyberchimps.com/neuropro/" target="_blank"><img src="<?php echo $root ;?>/images/themes/neuropro.png" /></a>
	</div>
	<div class="theme_desciptions">
		<div class="theme_titles"><a href="http://cyberchimps.com/neuropro/" target="_blank"><?php esc_html_e( 'Neuro Pro', 'droidpress' ); ?></a></div>
		<br />
		<?php esc_html_e( 'Neuro Pro features intuitive design options allowing anyone the ability to easily customize the look and feel of WordPress. We also included several popular color scheme to choose from, as well as beautiful modern background images. Neuro Pro also offers designers and developers Custom CSS, Import / Export options, and support for CSS3 and HTML5.', 'droidpress' ); ?>
		<br /><br />
		<?php esc_html_e( 'Neuro Pro is a next generation WordPress theme released under the GNU GPL v2. Neuro Pro works great in Chrome, Safari, FireFox, and Internet Explorer 7, 8, and 9 (we do not support Internet Explorer 6).', 'droidpress' ); ?>
		<br /> <br />
		<div class="buy"><a href="http://cyberchimps.com/neuropro/" target="_blank"><?php esc_html_e( 'Buy Neuro Pro', 'droidpress' ); ?></a></div>
	</div>

	</div>
</div>

<?php
}
