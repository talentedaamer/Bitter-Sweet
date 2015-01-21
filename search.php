<?php
/**
 *
 *	SEARCH PAGE TEMPLATE
 *
 *	Template to show / list search results.
 *
 */
 
get_header(); ?>

	<div id="content" class="content col-md-8 col-sm-8">
		<?php if ( have_posts() ) : ?>
			<div class="page-header">
				<h1 class="header-title">
				<span class="glyphicon glyphicon-search"></span>
					<?php printf( __( 'Search Results for: { %s }', 'bitter-sweet' ), '<span>' . get_search_query() . '</span>' ); ?>
				</h1>
			</div>

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', 'search' ); ?>
			<?php endwhile; ?>

			<?php bittersweet_pagination(); ?>

		<?php else : ?>

			<article id="post-0" class="no-results not-found alert alert-danger">
				<header class="post-header">
					<h1 class="search-title">
						<span class="icon-bullhorn"></span>
						<?php _e( 'Nothing Found', 'bitter-sweet' ); ?>
					</h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'bitter-sweet' ); ?></p>
					<div class="col-lg-6 search-wrap">
						<?php get_search_form(); ?>
					</div>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>

	</div><!-- #content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>