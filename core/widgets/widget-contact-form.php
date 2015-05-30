<?php
/**
 * Contact Form Widget Class
 */

class PhoenixTeam_Widget_ContactForm extends WP_Widget {

    public function __construct ()
    {
        parent::__construct( THEME_SLUG . '-contact-form', THEME_NAME . ' - ' . __('Contact Form', THEME_SLUG), array('description' => __("Contact Form Widget.", THEME_SLUG)) );
    }

    public function widget ( $args, $instance )
    {
        $useAttachment = isset($instance['attachment']) ? $instance['attachment'] : false;

        $script_data = array(
            'THEME_SLUG' => THEME_SLUG,
            'useAttachment' => $useAttachment,
            'Sending' => __('Sending...', THEME_SLUG),
            'fillAllFields' => __('Fill all form fields please', THEME_SLUG),
            'nonce' => wp_create_nonce(THEME_SLUG. "-cf-security")
        );
        wp_localize_script(THEME_SLUG . '-contact-form', 'Phoenix', $script_data);
        wp_enqueue_script(THEME_SLUG . '-contact-form');

        extract($args);
        $title = isset($instance['title']) ? apply_filters('PhoenixTeam_Widget_ContactForm', $instance['title']) : null;

        echo $args['before_widget'];

        if ($title) {
            echo $args['before_title'];
            echo $title;
            echo $args['after_title'];
        }
?>
        <div class="row">
            <form action="<?php echo admin_url( 'admin-ajax.php' ); ?>" data-form="contactForm" method="post">
                <div class="col-lg-4">
                    <p class="text_cont"><input type="text" name="name" placeholder="<?php _e('Name', THEME_SLUG); ?>" class="input-cont-textarea"></p>
                </div>
                <div class="col-lg-4">
                    <p class="text_cont"><input type="email" name="email" placeholder="<?php _e('E-mail', THEME_SLUG); ?>" class="input-cont-textarea"></p>
                </div>
                <div class="col-lg-4">
                    <p class="text_cont"><input type="text" name="subject" placeholder="<?php _e('Subject', THEME_SLUG); ?>" class="input-cont-textarea"></p>
                </div>

                <div class="col-lg-12">
                    <div class="alert alert-danger error contact-form-error nameError"><i class="icon-cancel"></i> <?php _e("Oh snap! Name field can't stay empty.", THEME_SLUG); ?></div>
                    <div class="alert alert-danger error contact-form-error emailError"><i class="icon-cancel"></i> <?php _e("Oh snap! There was a mistake when writing a e-mail.", THEME_SLUG); ?></div>
                    <div class="alert alert-danger error contact-form-error subjectError"><i class="icon-cancel"></i> <?php _e("Oh snap! Subject field can't stay empty.", THEME_SLUG); ?></div>
                </div>

            <?php if ($useAttachment) : ?>
                <div class="col-lg-12">
                    <p class="text_cont"><input type="file" name="attachment" class="input-cont-textarea"></p>
                    <div class="alert alert-danger error contact-form-error attachmentError-not-set"><i class="icon-cancel"></i> <?php _e("Oh snap! Attachment field can't stay empty.", THEME_SLUG); ?></div>
                    <div class="alert alert-danger error contact-form-error attachmentError-wrong-size"><i class="icon-cancel"></i> <?php _e("Oh snap! Attachment field can't stay empty.", THEME_SLUG); ?></div>
                    <div class="alert alert-danger error contact-form-error attachmentError-wrong-type"><i class="icon-cancel"></i> <?php _e("Oh snap! Wrong type of attachment.", THEME_SLUG); ?></div>
                </div>
            <?php endif; ?>

                <div class="col-lg-12">
                    <p class="text_cont"><textarea name="message" placeholder="<?php _e('Message', THEME_SLUG); ?>" id="message" class="input-cont-textarea" cols="40" rows="10"></textarea></p>
                    <div class="alert alert-danger error contact-form-error messageError"><i class="icon-cancel"></i> <?php _e("Oh snap! This field can't stay empty.", THEME_SLUG); ?></div>
                    <div class="alert alert-danger error contact-form-fail generalError"><i class="icon-cancel"></i> <?php _e("Error. You message wasn't sent. Something wrong happen.", THEME_SLUG); ?></div>
                    <div class="alert alert-success success contact-form-success"><i class="icon-ok"></i> <?php _e("Well done! You message is successfully sent.", THEME_SLUG); ?></div>
                </div>
                <div class="col-lg-12"><p><input type="submit" class="btn btn-default contact-form-send" value="<?php _e('Send message', THEME_SLUG); ?>" /></p></div>
            </form>
        </div>
<?php
        echo $args['after_widget'];
    }
    
    public function update( $new_instance, $old_instance )
    {
        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['email'] = strip_tags($new_instance['email']);
        $instance['attachment'] = strip_tags($new_instance['attachment']);

        return $instance;
    }
    
    public function form( $instance )
    {
        global $data;
        $title = isset($instance['title']) ? $instance['title'] : null;
        $email = isset($data['contact_mail']) ? $data['contact_mail'] : get_option('admin_email');

        if (is_array($email))
            $email = $email[0];

        $attachment = isset($instance['attachment']) ? $instance['attachment'] : null;
        $checkbox = $attachment ? ' checked="checked"' : null;
?>
        <p><label for="<?php echo $this->get_field_id( 'title' ); ?>">Title: <input id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo $title; ?>" /></label></p>
        <p>
            <?php _e('Email will be sent on', THEME_SLUG); ?> <u><?php echo $email; ?></u> <?php _e('and other addresses that you have chosen.', THEME_SLUG) ?><br/>
            <a href="<?php echo admin_url() . '?page='. THEME_SLUG .'_options&tab=8' ?>"><?php _e('Change', THEME_SLUG); ?></a><br/><br/>
        </p>
        <p>
            <label for="<?php $this->get_field_id('attachment'); ?>"><?php _e('Add attachment field?', THEME_SLUG); ?></label>&nbsp;
            <input class="checkbox" type="checkbox" id="<?php echo $this->get_field_id('attachment'); ?>" name="<?php echo $this->get_field_name('attachment'); ?>"<?php echo $checkbox; ?>/>
        </p>
<?php
    }
}
