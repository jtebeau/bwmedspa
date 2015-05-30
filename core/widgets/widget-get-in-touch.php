<?php
/**
 * Twitter Widget Class
 */
class PhoenixTeam_Widget_GetInTouch extends WP_Widget {

    function __construct() {
        parent::WP_Widget( THEME_SLUG . '-get-in-touch' , THEME_NAME . ' - Get in Touch', array('description' => __("This widget displays your contact information.", THEME_SLUG)) );
    }

    function widget ( $args, $instance )
    {
        extract($args);
        $title = isset($instance['title']) ? apply_filters('PhoenixTeam_Widget_GetInTouch', $instance['title'] ) : null;
        $address = isset($instance['address']) ? $instance['address'] : null;
        $phone = isset($instance['phone']) ? $instance['phone'] : null;
        $fax = isset($instance['fax']) ? $instance['fax'] : null;
        $skype = isset($instance['skype']) ? $instance['skype'] : null;
        $email = isset($instance['email']) ? $instance['email'] : null;
        $weekend = isset($instance['weekend']) ? $instance['weekend'] : null;

        echo $args['before_widget'];

            if ($title) {
                echo $args['before_title'];
                echo $title;
                echo $args['after_title'];
            }

            echo '<ul class="contact-footer contact-composer">';

            if ($address) echo '<li><i class="icon-location"></i> '.$address.'</li>';
            if ($phone) echo '<li><i class="icon-mobile"></i> '.$phone.'</li>';
            if ($fax) echo '<li><i class="icon-inbox"></i> '.$fax.'</li>';
            if ($skype) echo '<li><i class="icon-videocam"></i> '.$skype.'</li>';
            if ($email) echo '<li><i class="icon-mail"></i> '.antispambot($email).'</li>';
            if ($weekend) echo '<li><i class="icon-key"></i> '.$weekend.'</li>';

            echo '</ul>';

        echo $args['after_widget'];
    }

    function update ( $new_instance, $old_instance )
    {
        $instance = $old_instance;

        /* Strip tags for title and name to remove HTML (important for text inputs). */
        $instance['title'] = strip_tags( $new_instance['title'] );
        $instance['address'] = strip_tags($new_instance['address']);
        $instance['phone'] = strip_tags($new_instance['phone']);
        $instance['fax'] = strip_tags($new_instance['fax']);
        $instance['skype'] = strip_tags($new_instance['skype']);
        $instance['email'] = strip_tags($new_instance['email']);
        $instance['weekend'] = strip_tags($new_instance['weekend']);

        return $instance;
    }

    function form ( $instance )
    {
        $defaults = array(
            'title' => __('Get in Touch', THEME_SLUG),
            'address' => null,
            'phone' => null,
            'fax' => null,
            'skype' => null,
            'email' => null,
            'weekend' => null,
        );

        $instance = wp_parse_args( $instance, $defaults );

        extract($instance);

        $fields = null;

        foreach ($instance as $key => $value) {
            $input_title = ucfirst($key) . ': ';
            $fields .= '<p><label for="'.$this->get_field_id($key).'"> ' .
                        $input_title .
                        '<input class="widefat" type="text" ' .
                        ${$key} .
                        ' id="'.$this->get_field_id($key).'"' .
                        'name="'.$this->get_field_name($key).'" value="'. $value .'" />' .
                        '</label></p>';
        }

        echo $fields;
    }

}