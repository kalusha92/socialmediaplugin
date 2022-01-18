<?php
  // Add Scripts
  function social_add_scripts(){
    // Add Main CSS
    wp_enqueue_style('tweet-main-style', plugins_url(). '/twitterfeed/css/style.css');
    // Add Main JS
    wp_enqueue_script('tweet-main-script', plugins_url(). '/twitterfeed/js/main.js');

    // Add Google Script
    wp_register_script('twitter', 'https://platform.twitter.com/widgets.js');
    wp_enqueue_script('twitter');

    wp_register_script('google', 'https://apis.google.com/js/platform.js');
    wp_enqueue_script('google');
  }

  

  add_action('wp_enqueue_scripts', 'social_add_scripts');

  
      