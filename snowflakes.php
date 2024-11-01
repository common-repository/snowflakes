<?php
/**
 * Plugin Name: Snowflakes
 * Description: Creates a falling snow graphic across your website.
 * Version: 1.1
 * Author: PDERAS Consulting Group Inc.
 * Author URI: http://www.pderas.com
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, 
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A 
 * PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT 
 * HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF 
 * CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE 
 * OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * This software utilizes two javascript libraries: jQuery (https://jquery.com/) and
 * GSAP (https://greensock.com/gsap).
 */

/**
 * This file is responsible for including and initially calling 
 * all files required to use Snow Flakes. 
 * This file has been built with love and care.
 * 
 * @package   Snowflakes
 * @author    David Buss - PDERAS Consulting Group Inc.
 * @version   1.1
 * @license   GPLv2
 */

/* If this file is called directly, abort. */
if ( ! defined( 'WPINC' ) ) {
	die;
}

/* Load the files required to display the frontend of the plugin */
require_once( plugin_dir_path(__FILE__) . 'functions.php');

/* enqueue the necessary scripts and styles */
add_action('wp_enqueue_scripts', 'snowflakes_enqueue');

/**
 * Enqueues all styles and scripts that are required by the frontend of the plugin
 *
 * @return void
 */
function snowflakes_enqueue()
{
    wp_enqueue_script('tween-max-plugin', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/1.14.2/TweenMax.min.js', array('jquery'));
    wp_enqueue_script('snowflakes_script', plugin_dir_url(__FILE__) . 'assets/js/snowflakes.js', array('jquery'));
    wp_enqueue_style('snowflakes_styles', plugin_dir_url(__FILE__) . 'assets/css/snowflakes.css');
}

add_action('wp_head', 'generate_snowflakes_func');
?>