<?php 

/*
	404
	Creates the 404 page.
	Copyright (C) 2011 CyberChimps
*/

/* Header call. */

	get_header(); 
	
/* End header. */

?>

<div id="content_wrap">

	<div class="col-md-8">
	
		<div class="content_padding">

			<div class="error">Error 404 <br />
                            <h3> Nothing found for the requested page. Please try a search instead.</h3>
                            <?php get_search_form(); ?> <br />
				<img class="img-responsive" src="<?php echo get_template_directory_uri() ;?>/images/confusedchimp.png" height="400" width="400" />
			</div>
		
		</div><!--end content_padding-->
		
	</div><!--end content_left-->

	
		<?php get_sidebar(); ?>
	
	
</div><!--end content_wrap-->

<div style="clear:both;"></div><!--clear-->

<?php get_footer(); ?>