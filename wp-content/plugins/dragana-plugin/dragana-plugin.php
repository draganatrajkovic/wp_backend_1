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
require_once plugin_dir_path(__FILE__) . 'inc/dragana-plugin-activate.php'; 
require_once plugin_dir_path(__FILE__) . 'inc/dragana-plugin-deactivate.php';
require_once plugin_dir_path(__FILE__) . 'inc/create-custom-post-type.php';

if (! defined('ABSPATH')) {
    die;
}

class DraganaPlugin 
{
    public function __construct() {
        add_action('init', array($this, 'create_custom_post_type'));
    }

    public function activate() {
        DraganaPluginActivate::activate();
    }

    public function deactivate() {
        DraganaPluginDeactivate::deactivate();
    }

    public function create_custom_post_type() {
        if (class_exists('CreateCustomPostType')) {
            $house = new CreateCustomPostType('real-estate', 'House', 'real-estate', ['location', 'type'], 'Real Estate');
            //za naziv koji koristimo za registraciju custom posta ne smemo navoditi velika slova i razmake... 
            //za prikaz u meniju korisiti labels/'menu_name' ili labels/name
        }
    }
}

if (class_exists('DraganaPlugin')) {
    $draganaPlugin = new DraganaPlugin();
}

register_activation_hook(__FILE__, array($draganaPlugin, 'activate'));
register_deactivation_hook(__FILE__, array($draganaPlugin, 'deactivate'));
