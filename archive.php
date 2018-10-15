<?php

/*
	Archive
	Creates the archive pages.
	Copyright (C) 2011 CyberChimps
	Version 2.0
*/

/* Header call. */

	get_header();

/* End header. */

?>

<div id="content_wrap">

	<div id="content_left">

		<div class="content_padding">

		<?php if (have_posts()) : ?>

 			<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

			<?php /* If this is a category archive */ if (is_category()) { ?>
				<div class="archive-title">
					<?php
						esc_html_e( "Archive for the '", 'droidpress' );
						single_cat_title();
						esc_html_e( "' Category:", 'droidpress' );
					?>
				</div><br />

			<?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
				<div class="archive-title">
					<?php
						esc_html_e( "Posts Tagged '", 'droidpress' );
						single_tag_title();
						esc_html_e( "':", 'droidpress' );
					?>

				</div><br />

			<?php /* If this is a daily archive */ } elseif (is_day()) { ?>
				<div class="archive-title">
					<?php
						esc_html_e( 'Archive for  ', 'droidpress' );
						the_time( 'F jS, Y' );
						esc_html_e( ':', 'droidpress' );
					?>
				</div><br />

			<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
				<div class="archive-title">
					<?php
						esc_html_e( 'Archive for  ', 'droidpress' );
						the_time( 'F, Y' );
						esc_html_e( ':', 'droidpress' );
					?>
				</div><br />

			<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
				<div class="archive-title">
					<?php
						esc_html_e( 'Archive for  ', 'droidpress' );
						the_time( 'Y' );
						esc_html_e( ':', 'droidpress' );
					?>

					</div><br />

			<?php /* If this is an author archive */ } elseif (is_author()) { ?>
				<div class="archive-title">
					<?php esc_html_e( 'Author Archive: ', 'droidpress' ); ?>
				</div><br />

			<?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
				<div class="archive-title">
					<?php esc_html_e( 'Blog Archive: ', 'droidpress' ); ?>
				</div><br />

			<?php } ?>

			<?php while (have_posts()) : the_post(); ?>

			<div class="post_container">

				<div <?php post_class() ?>>

						<h2 class="archive_posts_title" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

						<?php get_template_part('meta', 'archive'); ?>

						<div class="entry">
							<?php the_excerpt(); ?>
						</div>
				<div class="tags">
								<?php the_tags('Tags: ', ', ', '<br />'); ?>
							</div><!--end tags-->

							<div class="postmetadata">
										<?php get_template_part('share', 'index' ); ?>
															</div><!--end postmetadata-->

				</div><!--end post-->
			</div><!--end post_container-->

			<?php endwhile; ?>


			<?php get_template_part('pagination', 'archive' ); ?>

	<?php else : ?>

		<h2><?php esc_html_e( ' Nothing found ', 'droidpress' ); ?></h2>

	<?php endif; ?>
		</div><!--end content_padding-->

	</div><!--end content_left-->

	<div id="sidebar_right">
		<?php get_sidebar(); ?>
	</div>

</div><!--end content_wrap-->

<div style="clear:both;"></div>

<?php get_footer(); ?>
