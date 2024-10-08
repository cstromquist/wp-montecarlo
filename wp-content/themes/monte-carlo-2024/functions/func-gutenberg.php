<?php

// Disable the Block Editor on all pages, except specific pages
add_filter('use_block_editor_for_post', '__return_false', 5);

add_filter('use_block_editor_for_post', function($can_edit, $post) {
    // Conditionally allow the block editor per-page

    if (empty($post->ID)) return $can_edit;
    if (get_post_meta($post->ID, 'use_block_editor', true) == true) {
        add_filter( 'user_can_richedit' , '__return_true', 50 );
        return true;
    }

    return $can_edit;

}, 10, 2);

add_action('acf/init', function() {
    if(!function_exists('acf_add_local_field_group'))
        return;

    acf_add_local_field_group(array(
        'key' => 'group_5e38cfc13038b',
        'title' => 'Editor Mode',
        'fields' => array(
            array(
                'key' => 'field_5e38cfc7be776',
                'label' => 'Use Block Editor?',
                'name' => 'use_block_editor',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'page',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'side',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
    ));
});

?>
