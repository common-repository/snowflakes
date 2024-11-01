<?php
/**
 * This file is responsible for creating all html to display the snow flake overlay.
 * This file has been built with love and care.
 * 
 * @package   Snowflakes
 * @author    David Buss - PDERAS Consulting Group Inc.
 * @version   1.1
 * @license   GPLv2
 *
 */

/**
 * Creates all necessary html to show the snow flake graphic.
 *
 * @return Echos out a html content.
 */
function generate_snowflakes_func(){
    ob_start();
    ?>
    <script>
        var snowFlakeFilePath = '<?php  echo plugin_dir_url(__FILE__); ?>';
    </script>
    <div id='snowflakes-wrapper'></div>
   <?php
    echo ob_get_clean();
}