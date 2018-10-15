<div id="sidebar_default">
	<div id="sidebar">

    <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('Sidebar Widgets')) : else : ?>

        <!-- All this stuff in here only shows up if you DON'T have any widgets active in this zone -->

		<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title"><?php esc_html_e( 'Subscribe', 'droidpress' ); ?></h2>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>"><?php esc_html_e( 'Entries (RSS)', 'droidpress' ); ?></a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php esc_html_e( 'Comments (RSS)', 'droidpress' ); ?></a></li>
    	</ul>
    	</div>

		<div class="sidebar-widget-style">
		<h2 class="sidebar-widget-title"><?php esc_html_e( 'Pages', 'droidpress' ); ?></h2>
		<ul>
    	<?php wp_list_pages('title_li=' ); ?>
    	</ul>
    	</div>

    	<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title"><?php esc_html_e( 'Archives', 'droidpress' ); ?></h2>
    	<ul>
    		<?php wp_get_archives('type=monthly'); ?>
    	</ul>
    	</div>

        <div class="sidebar-widget-style">
        <h2 class="sidebar-widget-title"><?php esc_html_e( 'Categories', 'droidpress' ); ?></h2>
        <ul>
    	   <?php wp_list_categories('show_count=1&title_li='); ?>
        </ul>
        </div>

    	<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title"><?php esc_html_e( 'WordPress', 'droidpress' ); ?></h2>
    	<ul>
    		<?php wp_register(); ?>
    		<li><?php wp_loginout(); ?></li>
    		<li><a href="http://wordpress.org/" title="Powered by WordPress, state-of-the-art semantic personal publishing platform."><?php esc_html_e( 'WordPress', 'droidpress' ); ?></a></li>
    		<?php wp_meta(); ?>
    	</ul>
    	</div>

    	<div class="sidebar-widget-style">
    	<h2 class="sidebar-widget-title"><?php esc_html_e( 'Subscribe', 'droidpress' ); ?></h2>
    	<ul>
    		<li><a href="<?php bloginfo('rss2_url'); ?>"><?php esc_html_e( 'Entries (RSS)', 'droidpress' ); ?></a></li>
    		<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><?php esc_html_e( 'Comments (RSS)', 'droidpress' ); ?></a></li>
    	</ul>
    	</div>

	<?php endif; ?>
	</div><!--end sidebar-->
</div><!--end sidebar_default-->
