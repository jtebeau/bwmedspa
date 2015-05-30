<?php

$this->sections[] = array(
    'title'     => __('Other', THEME_TEAM),
    'icon'      => ' el-icon-puzzle',
    'fields'    => array(

        array(
            'id'        => 'contact_mail',
            'type'      => 'multi_text',
            'validate'  => 'email',
            'title'     => __('Contact Form E-mail', THEME_TEAM),
            'subtitle'  => __('Your email(s) for contact form widget.', THEME_TEAM),
            'add_text' => __('Add more email addresses', THEME_SLUG),
            'default'   => array(get_option('admin_email'))
        ),

        array(
            'id'        => 'show_adminbar',
            'type'      => 'button_set',
            'title'     => __('Show WordPress Admin Bar?', THEME_TEAM),
            'subtitle'  => __('You can disable it for <i><b>all users</b></i> here.', THEME_TEAM),
            'options'   => array(
                1       => '&nbsp;I&nbsp;',
                0       => 'O',
            ),
            'default'   => 1
        ),

        array(
            'id'        => 'analytics_switch',
            'type'      => 'button_set',
            'title'     => __('Enable Google Analytics?', THEME_TEAM),
            'subtitle'  => __('Enables/Disables GA Tracking Code for your website.', THEME_TEAM),
            'options'   => array(
                1        => '&nbsp;I&nbsp;',
                0       => 'O',
            ),
            'default' => 0
        ),

        // Section boxed background
        array(
           'id' => 'section-google-analytics',
           'type' => 'section',
           'subtitle' => null,
           'indent' => true
        ),

            array(
                'id'        => 'ga_id',
                'type'      => 'text',
                'required'  => array('analytics_switch', '=', '1'),
                'title'     => __('Google Analytics Property ID', THEME_TEAM),
                'desc'  => __('Place here your Google Analytics Property ID. It should look like `UA-XXXXX-X`.<br />You can find it inside your Google Analytics Dashboard.', THEME_TEAM),
                'default'   => null
            ),

        array(
            'id'     => 'section-google-analytics-end',
            'type'   => 'section',
            'indent' => false
        ),

        array(
            'id'        => 'css_code',
            'type'      => 'ace_editor',
            'title'     => __('Custom CSS', THEME_TEAM), 
            'subtitle'  => __('Paste your CSS code her.', THEME_TEAM),
            'mode'      => 'css',
            'validate'  => 'css',
            'theme'     => 'chrome',
            'desc'      => 'CSS will be enqueued in header.',
            'default'   => null
        ),          
        
        array(
            'id'        => 'js_code',
            'type'      => 'ace_editor',
            'title'     => __('Custom JavaScript', THEME_TEAM), 
            'subtitle'  => __('Paste your JavaScript code here.', THEME_TEAM),
            'mode'      => 'javascript',
            // 'validate'  => 'js',
            'theme'     => 'chrome',
            'desc'      => 'JS code will be enqueued before &lt/body&gt; tag.',
            'default'   => null
        ),
    ),
);