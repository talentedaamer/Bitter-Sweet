<?php
/**
 *
 *	TEMPLATE TO SHOW IMAGE AND ATTACHMENTS
 *
 *	Display image and other attachments. Mostly image gallery with next and prev images.
 *
 */
get_header(); ?>

<div id="content" class="content col-md-8 col-sm-8">
	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( 'image-attachment blog-post' ); ?>>

			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php do_action('bittersweet_meta_entry_header'); ?>

			<nav class="next-prev">
				<ul class="pager">
					<li class="previous">
						<?php previous_image_link( false, __( '<span class="glyphicon glyphicon-chevron-left"></span> Previous', 'bitter-sweet' ) ); ?>
					</li>
					<li class="next">
						<?php next_image_link( false, __( 'Next <span class="glyphicon glyphicon-chevron-right"></span>', 'bitter-sweet' ) ); ?>
					</li>
				</ul><!-- .pagination -->
			</nav>

			<?php
			// get image id so that we can get next image in gallery.
			$attachments = array_values( get_children( array(
				'post_parent'    => $post->post_parent,
				'post_status'    => 'inherit',
				'post_type'      => 'attachment',
				'post_mime_type' => 'image',
				'order'          => 'ASC',
				'orderby'        => 'menu_order ID'
			) ) );
			foreach ( $attachments as $k => $attachment ) {
				if ( $attachment->ID == $post->ID )
					break;
			}
			$k++;
			// If there is more than 1 attachment in a gallery
			if ( count( $attachments ) > 1 ) {
				if ( isset( $attachments[ $k ] ) )
					// get the URL of the next image attachment
					$next_attachment_url = get_attachment_link( $attachments[ $k ]->ID );
				else
					// or get the URL of the first image attachment
					$next_attachment_url = get_attachment_link( $attachments[ 0 ]->ID );
			} else {
					// or, if there's only 1 image, get the URL of the image
					$next_attachment_url = wp_get_attachment_url();
				}
			?>

			<div class="entry-content">
				<a href="<?php echo $next_attachment_url; ?>" title="<?php the_title_attribute(); ?>" rel="attachment">
					<?php
						$attachment_size = apply_filters( 'bittersweet_attachment_size', array( 1200, 1200 ) );
						echo wp_get_attachment_image( $post->ID, $attachment_size );
					?>
				</a>
			</div> <!-- .entry-content -->

			<?php if ( ! empty( $post->post_excerpt ) ) : ?>
				<div class="entry-caption">
					<?php the_excerpt(); ?>
				</div><!-- .entry-caption -->
			<?php endif; ?>

			<div class="entry-description">			
				<?php the_content(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . __( 'Pages:', 'bitter-sweet' ),
						'after'  => '</div>',
					) );
				?>
			</div> <!-- .entry-description -->

			<?php edit_post_link( __( 'Edit', '' ), '<span class="edit-link pull-right label label-danger">', '</span>' ); ?>
		</article><!-- #post -->
		<?php comments_template(); ?>
	<?php endwhile; // end of the loop. ?>
</div><!-- #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
