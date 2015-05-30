<?php
/**
 * Flickr Widget Class
 */
class PhoenixTeam_Widget_Flickr extends WP_Widget {

    function __construct ()
    {
        parent::WP_Widget( false,  THEME_NAME . ' - Flickr' );
    }

    function widget ( $args, $instance )
    {
        extract($args);
        $title = apply_filters('PhoenixTeam_Widget_Flickr', $instance['title'] );
        $id = ($instance['name']) ? $instance['name'] : '';
        $max_number = ($instance['show']) ? $instance['show'] : 9;
        $head = '';

        echo $args['before_widget'];

            if ($title) {
                echo $args['before_title'];
                echo $title;
                echo $args['after_title'];
            }

            echo '<div class="flickr_widget_wrapper">';

            echo '<script src="'.
                    'http://www.flickr.com/badge_code_v2.gne' .
                    '?count='. $max_number .
                    '&amp;display=random' .
                    '&amp;size=s' .
                    '&amp;layout=x' .
                    '&amp;source=user' .
                    '&amp;user=' . $id .
                  '"></script>';

            echo '</div>';

        echo $args['after_widget'];
    }

    function update ( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['name'] = strip_tags($new_instance['name']);
        $instance['show'] = strip_tags($new_instance['show']);

        return $instance;
    }

    function form ( $instance )
    {

        $defaults = array(
            'title' => __('Flickr Photos', THEME_SLUG),
            'name' => '52617155@N08',
            'show' => 8,
        );

        $instance = wp_parse_args( $instance, $defaults );

        extract($instance);
?>
        <p><label><?php _e('Title:', THEME_SLUG) ?> <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>"
        type="text" value="<?php echo $title; ?>" /></label></p>
        <p>
            <label><?php _e('Flickr ID:', THEME_SLUG) ?><br />
                <input class="widefat" name="<?php echo $this->get_field_name('name'); ?>" type="text" value="<?php echo $name; ?>" />
            </label><br/>
            <?php _e('To get your Flickr ID use', THEME_SLUG); ?> <a href="http://idgettr.com/">idgettr.com</a>.
        </p>
        <p><label><?php _e('# of Images to Show:', THEME_SLUG) ?></label>
            <select name="<?php echo $this->get_field_name('show'); ?>">
<?php
            for ( $i = 4; $i <= 10; $i = $i + 2) {
                echo ' <option ';
                if ( $show == $i){echo 'selected="selected"';}
                echo ' value="'. $i .'">' . $i .'</option>';
            }
?>
            </select>
        </p>
<?php
    }
}