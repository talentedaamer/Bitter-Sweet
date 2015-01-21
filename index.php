<?php
/**
 *
 *  MAIN TEMPLATE FOR THE THEME.
 *
 *  Main template for the theme which show all the content and include other page templates and formats.
 *
 */

get_header(); ?>

    <div class="col-md-8 col-sm-8">
      <?php if ( have_posts() ) : // if there are posts to show
        while ( have_posts() ) : // while there are posts
          the_post(); // show the posts

          get_template_part( 'content', get_post_format() ); 
        // get content & post format
        endwhile;

      bittersweet_pagination();

      else : ?>
        <article class="not-found blog-post post">

        <h1 class="entry-title">
          <span class="glyphicon glyphicon-bullhorn"></span>
            <?php _e( 'Nothing Found', 'bitter-sweet' ); ?>
          </a>
        </h1>


        <div class="entry-content">
          <p><?php _e( 'Sorry currently there are no posts to show. Try searching for something below.', 'bitter-sweet' ); ?></p>
          <div class="search-wrap col-md-6">
            <?php get_search_form(); ?>
          </div> <!-- .search-wrap -->
        </div>

        </article> <!-- .not-found -->
      <?php endif; ?>
    </div> <!-- .col-md-8 -->
    <?php get_sidebar(); ?>

<?php get_footer(); ?>
