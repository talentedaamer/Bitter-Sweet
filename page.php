<?php
/**
 *
 *	TEMPLATE FOR SINGEL PAGE.
 *
 *	Single page template to show pages.
 *
 */
 
get_header(); ?>

	<div id="content" class="content col-md-8 col-sm-8">

			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'page' ); ?>
				<?php comments_template( '', true ); ?>
			<?php endwhile; // end of the loop. ?>

	</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>