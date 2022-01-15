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
  
  } // class 