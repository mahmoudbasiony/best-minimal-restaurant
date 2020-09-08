<?php
/**
 * Contact Page Template Custom Fields
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(
        array(
            'key'    => 'group_5f1b2731db719',
            'title'  => 'Contact',
            'fields' => array(
                array(
                    'key'               => 'field_contact5f1bd59e75b99',
                    'label'             => 'Show/Hide Sections',
                    'name'              => 'contact-visible-sections',
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
                        'contact-info' => 'Show Contact Info Section',
                        'contact-form' => 'Show Contact Form Section',
                        'map'          => 'Show Google Map Section',
                    ),
                    'allow_custom'      => 0,
                    'default_value'     => array(
                        0 => 'breadcrumb',
                        1 => 'contact-info',
                        2 => 'contact-form',
                        3 => 'map',
                    ),
                    'layout'            => 'horizontal',
                    'toggle'            => 0,
                    'return_format'     => 'value',
                    'save_custom'       => 0,
                ),
                array(
                    'key'               => 'field_contact5f1b27418a96c',
                    'label'             => 'Breadcrumb',
                    'name'              => '',
                    'type'              => 'tab',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'    => 'field_5f1bd59e75b99',
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
                    'key'               => 'field_contact5f1b27528a96d',
                    'label'             => 'Background',
                    'name'              => 'background-breadcrump-contact',
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
                    'key'               => 'field_contact5f1b277e8a96e',
                    'label'             => 'Heading',
                    'name'              => 'heading-breadcrump-contact',
                    'type'              => 'text',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => 'Contact us',
                    'placeholder'       => '',
                    'prepend'           => '',
                    'append'            => '',
                    'maxlength'         => '',
                ),
                array(
                    'key'               => 'field_contact5f1b28a38a96f',
                    'label'             => 'Contact Info',
                    'name'              => '',
                    'type'              => 'tab',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'    => 'field_5f1bd59e75b99',
                                'operator' => '==',
                                'value'    => 'contact-info',
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
                    'key'               => 'field_contact5f1b28c98a970',
                    'label'             => 'Title',
                    'name'              => 'contact-info-title',
                    'type'              => 'text',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => 'How To reach us',
                    'placeholder'       => '',
                    'prepend'           => '',
                    'append'            => '',
                    'maxlength'         => '',
                ),
                array(
                    'key'               => 'field_contact5f1b2a98e3791',
                    'label'             => 'Contact Info',
                    'name'              => 'contact-info',
                    'type'              => 'group',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'layout'            => 'block',
                    'sub_fields'        => array(
                        array(
                            'key'               => 'field_contact5f1b2b05e3793',
                            'label'             => 'Phone',
                            'name'              => 'phone',
                            'type'              => 'text',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'default_value'     => '000-000-0000',
                            'placeholder'       => '',
                            'prepend'           => '',
                            'append'            => '',
                            'maxlength'         => '',
                        ),
                        array(
                            'key'               => 'field_contact5f1b2ac6e3792',
                            'label'             => 'Phone Image',
                            'name'              => 'phone-image',
                            'type'              => 'image',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'return_format'     => 'array',
                            'preview_size'      => 'thumbnail',
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
                            'key'               => 'field_contact5f1b2b33e3794',
                            'label'             => 'Email',
                            'name'              => 'email',
                            'type'              => 'text',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'default_value'     => 'info@info.com',
                            'placeholder'       => '',
                            'prepend'           => '',
                            'append'            => '',
                            'maxlength'         => '',
                        ),
                        array(
                            'key'               => 'field_contact5f1b2b4de3795',
                            'label'             => 'Email Image',
                            'name'              => 'email-image',
                            'type'              => 'image',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'return_format'     => 'array',
                            'preview_size'      => 'thumbnail',
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
                            'key'               => 'field_contact5f1b2b6be3796',
                            'label'             => 'Location',
                            'name'              => 'location',
                            'type'              => 'text',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'default_value'     => 'Lorem ipsum dolor.',
                            'placeholder'       => '',
                            'prepend'           => '',
                            'append'            => '',
                            'maxlength'         => '',
                        ),
                        array(
                            'key'               => 'field_contact5f1b2ba0e3797',
                            'label'             => 'Location Image',
                            'name'              => 'location-image',
                            'type'              => 'image',
                            'instructions'      => '',
                            'required'          => 0,
                            'conditional_logic' => 0,
                            'wrapper'           => array(
                                'width' => '',
                                'class' => '',
                                'id'    => '',
                            ),
                            'return_format'     => 'array',
                            'preview_size'      => 'thumbnail',
                            'library'           => 'all',
                            'min_width'         => '',
                            'min_height'        => '',
                            'min_size'          => '',
                            'max_width'         => '',
                            'max_height'        => '',
                            'max_size'          => '',
                            'mime_types'        => '',
                        ),
                    ),
                ),
                array(
                    'key'               => 'field_contact5f1b5524168e4',
                    'label'             => 'Contact Form',
                    'name'              => '',
                    'type'              => 'tab',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'    => 'field_5f1bd59e75b99',
                                'operator' => '==',
                                'value'    => 'contact-form',
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
                    'key'               => 'field_contact5f1b5537168e5',
                    'label'             => 'Section Background',
                    'name'              => 'contact-form-background',
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
                    'key'               => 'field_contact5f1b5585168e6',
                    'label'             => 'Contact Form Shortcode',
                    'name'              => 'contact-form-shortcode',
                    'type'              => 'text',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => '',
                    'placeholder'       => '',
                    'prepend'           => '',
                    'append'            => '',
                    'maxlength'         => '',
                ),
                array(
                    'key'               => 'field_contact5f1b59ff4a1cd',
                    'label'             => 'Google Map',
                    'name'              => '',
                    'type'              => 'tab',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'    => 'field_5f1bd59e75b99',
                                'operator' => '==',
                                'value'    => 'map',
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
                    'key'               => 'field_contact5f1b5a114a1ce',
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
                    'height'            => '',
                ),
        ),
        'location'              => array(
                array(
                    array(
                        'param'    => 'page_template',
                        'operator' => '==',
                        'value'    => 'page-contact.php',
                    ),
                ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen'        => '',
        'active'                => true,
        'description'           => '',
        )
    );

endif;