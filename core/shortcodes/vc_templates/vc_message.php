<?php
$output = $color = $el_class = $css_animation = '';
extract(shortcode_atts(array(
    'color' => 'alert-info',
    'el_class' => '',
    'style' => '',
    'css_animation' => ''
), $atts));
$el_class = $this->getExtraClass($el_class);

$icon = null;
switch ($color) {
    case 'alert-info':
        $icon = 'fa fa-info-circle';
        break;
    case 'alert-warning':
        $icon = 'fa fa-exclamation-triangle';
        break;
    case 'alert-success':
        $icon = 'fa fa-check-circle';
        break;
    case 'alert-danger':
        $icon = 'fa fa-times-circle';
        break;
    default:
        $icon = 'fa fa-info-circle';
        break;
}

$class = "";

$class .= ($style!='') ? ' vc_alert_'.$style : '';
$class .= ( $color != '' && $color != "alert-block") ? ' wpb_'.$color : '';

$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_alert wpb_content_element' . $class . $el_class, $this->settings['base'], $atts );

$css_class .= $this->getCSSAnimation($css_animation);
?>
<div class="<?php echo $css_class; ?> phoenix-team-message-box">
    <button type="button" class="close" data-dismiss="alert" href="#">&times;</button>
	<div class="messagebox_text"><i class="<?php echo $icon; ?>"></i><?php echo wpb_js_remove_wpautop($content, true); ?></div>
</div>
<?php echo $this->endBlockComment('alert box')."\n";