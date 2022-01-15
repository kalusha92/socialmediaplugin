<?php
/**
 * Adds Youtube_Subs widget.
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
      echo $args['before_widget']; // Whatever you want to display before widget (<div>, etc)

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

      echo $args['after_widget']; // Whatever you want to display after widget (</div>, etc)
    }
    
  
  } // class 