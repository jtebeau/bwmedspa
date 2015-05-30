<?php

$this->sections[] = array(
    'title'     => __('Footer', THEME_SLUG),
    'icon'      => 'el-icon-minus',
    'fields'    => array(

        array(
            'id'        => 'use_footer',
            'type'      => 'button_set',
            'title'     => __('Use Footer?', THEME_SLUG),
            'subtitle'  => __('You can turn off footer, if you need.', THEME_SLUG),
            'options'   => array(
                1       => '&nbsp;I&nbsp;',
                0       => 'O',
            ), 
            'default'   => 1
        ),

        array(
            'id'        => 'footer_layout',
            'type'      => 'button_set',
            'title'     => __('Footer Layout', THEME_SLUG),
            'subtitle'  => __('You can choose how many columns you want in footer.', THEME_SLUG),
            'options'   => array(
                3 => '3 Columns', 
                4 => "4 Columns"
            ),
            'required' => array('use_footer','equals', 1),
            'default'   => 3
        ),

        array(
            'id'        => 'copyright_text',
            'type'      => 'editor',
            'title'     => __('Copytight Text', THEME_SLUG),
            'subtitle'  => __('Place here your copyright. HTML tags are allowed.', THEME_SLUG),
            'default'   => 'Copyright &copy; 2014 Xenia. Coded by <a href="http://themeforest.net/user/PhoenixTeam" target="_blank">PhoenixTeam</a>',
        )

    )
);