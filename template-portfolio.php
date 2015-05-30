<?php
    # Template name: Portfolio

    get_header();

    global $data;

    $gen_crumbs = isset($data['breadcrumbs']) ? $data['breadcrumbs'] : null;
    // $sidebar = isset($data['port_sidebar_position']) ? $data['port_sidebar_position'] : 'no';
    $quantity = isset($data['port_quantity']) ? $data['port_quantity'] : 8;
    $port_layout = isset($data['port_layout']) ? $data['port_layout'] : '3-cols';
?>

<?php
    if (have_posts()) {
        while(have_posts()) {
            the_post();

            $page_subtitle  =   rwmb_meta(THEME_SLUG . '_subtitle');
            $page_crumbs    =   rwmb_meta(THEME_SLUG . '_page_breadcrumbs');
            $page_header    =   rwmb_meta(THEME_SLUG . '_page_header_bg', array('type' => 'image_advanced'));
            $header_adv     =   rwmb_meta(THEME_SLUG . '_page_header_advanced');
            $port_cat       =   rwmb_meta(THEME_SLUG . '_page_portfolio_cat');

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

            <div <?php post_class(array('container', 'general-font-area', 'marg50')); ?>>
                <div class="row">
                    <div class="col-lg-12">
                        <div id="filters-container-portfolio" class="cbp-l-filters-button"<?php if ($port_layout == 'full') echo ' style="display:table;margin:auto;"'; ?>>
<?php
                            if ($port_cat && $port_cat != 'none') {
                                $cats = get_terms( THEME_SLUG . '_portfolio_category', 'orderby=count&hide_empty=1&child_of=' . $port_cat );
                            } else {
                                $cats = get_terms( THEME_SLUG . '_portfolio_category', 'orderby=count&hide_empty=1' );
                            }

                            $to_return = array();
                            $to_return[] = '<button data-filter="*" class="cbp-filter-item cbp-filter-item-active">'. __("All", THEME_SLUG) .'<div class="cbp-filter-counter"></div></button>';

                            foreach ($cats as $cat) {
                                $term = get_term_by( 'id', $cat->term_id, THEME_SLUG . '_portfolio_category' );
                                $to_return[] = '<button data-filter=".'. $term->slug .'" class="cbp-filter-item">'. $term->name .'<div class="cbp-filter-counter"></div></button>';
                            }

                            echo implode("\n", $to_return);
?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="marg50 general-font-area<?php if ($port_layout != 'full') echo " container"; ?>">
                <div class="row">
                    <div class="col-lg-12">
<?php
                        the_content();
        }
        wp_reset_postdata();
    }
?>
                    </div><!-- col-any -->
                </div><!-- row -->
<?php
    $ajaxPaged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $query_args = array(
        'post_type' => THEME_SLUG . '_portfolio',
        'posts_per_page' => $quantity,
        'post_status' => 'publish',
        'paged' => $ajaxPaged,
    );

    if ($port_cat && $port_cat != 'none') {
        $query_args['tax_query'] = array(
            array(
                'taxonomy' => THEME_SLUG . '_portfolio_category',
                'field'    => 'term_id',
                'include_children' => true,
                'terms' => $port_cat
            )
        );
    }

    $query = new WP_Query($query_args);

    if ($query->have_posts($query->query_vars)) {

        echo '<script>'.THEME_TEAM.'["queryVars"] = \''. serialize($query->query_vars) .'\'; '.THEME_TEAM.'["currentPage"] = '. $ajaxPaged .';</script>';
?>
        <div class="grid hover-3">
            <div class="cbp-l-grid-projects" id="grid-container-portfolio">
                <ul>
<?php
        while($query->have_posts()) {
            $query->the_post();

            $ID = get_the_id();

            $the_cat = get_the_terms( $ID , THEME_SLUG . '_portfolio_category');
            $categories = '';
            if (is_array($the_cat)) {
                foreach($the_cat as $cur_term) {
                    $categories .= $cur_term->slug . ' ';
                }
            }

            $thumb_params = array('width' => 800,'height' => 600, 'crop' => true);
            $thumb = null;
            
            $title = get_the_title();
            $author = rwmb_meta(THEME_SLUG . '_portfolio_author');
            $link = get_permalink();

            if (has_post_thumbnail()) {
                $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full', true );
                $thumb = $thumb[0];
            } else {
                $thumb = THEME_URI . "/assets/images/nopicture.png";
            }
?>
                <li class="cbp-item <?php echo $categories; ?>">
                    <div class="portfolio-main">
                        <figure>
                            <?php if ($thumb) echo '<img src="'. bfi_thumb( $thumb, $thumb_params ) .'" alt="'. $title .'" />'; ?>
                            <figcaption>
                                <h3><?php echo $title; ?></h3>
                                <span><?php echo $author; ?></span>
                                <a href="<?php echo $thumb; ?>" class="portfolio-attach cbp-lightbox" data-title="<?php echo $title; ?><br/>
                                <?php if ($author) { echo __('by', THEME_TEAM) ." ". $author;} ?>"><i class="icon-search"></i></a>
                                <a href="<?php echo site_url() . "/wp-admin/admin-ajax.php?p={$ID}"; ?>" class="portfolio-search cbp-singlePageInline"><i class="icon-attach"></i></a>
                            </figcaption>
                        </figure>
                    </div>
                </li>
<?php
        }
                echo '</ul></div>
                <div class="col-lg-12">
                  <div class="button-center"><a href="#" class="btn-simple cbp-l-loadMore-button-link">'. __('Load Full Portfolio', THEME_SLUG) .'</a></div>
                </div>

                </div>';
    }
?>
            </div>

<?php get_footer(); ?>
