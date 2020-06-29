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
        register_taxonomy(
            $this->name, 
            $this->postName,
            array(
                'labels' => array(
                    'name' => $this->name
                ),
                'rewrite' => array('slug' => $this->name),
                'hierarchical' => false
            )
        );
    }
}