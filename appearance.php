<?php

$this->sections[] = array(
    'title'     => __('Appearance', THEME_SLUG),
    'icon'      => 'el-icon-brush',
    'fields'    => array(

        array(
            'id'        => 'boxed_swtich',
            'type'      => 'button_set',
            'title'     => __('Layout Style', THEME_SLUG),
            'subtitle'  => __('Choose boxed or full page mode', THEME_SLUG),
            'options'   => array(
                "full"  => __("Full Width", THEME_SLUG), 
                "boxed" => __("Boxed", THEME_SLUG)
            ), 
            'default'   => 'full'
        ),

        array(
            'id'=> 'boxed_background',
            'type'     => 'background',
            'title'    => __('Body Background', THEME_SLUG),
            'subtitle' => __('Body background with image, color, etc.', THEME_SLUG),
            'desc'     => __('Will be used if you choose a boxed layout.', THEME_SLUG),
            'required' => array('boxed_swtich','equals','boxed'),
            'default'   => null
        ),

        array(
            'id'        => 'theme_skin',
            'type'      => 'image_select',
            'title'     => __('Theme colors', THEME_SLUG),
            'subtitle'  => __('Select one of 10 predefined theme colors.', THEME_SLUG),
            'width' => '40',
            'height' => '30',
            'options'   => array(
                'default' => array(
                    'alt' => 'Light Blue',
                    'img' => THEME_ADMIN_URI . '/assets/images/default.png'
                ),
                'blue' => array(
                    'alt' => 'Blue',
                    'img' => THEME_ADMIN_URI . '/assets/images/blue.png'
                ),
                'green' => array(
                    'alt' => 'Green',
                    'img' => THEME_ADMIN_URI . '/assets/images/green.png'
                ),
                'light-brown' => array(
                    'alt' => 'Light Brown',
                    'img' => THEME_ADMIN_URI . '/assets/images/light-brown.png'
                ),
                'light-green' => array(
                    'alt' => 'Light Green',
                    'img' => THEME_ADMIN_URI . '/assets/images/light-green.png'
                ),
                'light-red' => array(
                    'alt' => 'Light Red',
                    'img' => THEME_ADMIN_URI . '/assets/images/light-red.png'
                ),
                'orange' => array(
                    'alt' => 'Orange',
                    'img' => THEME_ADMIN_URI . '/assets/images/orange.png'
                ),
                'red' => array(
                    'alt' => 'Red',
                    'img' => THEME_ADMIN_URI . '/assets/images/red.png'
                ),
                'violet' => array(
                    'alt' => 'Violet',
                    'img' => THEME_ADMIN_URI . '/assets/images/violet.png'
                ),
                'yellow' => array('alt' => 'Yellow',
                    'img' => THEME_ADMIN_URI . '/assets/images/yellow.png'
                ),
            ),
            'default'  => 'default',
            'required' => array('custom_skin','equals', 0)
        ),

        array(
            'id'        => 'custom_skin',
            'type'      => 'button_set',
            'title'     => __('Use custom color?', THEME_SLUG),
            'subtitle'  => __('Choose you own custom color.', THEME_SLUG),
            'options'   => array(
                1        => '&nbsp;I&nbsp;',
                0       => 'O',
            ),
            'default' => 0
        ),

        array(
            'id'        => 'custom_skin_color',
            'type'      => 'color',
            'validate'  => 'color',
            'title'     => __('Custom Color', THEME_SLUG),
            'subtitle'  => __('You can define a new custom color for the theme  scheme.', THEME_SLUG),
            'transparent' => false,
            'required' => array('custom_skin','equals', 1),
            'default'   => '#00C0E1'
        ),

        array(
            'id'        => 'footer_skin',
            'type'      => 'button_set',
            'title'     => __('Footer Skin', THEME_SLUG),
            'subtitle'  => __('You can choose how many columns you want in footer.', THEME_SLUG),
            'options'   => array(
                'light' => 'Light',
                'dark' => "Dark"
            ), 
            'default'   => 'light'
        ),

        array(
            'id'        => 'custom_fonts',
            'type'      => 'button_set',
            'title'     => __('Use Custom Fonts?', THEME_SLUG),
            'subtitle'  => __('Choose custom fonts for headers, menus, etc.', THEME_SLUG),
            'options'   => array(
                1        => '&nbsp;I&nbsp;',
                0       => 'O',
            ),
            'default' => 0
        ),

        array(
            'id'          => 'page_title_font',
            'type'        => 'typography', 
            'title'       => __('Titles Font', THEME_SLUG),
            'google'      => true, 
            'output'      => array(
                                '.grid figcaption h3',
                                '.blog-name a',
                                '.testi-author',
                                '.cl-blog-name',
                                '.testimonials p.testimonial-author',
                                '.woocommerce ul.products li.product h3, .woocommerce-page ul.products li.product h3',
                                '.blog-name a',
                                '.cbp-l-inline-title',
                                '.testauthor-desc',
                            ),
            'units'       =>'px',
            'text-align'  => false,
            'line-height'  => false,
            'font-size'   => false,
            'color'  => false,
            'required'    => array('custom_fonts','equals', 1),
            'preview'     => array(
                'text' => 'Grumpy wizards make toxic brew for the evil Queen and Jack.',
                'font-size' => '23px',
                'always_display' => true,
            ),
            // 'subtitle'    => __('Typography option with each property can be called individually.'),
            'default'     => array(
                'font-style'  => '300', 
                'font-family' => 'Roboto', 
                'google'      => true,
            )
        ),

        array(
            'id'          => 'general_font',
            'type'        => 'typography', 
            'title'       => __('General Font', THEME_SLUG),
            'google'      => true, 
            'output'      => array(
                                '.wrapper',
                                'h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6',
                                '.cbp-l-filters-button .cbp-filter-counter',
                                '.cbp-l-filters-button .cbp-filter-item',
                                '.cbp-l-loadMore-button-link',
                                '.cbp-l-inline-desc',
                                '.cbp-l-inline-subtitle',
                            ),
            'units'       =>'px',
            'text-align'  => false,
            'line-height'  => false,
            'color'  => false,
            'required'    => array('custom_fonts','equals', 1),
            'preview'     => array(
                'text' => 'Grumpy wizards make toxic brew for the evil Queen and Jack.',
                'font-size' => '14px',
                'always_display' => true,
            ),
            // 'subtitle'    => __('Typography option with each property can be called individually.'),
            'default'     => array(
                'font-style'  => '300', 
                'font-family' => 'Roboto', 
                'google'      => true,
                'font-size'   => '14px', 
            )
        ),

        // array(
        //     'id'          => 'menu_font',
        //     'type'        => 'typography', 
        //     'title'       => __('Menu Font', THEME_SLUG),
        //     'google'      => true, 
        //     // 'font-backup' => true,
        //     'output'      => array('#nav-container li a'),
        //     'units'       =>'px',
        //     'text-align'  => false,
        //     'required'    => array('custom_fonts','equals', 1),
        //     'preview'     => array(
        //         'text' => 'Grumpy wizards make toxic brew for the evil Queen and Jack.',
        //         'font-size' => '14px',
        //         'always_display' => true,
        //     ),
        //     // 'subtitle'    => __('Typography option with each property can be called individually.'),
        //     'default'     => array(
        //         'color'       => '#666', 
        //         'font-style'  => '300', 
        //         'font-family' => 'Roboto', 
        //         'google'      => true,
        //         'font-size'   => '14px', 
        //         'line-height' => '20px'
        //     )
        // ),

        // array(
        //     'id'          => 'h1_font',
        //     'type'        => 'typography', 
        //     'title'       => __('H1 Font', THEME_SLUG),
        //     'google'      => true, 
        //     // 'font-backup' => true,
        //     'output'      => array('.container h1', '.container .h1'),
        //     'units'       =>'px',
        //     'text-align'  => false,
        //     'required'    => array('custom_fonts','equals', 1),
        //     'preview'     => array(
        //         'text' => 'Grumpy wizards make toxic brew for the evil Queen and Jack.',
        //         'font-size' => '36px',
        //         'always_display' => true,
        //     ),
        //     // 'subtitle'    => __('Typography option with each property can be called individually.'),
        //     'default'     => array(
        //         'color'       => '#555', 
        //         'font-style'  => '300', 
        //         'font-family' => 'Roboto', 
        //         'google'      => true,
        //         'font-size'   => '36px', 
        //         'line-height' => '39.6px'
        //     )
        // ),
    
        // array(
        //     'id'          => 'h2_font',
        //     'type'        => 'typography', 
        //     'title'       => __('H2 Font', THEME_SLUG),
        //     'google'      => true, 
        //     // 'font-backup' => true,
        //     'output'      => array('.container h2', '.container .h2'),
        //     'units'       =>'px',
        //     'text-align'  => false,
        //     'required'    => array('custom_fonts','equals', 1),
        //     'preview'     => array(
        //         'text' => 'Grumpy wizards make toxic brew for the evil Queen and Jack.',
        //         'font-size' => '33px',
        //         'always_display' => true,
        //     ),
        //     // 'subtitle'    => __('Typography option with each property can be called individually.'),
        //     'default'     => array(
        //         'color'       => '#555', 
        //         'font-style'  => '300', 
        //         'font-family' => 'Roboto', 
        //         'google'      => true,
        //         'font-size'   => '33px', 
        //         'line-height' => '33px'
        //     )
        // ),

        // array(
        //     'id'          => 'h3_font',
        //     'type'        => 'typography', 
        //     'title'       => __('H3 Font', THEME_SLUG),
        //     'google'      => true, 
        //     // 'font-backup' => true,
        //     'output'      => array('.container h3', '.container .h3'),
        //     'units'       =>'px',
        //     'text-align'  => false,
        //     'required'    => array('custom_fonts','equals', 1),
        //     'preview'     => array(
        //         'text' => 'Grumpy wizards make toxic brew for the evil Queen and Jack.',
        //         'font-size' => '24px',
        //         'always_display' => true,
        //     ),
        //     // 'subtitle'    => __('Typography option with each property can be called individually.'),
        //     'default'     => array(
        //         'color'       => '#555', 
        //         'font-style'  => '300', 
        //         'font-family' => 'Roboto', 
        //         'google'      => true,
        //         'font-size'   => '24px', 
        //         'line-height' => '26px'
        //     )
        // ),

        // array(
        //     'id'          => 'h4_font',
        //     'type'        => 'typography', 
        //     'title'       => __('H4 Font', THEME_SLUG),
        //     'google'      => true, 
        //     // 'font-backup' => true,
        //     'output'      => array('.container h4', '.container .h4'),
        //     'units'       =>'px',
        //     'text-align'  => false,
        //     'required'    => array('custom_fonts','equals', 1),
        //     'preview'     => array(
        //         'text' => 'Grumpy wizards make toxic brew for the evil Queen and Jack.',
        //         'font-size' => '18px',
        //         'always_display' => true,
        //     ),
        //     // 'subtitle'    => __('Typography option with each property can be called individually.'),
        //     'default'     => array(
        //         'color'       => '#555', 
        //         'font-style'  => '300', 
        //         'font-family' => 'Roboto', 
        //         'google'      => true,
        //         'font-size'   => '18px', 
        //         'line-height' => '19.8px'
        //     )
        // ),

        // array(
        //     'id'          => 'h5_font',
        //     'type'        => 'typography', 
        //     'title'       => __('H5 Font', THEME_SLUG),
        //     'google'      => true, 
        //     // 'font-backup' => true,
        //     'output'      => array('.container h5', '.container .h5'),
        //     'units'       =>'px',
        //     'text-align'  => false,
        //     'required'    => array('custom_fonts','equals', 1),
        //     'preview'     => array(
        //         'text' => 'Grumpy wizards make toxic brew for the evil Queen and Jack.',
        //         'font-size' => '14px',
        //         'always_display' => true,
        //     ),
        //     // 'subtitle'    => __('Typography option with each property can be called individually.'),
        //     'default'     => array(
        //         'color'       => '#555', 
        //         'font-style'  => '300', 
        //         'font-family' => 'Roboto', 
        //         'google'      => true,
        //         'font-size'   => '14px', 
        //         'line-height' => '15.4px'
        //     )
        // ),

        // array(
        //     'id'          => 'h6_font',
        //     'type'        => 'typography', 
        //     'title'       => __('H6 Font', THEME_SLUG),
        //     'google'      => true, 
        //     // 'font-backup' => true,
        //     'output'      => array('.container h6', '.container .h6'),
        //     'units'       =>'px',
        //     'text-align'  => false,
        //     'required'    => array('custom_fonts','equals', 1),
        //     'preview'     => array(
        //         'text' => 'Grumpy wizards make toxic brew for the evil Queen and Jack.',
        //         'font-size' => '12px',
        //         'always_display' => true,
        //     ),
        //     // 'subtitle'    => __('Typography option with each property can be called individually.'),
        //     'default'     => array(
        //         'color'       => '#555', 
        //         'font-style'  => '300', 
        //         'font-family' => 'Roboto', 
        //         'google'      => true,
        //         'font-size'   => '12px', 
        //         'line-height' => '13.2px'
        //     )
        // ),

        array(
            'id'        => 'favicon',
            'type'      => 'media',
            'url'       => false,
            'title'     => __('Upload Favicon', THEME_SLUG),
            'subtitle'  => __('Upload a 16px x 16px png/gif/ico icon', THEME_SLUG),
            'default'   => array('url' => get_template_directory_uri() . '/favicon.ico'),               
        ),

        array(
            'id'        => 'favicon_iphone',
            'type'      => 'media',
            'url'       => false,
            'title'     => __('Apple iPhone Icon', THEME_SLUG),
            'subtitle'  => __('Upload a 57px x 57px png/gif/ico icon for Classic iPhone', THEME_SLUG),
            'default'   => array('url' => THEME_URI . '/assets/images/57.png'),                 
        ),

        array(
            'id'        => 'favicon_retina_iphone',
            'type'      => 'media',
            'url'       => false,
            'title'     => __('Apple iPhone Retina Icon', THEME_SLUG),
            'subtitle'  => __('Upload a 114px x 114px png/gif/ico icon for Retina iPhone', THEME_SLUG),
            'default'   => array('url' => get_template_directory_uri() . '/assets/images/114.png'),                 
        ),

        array(
            'id'        => 'favicon_ipad',
            'type'      => 'media',
            'url'       => false,
            'title'     => __('Apple iPad Icon', THEME_SLUG),
            'subtitle'  => __('Upload a 72px x 72px png/gif/ico icon for Classic iPad', THEME_SLUG),
            'default'   => array('url' => get_template_directory_uri() . '/assets/images/72.png'),                 
        ),

        array(
            'id'        => 'favicon_retina_ipad',
            'type'      => 'media',
            'url'       => false,
            'title'     => __('Apple iPad Retina Icon', THEME_SLUG),
            'subtitle'  => __('Upload a 144px x 144px png/gif/ico icon for Retina iPad', THEME_SLUG),
            'default'   => array('url' => get_template_directory_uri() . '/assets/images/144.png'),                 
        ),
    )
);