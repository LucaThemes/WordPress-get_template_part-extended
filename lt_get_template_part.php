<?php

/**
 * Alternative to WP get_template_part() 
 *
 * @param string $file
 * @param array $args
 * @author LucaThemes.com
 * 
 * TODO: error handling
 */
function get_template($file, $args=[]) {

    /**
     * Parse arguments, if any
     */
    if(!empty($args)) {
        $args = wp_parse_args($args);
    }        

    /**
     * Assign values from parsed arguments
     */
    $subdir = array_key_exists('subdir', $args) ? $args['subdir'] . '/' : '';
    $return = array_key_exists('return', $args) ? (bool)$args['return'] : false;

    /**
     * Locate the file
     */
    if ( file_exists( get_stylesheet_directory() . '/' . $subdir . $file . '.php' ) ) {
        $file = get_stylesheet_directory() . '/' . $subdir . $file . '.php';
    } 
    elseif ( file_exists( get_template_directory() . '/' . $subdir . $file . '.php' ) ) {
        $file = get_template_directory() . '/' . $subdir . $file . '.php';
    }

    /**
     * Include located file
     */
    ob_start();
    $reqfile = include $file;
    $data = ob_get_clean();

    /**
     * Return/echo (default echo)
     */
    if($return) {
        return $data;
    }
    else {
        echo $data;
    }
}
