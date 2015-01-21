<?php 
/**
 *
 *	TEMPLATE TAGS - HOOKED IN DIFFERENT PLACES
 *
 *	This is template tags file where all tags are hooked into there proper do_actions
 *
 */
 
// expandable search box
add_action('bittersweet_nav_right', 'nav_right_search');
function nav_right_search() { ?>
          <div id="sb-search" class="sb-search pull-right has-info">
            <form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
              <input type="text" class="sb-search-input field form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search', 'bitter-sweet' ); ?>">
              <button class="sb-icon-search btn btn-info submit"  type="submit" name="submit" id="searchsubmit">
                <span class="glyphicon glyphicon-search"></span>
              </button>
            </form>
          </div>
<?php }

// opening of entry header markup
function bittersweet_meta_entry_header_markup_open() {
	echo '<header class="entry-meta-header panel-heading">';
}
add_action( 'bittersweet_meta_entry_header', 'bittersweet_meta_entry_header_markup_open', 1 );

// posted on - post date
if ( ! function_exists( 'bittersweet_posted_on' ) ) :
function bittersweet_posted_on() {
	printf( __( '<span class="post-date">
					<span class="meta-icon glyphicon glyphicon-time"></span>
					<a href="%1$s" title="%2$s">
						<time class="entry-date" datetime="%3$s">%4$s</time>
					</a>
				</span>', 'bitter-sweet' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}
add_action( 'bittersweet_meta_entry_header', 'bittersweet_posted_on', 2 );
endif;

// posted by - post author
if ( ! function_exists( 'bittersweet_post_author' ) ) :
function bittersweet_post_author() {

	printf( __( '<span class="post-author"><span class="meta-icon glyphicon glyphicon-user"></span> <span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span></span>', 'bitter-sweet' ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'bitter-sweet' ), get_the_author() ) ),
		esc_html( get_the_author() )
	);
}
add_action( 'bittersweet_meta_entry_header', 'bittersweet_post_author', 3 );
endif;

// comment link
if ( ! function_exists( 'bittersweet_post_comments_link' ) ):
function bittersweet_post_comments_link() {
	if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) { ?>
		<span class="post-comment">
			<span class="meta-icon glyphicon glyphicon-comment"></span>
			<?php comments_popup_link( __( ' Leave a comment', 'bitter-sweet' ), __( ' 1 Comment', 'bitter-sweet' ), __( ' % Comments', 'bitter-sweet' ) ); ?>
		</span>
	<?php }
}
add_action( 'bittersweet_meta_entry_header', 'bittersweet_post_comments_link', 4 );
endif;


// closing of entry header markup
function bittersweet_meta_entry_header_markup_close() {
	echo '</header>';
}
add_action( 'bittersweet_meta_entry_header', 'bittersweet_meta_entry_header_markup_close', 5 );



// opening of entry footer markup
function bittersweet_meta_entry_footer_markup_open() {
	echo '<footer class="entry-meta-footer panel-heading">';
}
add_action( 'bittersweet_meta_entry_footer', 'bittersweet_meta_entry_footer_markup_open', 1 );

// post categories
if ( ! function_exists( 'bittersweet_post_cats' ) ):
function bittersweet_post_cats() {

	$post_categories = get_the_category();
	if ( $post_categories ) {

		echo '<span class="post-cats"><span class="meta-icon glyphicon glyphicon-folder-open"></span> ';
		$num_categories = count( $post_categories );
		$category_count = 1;

		foreach ( $post_categories as $category ) {
			$html_before = '<a href="' . get_category_link( $category->term_id ) . '" class="cat-text">';
			$html_after = '</a>';

			if ( $category_count < $num_categories )
				$sep = ', ';
			elseif ( $category_count == $num_categories )
				$sep = '';
				echo $html_before . $category->name . $html_after . $sep;
				$category_count++;
			}
		echo '</span>';
	}
}
add_action( 'bittersweet_meta_entry_footer', 'bittersweet_post_cats', 2 );
endif;


// post tags
if ( ! function_exists( 'bittersweet_post_tags' ) ):
function bittersweet_post_tags() {

	$post_tags = get_the_tags();
	if ( $post_tags ) {

		echo '<span class="post-tags"><span class="meta-icon glyphicon glyphicon-tag"></span> ';
		$num_tags = count( $post_tags );
		$tag_count = 1;

		foreach( $post_tags as $tag ) {
			$html_before = '<a href="' . get_tag_link($tag->term_id) . '" rel="tag nofollow" class="tag-text">';
			$html_after = '</a>';

			if ( $tag_count < $num_tags )
				$sep = ', ';
			elseif ( $tag_count == $num_tags )
				$sep = '';

			echo $html_before . $tag->name . $html_after . $sep;
			$tag_count++;
		}
		echo '</span>';
	}
}
add_action( 'bittersweet_meta_entry_footer', 'bittersweet_post_tags', 3 );
endif;



// closing of entry footer markup
function bittersweet_meta_entry_footer_markup_close() {
	echo '</footer>';
}
add_action( 'bittersweet_meta_entry_footer', 'bittersweet_meta_entry_footer_markup_close', 4 );


// opening of entry header markup
function bittersweet_home_blog_meta_markup_open() {
	echo '<header class="entry-meta-header panel-heading">';
}
add_action( 'bittersweet_home_blog_meta', 'bittersweet_home_blog_meta_markup_open', 1 );

// posted on - post date
if ( ! function_exists( 'bittersweet_home_blog_date' ) ) :
function bittersweet_home_blog_date() {
	printf( __( '<span class="post-date">
					<span class="meta-icon glyphicon glyphicon-time"></span>
					<a href="%1$s" title="%2$s">
						<time class="entry-date" datetime="%3$s">%4$s</time>
					</a>
				</span>', 'bitter-sweet' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}
add_action( 'bittersweet_home_blog_meta', 'bittersweet_home_blog_date', 2 );
endif;

// comment link
if ( ! function_exists( 'bittersweet_home_blog_comments' ) ):
function bittersweet_home_blog_comments() {
	if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) { ?>
		<span class="post-comment pull-right">
			<span class="meta-icon glyphicon glyphicon-comment"></span>
			<?php comments_popup_link( __( ' 0', 'bitter-sweet' ), __( ' 1', 'bitter-sweet' ), __( ' %', 'bitter-sweet' ) ); ?>
		</span>
	<?php }
}
add_action( 'bittersweet_home_blog_meta', 'bittersweet_home_blog_comments', 3 );
endif;


// closing of entry header markup
function bittersweet_home_blog_markup_close() {
	echo '</header>';
}
add_action( 'bittersweet_home_blog_meta', 'bittersweet_home_blog_markup_close', 4 );





// WIDGET POST DATE AND COMMENTS
// posted on - post date
if ( ! function_exists( 'bittersweet_recent_widget_date' ) ) :
function bittersweet_recent_widget_date() {
	printf( __( '<span class="post-date">
					<span class="meta-icon glyphicon glyphicon-time"></span>
					<a href="%1$s" title="%2$s">
						<time class="entry-date" datetime="%3$s">%4$s</time>
					</a>
				</span>', 'bitter-sweet' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);
}
add_action( 'bittersweet_recent_post_widget_meta', 'bittersweet_recent_widget_date', 2 );
endif;

// comment link
if ( ! function_exists( 'bittersweet_recent_widget_comments' ) ):
function bittersweet_recent_widget_comments() {
	if ( comments_open() || ( '0' != get_comments_number() && ! comments_open() ) ) { ?>
		<span class="post-comment">
			<span class="meta-icon glyphicon glyphicon-comment"></span>
			<?php comments_popup_link( __( ' 0', 'bitter-sweet' ), __( ' 1', 'bitter-sweet' ), __( ' %', 'bitter-sweet' ) ); ?>
		</span>
	<?php }
}
add_action( 'bittersweet_recent_post_widget_meta', 'bittersweet_recent_widget_comments', 3 );
endif;