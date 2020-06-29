<?php

class CreateCustomTaxonomy {
    public function __construct(string $name, string $slug) {
        $this->name = $name;
        $this->slug = $slug;
        $this->init();
    }

    private function init() {
        $labels = array(
            'name' => _x( $this->name , 'post type general name' ),
        );

        $args = array(
            'labels' => $labels,
            'rewrite' => array( 'slug' => $this->slug ),
            'hierarchical' => false,
        )
    }
    register_taxonomy($name, $customPost, $args )
}