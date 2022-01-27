<?php
/**
 * Adds Social feed widget.
 */
 class Social_Widget extends WP_Widget {
  
    /**
     * Register widget with WordPress.
     */
    function __construct() {
      parent::__construct(
        'social_widget', // Base ID
        esc_html__( 'Social Feed', 'social_domain' ), // Name
        array( 'description' => esc_html__( 'Widget to display Twitter and Youtube Page', 'social_domain' ), ) // Args
      );
    }
  
    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
      echo $args['before_widget']; 

      if ( ! empty( $instance['title'] ) ) {
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
      }

      // Widget Content Output
      echo '<a class="twitter-timeline" data-height="'.$instance['height'].'" data-theme="'.$instance['theme'].'" href="'.$instance['username'].'"></a> ';

      if ( ! empty( $instance['title2'] ) ) {
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title2'] ) . $args['after_title'];
      }

      echo '<div class="g-ytsubscribe" data-channel="'.$instance['channel'].'" data-layout="'.$instance['layout'].'" data-count="'.$instance['count'].'"></div>';

      echo '<iframe src="https://www.youtube.com/embed/?listType=user_uploads&list='.$instance['channel'].'" width="480" height="400"></iframe>';

      echo $args['after_widget']; 
    }
    
  
    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
      $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Twitter', 'social_domain' ); 
      
      $username = ! empty( $instance['username'] ) ? $instance['username'] : esc_html__( 'https://twitter.com/', 'social_domain' );
      
      $height = ! empty( $instance['height'] ) ? $instance['height'] : esc_html__( '500', 'social_domain' ); 

      $theme = ! empty( $instance['theme'] ) ? $instance['theme'] : esc_html__( 'Light', 'social_domain' ); 

      $title2 = ! empty( $instance['title2'] ) ? $instance['title2'] : esc_html__( 'YouTube', 'yts_domain' ); 
      
      $channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'youtube', 'yts_domain' ); 

      $layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'default', 'yts_domain' ); 

      $count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( 'default', 'yts_domain' );  
  
      ?>
      

      <!-- TITLE -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
          <?php esc_attr_e( 'Twitter:', 'social_domain' ); ?>
        </label> 

        <input 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
          type="text" 
          value="<?php echo esc_attr( $title ); ?>">
      </p>

      <!-- USERNAME -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>">
          <?php esc_attr_e( 'Username:', 'social_domain' ); ?>
        </label> 

        <input 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" 
          type="text" 
          value="<?php echo esc_attr( $username ); ?>">
      </p>

      <!-- Height -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>">
          <?php esc_attr_e( 'Height:', 'social_domain' ); ?>
        </label> 

        <input 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'height' ) ); ?>" 
          type="number" 
          value="<?php echo esc_attr( $height ); ?>">
      </p>

      <!-- THEME --->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'theme' ) ); ?>">
          <?php esc_attr_e( 'Theme:', 'social_domain' ); ?>
        </label> 

        <select 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'theme' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'theme' ) ); ?>">
          <option value="light" <?php echo ($theme == 'theme') ? 'selected' : ''; ?>>
            Light
          </option>
          <option value="dark" <?php echo ($theme == 'dark') ? 'selected' : ''; ?>>
            Dark
          </option>
        </select>
      </p> 

       <!-- TITLE -->
       <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title2' ) ); ?>">
          <?php esc_attr_e( 'Youtube:', 'yts_domain' ); ?>
        </label> 

        <input 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'title2' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'title2' ) ); ?>" 
          type="text" 
          value="<?php echo esc_attr( $title2 ); ?>">
      </p>

      <!-- CHANNEL -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
          <?php esc_attr_e( 'Channel:', 'yts_domain' ); ?>
        </label> 

        <input 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
          type="text" 
          value="<?php echo esc_attr( $channel ); ?>">
      </p>

      <!-- LAYOUT -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
          <?php esc_attr_e( 'Layout:', 'yts_domain' ); ?>
        </label> 

        <select 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>">
          <option value="default" <?php echo ($layout == 'default') ? 'selected' : ''; ?>>
            Default
          </option>
          <option value="full" <?php echo ($layout == 'full') ? 'selected' : ''; ?>>
            Full
          </option>
        </select>
      </p>

      <!-- COUNT -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>">
          <?php esc_attr_e( 'Count:', 'yts_domain' ); ?>
        </label> 

        <select 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>">
          <option value="default" <?php echo ($count == 'default') ? 'selected' : ''; ?>>
            Default
          </option>
          <option value="hidden" <?php echo ($count == 'hidden') ? 'selected' : ''; ?>>
            Hidden
          </option>
        </select>
      </p>
     
      <?php 
    }
  
    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
      $instance = array();

      $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

      $instance['username'] = ( ! empty( $new_instance['username'] ) ) ? strip_tags( $new_instance['username'] ) : '';

      $instance['height'] = ( ! empty( $new_instance['height'] ) ) ? strip_tags( $new_instance['height'] ) : '';

      $instance['theme'] = ( ! empty( $new_instance['theme'] ) ) ? strip_tags( $new_instance['theme'] ) : '';

      $instance['title2'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title2'] ) : '';

      $instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? strip_tags( $new_instance['channel'] ) : '';

      $instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? strip_tags( $new_instance['layout'] ) : '';

      $instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';

      // $instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
  
      return $instance;
    }
  
  } // class 