<?php
/**
 * About Page Template Custom Fields
 *
 * @package Best_Minimal_Restaurant
 * @author  PriceListo
 */

if ( function_exists( 'acf_add_local_field_group' ) ) :

	acf_add_local_field_group(
		array(
			'key'                   => 'group_5f19c1d3e356f',
			'title'                 => 'About',
			'fields'                => array(
				array(
					'key'               => 'field_about5f1bd00b1854a',
					'label'             => 'Show/Hide Sections',
					'name'              => 'about-visible-sections',
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
						'about'      => 'Show About Section',
						'video'      => 'Show Video Section',
						'about2'     => 'Show About 2 Section',
					),
					'allow_custom'      => 0,
					'default_value'     => array(
						0 => 'breadcrumb',
						1 => 'about',
						2 => 'video',
						3 => 'about2',
					),
					'layout'            => 'horizontal',
					'toggle'            => 0,
					'return_format'     => 'value',
					'save_custom'       => 0,
				),
				array(
					'key'               => 'field_about5f19c1fde535c',
					'label'             => 'Breadcrumb Section',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_about5f1bd00b1854a',
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
					'key'               => 'field_about5f19c223e535d',
					'label'             => 'Background',
					'name'              => 'background-breadcrump',
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
					'default_value'     => best_minimal_restaurant_get_attachment_id_by_name( 'best-minimal-aboutpage-breadcrumb-background' ),
				),
				array(
					'key'               => 'field_about5f19c267e535e',
					'label'             => 'Heading',
					'name'              => 'heading-breadcrump',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => 'About best restaurants',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_about5f19c288e535f',
					'label'             => 'About Section',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_about5f1bd00b1854a',
								'operator' => '==',
								'value'    => 'about',
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
					'key'               => 'field_about5f19c2a6e5360',
					'label'             => 'Image',
					'name'              => 'about-image',
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
					'default_value'     => best_minimal_restaurant_get_attachment_id_by_name( 'best-minimal-aboutpage-about-section' ),
				),
				array(
					'key'               => 'field_about5f19e39ae5361',
					'label'             => 'Title',
					'name'              => 'about-title',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => 'About best restaurants',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_about5f19e3cee5362',
					'label'             => 'Content',
					'name'              => 'about-content',
					'type'              => 'wysiwyg',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan

    dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
					'tabs'              => 'all',
					'toolbar'           => 'full',
					'media_upload'      => 0,
					'delay'             => 0,
				),
				array(
					'key'               => 'field_about5f19e415e5363',
					'label'             => 'Video Section',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_about5f1bd00b1854a',
								'operator' => '==',
								'value'    => 'video',
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
					'key'               => 'field_about5f19e86ce5365',
					'label'             => 'Background Image',
					'name'              => 'video-background-image',
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
					'default_value'     => best_minimal_restaurant_get_attachment_id_by_name( 'best-minimal-aboutpage-video-section' ),
				),
				array(
					'key'               => 'field_about5f19e434e5364',
					'label'             => 'Promo Video',
					'name'              => 'about-promo-video',
					'type'              => 'oembed',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'width'             => '',
					'height'            => '',
				),
				array(
					'key'               => 'field_about5f1a093eacc14',
					'label'             => 'About Section 2',
					'name'              => '',
					'type'              => 'tab',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => array(
						array(
							array(
								'field'    => 'field_about5f1bd00b1854a',
								'operator' => '==',
								'value'    => 'about2',
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
					'key'               => 'field_about5f1a0975acc17',
					'label'             => 'Title',
					'name'              => 'about-title-2',
					'type'              => 'text',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s stan',
					'placeholder'       => '',
					'prepend'           => '',
					'append'            => '',
					'maxlength'         => '',
				),
				array(
					'key'               => 'field_about5f1a099eacc18',
					'label'             => 'Content',
					'name'              => 'about-content-2',
					'type'              => 'wysiwyg',
					'instructions'      => '',
					'required'          => 0,
					'conditional_logic' => 0,
					'wrapper'           => array(
						'width' => '',
						'class' => '',
						'id'    => '',
					),
					'default_value'     => 'dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting.dard dummy text ever since the 1500s,ever since the 1500s,when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
					'tabs'              => 'all',
					'toolbar'           => 'full',
					'media_upload'      => 0,
					'delay'             => 0,
				),
				array(
					'key'               => 'field_about5f1a0964acc16',
					'label'             => 'Image',
					'name'              => 'about-image-2',
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
					'default_value'     => best_minimal_restaurant_get_attachment_id_by_name( 'best-minimal-aboutpage-about2-section' ),
				),
			),
			'location'              => array(
				array(
					array(
						'param'    => 'page_template',
						'operator' => '==',
						'value'    => 'template-about.php',
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
