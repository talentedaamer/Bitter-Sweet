<?php
/**
 *
 *	TEMPLATE FOR PAGE.PHP
 *
 *	This file is included in page.php to show the content of the stadard page.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
	<?php if ( is_singular() ) : ?>
		<h1 class="page-title entry-title"><?php the_title(); ?></h1>
	<?php else : ?>
	 	<h1 class="page-title entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
			<span class="permalink glyphicon glyphicon-file"></span>
				<?php the_title(); ?>
			</a>
		</h1>
	<?php endif; ?>
	<div class="entry-content">
		<?php the_content(); ?>
	<?php 
	// show page links when page has divided into subpages
	wp_link_pages( array(
			'before'      => '<div class="page-links"><div class="label label-info"><span class="page-links-title">' . __( 'Pages:', 'bitter-sweet' ) . '</span>',
			'after'       => '</div></div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
		) );
	?>
	</div><!-- .entry-content -->

	<?php edit_post_link( __( 'Edit', 'bitter-sweet' ), '<span class="edit-link pull-right label label-danger">', '</span>' ); ?>

</article><!-- #post -->