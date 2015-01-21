<?php
/**
 *
 *	TEMPLATE FOR PAGE FORMAT LINK
 *
 *	Template to style link post format.
 *
 */
 
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
	<?php if ( is_singular() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php else : ?>
	 	<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
			<span class="permalink glyphicon glyphicon-comment"></span>
				<?php the_title(); ?>
			</a>
		</h1>
	<?php endif; ?>

	<?php do_action('bittersweet_meta_entry_header'); ?>

	<blockquote class="entry-content">
		<?php the_content( __( 'Read More <span class="glyphicon glyphicon-chevron-right"></span>', 'bitter-sweet' ) ); ?>
	</blockquote><!-- .entry-content -->

	<?php do_action('bittersweet_meta_entry_footer'); ?>
</article><!-- #post -->