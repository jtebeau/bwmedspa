<?php
/**
 * Navigation Widget Class
 */
class PhoenixTeam_Widget_Socials extends WP_Widget {

    private $socials = array();

    public function __construct ()
    {
        $this->set_socials();
        parent::__construct( THEME_SLUG . '-social-buttons', THEME_NAME . ' - Social Buttons', array('description' => __("Social Buttons Widget.", THEME_SLUG)) );
    }
    
    private function set_socials ()
    {
        global $data;
        $this->socials['facebook'] = isset($data['facebook']) ? $data['facebook'] : null;
        $this->socials['twitter'] = isset($data['twitter']) ? $data['twitter'] : null;
        $this->socials['tumblr'] = isset($data['tumblr']) ? $data['tumblr'] : null;
        $this->socials['linkedin'] = isset($data['linkedin']) ? $data['linkedin'] : null;
        $this->socials['google'] = isset($data['googleplus']) ? $data['googleplus'] : null;
        $this->socials['pinterest'] = isset($data['pinterest']) ? $data['pinterest'] : null;
        $this->socials['instagram'] = isset($data['instagram']) ? $data['instagram'] : null;
        $this->socials['flickr'] = isset($data['flickr']) ? $data['flickr'] : null;
        $this->socials['youtube'] = isset($data['youtube']) ? $data['youtube'] : null;
        $this->socials['foursquare'] = isset($data['foursquare']) ? $data['foursquare'] : null;
        $this->socials['apple'] = isset($data['apple']) ? $data['apple'] : null;
        $this->socials['android'] = isset($data['android']) ? $data['android'] : null;
        $this->socials['windows'] = isset($data['windows']) ? $data['windows'] : null;
        $this->socials['behance'] = isset($data['behance']) ? $data['behance'] : null;
        $this->socials['dribbble'] = isset($data['dribbble']) ? $data['dribbble'] : null;
        $this->socials['delicious'] = isset($data['delicious']) ? $data['delicious'] : null;
        $this->socials['skype'] = isset($data['skype']) ? $data['skype'] : null;
        $this->socials['github'] = isset($data['github']) ? $data['github'] : null;
        $this->socials['vimeo'] = isset($data['vimeo']) ? $data['vimeo'] : null;
        $this->socials['vk'] = isset($data['vk']) ? $data['vk'] : null;       
    }

    public function widget ( $args, $instance )
    {
        extract($args);
        extract($this->socials);
        $title = apply_filters('PhoenixTeam_Widget_Socials', $instance['title']);

        foreach ($this->socials as $key => $value) {
            if ($value)
                ${$key} = empty( $instance[$key] ) ? '0' : '1';
        }

        echo $args['before_widget'];

        if ($title) {
            echo $args['before_title'];
            echo $title;
            echo $args['after_title'];
        }

        echo '<ul class="soc-footer">';

        foreach ($this->socials as $key => $value) {
            switch ($key) {
                case 'google':
                    if ($value && ${$key} !== '0')
                        echo '<li><a href="'.$value.'"><i class="fa fa-'.$key.'-plus-square"></i></a></li>';
                    break;
                case 'vk':
                    if ($value && ${$key} !== '0')
                        echo '<li><a href="'.$value.'"><i class="fa fa-'.$key.'"></i></a></li>';
                    break;
                case 'instagram':
                    if ($value && ${$key} !== '0')
                        echo '<li><a href="'.$value.'"><i class="fa fa-'.$key.'"></i></a></li>';
                    break;
                case 'flickr':
                    if ($value && ${$key} !== '0')
                        echo '<li><a href="'.$value.'"><i class="fa fa-'.$key.'"></i></a></li>';
                    break;
                case 'foursquare':
                    if ($value && ${$key} !== '0')
                        echo '<li><a href="'.$value.'"><i class="fa fa-'.$key.'"></i></a></li>';
                    break;
                case 'apple':
                    if ($value && ${$key} !== '0')
                        echo '<li><a href="'.$value.'"><i class="fa fa-'.$key.'"></i></a></li>';
                    break;
                case 'android':
                    if ($value && ${$key} !== '0')
                        echo '<li><a href="'.$value.'"><i class="fa fa-'.$key.'"></i></a></li>';
                    break;
                case 'windows':
                    if ($value && ${$key} !== '0')
                        echo '<li><a href="'.$value.'"><i class="fa fa-'.$key.'"></i></a></li>';
                    break;
                case 'dribbble':
                    if ($value && ${$key} !== '0')
                        echo '<li><a href="'.$value.'"><i class="fa fa-'.$key.'"></i></a></li>';
                    break;
                case 'delicious':
                    if ($value && ${$key} !== '0')
                        echo '<li><a href="'.$value.'"><i class="fa fa-'.$key.'"></i></a></li>';
                    break;
                case 'skype':
                    if ($value && ${$key} !== '0')
                        echo '<li><a href="'.$value.'"><i class="fa fa-'.$key.'"></i></a></li>';
                    break;
                default:
                    if ($value && ${$key} !== '0')
                        echo '<li><a href="'.$value.'"><i class="fa fa-'.$key.'-square"></i></a></li>';
            }
        }

        echo '</ul>';

        echo $args['after_widget'];
    }
    
    public function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);

        foreach ($this->socials as $key => $value) {
            if ($value)
                $instance[$key] = $new_instance[$key] ? 1 : 0;
        }

        return $instance;
    }
    
    public function form( $instance )
    {
        /* Set up some default widget settings. */
        $defaults = array();
        foreach ($this->socials as $key => $value) {
            if ($value)
                $defaults[$key] = true;
        }

        $instance = wp_parse_args( $instance, $defaults );

        $title = isset($instance['title']) ? $instance['title'] : '';
        $checkboxes = null;

        foreach ($this->socials as $key => $value) {
            if ($value) {
                ${$key} = $instance[$key] ? 'checked="checked"' : null;

                if ($key == 'google') {
                    $box_title = ucfirst($key) . ' Plus';
                } else {
                    $box_title = ucfirst($key);
                }

                $checkboxes .= '<input class="checkbox" type="checkbox" ' .
                                ${$key} .
                                ' id="'.$this->get_field_id($key).'"' .
                                'name="'.$this->get_field_name($key).'" />' .
                                '<label for="'.$this->get_field_id($key).'"> ' .
                                $box_title .
                                '</label><br/>';
            }
        }
?>
        <div class="social-buttons-item-container">
            <p><label>Title: <input class="widefat" name="<?php echo $this->get_field_name('title')?>" type="text" value="<?php echo $title; ?>" /></label></p>
            <p><?php echo $checkboxes; ?></p>
        </div>
<?php
    
    }
    
}