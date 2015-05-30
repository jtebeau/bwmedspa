<?php
    global $layout;

    $permalink = get_permalink();

    $link_url    = rwmb_meta( THEME_SLUG . "_postformat_link_url" );

    $link = null;
    if ($link_url) {
        $link_target = rwmb_meta( THEME_SLUG . "_postformat_link_target" );
        $link_rel = rwmb_meta( THEME_SLUG . "_postformat_link_rel" );
        
        if ($link_target)
            $link_target =  ' target="'. $link_target .'"';

        if ($link_rel)
            $link_rel = ' rel="'. $link_rel .'"';

        $link = '<a href="'. $link_url .'"'. $link_target . $link_rel .'">'. get_the_title() .'</a>';
    }
?>

<?php if ($layout == 'medium') : ?>
    <div class="col-lg-5">
<?php endif; ?>

    <?php if (has_post_thumbnail()) : ?>
        <div class="cl-blog-img">
            <?php the_post_thumbnail( array( null, null, 'bfi_thumb' => true ) ); ?>
        </div>
    <?php endif; ?>

<?php if ($layout == 'medium') : ?>
    </div>
    <div class="col-lg-7">
<?php endif; ?>

<div class="cl-blog-naz">
    <div class="cl-blog-type"><i class="icon-attach"></i></div>

    <div class="cl-blog-name">
        <?php if ($link) : ?>
            <?php echo $link; ?>
        <?php else : ?>
            <a href="<?php echo $permalink; ?>"><?php the_title(); ?></a>
        <?php endif ?>
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

<?php if ($layout == 'medium') : ?>
</div>
<?php endif; ?>