<?php
/**
 *
 *	THEME FUNCTIONS FILE
 *
 *	All theme functions are placed in this file.
 *
 */

/**
 * --------------------------------------------------------------------------------------------------------------
 *	defination constants
 * --------------------------------------------------------------------------------------------------------------
 */

define( 'THEMEROOT', get_stylesheet_directory_uri() );
define( 'IMAGES', THEMEROOT . '/images' );
define( 'SCRIPTS', THEMEROOT . '/js' );
define( 'STYLES', THEMEROOT . '/css' );

/*-----------------------------------------------------------------------------------*/
/* Set Template directory path */
/*-----------------------------------------------------------------------------------*/

$bittersweet_tem_dir = get_template_directory();

/*-----------------------------------------------------------------------------------*/
/* Including other functions files */
/*-----------------------------------------------------------------------------------*/

require ( $bittersweet_tem_dir . '/inc/wp_bootstrap_navwalker.php' );	// bootstrap nav walker.
require ( $bittersweet_tem_dir . '/inc/template-tags.php' );			// template tags, hooks.
require ( $bittersweet_tem_dir . '/inc/theme-widgets.php' );			// register widgets/sidebars.
require ( $bittersweet_tem_dir . '/inc/widget-areas.php' );				// custom theme widgets.

/*-----------------------------------------------------------------------------------*/
/* Theme Setup */
/*-----------------------------------------------------------------------------------*/

function bittersweet_theme_setup() {
	global $content_width;
	
	if ( ! isset( $content_width ) )
	$content_width = 780; // pixels

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Theme POST FORMATS
	add_theme_support( 'post-formats', array(
		'aside',
		'gallery',
		'image',
		'link',
		'quote',
		'status',
		'video',
		'audio',
		'chat'
		)
	);

	register_nav_menus(
		array(
			'main-menu' => __( 'Main Menu', 'bitter-sweet' ),
		)
	);

	// add Theme Post Thumbnail Support
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'recent-posts', 70, 70, true );
	add_image_size( 'featured-post', 330, 200, true );

}
add_action( 'after_setup_theme', 'bittersweet_theme_setup' );

/*-----------------------------------------------------------------------------------*/
/* Register theme scripts & styles */
/*-----------------------------------------------------------------------------------*/

add_action('wp_enqueue_scripts', 'bittersweet_scripts_styles');
function bittersweet_scripts_styles() {
	// enqueue theme styles
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', 'style');
	wp_enqueue_style('shareicons', get_template_directory_uri() . '/css/shareicons.css', 'style');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
	
	// enqueue theme scripts
	wp_enqueue_script( 'slides', SCRIPTS . '/jquery.slides.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'bootstrap', SCRIPTS . '/bootstrap.min.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'classie', SCRIPTS . '/classie.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'uisearch', SCRIPTS . '/uisearch.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'easing', SCRIPTS . '/easing.js', array( 'jquery' ), false, true );
	wp_enqueue_script( 'ui-to-top', SCRIPTS . '/jquery.ui.totop.min.js', array( 'jquery' ), false, true );

	wp_register_script( 'html5shiv', SCRIPTS . '/html5shiv.js', array( 'jquery' ), false, true );
	wp_register_script( 'respond', SCRIPTS . '/respond.min.js', array( 'jquery' ), false, true );

	wp_enqueue_script( 'component', get_template_directory_uri() . '/js/component.js',array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'bitter-sweet-modernizr', get_template_directory_uri() . '/js/modernizr.custom.js',array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'bitter-sweet-functions', get_template_directory_uri() . '/js/custom-functions.js',array( 'jquery' ), '1.0', true );

	global $is_IE;

	if ( $is_IE ) {
		wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js', 'jquery');
	    wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.min.js', 'jquery');
    }

	// load comment-reply on single
	if ( is_singular() ) wp_enqueue_script('comment-reply');
}



// Filtering wp_title
add_filter( 'wp_title', 'bittersweet_wp_title_filter' );
function bittersweet_wp_title_filter( $title ) {
	global $page, $paged;
	if ( is_feed() )
		return $title;
	$site_description = get_bloginfo( 'description' );
	$filtered_title = $title . get_bloginfo( 'name' );
	$filtered_title .= ( ! empty( $site_description ) && ( is_home() || is_front_page() ) ) ? ' | ' . $site_description: '';
	$filtered_title .= ( 2 <= $paged || 2 <= $page ) ? ' | ' . sprintf( __( 'Page %s', 'bitter-sweet' ), max( $paged, $page ) ) : '';

	// show filtered title
	return $filtered_title;
}



if ( ! function_exists( 'bittersweet_content_nav' ) ) :
// function for content nav below posts
function bittersweet_content_nav( $class ) {
	global $wp_query;

	$class = esc_attr( $class );

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<ul class="<?php echo $class; ?>">
			<li class="previous">
				<?php next_posts_link( __( '<span class="glyphicon glyphicon-chevron-left"></span> Older posts', 'bitter-sweet' ) ); ?>
			</li>
			<li class="next">
				<?php previous_posts_link( __( 'Newer posts <span class="glyphicon glyphicon-chevron-right"></span>', 'bitter-sweet' ) ); ?>
			</li>
		</ul>
	<?php endif;
}
endif;

// Password Form.
add_filter( 'the_password_form', 'bittersweet_password_form' );
function bittersweet_password_form() {
	global $post;
	$label = 'password-'.( empty( $post->ID ) ? rand() : $post->ID );
	$password_form = '<form class="protected-post-form" action="' . esc_url( home_url( '/' ) ) . '/wp-login.php?action=postpass" method="post">
    '.__('<p>This post is password protected. To view it please enter your password below:</p>', 'bitter-sweet').'
    <label for="' . $label . '">' . __( "Password:" ,'bitter-sweet') . ' </label>
    <div class="protected-form input-group has-info col-md-6">
        <input class="form-control" name="post_password" id="' . $label . '" type="password">
        <span class="input-group-btn"><button type="submit" class="btn btn-primary" name="submit" id="searchsubmit" value="Submit"><span class="glyphicon glyphicon-lock"></span></button>
        </span>
    </div>
</form>';
	return $password_form;
}


/**
 * bittersweet paginated links
 */
function bittersweet_pagination() {
    global $wp_query;

    $big = 999999999; // need an unlikely integer

    $pages = paginate_links( array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => max( 1, get_query_var('paged') ),
            'total' => $wp_query->max_num_pages,
            'mid_size' => 2,
            'type'  => 'array',
            'prev_next'   => true,
			'prev_text'    => '<span class="glyphicon glyphicon-chevron-left"></span>',
			'next_text'    => '<span class="glyphicon glyphicon-chevron-right"></span>',
        ) );
        if( is_array( $pages ) ) {
            $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
            echo '<div class="pagination-wrap"><ul class="pagination">';
            foreach ( $pages as $page ) {
                    echo "<li>$page</li>";
            }
           echo '</ul></div>';
        }
}


// comment after text
add_filter( 'comment_form_defaults', 'bittersweet_filter_allowed_tags' );
function bittersweet_filter_allowed_tags( $defaults ) {
	$defaults['comment_notes_after'] = '<div class="form-allowed-tags"><p>' . sprintf( __( 'You may use these <abbr title="HyperText Markup Language">HTML</abbr> tags and attributes: %s' ), ' <code>' . allowed_tags() . '</code>' ) . '</p></div>';
	return $defaults;
}

// COMMENTS AND PINGBACKS
if ( ! function_exists( 'bittersweet_comment' ) ) :
function bittersweet_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;

	if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
		<div class="comment-body">
			<?php _e( 'Pingback:', 'bitter-sweet' ); ?> <?php comment_author_link(); ?>
			
		</div>

	<?php else : ?>

	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
			<footer class="comment-meta">
				<div class="comment-author vcard">
					<?php if ( 0 != $args['avatar_size'] ) echo get_avatar( $comment, $args['avatar_size'] ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', 'bitter-sweet' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author -->

				<div class="comment-metadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<time datetime="<?php comment_time( 'c' ); ?>">
							<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', 'bitter-sweet' ), get_comment_date(), get_comment_time() ); ?>
						</time>
					</a>
				</div><!-- .comment-metadata -->

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'bitter-sweet' ); ?></p>
				<?php endif; ?>
			</footer><!-- .comment-meta -->

			<div class="comment-content">
				<?php comment_text(); ?>
			</div><!-- .comment-content -->

			<?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
					'before'    => '<div class="reply">',
					'after'     => '</div>',
				) ) );
			?>
			<?php edit_comment_link( __( 'Edit', 'bitter-sweet' ), '<span class="edit-link pull-right label label-danger">', '</span>' ); ?>
		</article><!-- .comment-body -->

	<?php
	endif;
}
endif; // ends check for bittersweet_comment()

// comment reply link
if ( ! function_exists( 'bittersweet_comment_reply_link' ) ):
// Style comment reply links as buttons
function bittersweet_comment_reply_link( $link ) {
	return str_replace( 'comment-reply-link', 'btn btn-default btn-xs', $link );
}
add_filter( 'comment_reply_link', 'bittersweet_comment_reply_link' );
endif;

