<?php
/**
 *
 *	TEMPLATE FOR GALLERY POST FORMATS
 *
 *	This file shows gallery post format.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
	<?php if ( is_singular() ) { ?>
		<div class="gallery-content">
			<h1 class="entry-title">
				<?php the_title(); ?>
			</h1>

			<?php do_action('bittersweet_meta_entry_header'); ?>

			<div class="entry-content">
				<?php the_content(); ?>
			<?php do_action('bittersweet_meta_entry_footer'); ?>
			</div> <!-- .entry-content -->
		</div><!-- .gallery-content -->
	<?php } else { ?>
		<div class="row">
			<div class="gallery-thumbnail col-md-6">
				<?php if ('' != get_the_post_thumbnail()) { // check if post has thumbnail ?>
					<div class="gallery-thumbnail thumbnail">
						<?php the_post_thumbnail('large'); // then show blog-thumbnail ?>
					</div>
				<?php } ?>
			</div>
			<div class="gallery-content col-md-6">
				<?php if ( is_singular() ) : ?>
					 	<h1 class="entry-title"><?php the_title(); ?></h1>
				<?php else : ?>
					 	<h1 class="entry-title">
							<a href="<?php the_permalink(); ?>" rel="bookmark">
							<span class="permalink glyphicon glyphicon-picture"></span>
								<?php the_title(); ?>
							</a>
						</h1>
				<?php endif; ?>
				<?php do_action('bittersweet_meta_entry_header'); ?>
				<?php do_action('bittersweet_meta_entry_footer'); ?>
				<div class="entry-content content-aside">
					<?php 
						//first get the id of the attachment:
						$image_id = get_post_thumbnail_id( $post->ID );
						//then based on that id get the attachments data:
						$attachment = get_post($image_id);
						//now you got access to title, caption, etc
						$image_title = $attachment->post_title;
						$image_description = $attachment->post_excerpt;
						echo $image_description;
					?>
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
			</div> <!-- .gallery-content -->
		</div> <!-- .row -->
	<?php } ?>
</article><!-- #post -->
