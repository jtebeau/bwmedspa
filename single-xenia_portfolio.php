<?php get_header(); ?>

<?php
    global $data;

    $gen_crumbs = isset($data['breadcrumbs']) ? $data['breadcrumbs'] : null;
    $related_qty = isset($data['port_related_quantity']) ? $data['port_related_quantity'] : 6;
    $layout = isset($data['port_single_layout']) ? $data['port_single_layout'] : 'wide';

    if ($layout == 'wide') {
        $layout_class = 'col-lg-12';
    } elseif ($layout == 'half') {
        $layout_class = 'col-lg-9';
    }

    $thisID = array();
?>

<?php 
if (have_posts()) :
    while (have_posts()) :
        the_post();

        $post_subtitle  =   rwmb_meta(THEME_SLUG . '_subtitle');
        $post_crumbs    =   rwmb_meta(THEME_SLUG . '_port_breadcrumbs');
        $port_cat       =   rwmb_meta(THEME_SLUG . '_portfolio_recent_works_cat');
?>
        <div class="page-in">
          <div class="container">
            <div class="row">

              <div class="col-lg-6 pull-left">
                <div class="page-in-name">
<?php
                    echo get_the_title();

                    if ($post_subtitle) 
                        echo ": <span>{$post_subtitle}</span>";
?>
                </div>
              </div>
<?php
                if ($gen_crumbs && $post_crumbs === '-1') :
                    PhoenixTeam_Utils::breadcrumbs();
                elseif ($post_crumbs === '1') :
                    PhoenixTeam_Utils::breadcrumbs();
                else :
                    echo "<!-- Breadcrumbs turned off -->\n";
                endif;
?>
            </div>
          </div>
        </div>

<?php
        $ID = get_the_id();
        $thisID[] = $ID;

        $thumb = null;
        if (has_post_thumbnail()) {
            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full', true );
            $thumb = array('full_url' => $thumb[0]);
        }

        $Gallery = rwmb_meta( THEME_SLUG . '_portfolio_gallery', array('type' => 'image_advanced') );

        if ($thumb)
            array_unshift($Gallery, $thumb);

        $Name = get_the_title();
        if ($Name) {
            $Name = '<li>'. __('Name', THEME_SLUG) .': '. $Name .'</li>';
        }
        
        $Date = rwmb_meta(THEME_SLUG . '_portfolio_date');
        if ($Date) {
            $Date = '<li>'. __('Date', THEME_SLUG) .': '. $Date .'</li>';
        }

        $Category = get_the_terms($ID, THEME_SLUG . '_portfolio_category');
        if ($Category) {
            $Category = array_reverse($Category);
            $Category = $Category[0]->name;
            $Category = '<li>'. __('Category', THEME_SLUG) .': '. $Category .'</li>';
        }

        $Description = rwmb_meta(THEME_SLUG . '_portfolio_description');
        $Author = rwmb_meta(THEME_SLUG . '_portfolio_author');
        $AuthorUrl = rwmb_meta(THEME_SLUG . '_portfolio_author_url');
        $Client = rwmb_meta(THEME_SLUG . '_portfolio_client');
        $ClientUrl = rwmb_meta(THEME_SLUG . '_portfolio_client_url');

        if ($AuthorUrl && $Author) {
            $Author = '<li>'. __('Author', THEME_SLUG) . ': <a href="'. $AuthorUrl .'">'. $Author .'</a></li>';
        } elseif($Author) {
            $Author = '<li>'. __('Author', THEME_SLUG) . ': '. $Author .'</li>';
        } else {
            $Author = null;
        }

        if ($ClientUrl && $Client) {
            $Client = '<li>'. __('Client', THEME_SLUG) . ': <a href="'. $ClientUrl .'">' . $Client .'</a></li>';
        } elseif ($Client) {
            $Client = '<li>'. __('Client', THEME_SLUG) . ': ' . $Client .'</li>';
        } else {
            $Client = null;
        }

        $prev_post = get_previous_post();
        if ($prev_post)
            $prev_post = get_permalink($prev_post->ID);

        $next_post = get_next_post();
        if ($next_post)
            $next_post = get_permalink($next_post->ID);
?>

        <div id="<?php echo $ID; ?>" <?php post_class( array('container', 'general-font-area', 'marg50') ); ?>>
            <div class="row">
                <div class="<?php echo $layout_class; ?>">
                    
                        <div id="main">
                                    <?php if (count($Gallery)) : ?>
                                        <ul class="bxslider">
<?php
                                            foreach ($Gallery as $item) {;
                                                echo '<li><img src="'. $item['full_url'] .'" alt=""></li>';
                                            }
?>
                                    </ul>
                                    <?php endif; ?>
                        </div>
                </div>


<?php if ($layout == 'wide') : ?>

            <?php if ($prev_post) : ?>
                <div class="col-lg-4 col-xs-4 pull-left"><a href="<?php echo $prev_post; ?>" class="btn-item pull-left">&laquo; <?php _e('Prev', THEME_SLUG); ?></a></div>
            <?php endif; ?>
            <!-- <div class="col-lg-4 col-xs-4"><div class="item-heart"><i class="icon-heart"></i></div></div> -->
            <?php if ($next_post) : ?>
                <div class="col-lg-4 col-xs-4 pull-right"><a href="<?php echo $next_post; ?>" class="btn-item pull-right"><?php _e('Next', THEME_SLUG); ?> &raquo;</a></div>
            <?php endif; ?>

            </div>

                <div class="row marg25">
                    <div class="col-lg-3">
                        <ul class="portfolio-item">
                          <?php echo $Name; ?>
                          <?php echo $Date; ?>
                          <?php echo $Category; ?>
                          <?php echo $Author; ?>
                          <?php echo $Client; ?>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <ul class="portfolio-item">
                          <li><?php _e('Description', THEME_SLUG) ?>:</li>
                        </ul>
                        <div class="portfolio-item-text">
                            <?php echo $Description; ?>
                        </div>
                    </div>
                </div>

<?php elseif ($layout == 'half') : ?>

                <div class="col-lg-3">
                  <ul class="portfolio-item">
                    <?php echo $Name; ?>
                    <?php echo $Date; ?>
                    <?php echo $Category; ?>
                    <?php echo $Author; ?>
                    <?php echo $Client; ?>
                  </ul>

                  <div class="row">
                    <?php if ($prev_post) : ?>
                        <div class="col-lg-4 col-xs-4 pull-left"><a href="<?php echo $prev_post; ?>" class="btn-item pull-left">&laquo; <?php _e('Prev', THEME_SLUG); ?></a></div>
                    <?php endif; ?>
                    <!-- <div class="col-lg-4 col-xs-4"><div class="item-heart"><i class="icon-heart"></i></div></div> -->
                    <?php if ($next_post) : ?>
                        <div class="col-lg-4 col-xs-4 pull-right"><a href="<?php echo $next_post; ?>" class="btn-item pull-right"><?php _e('Next', THEME_SLUG); ?> &raquo;</a></div>
                    <?php endif; ?>
                  </div>
                </div>

            </div>

            <div class="row marg25">
                <div class="col-lg-12">
                    <ul class="portfolio-item">
                        <li><?php _e('Description', THEME_SLUG) ?>:</li>
                    </ul>
                    <div class="portfolio-item-text">
                        <?php echo $Description; ?>
                    </div>
                </div>
            </div>

  

<?php endif; ?>

            <div class="container marg75">
              <div class="row">
                <div class="col-lg-12">
                  <div class="promo-block">
                    <div class="promo-text"><?php _e('Recent Works', THEME_SLUG); ?></div>
                    <div class="center-line"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="container general-font-area marg50">
<?php
    $ajaxPaged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $query_args = array(
        'post_type' => THEME_SLUG . '_portfolio',
        'posts_per_page' => $related_qty,
        'post_status' => 'publish',
        'paged' => $ajaxPaged,
        'post__not_in' => $thisID
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

    if ($query->have_posts()) {

        echo '<script>portSetts = {inlineError: "'.__("Error! Please refresh the page!", THEME_SLUG).'", moreLoading: "'.__("Loading...", THEME_SLUG).'", moreNoMore: "'.__("No More Works", THEME_SLUG).'"}; '.THEME_TEAM.'["queryVars"] = \''. serialize($query->query_vars) .'\'; '.THEME_TEAM.'["currentPage"] = '. $ajaxPaged .';</script> ' . "\n";
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
                                <?php if ($author) { echo __('by', THEME_SLUG) ." ". $author;} ?>"><i class="icon-search"></i></a>
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
                </div>';
    }
?>
                <!-- bxslider init -->
                <script type="text/javascript">
                    jQuery(document).ready(function(){
                        jQuery('.bxslider').bxSlider({
                            adaptiveHeight: true,
                            mode: 'fade',
                            slideMargin: 0,
                            pager: false,
                            controls: true
                        });
                    });
                </script>

            </div>
        </div>
</div>
    <?php endwhile; ?>

    <?php else: ?>

        <div class="container general-font-area marg50">
            <h1 style="display: block; text-align: center;"><?php _e( 'Sorry, nothing to display.', THEME_SLUG ); ?></h1>
        </div>

    <?php endif; ?>

<?php get_footer(); ?>
