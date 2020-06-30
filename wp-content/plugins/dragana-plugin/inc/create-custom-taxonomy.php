<?php
/**
 * @package DraganaPlugin
*/

class CreateCustomTaxonomy {
    public function __construct(string $name, string $postName) {
        $this->name = $name;
        $this->postName = $postName;
        $this->init();
    }

    private function init() {
        register_taxonomy($this->name.'s',$this->postName,
            [
                'hierarchical'=>false,
                'labels'=>[
                    'name'=> $this->name . 's',
                    'singular_name'=> $this->name,
                    'name' => _x( $this->name . 's', 'taxonomy general name', 'textdomain' ),
		            'singular_name' => _x( $this->name, 'taxonomy singular name', 'textdomain' ),
                    'menu_name'=>ucwords($this->name),
                    'add_new_item'=>'Add New ' . $this->name,
                    'new_item_name'=>'New ' . $this->name . 'Name',
                    'edit_item'=>'Edit ' . $this->name,
                    'update_item'=>'Update ' . $this->name,
                    'all_items'=>'All ' . $this->name . 's',
                    'search_items'=>'Search ' . $this->name,
                    'parent_item'=>'Parent ' . $this->name,
                    'parent_item_colon'=>'Parent ' . $this->name,
                ],
                'show_ui' => true,
                'show_admin_column'=>true,
                'query_var'=>true,
                'rewrite'=>['slug'=>$this->postName],
            ]);
    }
}