<?php

/*
	Comments
	Creates the comments section.
	Copyright (C) 2011 CyberChimps
	Version 2.0
*/

	if ( post_password_required() ) { ?>
		<?php esc_html_e( 'This post is password protected. Enter the password to view comments.', 'droidpress' ); ?>
	<?php
		return;
	}
?>

<?php if ( have_comments() ) : ?>
	<br />
	<h2 id="comments"><?php comments_number('No Responses', 'One Response', '% Responses' );?></h2>

	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>

	<ol class="commentlist">
		<?php wp_list_comments(); ?>
	</ol>

	<div class="navigation">
		<div class="next-posts"><?php previous_comments_link() ?></div>
		<div class="prev-posts"><?php next_comments_link() ?></div>
	</div>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>


	<?php endif; ?>

<?php endif; ?>

<?php if ( comments_open() ) : ?>

<div id="respond">

	<div class="cancel-comment-reply">
		<?php cancel_comment_reply_link(); ?>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
		<p>
			<?php esc_html_e( 'You must be ', 'droidpress' ); ?>
			<a href="<?php echo wp_login_url( get_permalink() ); ?>">

			<?php esc_html_e( 'logged in ', 'droidpress' ); ?></a>
			<?php esc_html_e( 'to post a comment.', 'droidpress' ); ?>
		</p>
	<?php else : ?>

	<?php comment_form(); ?>

		<?php endif; ?>

		<!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

	</form>

</div>

	<?php endif; // If registration required and not logged in ?>
