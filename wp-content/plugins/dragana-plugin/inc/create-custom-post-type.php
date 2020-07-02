<?php
/**
 * @package DraganaPlugin
*/

require_once plugin_dir_path(__FILE__) . 'create-custom-taxonomy.php';
require_once plugin_dir_path(__FILE__) . 'create-custom-fields.php';

class CreateCustomPostType {
    public function __construct( string $name, string $singularName, string $slug, array $taxonomies, $menuName) {
        $this->name = $name;
        $this->singularName = $singularName;
        $this->slug = $slug;
        $this->taxonomies = $taxonomies;
        $this->menuName = $menuName;
        $this->init();
    }

    private function init() {
        register_post_type($this->name, 
            [
                'labels' => [
                    'name' => $this->name,
                    'singular_name' => $this->singularName,
                    'add_new' =>('Add New '. $this->singularName ),
                    'add_new_item' =>('Add New ' . $this->singularName ),
                    'edit_item' => ('Edit ' . $this->singularName ),
                    'new_item' => ('New ' . $this->singularName ),
                    'all_items' => ('All ' . $this->menuName ),
                    'view_item' => ('View ' . $this->singularName ),
                    'search_items' => ('Search ' . $this->singularName ),
                    'not_found' => ('No '. $this->menuName . ' found' ),
                    'not_found_in_trash' => ( 'No ' . $this->menuName . ' found in the Trash' ),
                    'parent_item_colon' => '',
                    'menu_name' => $this->menuName,
                ],
                'description' => 'Displays city ' . $this->menuName . ' and their ratings',
                'public' => true,
                'menu_position' => 4,
                'supports' => ['title', 'editor', 'thumbnail', 'excerpt', 'comments'],
                'has_archive' => true,
                'rewrite' => ['slug' => $this->$slug ]
            ]
        );
        $this->create_taxonomies();
        $customFileds = new CreateCustomFields();
    }

    public function create_taxonomies() {
        foreach ($this->taxonomies as $tax) {
            if (class_exists('CreateCustomTaxonomy')) {
                $taxInstance = new CreateCustomTaxonomy($tax, $this->name);
            }
        }
    }
}