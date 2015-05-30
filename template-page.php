<?php
    # Template Name: Page with Visual Composer
?>

<?php get_header(); ?>

<?php
    global $data;

    $gen_crumbs = isset($data['breadcrumbs']) ? $data['breadcrumbs'] : null;
    $sidebar_area = isset($data['page_sidebar_widgets_area']) ? $data['page_sidebar_widgets_area'] : 'blog-sidebar';
    $sidebar_pos = isset($data['page_sidebar_position']) ? $data['page_sidebar_position'] : 'no';
    $comments = isset($data['page_display_comments']) ? $data['page_display_comments'] : null;
?>

<?php
    if (have_posts()) {
        while(have_posts()) {
            the_post();

            $page_subtitle  =   rwmb_meta(THEME_SLUG . '_subtitle');
            $page_crumbs    =   rwmb_meta(THEME_SLUG . '_page_breadcrumbs');
            $page_layout    =   rwmb_meta(THEME_SLUG . '_page_layout');
            $page_area      =   rwmb_meta(THEME_SLUG . '_page_widgets_area');
            $page_header    =   rwmb_meta(THEME_SLUG . '_page_header_bg', array('type' => 'image_advanced'));
            $header_adv     =   rwmb_meta(THEME_SLUG . '_page_header_advanced');

            if ($page_layout && $page_layout != $sidebar_pos)
                $sidebar_pos = $page_layout;

            if ($page_area && $page_area != $sidebar_area)
                $sidebar_area = $page_area;

            if ($header_adv) {
                $page_bgcol  = rwmb_meta(THEME_SLUG . '_page_header_bgcol');
                $bgcol_opac  = rwmb_meta(THEME_SLUG . '_page_header_bgcol_opacity');
                $title_col   = rwmb_meta(THEME_SLUG . '_page_title_col');
            } else {
                $page_bgcol = $bgcol_opac = $title_col = null;
            }

            $bg_css = null;

            if ($page_header) {
                $bg_css = 'style="';

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
?>
                    <!-- Breadcrumbs turned off -->
<?php
                endif;
?>
                </div>
              </div>
            </div>
        </div>
    
        <section <?php post_class('phoenix-sidebar-'. $sidebar_pos); ?>>
            <div id="page-<?php the_ID(); ?>" class="begin-content">
                <section>
<?php
                        if ($sidebar_pos == 'no') {
                            // do nothing
                        } elseif ($sidebar_pos == 'right') {
                            echo '<div class="container marg50">' . "\n";
                                echo '<div class="row">' . "\n";
                                    echo '<div class="col-lg-9 phoenix-right-page-layout">' . "\n";
                                    
                        } elseif ($sidebar_pos == 'left') {
?>
                            <!-- sidebar -->
                            <div class="container marg50">
                                <div class="row">
                                <div class="col-lg-3 phoenix-widget-page-layout">
                                    <?php dynamic_sidebar($sidebar_area); ?>
                                </div><!-- sidebar end-->
                                <div class="col-lg-9 phoenix-left-page-layout">
<?php
                        }

                        the_content();

                        if ($sidebar_pos == 'right') : ?>
                                </div>
                                </div>
                                    <!-- sidebar -->
                                    <div class="col-lg-3 phoenix-widget-page-layout">
                                        <?php dynamic_sidebar($sidebar_area); ?>
                                    </div><!-- sidebar end-->
                                </div>
                            </div>
                        <?php elseif ($sidebar_pos == 'left') : ?>
                                </div>
                            </div>
                        <?php endif; ?>
                </section>
            </div>
        </section>



<?php
        }
    }
?>

<?php get_footer(); ?>
