<?php

class PhoenixTeam_Shortcodes_Mapper {

    public function __construct ()
    {
        $this->remove_vc_shortcodes();
        $this->set_vc_templates();

        add_action( 'vc_before_init', array($this, 'map_vc_row') );
        add_action( 'vc_before_init', array($this, 'map_text_block') );
        add_action( 'vc_before_init', array($this, 'map_progressbar') );

        add_action( 'vc_before_init', array($this, 'map_promo_title') );
        add_action( 'vc_before_init', array($this, 'map_portfolio_grid') );
        add_action( 'vc_before_init', array($this, 'map_service') );
        add_action( 'vc_before_init', array($this, 'map_team_member') );
        add_action( 'vc_before_init', array($this, 'map_widget_get_in_touch') );
        add_action( 'vc_before_init', array($this, 'map_widget_twitter') );
        add_action( 'vc_before_init', array($this, 'map_widger_cform') );
        add_action( 'vc_before_init', array($this, 'map_testimonials') );
        add_action( 'vc_before_init', array($this, 'map_post_box') );
        add_action( 'vc_before_init', array($this, 'map_clients_slider') );
        add_action( 'vc_before_init', array($this, 'map_facts') );
    }


    public function remove_vc_shortcodes ()
    {
        vc_remove_element('vc_toggle');
        vc_remove_element('vc_posts_grid');
        vc_remove_element('vc_gallery');
        vc_remove_element('vc_images_carousel');
        vc_remove_element('vc_posts_slider');
        vc_remove_element('vc_carousel');
    }

    public function set_vc_templates ()
    {
        if (function_exists('vc_set_shortcodes_templates_dir'))
            vc_set_shortcodes_templates_dir(THEME_DIR . '/core/shortcodes/vc_templates');
    }


    public function map_post_box ()
    {
        $args = array(
          'orderby' => 'name',
          'order' => 'ASC'
          );
        $categories = get_categories($args);

        $cats_list = array(__("None", THEME_SLUG) => 'cat == false');

        foreach ($categories as $cat) {
            $cats_list[$cat->name] = $cat->slug;
        }

        if (count($cats_list) == 0)
            $cats_list["-- ".__('You sould create some posts before you can use this widget', THEME_SLUG)." --"] = null;

        vc_map(
            array(
                "name" => __("Post Box", THEME_SLUG),
                "base" => THEME_SLUG . "_postbox",
                "class" => "",
                "category" => array( THEME_NAME . " " . __("Exclusive", THEME_SLUG), __('Content', THEME_SLUG) ),
                "params" => array(
                    array(
                        "type" => "textfield",
                        "heading" => __('Select Posts Quantity', THEME_SLUG),
                        "param_name" => "qty",
                        "description" => __("How many posts to show in posts box", THEME_SLUG),
                        "value" => 2
                    ),
                    array(
                        "type" => "dropdown",
                        "heading" => __('Select Posts Category', THEME_SLUG),
                        "param_name" => "cat",
                        "description" => __("You sould create some categorise & asosiate them with posts before you can use this option.", THEME_SLUG),
                        "value" => $cats_list
                    ),
                    array(
                        'type' => 'css_editor',
                        'heading' => __( 'Css', THEME_SLUG ),
                        'param_name' => 'css',
                        'group' => __( 'Design options', THEME_SLUG )
                    )
                )
            )
        );
    }


    public function map_widger_cform ()
    {
        global $data;
        $email = isset($data['contact_mail']) ? $data['contact_mail'] : array(get_option('admin_email'));

        vc_map( array(
            "name" => __("Contact Form", THEME_SLUG),
            "base" => THEME_SLUG . '_cform',
            "is_container" => true,
            // "icon" => "icon-wpb-twitter",
            "show_settings_on_create" => true,
            "category" => array( THEME_NAME . " " . __("Exclusive", THEME_SLUG), __('Content', THEME_SLUG) ),
            "description" => __('Contact form for your site.', THEME_SLUG),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("Title", THEME_SLUG),
                    "param_name" => "title",
                    "description" => __('Email will be sent to ', THEME_SLUG).'<u>'. $email[0] .'</u> '. __('and other addresses that you have chosen.', THEME_SLUG) .'<br/><a href="'. admin_url() .'?page='. THEME_SLUG .'_options&tab=8">'. __('Change email(s)', THEME_SLUG). '</a>'
                ),
                array(
                    "type" => "checkbox",
                    "param_name" => "attachment",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Show attachment field?", THEME_SLUG),
                    "description" => __("Adds ability to send files using this form.", THEME_SLUG),
                    "value" => array( 'Show' => true),
                ),
            )
        ) );
    }


    public function map_widget_twitter ()
    {
        vc_map( array(
            "name" => __("Twitter Feed", THEME_SLUG),
            "base" => THEME_SLUG . '_tweetfeed',
            "is_container" => true,
            "icon" => "icon-wpb-twitter",
            "show_settings_on_create" => true,
            "category" => array( THEME_NAME . " " . __("Exclusive", THEME_SLUG), __('Social', THEME_SLUG) ),
            "description" => __('Twitter Feed with last tweets.', THEME_SLUG),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("Title", THEME_SLUG),
                    "param_name" => "title",
                    "description" => ""
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Twitter Username", THEME_SLUG),
                    "param_name" => "username",
                    "description" => __("Ex: @envato, Ph0enixTeam", THEME_SLUG)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("Tweets to Show", THEME_SLUG),
                    "param_name" => "qty",
                    "description" => __("Select how many tweets to show.", THEME_SLUG),
                    "std" => 3,
                    "value" => array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("Layout", THEME_SLUG),
                    "param_name" => "style",
                    "description" => __("Select Twitter Feed layout.", THEME_SLUG),
                    "std" => "box",
                    "value" => array(
                        __("Box", THEME_SLUG) => "box",
                        __("Slider", THEME_SLUG) => "slider"
                    )
                ),
            ),
        ) );
    }


    public function map_vc_row ()
    {
        vc_map( array(
            "name" => __("Row", THEME_SLUG),
            "base" => "vc_row",
            "is_container" => true,
            "icon" => "icon-wpb-row",
            "show_settings_on_create" => true,
            "category" => __('Content', THEME_SLUG),
            "description" => __('Place content elements inside the row', THEME_SLUG),
            "params" => array(
                array(
                    "type" => "textfield",
                    "heading" => __("ID Name for Navigation", THEME_SLUG),
                    "param_name" => "id",
                    "description" => __("If this row wraps the content of one of your sections, set an ID. You can then use it for navigation.", THEME_SLUG)
                ),
                array(
                    "type" => "colorpicker",
                    "heading" => __('Font Color', THEME_SLUG),
                    "param_name" => "font_color",
                    "description" => __("Select font color. ", THEME_SLUG)
                ),
                array(
                    "type" => "dropdown",
                    "heading" => __("Type", THEME_SLUG),
                    "param_name" => "row_type",
                    "description" => __("You can specify whether the row is displayed fullwidth or in container.", THEME_SLUG),
                    "std" => "container",
                    "value" => array(
                        __("In Container", THEME_SLUG) => 'container',
                        __("Fullwidth", THEME_SLUG) => 'fullwidth'
                    )
                ),
                array(
                    "type" => "textfield",
                    "heading" => __("Extra class name", THEME_SLUG),
                    "param_name" => "el_class",
                    "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", THEME_SLUG)
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __( 'Css', THEME_SLUG ),
                    'param_name' => 'css',
                    'group' => __( 'Design options', THEME_SLUG )
                )
            ),
            "js_view" => 'VcRowView'
        ) );
    }


    public function map_text_block ()
    {
        vc_map( array(
            'name' => __( 'Text Block', THEME_SLUG ),
            'base' => 'vc_column_text',
            'icon' => 'icon-wpb-layer-shape-text',
            'wrapper_class' => 'clearfix',
            'category' => __( 'Content', THEME_SLUG ),
            'description' => __( 'A block of text with WYSIWYG editor', THEME_SLUG ),
            'params' => array(
                array(
                    'type' => 'textarea_html',
                    'holder' => 'div',
                    'heading' => __( 'Text', THEME_SLUG ),
                    'param_name' => 'content',
                    'value' => __( '<p>I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>', THEME_SLUG )
                ),
                array(
                    "type" => "checkbox",
                    "param_name" => "dropcaps",
                    "holder" => "div",
                    "class" => "",
                    "heading" => __("Show dropcaps", THEME_SLUG),
                    "description" => __("Show dropcaps to first letter?", THEME_SLUG),
                    "value" => array( 'Show' => true),
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'CSS Animation', THEME_SLUG ),
                    'param_name' => 'css_animation',
                    'admin_label' => true,
                    'value' => array(
                        __( 'No', THEME_SLUG ) => '',
                        __( 'Top to bottom', THEME_SLUG ) => 'top-to-bottom',
                        __( 'Bottom to top', THEME_SLUG ) => 'bottom-to-top',
                        __( 'Left to right', THEME_SLUG ) => 'left-to-right',
                        __( 'Right to left', THEME_SLUG ) => 'right-to-left',
                        __( 'Appear from center', THEME_SLUG ) => "appear"
                    ),
                    'description' => __( 'Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.', THEME_SLUG )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Extra class name', THEME_SLUG ),
                    'param_name' => 'el_class',
                    'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', THEME_SLUG )
                ),
                array(
                    'type' => 'css_editor',
                    'heading' => __( 'Css', THEME_SLUG ),
                    'param_name' => 'css',
                    'group' => __( 'Design options', THEME_SLUG )
                )
            )
        ) );
    }


    public function map_progressbar ()
    {
        vc_map( array(
            'name' => __( 'Progress Bar', THEME_SLUG ),
            'base' => 'vc_progress_bar',
            'icon' => 'icon-wpb-graph',
            'category' => __( 'Content', THEME_SLUG ),
            'description' => __( 'Animated progress bar', THEME_SLUG ),
            'params' => array(
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Widget title', THEME_SLUG ),
                    'param_name' => 'title',
                    'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', THEME_SLUG )
                ),
                array(
                    'type' => 'exploded_textarea',
                    'heading' => __( 'Graphic values', THEME_SLUG ),
                    'param_name' => 'values',
                    'description' => __( 'Input graph values, titles and color here. Divide values with linebreaks (Enter). Example: 90|Development|#e75956', THEME_SLUG ),
                    'value' => "91|Front-end,80|Design"
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Units', THEME_SLUG ),
                    'param_name' => 'units',
                    'description' => __( 'Enter measurement units (if needed) Eg. %, px, points, etc. Graph value and unit will be appended to the graph title.', THEME_SLUG )
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Label Loction', THEME_SLUG ),
                    'param_name' => 'view',
                    'value' => array(
                        __( 'Inside bar', THEME_SLUG ) => 'inside',
                        __( 'On top of the bar', THEME_SLUG ) => 'outside',
                    ),
                    'description' => __( 'Select bar background color.', THEME_SLUG ),
                    'admin_label' => true
                ),
                array(
                    'type' => 'dropdown',
                    'heading' => __( 'Bar color', THEME_SLUG ),
                    'param_name' => 'bgcolor',
                    'value' => array(
                        __( 'Turquoise', THEME_SLUG ) => 'bar_turquoise',
                        __( 'Blue', THEME_SLUG ) => 'bar_blue',
                        __( 'Grey', THEME_SLUG ) => 'bar_grey',
                        __( 'Green', THEME_SLUG ) => 'bar_green',
                        __( 'Orange', THEME_SLUG ) => 'bar_orange',
                        __( 'Red', THEME_SLUG ) => 'bar_red',
                        __( 'Black', THEME_SLUG ) => 'bar_black',
                        __( 'Custom Color', THEME_SLUG ) => 'custom'
                    ),
                    'description' => __( 'Select bar background color.', THEME_SLUG ),
                    'admin_label' => true
                ),
                array(
                    'type' => 'colorpicker',
                    'heading' => __( 'Bar custom color', THEME_SLUG ),
                    'param_name' => 'custombgcolor',
                    'description' => __( 'Select custom background color for bars.', THEME_SLUG ),
                    'dependency' => array( 'element' => 'bgcolor', 'value' => array( 'custom' ) )
                ),
                array(
                    'type' => 'checkbox',
                    'heading' => __( 'Options', THEME_SLUG ),
                    'param_name' => 'options',
                    'value' => array(
                        __( 'Add Stripes?', THEME_SLUG ) => 'striped',
                        __( 'Add animation? Will be visible with striped bars.', THEME_SLUG ) => 'animated'
                    )
                ),
                array(
                    'type' => 'textfield',
                    'heading' => __( 'Extra class name', THEME_SLUG ),
                    'param_name' => 'el_class',
                    'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', THEME_SLUG )
                )
            )
        ) );
    }


    public function map_promo_title ()
    {
        vc_map(
            array(
                "name" => __("Promo Title", THEME_SLUG),
                "base" => THEME_SLUG . "_promo_title",
                "class" => "",
                "category" => array( THEME_NAME . " " . __("Exclusive", THEME_SLUG), __('Content', THEME_SLUG) ),
                "params" => array(
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Promo Title", THEME_SLUG),
                        "param_name" => "title",
                        "value" => __("Title", THEME_SLUG),
                        "description" => __("Title text.", THEME_SLUG),
                    ),
                    array(
                        // 'type' => 'textarea_html',
                        'type' => 'textarea',
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Promo Subtitle", THEME_SLUG),
                        "param_name" => "content",
                        "value" => __("I am subtitle text. Click edit button to change this text.", THEME_SLUG),
                        "description" => __("Sutitle text.", THEME_SLUG),
                    ),
                    array(
                        "type" => "checkbox",
                        "param_name" => "dot",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Hide Promo Line", THEME_SLUG),
                        "description" => __("Hide promo title line center dot?", THEME_SLUG),
                        "value" => array( 'Hide' => true),
                    ),
                    array(
                        'type' => 'css_editor',
                        'heading' => __( 'Css', THEME_SLUG ),
                        'param_name' => 'css',
                        'group' => __( 'Design options', THEME_SLUG )
                    )
                )
            )
        );
    }


    public function map_portfolio_grid ()
    {
        vc_map(
            array(
                'name' => __( 'Portfolio Grid', THEME_SLUG ),
                'base' => THEME_SLUG . '_portfolio_grid',
                "category" => array( (THEME_NAME . " " . __("Exclusive", THEME_SLUG)), __('Content', THEME_SLUG) ),
                'icon' => 'icon-wpb-application-icon-large',
                'description' => __( 'Portfolio items in grid view', THEME_SLUG ),
                'params' => array(
                    array(
                        'type' => 'textfield',
                        "holder" => "div",
                        "class" => "",
                        'heading' => __( 'Items per page', THEME_SLUG ),
                        'param_name' => 'qty',
                        'value' => 6,
                        'description' => __( 'Select how many items do you want to see in this block.', THEME_SLUG )
                    ),
                    array(
                        'type' => 'css_editor',
                        'heading' => __( 'Css', THEME_SLUG ),
                        'param_name' => 'css',
                        'group' => __( 'Design options', THEME_SLUG )
                    )
                )
            )
        );
    }


    public function map_clients_slider ()
    {
        vc_map(
            array(
                'name' => __( 'Clients Carousel', THEME_SLUG ),
                'base' => THEME_SLUG . '_clients',
                'icon' => 'icon-wpb-images-carousel',
                "category" => array( THEME_NAME . " " . __("Exclusive", THEME_SLUG), __('Social', THEME_SLUG) ),
                'description' => __( 'Animated carousel with images', THEME_SLUG ),
                'params' => array(
                    array(
                        'type' => 'attach_images',
                        'heading' => __( 'Images', THEME_SLUG ),
                        'param_name' => 'images',
                        'value' => '',
                        'description' => __( 'Select images from media library.', THEME_SLUG )
                    ),
                    array(
                        "type" => "checkbox",
                        "param_name" => "popup",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Use popup?", THEME_SLUG),
                        "description" => __("Show carousel pictures in popup?", THEME_SLUG),
                        "value" => array("Yes" => true)
                    ),
                    array(
                        "type" => "checkbox",
                        "param_name" => "autoplay",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Use autoscroll?", THEME_SLUG),
                        "description" => __("The carousel will scrolls automatically.", THEME_SLUG),
                        "value" => array("Yes" => true)
                    ),
                )
            )
        );
    }


    public function map_facts ()
    {
        vc_map(
            array(
                'name' => __( 'Interesting Facts', THEME_SLUG ),
                'base' => THEME_SLUG . '_facts',
                // 'icon' => 'icon-wpb-images-carousel',
                "category" => array( THEME_NAME . " " . __("Exclusive", THEME_SLUG) ),
                'description' => __( 'Some interesting facts with icons', THEME_SLUG ),
                'params' => array(
                    array(
                        'type' => 'dropdown',
                        'heading' => __( 'Icon', THEME_SLUG ),
                        'param_name' => 'icon',
                        'value' => array(
                            __('Music', THEME_SLUG) => "icon-music",
                            __('Cancel', THEME_SLUG) => "icon-cancel",
                            __('Mail', THEME_SLUG) => "icon-mail",
                            __('Heart', THEME_SLUG) => "icon-heart",
                            __('Star', THEME_SLUG) => "icon-star",
                            __('User', THEME_SLUG) => "icon-user",
                            __('Videocam', THEME_SLUG) => "icon-videocam",
                            __('Camera', THEME_SLUG) => "icon-camera",
                            __('Photo', THEME_SLUG) => "icon-photo",
                            __('Attach', THEME_SLUG) => "icon-attach",
                            __('Lock', THEME_SLUG) => "icon-lock",
                            __('Eye', THEME_SLUG) => "icon-eye",
                            __('Tag', THEME_SLUG) => "icon-tag",
                            __('Thumbs Up', THEME_SLUG) => "icon-thumbs-up",
                            __('Pencil', THEME_SLUG) => "icon-pencil",
                            __('Comment', THEME_SLUG) => "icon-comment",
                            __('Location', THEME_SLUG) => "icon-location",
                            __('Cup', THEME_SLUG) => "icon-cup",
                            __('Trash', THEME_SLUG) => "icon-trash",
                            __('Doc', THEME_SLUG) => "icon-doc",
                            __('Note', THEME_SLUG) => "icon-note",
                            __('Cog', THEME_SLUG) => "icon-cog",
                            __('Params', THEME_SLUG) => "icon-params",
                            __('Calendar', THEME_SLUG) => "icon-calendar",
                            __('Sound', THEME_SLUG) => "icon-sound",
                            __('Search', THEME_SLUG) => "icon-search",
                            __('Lightbulb', THEME_SLUG) => "icon-lightbulb",
                            __('Tv', THEME_SLUG) => "icon-tv",
                            __('Desktop', THEME_SLUG) => "icon-desktop",
                            __('Mobile', THEME_SLUG) => "icon-mobile",
                            __('Cd', THEME_SLUG) => "icon-cd",
                            __('Inbox', THEME_SLUG) => "icon-inbox",
                            __('Globe', THEME_SLUG) => "icon-globe",
                            __('Cloud', THEME_SLUG) => "icon-cloud",
                            __('Paper Plane', THEME_SLUG) => "icon-paper-plane",
                            __('Fire', THEME_SLUG) => "icon-fire",
                            __('Graduation Cap', THEME_SLUG) => "icon-graduation-cap",
                            __('Megaphone', THEME_SLUG) => "icon-megaphone",
                            __('Database', THEME_SLUG) => "icon-database",
                            __('Key', THEME_SLUG) => "icon-key",
                            __('Beaker', THEME_SLUG) => "icon-beaker",
                            __('Truck', THEME_SLUG) => "icon-truck",
                            __('Money', THEME_SLUG) => "icon-money",
                            __('Food', THEME_SLUG) => "icon-food",
                            __('Shop', THEME_SLUG) => "icon-shop",
                            __('Diamond', THEME_SLUG) => "icon-diamond",
                            __('T-Shirt', THEME_SLUG) => "icon-t-shirt",
                            __('Wallet', THEME_SLUG) => "icon-wallet",
                            __('Ok', THEME_SLUG) => "icon-ok",
                            __('Clock', THEME_SLUG) => "icon-clock"
                        ),
                        'description' => __( 'Select icon.', THEME_SLUG ),
                        'admin_label' => true
                    ),
                    array(
                        'type' => 'textfield',
                        "holder" => "div",
                        "class" => "",
                        'heading' => __( 'Data', THEME_SLUG ),
                        'param_name' => 'data',
                        'value' => '',
                        'description' => ''
                    ),
                    array(
                        'type' => 'textfield',
                        "holder" => "div",
                        "class" => "",
                        'heading' => __( 'Description', THEME_SLUG ),
                        'param_name' => 'name',
                        'value' => '',
                        'description' => ''
                    ),
                    array(
                        'type' => 'textfield',
                        "holder" => "div",
                        "class" => "",
                        'heading' => __( 'Link', THEME_SLUG ),
                        'param_name' => 'link',
                        'value' => '',
                        'description' => ''
                    ),
                    array(
                        'type' => 'dropdown',
                        'heading' => __( 'Where to put link?', THEME_SLUG ),
                        'param_name' => 'link_place',
                        'value' => array(
                            __('To icon', THEME_SLUG) => "icon",
                            __('To data', THEME_SLUG) => "data",
                            __('To description', THEME_SLUG) => "text",
                        ),
                        'admin_label' => true
                    ),
                    array(
                        "type" => "checkbox",
                        "param_name" => "target",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Open this link in another tab?", THEME_SLUG),
                        "description" => "",
                        "value" => array('Yes' => true),
                    ),
                    array(
                        'type' => 'css_editor',
                        'heading' => __( 'Css', THEME_SLUG ),
                        'param_name' => 'css',
                        'group' => __( 'Design options', THEME_SLUG )
                    )
                )
            )
        );
    }


    public function map_service ()
    {
        $services = array(
            "post_type" => THEME_SLUG . '_services',
            "post_status" => "publish"
        );

        $services = new WP_Query($services);
        wp_reset_postdata();

        $services = $services->posts;

        $services_list = array();

        foreach ($services as $serv) {
            $services_list[$serv->post_title] = $serv->ID;
        }

        if (count($services_list) == 0)
            $services_list["-- ".__('You sould create some services before you can use this widget', THEME_SLUG)." --"] = null;

        vc_map(
            array(
                "name" => __("Service", THEME_SLUG),
                "base" => THEME_SLUG . "_service",
                "class" => "",
                "category" => array( THEME_NAME . " " . __("Exclusive", THEME_SLUG), __('Content', THEME_SLUG) ),
                "params" => array(
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Service Title", THEME_SLUG),
                        "param_name" => "title",
                        "description" => __("Leave it blank to use your predefined service title.", THEME_SLUG),
                    ),
                    array(
                        "type" => "dropdown",
                        "heading" => __('Select Servise', THEME_SLUG),
                        "param_name" => "id",
                        "description" => __("You sould create some services before you can use this widget.", THEME_SLUG),
                        "value" => $services_list
                    ),
                    array(
                        "type" => "dropdown",
                        "heading" => __('Servise Layout', THEME_SLUG),
                        "param_name" => "layout",
                        "value" => array(
                            __('Block', THEME_SLUG) => 'block',
                            __('List', THEME_SLUG) => 'list'
                        )
                    ),
                    array(
                        'type' => 'textfield',
                        "holder" => "div",
                        "class" => "",
                        'heading' => __( 'Link', THEME_SLUG ),
                        'param_name' => 'link',
                        'value' => '',
                        'description' => ''
                    ),
                    array(
                        "type" => "checkbox",
                        "param_name" => "target",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Open this link in another tab?", THEME_SLUG),
                        "description" => "",
                        "value" => array('Yes' => true),
                    ),
                    array(
                        'type' => 'css_editor',
                        'heading' => __( 'Css', THEME_SLUG ),
                        'param_name' => 'css',
                        'group' => __( 'Design options', THEME_SLUG )
                    )
                )
            )
        );
    }


    public function map_team_member ()
    {
        $members = array(
            "post_type" => THEME_SLUG . '_team',
            "post_status" => "publish"
        );

        $members = new WP_Query($members);
        wp_reset_postdata();

        $members = $members->posts;

        $members_list = array();

        foreach ($members as $member) {
            $members_list[$member->post_title] = $member->ID;
        }

        if (count($members_list) == 0)
            $members_list["-- ".__('You sould create some team members before you can use this widget', THEME_SLUG)." --"] = null;

        vc_map(
            array(
                "name" => __("Team Member", THEME_SLUG),
                "base" => THEME_SLUG . "_team",
                "class" => "",
                "category" => array( THEME_NAME . " " . __("Exclusive", THEME_SLUG), __('Content', THEME_SLUG) ),
                "params" => array(
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Team Member name", THEME_SLUG),
                        "param_name" => "title",
                        "description" => __("Leave it blank to use your predefined name.", THEME_SLUG),
                    ),
                    array(
                        "type" => "dropdown",
                        "heading" => __('Select Team Member', THEME_SLUG),
                        "param_name" => "id",
                        "description" => __('You sould create some team members before you can use this widget.', THEME_SLUG),
                        "value" => $members_list
                    ),
                    array(
                        'type' => 'css_editor',
                        'heading' => __( 'Css', THEME_SLUG ),
                        'param_name' => 'css',
                        'group' => __( 'Design options', THEME_SLUG )
                    )
                )
            )
        );
    }


    public function map_widget_get_in_touch ()
    {
        vc_map(
            array(
                "name" => __("Get In Touch", THEME_SLUG),
                "base" => THEME_SLUG . "_get_in_touch",
                "class" => "",
                "category" => array( THEME_NAME . " " . __("Exclusive", THEME_SLUG), __('Content', THEME_SLUG) ),
                "params" => array(
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Adress", THEME_SLUG),
                        "param_name" => "address",
                        // "value" => null,
                        "description" => __('Ex: "Address: 455 Martinson, Los Angeles"', THEME_SLUG),
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Phone", THEME_SLUG),
                        "param_name" => "phone",
                        // "value" => null,
                        "description" => __('Ex: "Phone: 8 (043) 567 - 89 - 30"', THEME_SLUG),
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Fax", THEME_SLUG),
                        "param_name" => "fax",
                        // "value" => null,
                        "description" => __('Ex: "Fax: 8 (057) 149 - 24 - 64"', THEME_SLUG),
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Skype", THEME_SLUG),
                        "param_name" => "skype",
                        // "value" => null,
                        "description" => __('Ex: "Skype: companyname"', THEME_SLUG),
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Email", THEME_SLUG),
                        "param_name" => "email",
                        // "value" => null,
                        "description" => __('Your e-mail will be published with "antispambot" protection.<br/>Ex: "E-mail: support@email.com"', THEME_SLUG),
                    ),
                    array(
                        "type" => "textfield",
                        "holder" => "div",
                        "class" => "",
                        "heading" => __("Weekend", THEME_SLUG),
                        "param_name" => "weekend",
                        // "value" => null,
                        "description" => __('Ex: "Weekend: from 9 am to 6 pm"', THEME_SLUG),
                    ),
                )
            )
        );
    }


    public function map_testimonials ()
    {
        vc_map(
            array(
                "name" => __("Testimonials", THEME_SLUG),
                "base" => THEME_SLUG . '_testimonials',
                "is_container" => true,
                // "icon" => "icon-wpb-twitter",
                "show_settings_on_create" => true,
                "category" => array( THEME_NAME . " " . __("Exclusive", THEME_SLUG), __('Content', THEME_SLUG) ),
                "description" => __('Displays all your testimonials.', THEME_SLUG),
                "params" => array(
                    array(
                        'type' => 'dropdown',
                        'param_name' => 'layout',
                        'heading' => __( 'Layout mode', THEME_SLUG ),
                        'description' => __( 'Testimonials layout template.', THEME_SLUG ),
                        'value' => array(
                            __("Box", THEME_SLUG) => "box",
                            __("Slider", THEME_SLUG) => "slider"
                        )
                    )
                )
            )
        );
    }

}

new PhoenixTeam_Shortcodes_Mapper();
