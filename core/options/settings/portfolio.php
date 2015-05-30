<?php

$this->sections[] = array(
    'title'     => __('Portfolio', THEME_SLUG),
    'icon'      => 'el-icon-folder-open',
    'fields'    => array(

        // PORTFOLIO
        array(
            'id'        => 'port_layout',
            'type'      => 'button_set',
            'title'     => __('Portfolio Page Layout.', THEME_SLUG),
            'subtitle'  => __('Select layout for portfolio pages.', THEME_SLUG),
            'options'   => array(
                '2-cols' => __('2 Columns', THEME_SLUG),
                '3-cols' => __('3 Columns', THEME_SLUG),
                '4-cols' => __('4 Columns', THEME_SLUG),
                'full'   => __('Fullwidth', THEME_SLUG),
            ), 
            'default'   => '3-cols'
        ),

        array(
            'id'       => 'port_quantity',
            'type'     => 'spinner', 
            'title'    => __('Portfolio Items quantity', THEME_SLUG),
            'subtitle' => __('How many portfolio items will be shown on portfolio page.',THEME_SLUG),
            'desc'     => null,
            'default'  => '9',
            'min'      => '3',
            'step'     => '1',
            'max'      => '100',
        ),

        array(
            'id'        => 'port_single_layout',
            'type'      => 'button_set',
            'title'     => __('Portfolio Single Items Layout', THEME_SLUG),
            'subtitle'  => __('Select layout for portfolio single items.', THEME_SLUG),
            'options'   => array(
                'half' => __('Half', THEME_SLUG),
                'wide' => __('Wide', THEME_SLUG)
            ), 
            'default'   => 'half'
        ),

        array(
            'id'       => 'port_related_quantity',
            'type'     => 'spinner', 
            'title'    => __('Related Items quantity', THEME_SLUG),
            'subtitle' => __('How many portfolio items will be shown on portfolio single page.',THEME_SLUG),
            'desc'     => null,
            'default'  => '6',
            'min'      => '3',
            'step'     => '1',
            'max'      => '9',
        )
        // PORTFOLIO END

    )
);