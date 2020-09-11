<?php
/**
 * Location Page Template Custom Fields
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */
if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(
        array(
            'key'    => 'group_5f1a1c4ec224f',
            'title'  => 'Location',
            'fields' => array(
                array(
                    'key'               => 'field_location5f1bd80865fa8',
                    'label'             => 'Show/Hide Sections',
                    'name'              => 'location-visible-sections',
                    'type'              => 'checkbox',
                    'instructions'      => 'Uncheck section(s) to be hided from the page!',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'choices'           => array(
                        'breadcrumb'   => 'Show Breadcrumb Section',
                        'our-location' => 'Show Our Location Section',
                    ),
                    'allow_custom'      => 0,
                    'default_value'     => array(
                        0 => 'breadcrumb',
                        1 => 'our-location',
                    ),
                    'layout'            => 'horizontal',
                    'toggle'            => 0,
                    'return_format'     => 'value',
                    'save_custom'       => 0,
                ),
                array(
                    'key'               => 'field_location5f1a1c5880f7c',
                    'label'             => 'Breadcrumb',
                    'name'              => '',
                    'type'              => 'tab',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'    => 'field_location5f1bd80865fa8',
                                'operator' => '==',
                                'value'    => 'breadcrumb',
                            ),
                        ),
                    ),
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'placement'         => 'top',
                    'endpoint'          => 0,
                ),
                array(
                    'key'               => 'field_location5f1a1c7680f7d',
                    'label'             => 'Background',
                    'name'              => 'background-breadcrump-location',
                    'type'              => 'image',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'return_format'     => 'url',
                    'preview_size'      => 'medium',
                    'library'           => 'all',
                    'min_width'         => '',
                    'min_height'        => '',
                    'min_size'          => '',
                    'max_width'         => '',
                    'max_height'        => '',
                    'max_size'          => '',
                    'mime_types'        => '',
                ),
                array(
                    'key'               => 'field_location5f1a1c9880f7e',
                    'label'             => 'Heading',
                    'name'              => 'heading-breadcrump-location',
                    'type'              => 'text',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => 'Location',
                    'placeholder'       => '',
                    'prepend'           => '',
                    'append'            => '',
                    'maxlength'         => '',
                ),
                array(
                    'key'               => 'field_location5f1a1cd480f7f',
                    'label'             => 'Our Location',
                    'name'              => '',
                    'type'              => 'tab',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'    => 'field_location5f1bd80865fa8',
                                'operator' => '==',
                                'value'    => 'our-location',
                            ),
                        ),
                    ),
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'placement'         => 'top',
                    'endpoint'          => 0,
                ),
                array(
                    'key'               => 'field_location5f1a1ceb80f80',
                    'label'             => 'Title',
                    'name'              => 'our-location-title',
                    'type'              => 'text',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => 'Our Location',
                    'placeholder'       => '',
                    'prepend'           => '',
                    'append'            => '',
                    'maxlength'         => '',
                ),
                array(
                    'key'               => 'field_location5f1a1d2080f81',
                    'label'             => 'Address',
                    'name'              => 'location-address',
                    'type'              => 'text',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => '123 Elm Street Los Angeles, CA 90210',
                    'placeholder'       => '',
                    'prepend'           => '',
                    'append'            => '',
                    'maxlength'         => '',
                ),
                array(
                    'key'               => 'field_location5f1a1d7a80f82',
                    'label'             => 'Google Map',
                    'name'              => 'location-map',
                    'type'              => 'google_map',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'center_lat'        => '',
                    'center_lng'        => '',
                    'zoom'              => '',
                    'height'            => 450,
                ),
        ),
        'location'              => array(
                array(
                    array(
                        'param'    => 'page_template',
                        'operator' => '==',
                        'value'    => 'page-location.php',
                    ),
                ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => array(
                1  => 'the_content',
                2  => 'excerpt',
                3  => 'discussion',
                4  => 'comments',
                7  => 'author',
                8  => 'format',
                10 => 'featured_image',
                11 => 'categories',
                12 => 'tags',
                13 => 'send-trackbacks',
        ),
        'active'                => true,
        'description'           => '',
        )
    );

endif;
