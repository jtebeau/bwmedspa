<?php
    get_header();

    global $data;

    $gen_crumbs = isset($data['breadcrumbs']) ? $data['breadcrumbs'] : true;
    $is_shop = is_shop();
    $ID = woocommerce_get_page_id('shop');
    $page_crumbs = rwmb_meta(THEME_SLUG . '_page_breadcrumbs', "", $ID) ? rwmb_meta(THEME_SLUG . '_page_breadcrumbs', "", $ID) : $gen_crumbs;
    $sidebar_pos = rwmb_meta(THEME_SLUG . '_page_layout', "", $ID) ? rwmb_meta(THEME_SLUG . '_page_layout', "", $ID) : 'right';
    $sidebar_ar  = rwmb_meta(THEME_SLUG . '_page_widgets_area', "", $ID) ? rwmb_meta(THEME_SLUG . '_page_widgets_area', "", $ID) : 'woo-sidebar';
    $page_header = rwmb_meta(THEME_SLUG . '_page_header_bg', array('type' => 'image_advanced'), $ID);
    $header_adv = rwmb_meta(THEME_SLUG . '_page_header_advanced', "", $ID);

    if ($header_adv) {
        $page_bgcol  = rwmb_meta(THEME_SLUG . '_page_header_bgcol', "", $ID);
        $bgcol_opac  = rwmb_meta(THEME_SLUG . '_page_header_bgcol_opacity', "", $ID);
        $title_col   = rwmb_meta(THEME_SLUG . '_page_title_col', "", $ID);
    } else {
        $page_bgcol = $bgcol_opac = $title_col = null;
    }

    $bg_css = null;

    if (!$is_shop)
        $ID = $post->ID;

    $page_subtitle  =   rwmb_meta(THEME_SLUG . '_subtitle', "", $ID);

    if ($page_header) {
        $bg_css = ' style="';

        $page_header = array_shift($page_header);
        $page_header = 'background: url('. $page_header['full_url'] .') center repeat;';

        if ($title_col)
            $title_col = 'color:'. $title_col .';';

        if ($page_bgcol) {

            if ($bgcol_opac && $bgcol_opac != 1) {
                $page_bgcol = PhoenixTeam_Utils::hex_to_rgb($page_bgcol);
                $page_bgcol = 'rgba('. $page_bgcol .','. $bgcol_opac .')';
            }
            
            $page_bgcol = '<div style="background-color: '. $page_bgcol .';">';
        } else {
            $page_bgcol = '<div>';
        }

        $bg_css .= $page_header . $title_col;

        $bg_css .= '"';

        echo '<div class="page-in" '. $bg_css .'>' . $page_bgcol;
    } else {
        echo '<div class="page-in"><div>';
    }
?>
              <div class="container">
                <div class="row">

                  <div class="col-lg-6 pull-left">
                    <div class="page-in-name">
<?php
                        if ($is_shop)
                            woocommerce_page_title();
                        else
                            echo get_the_title();

                        if ($page_subtitle) 
                            echo ": <span>{$page_subtitle}</span>";
?>
                    </div>
                  </div>
<?php
                if ($gen_crumbs && !$page_crumbs || $gen_crumbs && $page_crumbs === '-1') :
                    PhoenixTeam_Utils::breadcrumbs();
                elseif ($page_crumbs === '1') :
                    PhoenixTeam_Utils::breadcrumbs();
                else :
                    echo "<!-- Breadcrumbs turned off -->";
                endif;
?>
                </div>
              </div>
            </div>
        </div>

            <section id="woocommerce_page" class="marg50 container general-font-area<?php echo ' phoenix-sidebar-'. $sidebar_pos; ?>">
                <div class="row">
<?php
                if ($sidebar_pos == 'no') {
                    echo '<div class="col-lg-12">' . "\n";
                } elseif ($sidebar_pos == 'right') {
                    echo '<div class="row">' . "\n";
                    echo '<div class="col-lg-9">' . "\n";
                } elseif ($sidebar_pos == 'left') {
?>
                    <!-- sidebar -->
                    <div class="row">
                    <div class="col-lg-3">
                        <?php dynamic_sidebar($sidebar_ar); ?>
                    </div><!-- sidebar end-->

                    <div class="col-lg-9">
<?php
                }

                woocommerce_content();

                if ($sidebar_pos == 'right') :
?>
                        </div>
                        <!-- sidebar -->
                        <div class="col-lg-3">
                            <?php dynamic_sidebar($sidebar_ar); ?>
                        </div><!-- sidebar end-->
                    </div>
                <?php elseif ($sidebar_pos == 'left') : ?>
                    </div>
                <?php endif; ?>

            </div>
            </section>

<?php get_footer(); ?>
