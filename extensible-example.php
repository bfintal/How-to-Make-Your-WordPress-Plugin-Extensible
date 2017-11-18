<?php
/*
Plugin Name: Extensible Example
Description: An extensible example
Version: 20171118
Author: Benjamin Intal @bfintal
Author URI: twitter.com/bfintal
License: MIT License
License URI: https://opensource.org/licenses/MIT
*/

/**
 * Our main function that does all the heavy lifting.
 * This is what we want to allow other developers to modify.
 */
function get_some_post_titles() {
	$args = array(
		'posts_per_page' => 3,
	);

	// Let other people modify the arguments.
	$posts = get_posts( apply_filters( 'myplugin_get_posts_args', $args ) );

	// Let other people modify the post array which will be used for display.
	$posts = apply_filters( 'myplugin_get_posts', $posts, $args );

	$output = '<ul>';
	foreach ( $posts as $post ) {

		// Let other people modify the list entry.
		$output .= '<li>' . apply_filters( 'myplugin_list_item', $post->post_title, $post ) . '</li>';
	}
	$output .= '</ul>';

	// Let other people modify our output list.
	return apply_filters( 'myplugin_get_some_post_titles', $output, $args );
}

/**
 * Example widget just in case you want to see the above function in action.
 * Just add the "Example Widget" in your widget area.
 *
 * @from https://premium.wpmudev.org/blog/create-custom-wordpress-widget/
 */
class My_Plugin_Widget extends WP_Widget {

	public function __construct() {
		$widget_options = array(
			'classname' => 'example_widget',
			'description' => 'This is widget is not extensible.',
		);
		parent::__construct( 'example_widget', 'Example Widget', $widget_options );
	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance[ 'title' ] );
		$blog_title = get_bloginfo( 'name' );
		$tagline = get_bloginfo( 'description' );
		echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title'];

		echo get_some_post_titles();

		echo $args['after_widget'];
	}

	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : ''; ?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
		<input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p><?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
		return $instance;
	}

}

add_action( 'widgets_init', 'register_my_widget' );
function register_my_widget() {
	register_widget( 'My_Plugin_Widget' );
}
