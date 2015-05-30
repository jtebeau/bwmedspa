<?php

$this->sections[] = array(
    'icon'      => 'el-icon-network',
    'title'     => __('Social', THEME_SLUG),
    'fields'    => array(

        array(
            'id'        => 'multisocials',
            'type'      => 'button_set',
            'title'     => __('Use Multisocial Buttons?', THEME_SLUG),
            'subtitle'  => __('Use multisocial (dynamically defined) or predifined social buttons for Team Members', THEME_SLUG),
            'desc'      => __('Caution: dynamically defined social buttons are experimental.', THEME_SLUG),
            'options' => array(
                1  => '&nbsp;I&nbsp;',
                0  => 'O'
            ),
            'default'   => 1
        ),

        array(
            'id'        => 'rss',
            'type'      => 'text',
            'validate'  => 'url',
            'title'     => __('RSS Feed URL', THEME_SLUG),
            'desc'  => __("If you don't want to show RSS icon, live this field blank.", THEME_SLUG),
            'default'   => $this->getRSS()
        ),

        array(
            'id'        => 'header_social',
            'type'      => 'button_set',
            'title'     => __('Header Social Icons', THEME_SLUG),
            'subtitle'  => __('Enable/Disable social icons in header.', THEME_SLUG),
            'options' => array(
                1  => '&nbsp;I&nbsp;',
                0  => 'O'
            ),
            'default'   => 1
        ),

        // Section Header Social Icons
        array(
           'id' => 'section-header-socials',
           'type' => 'section',
           'subtitle' => null,
           'indent' => true
        ),

            array(
                'id'        => 'facebook',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Facebook URL', THEME_SLUG),
                'default'   => 'http://facebook.com/'
            ),

            array(
                'id'        => 'twitter',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Twitter URL', THEME_SLUG),
                'default'   => 'http://twitter.com/'
            ),

            array(
                'id'        => 'pinterest',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Pinterest URL', THEME_SLUG),
                'default'   => 'http://pinterest.com/'
            ),

            array(
                'id'        => 'linkedin',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Linkedin URL', THEME_SLUG),
                'default'   => 'http://linkedin.com/'
            ),

            array(
                'id'        => 'googleplus',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Google Plus URL', THEME_SLUG),
                'default'   => 'http://plus.google.com/'
            ),

            array(
                'id'        => 'vk',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Vk URL', THEME_SLUG),
                'default'   => null
            ),

            array(
                'id'        => 'instagram',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Instagram URL', THEME_SLUG),
                'default'   => null
            ),

            array(
                'id'        => 'flickr',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Flickr URL', THEME_SLUG),
                'default'   => null
            ),

            array(
                'id'        => 'youtube',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Youtube URL', THEME_SLUG),
                'default'   => null
            ),

            array(
                'id'        => 'tumblr',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Tumblr URL', THEME_SLUG),
                'default'   => null
            ),

            array(
                'id'        => 'foursquare',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Foursquare URL', THEME_SLUG),
                'default'   => null
            ),

            array(
                'id'        => 'apple',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Apple URL', THEME_SLUG),
                'default'   => null
            ),

            array(
                'id'        => 'android',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Android URL', THEME_SLUG),
                'default'   => null
            ), 

            array(
                'id'        => 'windows',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Windows URL', THEME_SLUG),
                'default'   => null
            ),

            array(
                'id'        => 'behance',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Behance URL', THEME_SLUG),
                'default'   => null
            ),

            array(
                'id'        => 'dribbble',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Dribbble URL', THEME_SLUG),
                'default'   => null
            ),

            array(
                'id'        => 'delicious',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Delicious URL', THEME_SLUG),
                'default'   => null
            ),

            array(
                'id'        => 'skype',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Skype URL', THEME_SLUG),
                'default'   => null
            ),

            array(
                'id'        => 'github',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('GitHub URL', THEME_SLUG),
                'default'   => null
            ),

            array(
                'id'        => 'vimeo',
                'type'      => 'text',
                'validate'  => 'url',
                'required'  => array('header_social', '=', 1),
                'title'     => __('Vimeo URL', THEME_SLUG),
                'default'   => null
            ),

        array(
            'id'     => 'section-header-socials-end',
            'type'   => 'section',
            'indent' => false
        )
    )
); 