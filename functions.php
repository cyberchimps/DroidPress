<?php

/*
	Functions
	Author: Tyler Cunningham
	Establishes the core theme functions.
	Copyright (C) 2011 CyberChimps
	Version 2.0
*/



// Define global variables.

	$themename = 'droidpress';
	$themenamefull = 'DroidPress';
	$themeslug = 'dp';
	$options = get_option($themename);

// Define Content Width.

if ( ! isset( $content_width ) ) $content_width = 600;

// Add support for post formats.
	add_theme_support(
		'post-formats',
		array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat')
	);

// Custom excerpt functions.

function droidpress_new_excerpt_more($more) {

	global $themename, $themeslug, $options;

    	if ($options[$themeslug.'_excerpt_link_text'] == '') {
    		$linktext = '(Read More...)';
   		}

    	else {
    		$linktext = $options[$themeslug.'_excerpt_link_text'];
   		}

    global $post;
	return '<a href="'. get_permalink($post->ID) . '"> <br /><br /> '.$linktext.'</a>';
}
add_filter('excerpt_more', 'droidpress_new_excerpt_more');

function droidpress_new_excerpt_length($length) {

	global $themename, $themeslug, $options;

		if ($options[$themeslug.'_excerpt_length'] == '') {
    		$length = '55';
    	}

    	else {
    		$length = $options[$themeslug.'_excerpt_length'];
    	}

	return $length;
}
add_filter('excerpt_length', 'droidpress_new_excerpt_length');

// Add auto-feed links support.
	add_theme_support('automatic-feed-links');

// Add post-thumb support.

	global $themename, $themeslug, $options;

		if($options[$themeslug.'_featured_image_height'] == "") {
			$featureheight = '100';
	}

	else {
		$featureheight = $options[$themeslug.'_featured_image_height'];

	}

		if ($options[$themeslug.'_featured_image_width'] == "") {
			$featurewidth = '100';
	}

	else {
		$featurewidth = $options[$themeslug.'_featured_image_width'];
	}
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( $featureheight, $featurewidth, true );


// This theme allows users to set a custom background
	add_theme_support( 'custom-background' );

	add_theme_support( "title-tag" );

// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();


// PIE
function droidpress_render_ie_pie() { ?>

	<style type="text/css" media="screen">
		#header li a, .postmetadata, .post_container, #navbackground, .wp-caption, .sidebar-widget-style, .sidebar-widget-title, .boxes, .box1, .box2, .box3, .box-widget-title,
  			{
  				behavior: url('<?php get_stylesheet_directory_uri('stylesheet_directory'); ?>/library/pie/PIE.htc');
			}
	</style>
<?php
}

add_action('wp_head', 'droidpress_render_ie_pie', 8);

// + 1 Button

function droidpress_plusone(){

	$path =  get_template_directory_uri() ."/library/js/";

	$script = "

		<script type=\"text/javascript\" src=\"".$path."plusone.js\"></script>
		";

	echo $script;
}
add_action('wp_head', 'droidpress_plusone');



// Call Superfish
if ( !is_admin() )
{
	function droidpress_superfish()
 	{

    	// Adjust the below path to where scripts dir is, if you must.
    	$scriptdir = get_template_directory_uri() ."/library/sf/";

    	// Register the Superfish javascript file
    	wp_register_script( 'superfish', $scriptdir.'sf.js', false, '1.4.8');
    	wp_register_script( 'sf-menu', $scriptdir.'sf-menu.js');

   		 //load the scripts.
	wp_enqueue_script('jquery');
    	wp_enqueue_script('superfish');
    	wp_enqueue_script('sf-menu');

  	}
add_action('wp_enqueue_scripts', 'droidpress_superfish');
}

// Register menu names

function droidpress_register_menus() {
	register_nav_menus(
		array( 'header-menu' => 'Header Menu', 'footer-menu' => 'Footer Menu' )
  	);
}

add_action( 'init', 'droidpress_register_menus' );

// Menu fallback

function droidpress_menu_fallback() {
	global $post; ?>

	<ul id="menu-nav" class="sf-menu">
		<?php wp_list_pages( 'title_li=&sort_column=menu_order&depth=3'); ?>
	</ul><?php
}

//Add link to theme settings in Admin bar

function droidpress_admin_link() {

	global $wp_admin_bar;

	$wp_admin_bar->add_menu( array( 'id' => 'DroidPress', 'title' => 'DroidPress Settings', 'href' => admin_url('themes.php?page=theme_options')  ) );

}
add_action( 'admin_bar_menu', 'droidpress_admin_link', 113 );


// DroidPress Widgits Init

function droidpress_widgets_init() {
    register_sidebar(array(
    	'name' => 'Sidebar Widgets',
    	'id'   => 'sidebar-widgets',
    	'description'   => 'These are widgets for the sidebar.',
    	'before_widget' => '<div id="%1$s" class="sidebar-widget-style">',
    	'after_widget'  => '</div>',
    	'before_title'  => '<h2 class="sidebar-widget-title">',
    	'after_title'   => '</h2>'
    ));

	register_sidebar(array(
		'name' => 'Footer',
		'id' => 'footer-widgets',
		'description'   => 'These are widgets for the footer',
		'before_widget' => '<div class="footer-widgets">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="footer-widget-title">',
		'after_title' => '</h3>',
	));
}
add_action( 'widgets_init', 'droidpress_widgets_init' );

	//Theme options files

require_once ( get_template_directory() . '/library/options/options-core.php' );
require_once ( get_template_directory() . '/library/options/meta-box.php' );
require_once ( get_template_directory() . '/library/options/options-themes.php' );
add_action( 'admin_notices', 'droidpress_admin_notice' );
function droidpress_admin_notice(){
	global $droidpress_check_screen;
	$droidpress_check_screen = get_admin_page_title();

   if ( $droidpress_check_screen == 'DroidPress Settings' )
{
          echo '<div class="notice notice-info is-dismissible"><p class="droidpress-upgrade-callout" style="font-size:18px; "><a href="https://cyberchimps.com/free-download-50-stock-images-use-please/?utm_source=DroidPress" target="_blank" style="text-decoration:none;">FREE - Download CyberChimps\' Pack of 50 High-Resolution Stock Images Now</a></p></div>';
}
}


function droidpress_customize_edit_links( $wp_customize ) {

   $wp_customize->selective_refresh->add_partial( 'blogname', array(
'selector' => '.sitename a'
) );

	$wp_customize->selective_refresh->add_partial( 'nav_menu_locations[header-menu]', array(
		'selector' => '#navbackground'
	) );

	$wp_customize->selective_refresh->add_partial( 'nav_menu_locations[footer-menu]', array(
		'selector' => '#credit'
	) );

}
add_action( 'customize_register', 'droidpress_customize_edit_links' );
add_theme_support( 'customize-selective-refresh-widgets' );

add_action( 'admin_notices', 'droidpress_admin_notices' );
function droidpress_admin_notices()
{
	$admin_check_screen = get_admin_page_title();

	if( !class_exists('SlideDeckPlugin') )
	{
	$plugin='slidedeck/slidedeck.php';
	$slug = 'slidedeck';
	$installed_plugins = get_plugins();

	 if ( $admin_check_screen == 'Manage Themes' || $admin_check_screen == 'DroidPress Settings' )
	{
		?>
		<div class="notice notice-info is-dismissible" style="margin-top:15px;">
		<p>
			<?php if( isset( $installed_plugins[$plugin] ) )
			{
			?>
				 <a href="<?php echo admin_url( 'plugins.php' ); ?>"><?php esc_html_e( 'Activate the SlideDeck Lite plugin', 'droidpress' ); ?></a>
			 <?php
			}
			else
			{
			 ?>
			 <a href="<?php echo wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=' . $slug ), 'install-plugin_' . $slug ); ?>"><?php esc_html_e( 'Install the SlideDeck Lite plugin', 'droidpress' ); ?></a>
			 <?php } ?>

		</p>
		</div>
		<?php
	}
	}

	if( !class_exists('WPForms') )
	{
	$plugin = 'wpforms-lite/wpforms.php';
	$slug = 'wpforms-lite';
	$installed_plugins = get_plugins();
	 if ( $admin_check_screen == 'Manage Themes' || $admin_check_screen == 'DroidPress Settings' )
	{
		?>
		<div class="notice notice-info is-dismissible" style="margin-top:15px;">
		<p>
			<?php if( isset( $installed_plugins[$plugin] ) )
			{
			?>
				 <a href="<?php echo admin_url( 'plugins.php' ); ?>"><?php esc_html_e( 'Activate the WPForms Lite plugin', 'droidpress' ); ?></a>
			 <?php
			}
			else
			{
			 ?>
	 		 <a href="<?php echo wp_nonce_url( self_admin_url( 'update.php?action=install-plugin&plugin=' . $slug ), 'install-plugin_' . $slug ); ?>"><?php esc_html_e( 'Install the WPForms Lite plugin', 'droidpress' ); ?></a>
			 <?php } ?>
		</p>
		</div>
		<?php
	}
	}

	if ( $admin_check_screen == 'Manage Themes' || $admin_check_screen == 'DroidPress Settings' )
	{
	?>
		<div class="notice notice-success is-dismissible">
				<b><p><?php esc_html_e( 'Liked this theme? ', 'droidpress' ); ?><a href="https://wordpress.org/support/theme/droidpress/reviews/#new-post" target="_blank"><?php esc_html_e( 'Leave us', 'droidpress' ); ?></a><?php esc_html_e( ' a ***** rating. Thank you! ', 'droidpress' ); ?></p></b>
		</div>
		<?php
	}

}
