<?php 

/**
 * @package DraganaPlugin
*/
/*
Plugin name: Dragana Plugin
Plugin URI: http://draganaplugin.com/plugin
Description: Plugin description 
Version: 1.0.0
Author: Dragana Trajkovic
Author URI: http://draganatrajkovic.com
License: GPLv2 or later
Tex Domain: dragana-plugin
*/


if (! defined('ABSPATH')) {
    die;
}

class DraganaPlugin 
{
    public function __construct() {
        add_action('init', array($this, 'create_custom_post_type'));
    }

    public function activate() {
        require_once plugin_dir_path(__FILE__) . 'inc/dragana-plugin-activate.php';
        DraganaPluginActivate::activate();
    }

    public function deactivate() {
        require_once plugin_dir_path(__FILE__) . 'inc/dragana-plugin-deactivate.php';
        DraganaPluginDeactivate::deactivate();
    }

    public function create_custom_post_type() {
        require_once plugin_dir_path(__FILE__) . 'inc/create-custom-post-type.php';
        if (class_exists('CreateCustomPostType')) {
            // var_dump('test');
            $music = new CreateCustomPostType('Music', 'Song', 'music', array('taxonomy 1', 'taxonomy 2'));
        }
    }
}

if (class_exists('DraganaPlugin')) {
    $draganaPlugin = new DraganaPlugin();
}

register_activation_hook(__FILE__, array($draganaPlugin, 'activate'));
register_deactivation_hook(__FILE__, array($draganaPlugin, 'deactivate'));
