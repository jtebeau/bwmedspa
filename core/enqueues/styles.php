<?php

new PhoenixTeam_Styles();

class PhoenixTeam_Styles {

    public function __construct ()
    {
        add_action('wp_enqueue_scripts', array($this, 'phoenix_theme_styles')); // Add Theme Stylesheets
        add_action('wp_enqueue_scripts', array($this, 'conditional_styles')); // Add Conditional Page Scripts
    }

    // Load styles
    public function phoenix_theme_styles ()
    {
        global $data;
        $port_layout = isset($data['port_layout']) ? $data['port_layout'] : '2-cols';
        $theme_skin = isset($data['theme_skin']) ? $data['theme_skin'] : 'default';
        $custom_skin = isset($data['custom_skin']) ? $data['custom_skin'] : false;
        $custom_skin_color = isset($data['custom_skin_color']) ? $data['custom_skin_color'] : null;
        $css_code = isset($data['css_code']) ? $data['css_code'] : null;
        $footer_skin = isset($data['footer_skin']) ? $data['footer_skin'] : 'light';

        switch ($port_layout) {
            case '2-cols': $cube_css = 'cubeportfolio-2'; break;
            case '3-cols': $cube_css = 'cubeportfolio-3'; break;
            case 'full': $cube_css = 'cubeportfolio-3'; break;
            case '4-cols': $cube_css = 'cubeportfolio-4'; break;
            default: $cube_css = 'cubeportfolio-2'; break;
        }

        wp_register_style(THEME_SLUG . '-bootstrap', THEME_URI . '/assets/css/bootstrap.min.css', array(), '3.2.0', 'all');
        wp_register_style(THEME_SLUG . '-navstylechange', THEME_URI . '/assets/css/navstylechange.css', array(), '1.0', 'all');
        wp_register_style(THEME_SLUG . '-jcarousel', THEME_URI . '/assets/css/jcarousel.responsive.css', array(), '1.0', 'all');
        wp_register_style(THEME_SLUG . '-fontello', THEME_URI . '/assets/css/fontello.css', array(), '1.0', 'all');
        wp_register_style(THEME_SLUG . '-fontawesome', THEME_URI . '/assets/css/font-awesome.min.css', array(), '4.1.0', 'all');
        wp_register_style(THEME_SLUG . '-responsive', THEME_URI . '/assets/css/responsive.css', array(), '1.0', 'all');
        wp_register_style(THEME_SLUG . '-bxslider', THEME_URI . '/assets/css/jquery.bxslider.css', array(), '1.0', 'all');
        wp_register_style(THEME_SLUG . '-testimonialrotator', THEME_URI . '/assets/css/testimonialrotator.css', array(), '1.0', 'all');
        wp_register_style(THEME_SLUG . '-magnific', THEME_URI . '/assets/css/magnific.css', array(), '1.0', 'all');
        wp_register_style(THEME_SLUG . '-footer-dark-skin', THEME_URI . '/assets/css/layouts/dark-skin.css', array(), '1.0', 'all');
        wp_register_style(THEME_SLUG . '-cubeportfolio', THEME_URI . '/assets/css/'. $cube_css .'.min.css', array(), '1.0', 'all');
        wp_register_style(THEME_SLUG . '-main', get_stylesheet_uri(), array(), '1.0', 'all');

        if ($theme_skin != 'default' && !$custom_skin) {
            wp_register_style(THEME_SLUG . '-theme-skin', THEME_URI . '/assets/css/layouts/'. $theme_skin .'.css', array(), '1.0', 'all');
        }

        wp_enqueue_style(THEME_SLUG . '-bootstrap');
        wp_enqueue_style(THEME_SLUG . '-navstylechange');
        wp_enqueue_style(THEME_SLUG . '-cubeportfolio');
        wp_enqueue_style(THEME_SLUG . '-jcarousel');
        wp_enqueue_style(THEME_SLUG . '-fontello');
        wp_enqueue_style(THEME_SLUG . '-fontawesome');
        wp_enqueue_style(THEME_SLUG . '-main');
        wp_enqueue_style(THEME_SLUG . '-bxslider');
        wp_enqueue_style(THEME_SLUG . '-testimonialrotator');
        wp_enqueue_style(THEME_SLUG . '-responsive');
        wp_enqueue_style(THEME_SLUG . '-magnific');

        if ($footer_skin == 'dark')
            wp_enqueue_style(THEME_SLUG . '-footer-dark-skin');

        if ($theme_skin != 'default')
            wp_enqueue_style(THEME_SLUG . '-theme-skin');

        if ($custom_skin && $custom_skin_color) {
            $custom_skin_css =
            '/* Custom Color CSS */' .
                'a {color: '.$custom_skin_color.';}' .
                '.hi-icon-effect .hi-icon {color: '.$custom_skin_color.';}' .
                'ul.social-links li a:hover {color: '.$custom_skin_color.';}' .
                '.search-active i {color: '.$custom_skin_color.';}' .
                '.menu li a:hover {color:'.$custom_skin_color.' !important;  border-color:'.$custom_skin_color.';}' .
                '.menu li.current a {color: '.$custom_skin_color.';}' .
                '.menu li:hover a {color: '.$custom_skin_color.'}' .
                '.menu ul li ul {border-top:1px solid '.$custom_skin_color.';}' .
                '.menu ul li ul li a:hover { color:'.$custom_skin_color.' !important;}' .
                '.center-line {background: '.$custom_skin_color.';}' .
                '.hi-icon-effect .hi-icon:after {background: '.$custom_skin_color.';}' .
                '.grid figcaption {background: '.$custom_skin_color.';}' .
                '.first-letter {background: '.$custom_skin_color.';}' .
                '.list-check li i {color: '.$custom_skin_color.';}' .
                '.blog-icon i {color: '.$custom_skin_color.';}' .
                '.view-fifth .mask {background: '.$custom_skin_color.';}' .
                '.jcarousel-control-prev, .jcarousel-control-next {color: '.$custom_skin_color.';}' .
                '.jcarousel-control-prev:hover, .jcarousel-control-next:hover {color: '.$custom_skin_color.';}' .
                '.page-in-name span {color: '.$custom_skin_color.';}' .
                '.page-in-bread a {color: '.$custom_skin_color.';}' .
                '.progress-bar-info {background-color: '.$custom_skin_color.';}' .
                '.soc-about li a:hover{color:'.$custom_skin_color.';}' .
                '.fact-icon {color: '.$custom_skin_color.';}' .
                '.serv-marg i {color: '.$custom_skin_color.';}' .
                '.serv-icon i {color: '.$custom_skin_color.';}' .
                '.plan.featured h3 {color: '.$custom_skin_color.';}' .
                '.plan.featured .price {color: '.$custom_skin_color.';}' .
                '.btn-price {background-color: '.$custom_skin_color.';border-color: '.$custom_skin_color.';}' .
                '.btn-price:hover {background-color: #fff;border-color: '.$custom_skin_color.';color:'.$custom_skin_color.';}' .
                '.oops {color: '.$custom_skin_color.';}' .
                '.ac-container input:checked + label, .ac-container input:checked + label:hover {color: '.$custom_skin_color.';}' .
                '.ac-container label:hover { background: #f9f9f9; color:'.$custom_skin_color.'; }' .
                '.cbp-l-filters-button .cbp-filter-item-active {background-color: '.$custom_skin_color.';border-color: '.$custom_skin_color.';}' .
                '.cbp-l-filters-button .cbp-filter-counter:before {border-top: 4px solid '.$custom_skin_color.';}' .
                '.cbp-l-filters-button .cbp-filter-counter {background-color: '.$custom_skin_color.';}' .
                '.cbp-caption-zoom .cbp-caption-activeWrap {background-color: rgba(167, 147, 110,0.8);}' .
                '.item-heart i {color: '.$custom_skin_color.';}' .
                '.btn-item:hover {color: '.$custom_skin_color.';}' .
                '.blog-category li i {color: '.$custom_skin_color.';}' .
                '.tags-blog li a:hover {color: '.$custom_skin_color.';}' .
                '.tweet_text a {color: '.$custom_skin_color.';}' .
                '.cl-blog-type {color: '.$custom_skin_color.';}' .
                '.cl-blog-name a:hover {color: '.$custom_skin_color.';}' .
                '.cl-blog-read a:hover {color: '.$custom_skin_color.';}' .
                '.pride_pg .current {color: '.$custom_skin_color.';border: 1px solid '.$custom_skin_color.';}' .
                '.pride_pg a:hover {color: '.$custom_skin_color.';border:1px solid '.$custom_skin_color.';}' .
                '.soc-blog li a:hover{color:'.$custom_skin_color.';}' .
                '.comm_name {color: '.$custom_skin_color.';}' .
                '.recentcomments a {color: #2E97DE !important;}' .
                '.shortcode_tab_item_title:hover {color: '.$custom_skin_color.';}' .
                '.shortcode_tab_item_title.active {color: '.$custom_skin_color.';}' .
                '.tooltip_s {color: '.$custom_skin_color.';}' .
                '.index_4_prev:hover {border:1px solid '.$custom_skin_color.';}' .
                '.index_4_next:hover {border:1px solid '.$custom_skin_color.';}' .
                '.menu ul li.current-menu-item a, .menu ul li.current_page_item a' .
                '.wpb_accordion_header.ui-accordion-header-active a {color: '.$custom_skin_color.' !important;}' .
                '.phoenix-team-progerssbar-outside .vc_single_bar.bar_turquoise .vc_bar {background-color: '.$custom_skin_color.' !important;}' .
                '.wpb_accordion_header.ui-state-hover a{color: '.$custom_skin_color.' !important;}' .
                '.widget ul li > a:before {color: '.$custom_skin_color.';}' .


                '@media screen and (max-width: 991px) {' .
                '.menu-main-menu-container {  background: '.$custom_skin_color.';}' .
                '.phoenix-menu-wrapper button {background: '.$custom_skin_color.';}' .
                '.phoenix-menu-wrapper button:hover, .phoenix-menu-wrapper button.dl-active, .dl-menuwrapper ul { background: '.$custom_skin_color.'; }' .
                '.menu ul li a {background: '.$custom_skin_color.';}' .
                '.menu ul ul {background: '.$custom_skin_color.';}' .
                '.menu ul li ul li a:hover {color:#fff; }' .
                '.menu ul li.current-menu-item a, .menu ul li.current_page_item a {color: #fff;}' .
                '}' .

            '/* Custom Color CSS END */';

            wp_add_inline_style( THEME_SLUG . '-responsive', $custom_skin_css );
        }

        if ($css_code)
            wp_add_inline_style( THEME_SLUG . '-responsive', '/* Custom CSS */' . $css_code . '/* Custom CSS END */' );

        $this->custom_background();
    }


    private function custom_background ()
    {
        global $data;
        $boxed = isset($data['boxed_swtich']) ? $data['boxed_swtich'] : 'full';

        if ($boxed == 'boxed') {
            
            $bg_size = ( isset($data['boxed_background']['background-size']) && $data['boxed_background']['background-size'] != null ) ? 'background-size: '. $data['boxed_background']['background-size'] . "; " : null;
            $bg_color = ( isset($data['boxed_background']['background-color']) && $data['boxed_background']['background-color'] != null ) ? 'background-color: ' .$data['boxed_background']['background-color'] . "; " : null;
            $bg_image = ( isset($data['boxed_background']['background-image']) && $data['boxed_background']['background-image'] != null ) ? 'background-image: url("' . $data['boxed_background']['background-image'] . '")' . "; " : null;
            $bg_repeat = ( isset($data['boxed_background']['background-repeat']) && $data['boxed_background']['background-repeat'] != null ) ? 'background-repeat: ' . $data['boxed_background']['background-repeat'] . "; " : null;
            $bg_position = ( isset($data['boxed_background']['background-position']) && $data['boxed_background']['background-position'] != null ) ? 'background-position: ' . $data['boxed_background']['background-position'] . "; " : null;
            $bg_attachment = ( isset($data['boxed_background']['background-attachment']) && $data['boxed_background']['background-attachment'] != null ) ? 'background-attachment: ' . $data['boxed_background']['background-attachment'] . "; " : null;

            $boxed_css = " body { ";
                if ($bg_size) $boxed_css .= $bg_size;
                if ($bg_color) $boxed_css .= $bg_color;
                if ($bg_image) $boxed_css .= $bg_image;
                if ($bg_repeat) $boxed_css .= $bg_repeat;
                if ($bg_position) $boxed_css .= $bg_position;
                if ($bg_attachment) $boxed_css .= $bg_attachment;
            $boxed_css .= " }";

            wp_add_inline_style( THEME_SLUG . '-main', '/* Boxed CSS Layout */' . $boxed_css . '/* Boxed CSS Layout END */' );

            return true;
        }

        return false;
    }


    public function conditional_styles ()
    {
        if ( is_singular(THEME_SLUG . '_portfolio') ) {
            wp_dequeue_style(THEME_SLUG . '-cubeportfolio');
            wp_register_style(THEME_SLUG . '-cubeportfolio-single', THEME_URI . '/assets/css/cubeportfolio-3.min.css', array(), '1.0', 'all');
            wp_enqueue_style(THEME_SLUG . '-cubeportfolio-single');
        }
    }

}
