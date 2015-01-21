<?php
/**
 * Template Name: Blog
 *
 * The blog page template displays the "blog-style" template on a sub-page. 
 *
 */

 get_header(); ?>

<div class="blog-wrap">
<div class="container">
    <div id="blog-content" class="row">  
        <div class="col-md-8">
            <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $bittersweet_args = array(
                                    'post_type' => 'post', 
                                    'paged' => $paged
                                );
                $bittersweet_blog = new WP_Query($bittersweet_args); 

                while ($bittersweet_blog->have_posts()) : $bittersweet_blog->the_post();
                    
                    get_template_part( 'content', get_post_format() ); ?>

            <?php endwhile; ?>

                <?php bittersweet_pagination_nav(); ?>
        
            <?php wp_reset_postdata(); ?>
        
        </div> <!-- .col-md-8 -->
    <?php get_sidebar(); ?>
    </div><!-- #row -->
</div> <!-- .container -->
</div> <!-- .content-wrap -->
<?php get_footer(); ?>