<?php
/**
 * Theme Widgets.
 *
 */

// Recent Posts with Thumbnail Widget
class bittersweet_recent_posts extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'bitter-sweet-recent-posts', // Base widget ID
			__('01 : Recent Posts Thumbnail', 'bitter-sweet'), // Title of Widget
			array( 
				'description' => __( 'Display recent blog posts with Thumbnails.', 'bitter-sweet' ),
			)
		);
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		$no_of_posts = apply_filters( 'no_of_posts', $instance['no_of_posts'] );

		echo $args['before_widget'];
		
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];
		
		// WP_Query arguments
		$query_args = array (
			'post_type'              => 'post',
			'posts_per_page'		 => $no_of_posts,
			'offset'				 => 0,
			'ignore_sticky_posts'    => 1
		);
		// The Query
		$recent_posts = new WP_Query( $query_args );
		if($recent_posts->have_posts()) : ?>
		
		<?php
			while($recent_posts->have_posts()) : 
			$recent_posts->the_post();
         ?>
        <div class="bitter-sweet-recent-posts media">
	         <?php if( has_post_thumbnail() ) : ?>
	         	<a class="thumbnail pull-left" href="<?php the_permalink(); ?>">
	         		<?php the_post_thumbnail('recent-posts'); ?>
	         	</a>
	         <?php else : ?>
		         <a class="thumbnail no-image pull-left" href="<?php the_permalink(); ?>">
		         	<span class="no-image-icon glyphicon glyphicon-picture"></span>
		         </a>
	         <?php endif; ?>	
	         <div class="recent-post-body media-body">
	         	<h4 class="recent-post-title media-heading">
		         	<a href="<?php the_permalink(); ?>">
		         		<?php the_title(); ?>
		         	</a>
	         	</h4>
	         	<?php do_action('bittersweet_recent_post_widget_meta'); ?>

	         </div> <!-- .media-body -->   
		</div> <!-- .media -->
		<?php endwhile; ?>

		<?php else: ?>
		      Sorry ! There are no posts yet.
		<?php endif; ?>

		<?php
		
		echo $args['after_widget'];
	}

 	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'Latest Posts', 'bitter-sweet' );
		}
		if ( isset( $instance[ 'no_of_posts' ] ) ) {
			$no_of_posts = $instance[ 'no_of_posts' ];
		}
		else {
			$no_of_posts = __( '5', 'bitter-sweet' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:', 'bitter-sweet' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		
		<label for="<?php echo $this->get_field_id( 'no_of_posts' ); ?>"><?php _e( 'No. of Posts:', 'bitter-sweet' ); ?></label>
		<input class="widefat" id="<?php echo $this->get_field_id( 'no_of_posts' ); ?>" name="<?php echo $this->get_field_name( 'no_of_posts' ); ?>" type="text" value="<?php echo esc_attr( $no_of_posts ); ?>" />
		</p>
		<?php 
	}
	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['no_of_posts'] = ( ! empty( $new_instance['no_of_posts'] ) ) ? strip_tags( $new_instance['no_of_posts'] ) : '5';
		if ( is_numeric($new_instance['no_of_posts']) == false ) {
			$instance['no_of_posts'] = $old_instance['no_of_posts'];
			}
		return $instance;
		
		
	}
}


add_action( 'widgets_init', 'register_bittersweet_widgets' );  
function register_bittersweet_widgets() {  
    register_widget( 'bittersweet_recent_posts' );  
} 