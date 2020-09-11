<?php
/**
 * Menu Page Template Custom Fields
 *
 * @package Ultimate_Restaurant
 * @author  PriceListo
 */

if (function_exists('acf_add_local_field_group')) :

    acf_add_local_field_group(
        array(
            'key'    => 'group_5f1a0c2c8ef6b',
            'title'  => 'Menu',
            'fields' => array(
                array(
                    'key'               => 'field_menu5f1bdb0567911',
                    'label'             => 'Hide/Show Sections',
                    'name'              => 'menu-visible-sections',
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
                        'breadcrumb' => 'Show Breadcrumb Section',
                        'menu'       => 'Show Menu Section',
                    ),
                    'allow_custom'      => 0,
                    'default_value'     => array(
                        0 => 'breadcrumb',
                        1 => 'menu',
                    ),
                    'layout'            => 'horizontal',
                    'toggle'            => 0,
                    'return_format'     => 'value',
                    'save_custom'       => 0,
                ),
                array(
                    'key'               => 'field_menu5f1a0c3ec3127',
                    'label'             => 'Breadcrumb Section',
                    'name'              => '',
                    'type'              => 'tab',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'    => 'field_menu5f1bdb0567911',
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
                    'key'               => 'field_menu5f1a0c59c3128',
                    'label'             => 'Background',
                    'name'              => 'background-breadcrump-menu',
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
                    'key'               => 'field_menu5f1a0c95c3129',
                    'label'             => 'Heading',
                    'name'              => 'heading-breadcrump-menu',
                    'type'              => 'text',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => 'Our Menu',
                    'placeholder'       => '',
                    'prepend'           => '',
                    'append'            => '',
                    'maxlength'         => '',
                ),
                array(
                    'key'               => 'field_menu5f1a0cdec312a',
                    'label'             => 'Menu Section',
                    'name'              => '',
                    'type'              => 'tab',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => array(
                        array(
                            array(
                                'field'    => 'field_menu5f1bdb0567911',
                                'operator' => '==',
                                'value'    => 'menu',
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
                    'key'               => 'field_menu5f1a0d7cc312d',
                    'label'             => 'Section Image',
                    'name'              => 'image-menu',
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
                    'key'               => 'field_menu5f1a0cedc312b',
                    'label'             => 'Check Menu Title',
                    'name'              => 'title-menu',
                    'type'              => 'text',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => 'Check our Menu',
                    'placeholder'       => '',
                    'prepend'           => '',
                    'append'            => '',
                    'maxlength'         => '',
                ),
                array(
                    'key'               => 'field_menu5f1a0d51c312c',
                    'label'             => 'Check Menu Description',
                    'name'              => 'menu-description',
                    'type'              => 'wysiwyg',
                    'instructions'      => '',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nullaDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nullaDuis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla',
                    'tabs'              => 'all',
                    'toolbar'           => 'full',
                    'media_upload'      => 0,
                    'delay'             => 0,
                ),
                array(
                    'key'               => 'field_menu5f1a0dc6c312e',
                    'label'             => 'Best Restaurant Menu Shortcode',
                    'name'              => 'menu-shortcode',
                    'type'              => 'text',
                    'instructions'      => 'Enter the Best Restaurant Menu Plugin Shortcode!',
                    'required'          => 0,
                    'conditional_logic' => 0,
                    'wrapper'           => array(
                        'width' => '',
                        'class' => '',
                        'id'    => '',
                    ),
                    'default_value'     => '[brm_restaurant_menu]',
                    'placeholder'       => '',
                    'prepend'           => '',
                    'append'            => '',
                    'maxlength'         => '',
                ),
        ),
        'location'              => array(
                array(
                    array(
                        'param'    => 'page_template',
                        'operator' => '==',
                        'value'    => 'page-menu.php',
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
