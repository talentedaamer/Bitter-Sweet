<?php
/**
 *
 *	DEFAULT PAGE TEMPLATE TO SHOW THE CONTENT
 *
 *	This is default content template and is loaded in the index.php
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>

<?php if ( is_search() ) { ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark">
			<span class="permalink glyphicon glyphicon-share-alt"></span>
				<?php the_title(); ?>
			</a>
		</h1>
		<?php the_excerpt(); ?>
<?php } else { ?>

		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<header class="entry-header">
				<h1 class="entry-title">
					<span class="glyphicon glyphicon-star-empty"></span>
					<?php _e( 'Featured Post', 'bitter-sweet' ); ?>
				</h1>
			</header>
		<?php endif; ?>

		<?php if ( is_singular() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" rel="bookmark">
				<span class="permalink glyphicon glyphicon-share-alt"></span>
					<?php the_title(); ?>
				</a>
			</h1>
		<?php endif; // is_single() ?>


		<?php do_action('bittersweet_meta_entry_header'); ?>

		<?php the_content( __( 'Read More <span class="glyphicon glyphicon-chevron-right"></span>', 'bitter-sweet' ) ); ?>
		
		<?php 
		// show page links when page has divided into subpages
		wp_link_pages( array(
				'before'      => '<div class="page-links"><div class="label label-info"><span class="page-links-title">' . __( 'Pages:', 'bitter-sweet' ) . '</span>',
				'after'       => '</div></div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
			) );
		?>

		<?php do_action('bittersweet_meta_entry_footer'); ?>

		<?php edit_post_link( __( 'Edit', 'bitter-sweet' ), '<span class="edit-link pull-right label label-danger">', '</span>' ); ?>

<?php } ?>
</article>