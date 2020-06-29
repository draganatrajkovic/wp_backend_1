<?php

/**
 * @package DraganaPlugin
*/

class CreateCustomPostType {

    public function __construct( string $name, string $singularName, string $slug, array $taxonomies) {
        $this->name = $name;
        $this->singularName = $singularName;
        $this->slug = $slug;
        $this->taxonomies = $taxonomies;
        $this->init();
    }

    private function init() {
        register_post_type($this->name, 
            array(
                'labels' => array(
                    'name' => $this->name,
                    'singular_name' => $this->singularName,
                    'add_new' =>('Add New '. $this->singularName ),
                    'add_new_item' =>('Add New ' . $this->singularName ),
                    'edit_item' => ('Edit ' . $this->singularName ),
                    'new_item' => ('New ' . $this->singularName ),
                    'all_items' => ('All ' . $this->name ),
                    'view_item' => ('View ' . $this->singularName ),
                    'search_items' => ('Search ' . $this->singularName ),
                    'not_found' => ('No '. $this->name . ' found' ),
                    'not_found_in_trash' => ( 'No ' . $this->name . ' found in the Trash' ),
                    'parent_item_colon' => '',
                    'menu_name' => $this->name
                ),
                'description' => 'Displays city ' . $this->name . ' and their ratings',
                'public' => true,
                'menu_position' => 4,
                'supports' => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
                'has_archive' => true,
                'rewrite' => array( 'slug' => $this->slug ),
                // 'taxonomies' => $this->create_taxonomies()
            )
        );
    }

    public function create_taxonomies() {
        foreach ($this->taxonomies as $tax) {
            require_once plugin_dir_path(__FILE__) . 'create-custom-taxonomy.php';
            if (class_exists('CreateCustomTaxonomy')) {
                $taxInstance = new CreateCustomTaxonomy($tax, $this->name);
            }
        }
    }
}