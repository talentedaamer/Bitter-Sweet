<?php
/**
 *
 *	FILE FOR COMMENTS - SHOWING COMMENTS TRACKBACKS
 *
 *	This file is for comments, comments form, showing and managing comments on post and pages.
 *
 */

if ( post_password_required() )
	return;
?>

<?php if ( have_comments() ) : ?>
	<div id="comments" class="comments-area">
		<h2 class="comments-title">
			<?php
			printf( _nx( '{1} Thought on &ldquo;%2$s&rdquo;', '{%1$s} Thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'bitter-sweet' ),
			number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
			?>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'callback' => 'bittersweet_comment',
					'avatar_size' => 60
					) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
			<nav id="comment-nav-below" class="comment-navigation" role="navigation">
				<ul class="pager">
					<li class="pull-right"><?php previous_comments_link( __( 'Older Comments <span class="glyphicon glyphicon-chevron-right"></span>', 'bitter-sweet' ) ); ?></li>
					<li class="pull-left"><?php next_comments_link( __( '<span class="glyphicon glyphicon-chevron-left"></span> Newer Comments', 'bitter-sweet' ) ); ?></li>
				</ul>
			</nav><!-- #comment-nav-below -->
		<?php endif; // check for comment navigation ?>
	</div><!-- #comments -->
<?php endif; // have_comments() ?>

<!-- if there are comments and are closed comments -->
<?php if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
	<div class="comments-closed alert alert-info"><h3><?php _e( 'Comments are closed.', 'bitter-sweet' ); ?></h3></div>
<?php endif; ?>

<!-- comment form filtering inputs adding button class -->
<?php
	$args = array(
		'comment_field' => '<p class="comment-form-comment"><label for="comment">Comment</label> <textarea class="form-control" id="comment" name="comment" cols="35" rows="12" aria-required="true"></textarea></p>',
		'fields'        => array(
			'author' => '<p class="comment-form-author"><label for="author">Name <span class="required">*</span></label> <input class="form-control input-comment-author" id="author" name="author" type="text" value="" size="30" aria-required="true"></p>',
			'email'  => '<p class="comment-form-email"><label for="email">Email <span class="required">*</span></label> <input class="form-control input-comment-email" id="email" name="email" type="text" value="" size="30" aria-required="true"></p>',
			'url'    => '<p class="comment-form-url"><label for="url">Website</label> <input class="form-control input-comment-url" id="url" name="url" type="text" value="" size="30"></p>',
		),
		'cancel_reply_link' => '<button class="btn btn-danger btn-xs">Cancel reply</button>',
		'label_submit' => 'Post Comment',
	);
	ob_start();
	comment_form( $args );
	$form = ob_get_clean(); 
	$form = str_replace('class="comment-form"','class="comment-form has-info"', $form);
	echo str_replace('id="submit"','class="btn btn-info"', $form);
?>
