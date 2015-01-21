<?php
/**
 * Template Name: Full Width
 *
 * Full width page template to show full wide page without sidebar. 
 *
 */
 
get_header(); ?>

	<div id="content" class="content col-md-12 col-sm-12">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->

<?php get_footer(); ?>