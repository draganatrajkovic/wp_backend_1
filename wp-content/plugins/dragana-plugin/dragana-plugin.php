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
        add_action('init', array($this, 'start'));
        add_action("wp_ajax_ajaxCallUpdate", [ $this, 'ajaxCallUpdate' ]);
        add_action("wp_ajax_ajaxCallDelete", [ $this, 'ajaxCallDelete' ]);
        add_action("wp_ajax_ajaxCallAdd", [ $this, 'ajaxCallAdd' ]);
        add_action("wp_ajax_ajaxCallSearch", [ $this, 'ajaxCallSearch' ]);
        // add_action('pre_get_posts',[$this, 'getCustomPosts']);
    }

    public function activate() {
        DraganaPluginActivate::activate();
    }

    public function deactivate() {
        DraganaPluginDeactivate::deactivate();
    }

    public function start() {
        $this->create_custom_post_type();
        $this->my_script_enqueuer();
        $this->ajaxCallSearch();
        add_action('pre_get_posts',[$this, 'getCustomPosts']);
    }

    public function my_script_enqueuer() {
        wp_register_script( "my_voter_script", WP_PLUGIN_URL.'/dragana-plugin/my_voter_script.js', array('jquery') );
        wp_localize_script( 'my_voter_script', 'myAjax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'userId' => get_current_user_id()));        
     
        wp_enqueue_script( 'jquery' );
        wp_enqueue_script( 'my_voter_script' );
    }

    public function create_custom_post_type() {
        if (class_exists('CreateCustomPostType')) {
            $house = new CreateCustomPostType('real-estate', 'House', 'real-estate', ['location', 'type'], 'Real Estate');
            //za naziv koji koristimo za registraciju custom posta ne smemo navoditi velika slova i razmake... 
            //za prikaz u meniju korisiti labels/'menu_name' ili labels/name
        }
    }

    public function ajaxCallUpdate() {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $sub_title = $_POST['sub_title'];

        if (is_user_logged_in()) { 
            $newPost = [
                'ID'=> $id, 
                'post_title'=> $title, 
                'sub_title'=> $sub_title
            ];
            wp_update_post($newPost);
            wp_update_post( $newPost, true );                        
            if (is_wp_error($id)) {
                $errors = $id->get_error_messages();
                foreach ($errors as $error) {
                    echo $error;
                }
            }
        } else {
            var_dump('Just for admin!');
        }
    }

    public function ajaxCallAdd() {
        $title = $_POST['title'];
        $sub_title = $_POST['sub_title'];
        $content = $_POST['content'];
        var_dump($title);

        if (is_user_logged_in()) {
            $newPost = [
                'post_author'=> get_current_user_id(),
                'post_content'=> $content,
                'post_title'=> $title, 
                'post_status' => 'publish',
                'comment_status' => 'open',
                'post_type' => 'real-estate',
                'sub_title'=> $sub_title,
                'post_date' => date( 'Y-m-d H:i:s', time() )
                ];
            wp_insert_post($newPost);
        } else {
            var_dump('Just for admin!');
        }
    }
    
    public function ajaxCallDelete() {
        $id = $_POST['id'];
        if (is_user_logged_in()) { 
            wp_delete_post($id, true);
        } else {
            var_dump('Just for admin!');
        }
    }

    public function getCustomPosts($query) {
        // pre_get_posts - modifikuje wordpress loop; na home page-u ce prikazace samo postove sa real-estate post type-om
        if ( $query->is_home() && $query->is_main_query() && ! is_admin() ) {
            $query->set( 'post_type', 'real-estate' ); 
        }
    }

    public function ajaxCallSearch() {
        $this->my_script_enqueuer();
        $searchTerm = $_POST['searchTerm'];

        // $args = array(
        //     'post_type' => 'real-estate'
        //     // 'post_title'   => $searchTerm
        //   );
           
        // $posts = get_posts( $args );
        
        // foreach ($posts as $post) {
        //     echo $post->post_title;
        // }

        $args = ['post_type', 'real-estate'];
        $query = new WP_Query( $args );
 
        if ( $query->have_posts() ) {
            echo '<ul>';
            while ( $query->have_posts() ) {
                $query->the_post();
                // if (get_the_title() == 'boba') {
                    echo '<li>' . get_the_title() . '</li>';
                // }
            }
            echo '</ul>';
        } else {
           echo 'no posts found';
        }
        /* Restore original Post Data */
        wp_reset_postdata();
        
    }
}

if (class_exists('DraganaPlugin')) {
    $draganaPlugin = new DraganaPlugin();
}

register_activation_hook(__FILE__, array($draganaPlugin, 'activate'));
register_deactivation_hook(__FILE__, array($draganaPlugin, 'deactivate'));
