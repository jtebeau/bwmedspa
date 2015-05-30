<?php

$this->sections[] = array(
    'title'     => __('Header', THEME_SLUG),
    'icon'      => 'el-icon-website',
    'fields'    => array(

        array(
            'id'        => 'custom_logo',
            'type'      => 'media',
            'url'       => true,
            'title'     => __('Custom Logo', THEME_SLUG),
            //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'subtitle'  => __('Upload your logo.', THEME_SLUG),
            'default'   => array('url' => get_template_directory_uri() . '/assets/images/logo.png')                  
        ),

        array(
            'id'        => 'custom_retina_logo',
            'type'      => 'media',
            'url'       => true,
            'title'     => __('Custom Retina Logo', THEME_SLUG),
            //'mode'      => false, // Can be set to false to allow any media type, or can also be set to any mime type.
            'subtitle'  => __('Upload your retina logo.', THEME_SLUG),
            'default'   => array('url' => get_template_directory_uri() . '/assets/images/logo@2x.png')                  
        ),

         array(
            'id'        => 'use_sticky',
            'type'      => 'button_set',
            'title'     => __('Use sticky menu?', THEME_SLUG),
            'options'   => array(
                1        => '&nbsp;I&nbsp;',
                0       => 'O',
            ),
            'default'   => 1
        ),

        array(
            'id'        => 'display_top_contacts',
            'type'      => 'button_set',
            'title'     => __('Display Contacts at the Top?', THEME_SLUG),
            'options'   => array(
                1        => '&nbsp;I&nbsp;',
                0       => 'O',
            ),
            'default'   => 1
        ),

        // Section boxed background
        array(
           'id' => 'section-top-contacts',
           'type' => 'section',
           'subtitle' => null,
           'indent' => true
        ),

            array(
                'id'        => 'top_address',
                'type'      => 'text',
                'required'  => array('display_top_contacts', '=', '1'),
                'title'     => __('Street Address', THEME_SLUG),
                'subtitle'  => __('Example: 455 Martinson, Los Angeles', THEME_SLUG),
                'default'   => '455 Martinson, Los Angeles',
            ),
            array(
                'id'        => 'top_phone_number',
                'type'      => 'text',
                'required'  => array('display_top_contacts', '=', '1'),
                'title'     => __('Phone Number', THEME_SLUG),
                'subtitle'  => __('Example: 8 (043) 567 - 89 - 30', THEME_SLUG),
                'desc'      => __('Please use valid numbers only', THEME_SLUG),
                'default'   => '8 (043) 567 - 89 - 30',
            ),
            array(
                'id'        => 'top_email',
                'type'      => 'text',
                'required'  => array('display_top_contacts', '=', '1'),
                'title'     => __('Email', THEME_SLUG),
                'subtitle'  => __('Example: support@email.com', THEME_SLUG),
                'validate'  => 'email',
                'default'   => 'support@email.com'
            ),

        array(
            'id'     => 'section-top-contacts-end',
            'type'   => 'section',
            'indent' => false
        ),

    ),

);