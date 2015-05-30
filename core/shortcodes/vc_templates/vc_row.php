<?php
    $output = $el_class = $bg_image = $bg_color = $bg_image_repeat = $font_color = $padding = $margin_bottom = $css = null;
    extract(shortcode_atts(array(
        'el_class'        => '',
        'bg_image'        => '',
        'bg_color'        => '',
        'bg_image_repeat' => '',
        'font_color'      => '',
        'padding'         => '',
        'margin_bottom'   => '',
        'css' => '',

        "id" => '',
        "row_type" => 'container'
    ), $atts));

    wp_enqueue_script( 'wpb_composer_front_js' );

    if ($id) {
        $id = 'id="'. $id .'"';
    }

    $el_class = $this->getExtraClass($el_class);

    $base = $this->settings('base');

    $css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'vc_row wpb_row '. get_row_css_class() . $el_class . vc_shortcode_custom_css_class( $css, ' ' ), $this->settings['base'], $atts );

    $style = $this->buildStyle($bg_image, $bg_color, $bg_image_repeat, $font_color, $padding, $margin_bottom);

    // HTML
    if ($row_type === 'fullwidth') {
        if ($base !== 'vc_row_inner') {
            $output .= '<div class="container-fullwidth">';
        }
    } else {
        $output .= '<div class="container-in-container">';
    }

    if ($base === 'vc_row_inner') {
        $css_class .= ' vc_inner';
    }
    
    $output .= '<div '. $id .' class="'.$css_class.'"'.$style.'>';
    $output .= wpb_js_remove_wpautop($content);
    $output .= '</div>'.$this->endBlockComment('row');
    
    $output .= '</div>';

    echo $output;
