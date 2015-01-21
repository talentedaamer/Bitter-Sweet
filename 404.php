<?php
/**
 *
 *	TEMPLATE FOR 404 PAGE.
 *
 *	This template loads for error or broken links page.
 *
 */
get_header(); ?>

<article class="not-found blog-post post">
	<h1 class="entry-title">
	  <span class="glyphicon glyphicon-bullhorn"></span>
	    <?php _e( '404', 'bitter-sweet' ); ?>
	  </a>
	</h1>

	<div class="entry-content">
	  <p><?php _e( 'Sorry currently there are no posts to show. Try searching for something below.', 'bitter-sweet' ); ?></p>
	  <div class="search-wrap col-md-6">
	    <?php get_search_form(); ?>
	  </div> <!-- .search-wrap -->
	</div>
</article> <!-- .not-found -->

<?php get_footer(); ?>