<?php
/**
 *
 *	TEMPLATE TO SHOW SINGLE POSTS.
 *
 *	Single post template. also is loaded when there is no single post for post type
 *
 */
 
get_header(); ?>

	<div id="content" class="content col-md-8 col-sm-8">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', get_post_format() ); ?>
				<nav class="next-prev">
					<ul class="pager">
						<li class="previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '<span class="glyphicon glyphicon-chevron-left"></span>', 'Previous post link', 'bitter-sweet' ) . '</span> %title' ); ?></li>
						<li class="next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '<span class="glyphicon glyphicon-chevron-right"></span>', 'Next post link', 'bitter-sweet' ) . '</span>' ); ?></li>
					</ul><!-- .pagination -->
				</nav>
				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>
	</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>