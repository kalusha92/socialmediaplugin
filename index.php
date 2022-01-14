<?php
/*
Plugin Name: Social Feed
Plugin URI: http://social.com
Description: Display Twitter and Youtube page on Side Bar.
Version: 1.0.0
Author: Kaleb Fekadu
Author URI: http://kalebfekadu.wordpress.com
*/

// Exit if accessed directly
if(!defined('ABSPATH')){
  exit;
}

// Load Scripts
require_once(plugin_dir_path(__FILE__).'/includes/social-scripts.php');

// Load Class
require_once(plugin_dir_path(__FILE__).'/includes/social-class.php');

// Register Widget
function register_twitter(){
  register_widget('social_Widget');
}

// Hook in function
add_action('widgets_init', 'register_twitter');