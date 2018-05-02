<?php
defined( 'ABSPATH' ) || exit;

/*
* Register Widget
*/
function hms_register_author_widget() {
  register_widget( 'hms_author_feed' );
}
add_action( 'widgets_init', 'hms_register_author_widget' );



/*
* HMS Author Feed Widget
*/
class hms_author_feed extends WP_Widget {

  function __construct() {
  parent::__construct(

    // Base ID of your widget
    'hms_author_feed',

    // Widget name will appear in UI
    __('HMS Author Feed', 'hms_author_feed_domain'),

    // Widget description
    array( 'description' => __( 'Display WP Users in your sidebar.' ), )
    );
  }

  // Creating widget front-end
  public function widget( $args, $instance ) {

      $title = apply_filters( 'widget_title', $instance['title'] );

      // before widget arguments are defined by themes
      echo $args['before_widget'];

      if ( ! empty( $title ) ) {
        echo $args['before_title'] . $title . $args['after_title'];
      }
      ?>

      <?php
      $author = get_field( 'member_user', $post_id);

    	if( $author ) :

    	$author_id = $author['ID'];

      $current_ID = get_the_ID();

  		?>

    		<?php
    		// Assuming you've got $author_id set
    		// and your post type is called 'your_post_type'
    		$args = array(
    		  //'author' => $author_id,
    			'post_type' => array( 'team_members' ),
    			'posts_per_page'	=> -1,
          'post__not_in' => array( $current_ID ),
    			'status'		=> 'published',
    			'orderby'		=> 'title',
    			'order'			=> 'ASC',

    		);

    		$author_posts = new WP_Query( $args );

    		if( $author_posts->have_posts() ) :
    			echo '<ul>';
    		  while( $author_posts->have_posts() ) :
    		  	$author_posts->the_post();
            ?>
            <li>
              <div class="image-con">
                <?php echo get_the_post_thumbnail( $post, array( 60, 60), true); ?>
              </div>
              <div class="author-short">
              <a href="<?php echo get_the_permalink(); ?>" title="<?php get_the_title(); ?>" target="_self"><?php echo get_the_title(); ?></a>

              <?php $position = get_field( 'member_position' ); ?>
              <?php if( $position ) : ?>
                <p class="position-short"><?php echo $position; ?></p>
              <?php endif; ?>
              </div>
            </li>


            <?php
    				get_the_excerpt( $author_posts );

              // title, content, etc
    			    $author_posts->the_title();
    			    $author_posts->the_content();

    		  endwhile;
    			echo '</ul>';
    		  wp_reset_postdata();
    		endif; ?>

    	<?php endif; ?>

      <?php
      echo $args['after_widget'];

  }


  // Widget Backend
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    }
    else {
      $title = __( 'Team Members', 'hms_author_feed_domain' );
    }
    // Widget admin form
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    <?php
  }

  // Updating widget replacing old instances with new
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
    return $instance;
  }
}
