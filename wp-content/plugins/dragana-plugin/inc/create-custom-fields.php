<?php 
/**
 * @package DraganaPlugin
*/
//custom field for real-estate custom post in dragana-plugin

class CreateCustomFields {
    public function __construct() {
        add_action('acf/init', $this->create_custom_fields());
    }

    public function create_custom_fields() {
        acf_add_local_field_group(
            [
                'key' => 'group_1',
                'title' => 'Real Estate Fields',
                'fields' => [
                    [
                        'key' => 'sub_title',
                        'label' => 'Real Estate Sub Title',
                        'name' => 'sub_title',
                        'type' => 'text',
                    ],
                    [
                        'key' => 'image',
                        'label' => 'Real Estate Image',
                        'name' => 'image',
                        'type' => 'image',
                    ]
                ],
                'location' => [
                    [
                        [
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'real-estate', //connect with specific custom post type
                        ]
                    ]
                ]
            ]
        );
    }
}


