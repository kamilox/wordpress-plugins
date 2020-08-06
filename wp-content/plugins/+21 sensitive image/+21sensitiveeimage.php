<?php
/**
 * Plugin Name:   +21 Sensitive Images
 * Description:  +21 Sensitive Images
 * Version: 1.0.0
 * Author: Camilo Contreras
 * Text Domain: +21 Sensitive Images
 */

/**
 *  +21 Sensitive  main plugin file. Images
 */

 //Add Styles JS and Css

function image_verify_styles(){
    wp_enqueue_style('styles',  plugins_url( '/inc/css/style.css', __FILE__ ) );
    wp_enqueue_script('jquery');
    wp_enqueue_script('image_protector',  plugins_url( '/inc/js/image_protector.js', __FILE__ ), array('jquery'), 1.0);
}
add_action('init', 'image_verify_styles');

?>