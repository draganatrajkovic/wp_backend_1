<?php 

/**
 * @package AlecadddPlugin
*/
/*
Plugin name: Alecaddd Plugin
Plugin URI: http://alecaddd.com/plugin
Description: Plugin description 
Version: 1.0.0
Author: Aleksandro Castellani
Author URI: http://alecaddd.com
License: GPLv2 or later
Tex Domain: alecaddd-plugin
*/


if (! defined('ABSPATH')) {
    die;
}

class AlecadddPlugin 
{
    function __construct() {
        add_action('init', array($this, 'custom_post_type'));
    }

    // function activate() {
    //     $this->custom_post_type();
    //     flush_rewrite_rules();
    // }
    function activate() {
        require_once plugin_dir_path(__FILE__) . 'inc/alecaddd-plugin-activate.php';
        AlecadddPluginActivate::activate();
    }

    // function deactivate() {
        //     flush_rewrite_rules();
        // }
    function deactivate() {
        require_once plugin_dir_path(__FILE__) . 'inc/alecaddd-plugin-deactivate.php';
        AlecadddPluginDeactivate::deactivate();
    }
    

    // function register() {
    //     add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    // }
    
    // function enqueue() {
    //     wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__));
    // }

    function custom_post_type() {
        register_post_type('book', 
            [
                'public' => true,
                'label'  => 'Books',
            ]
        );
    }
}

if (class_exists('AlecadddPlugin')) {
    $alecadddPlugin = new AlecadddPlugin();
    // $alecadddPlugin->register();
}

register_activation_hook(__FILE__, array($alecadddPlugin, 'activate'));
register_deactivation_hook(__FILE__, array($alecadddPlugin, 'deactivate'));
