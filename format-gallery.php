<?php
    global $layout;

    $ID = get_the_id();
    $permalink = get_permalink();

    $thumb = null;
    if (has_post_thumbnail()) {
        $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full', true );
        $thumb = array('full_url' => $thumb[0]);
    }

    $gallery = rwmb_meta( THEME_SLUG . "_postformat_gallery", array('type' => 'image_advanced') );

    if ($thumb)
        array_unshift($gallery, $thumb);
?>

<?php if ($layout == 'medium') : ?>
    <div class="col-lg-5">
<?php endif; ?>

<?php if (count($gallery)) : ?>
    <ul id="bxslider-<?php echo $ID; ?>" class="bxslider">
<?php
        foreach ($gallery as $item) {;
            echo '<li><img src="'. $item['full_url'] .'" alt=""></li>';
        }
?>
    </ul>

    <!-- bxslider init -->
    <script type="text/javascript">
        jQuery(function() {
            jQuery('#bxslider-<?php echo $ID; ?>').bxSlider({
                adaptiveHeight: true,
                mode: 'fade',
                slideMargin: 0,
                pager: false,
                controls: true
            });
        });
    </script>

<?php endif; ?>

<?php if ($layout == 'medium') : ?>
    </div>
    <div class="col-lg-7">
<?php endif; ?>

<div class="cl-blog-naz">
    <div class="cl-blog-type"><i class="icon-camera"></i></div>

    <div class="cl-blog-name">
        <a href="<?php echo $permalink; ?>"><?php the_title(); ?></a>
    </div >
    <div class="cl-blog-detail">
        <?php the_time('j F Y'); ?> - <?php the_time('G:i'); ?>, 
        <?php _e('by', THEME_SLUG); ?> <?php the_author_posts_link(); ?>, 
        <?php _e('in', THEME_SLUG); ?> <?php the_category(', '); ?>, <?php comments_popup_link( __('No comments', THEME_SLUG), __('1 comment', THEME_SLUG), __( '% comments', THEME_SLUG), null, __('Comments off', THEME_SLUG) ); ?>
    </div>

    <?php if ( is_single() ) : ?>
        <div class="cl-blog-text">
            <?php the_content(); ?>
        </div>

</div><!-- cl-blog-naz -->
    <?php else : ?>
        <div class="cl-blog-text">
            <?php echo get_the_excerpt(); ?>
        </div>

</div><!-- cl-blog-naz -->
    <div style="overflow: hidden; width: 100%;">
        <div class="cl-blog-read"><a href="<?php echo $permalink; ?>"><?php _e('Read More', THEME_SLUG); ?></a></div>
    </div>
        <div class="cl-blog-line"></div>
    <?php endif; ?>
    <br clear="all" />
<?php if ($layout == 'medium') : ?>
</div>
<?php endif; ?>