<?php
/**
 *
 *	TEMPLATE FOR SHOWING POST FORMAT ASIDE
 *
 *	post format aside is formated in this file.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
	<?php if ( is_singular() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php else : ?>
	 	<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
			<span class="permalink glyphicon glyphicon-file"></span>
				<?php the_title(); ?>
			</a>
		</h1>
	<?php endif; ?>

	<?php do_action('bittersweet_meta_entry_header'); ?>

	<div class="entry-content content-aside">
		<?php the_content( __( 'Read More <span class="glyphicon glyphicon-chevron-right"></span>', 'bitter-sweet' ) ); ?>
	</div><!-- .entry-content -->

	<?php do_action('bittersweet_meta_entry_footer'); ?>

</article><!-- #post -->