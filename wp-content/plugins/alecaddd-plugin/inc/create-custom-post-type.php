<?php

class CreateCustomPostType {

    public function __constuct( string $name, string $singularName, string $slug, array $tax) {
        $this->name = $name;
        $this->singularName = $singularName;
        $this->slug = $slug;
        $this->tax = $tax;
        $this->init();
    }

    private function init() {
        $labels = array(
            'name' => _x( $this->name , 'post type general name' ),
            'singular_name' => _x( $this->singularName , 'post type singular name' ),
            'add_new' => _x( 'Add New', $this->singularName ),
            'add_new_item' => __( 'Add New ' . $this->singularName ),
            'edit_item' => __( 'Edit ' . $this->singularName ),
            'new_item' => __( 'New ' . $this->singularName ),
            'all_items' => __( 'All ' . $this->name ),
            'view_item' => __( 'View ' . $this->singularName ),
            'search_items' => __( 'Search ' . $this->singularName ),
            'not_found' => __( 'No '. $this->name . ' found' ),
            'not_found_in_trash' => __( 'No ' . $this->name . ' found in the Trash' ),
            'parent_item_colon' => '',
            'menu_name' => $this->name
        );
        
        // args array
        $args = array(
            'labels' => $labels,
            'description' => 'Displays city ' . $this->name . ' and their ratings',
            'public' => true,
            'menu_position' => 4,
            'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
            'has_archive' => true,
        );

        register_post_type($name, $args);
    }
}