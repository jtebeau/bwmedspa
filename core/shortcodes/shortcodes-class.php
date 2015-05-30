<?php

new PhoenixTeam_Shortcodes();

class PhoenixTeam_Shortcodes {

    public function __construct ()
    {
        add_shortcode( THEME_SLUG . '_promo_title', array($this, 'promo_title') );
        add_shortcode( THEME_SLUG . '_portfolio_grid', array($this, 'portfolio_grid') );
        add_shortcode( THEME_SLUG . '_service', array($this, 'service') );
        add_shortcode( THEME_SLUG . '_team', array($this, 'team_member') );
        add_shortcode( THEME_SLUG . '_get_in_touch', array($this, 'widget_get_in_touch') );
        add_shortcode( THEME_SLUG . '_tweetfeed', array($this, 'widget_twitter') );
        add_shortcode( THEME_SLUG . '_cform', array($this, 'widget_contact_form') );
        add_shortcode( THEME_SLUG . '_postbox', array($this, 'post_box') );
        add_shortcode( THEME_SLUG . '_testimonials', array($this, 'testimonials') );
        add_shortcode( THEME_SLUG . '_clients', array($this, 'clients_slider') );
        add_shortcode( THEME_SLUG . '_facts', array($this, 'facts') );
    }


    private function buildCSS ($css = null)
    {
        if ($css) {
            $css = substr($css, strrpos($css, "{"));
            $css = str_replace("{", "", $css);
            $css = str_replace("}", "", $css);
            return empty( $css ) ? $css : ' style="' . $css . '"';
        }
        return false;
    }


    public function facts ($attrs, $content = null)
    {
        extract( shortcode_atts(array(
            "icon"       => null,
            "data"       => null,
            "name"       => null,
            "css"        => null,
            "link"       => null,
            "link_place" => null,
            "target"     => null
        ), $attrs) );

        $vcCssClass = null;
        if (function_exists('vc_shortcode_custom_css_class'))
            $vcCssClass = vc_shortcode_custom_css_class( $css, ' ' );

        if ($icon)
            $icon = '<div class="fact-icon"><i class="'. $icon .'"></i></div>';

        if ($data)
            $data = '<div class="fact-numb">'. $data .'</div>';

        if ($name)
            $name = '<div class="fact-name">'. $name .'</div>';

        if ($target)
            $target = ' target="_blank"';

        if ($link) {
            $link = '<a class="phoenix-facts-link" href="'. $link .'"'. $target .'>';

            if ($link_place == "icon") {
                $return =
                '<div class="phoenix-shortcode-facts'. $vcCssClass .'">' .
                    $link .
                    $icon .
                    '</a>' .
                    $data .
                    $name .
                '</div>';
            } elseif ($link_place == 'data') {
                $return =
                '<div class="phoenix-shortcode-facts'. $vcCssClass .'">' .
                    $icon .
                    $link .
                    $data .
                    '</a>' .
                    $name .
                '</div>';
            } elseif ($link_place == 'text') {
                $return =
                '<div class="phoenix-shortcode-facts'. $vcCssClass .'">' .
                    $icon .
                    $data .
                    $link .
                    $name .
                    '</a>' .
                '</div>';
            }

        } else {
            $return =
            '<div class="phoenix-shortcode-facts'. $vcCssClass .'">' .
                $icon .
                $data .
                $name .
            '</div>';
        }

        return $return;
    }


    public function post_box ($attrs, $content = null)
    {
        extract( shortcode_atts(array(
            // "id" => null,
            "qty" => 2,
            "css" => null,
            "cat" => null
        ), $attrs) );

        $vcCssClass = null;
        // $css = $this->buildCSS($css);
        if (function_exists('vc_shortcode_custom_css_class')) {
            $vcCssClass = vc_shortcode_custom_css_class( $css, ' ' );
        }

        if ($qty) {
            $postsbox = array(
                "post_type" => "post",
                "post_status" => array("publish", "private"),
                "showposts" => $qty,
            );

            if ($cat && $cat != "cat == false")
                $postsbox['category_name'] = $cat;

            $return = '<div class="phoenix-shortcode-posts-box">';
            $el_class = 'blog-main';

            $postsbox = new WP_Query($postsbox);

            if (!isset($postsbox->post))
                return false;

            if ($postsbox->have_posts()) {
                while($postsbox->have_posts()) {
                    $postsbox->the_post();

                    $ID = get_the_ID();
                    $title = get_the_title();

                    $image = wp_get_attachment_image_src( get_post_thumbnail_id($ID), 'full', false );
                    $image = $image[0];
                    $link = get_permalink($ID);

                    $auth = get_post_field( 'post_author', $ID);

                    $author = get_the_author_meta( 'display_name', $auth );
                    $author_link = get_author_posts_url( $auth );

                    $cat = wp_get_post_categories( $ID );

                    if (is_array($cat) && count($cat) > 0) {
                        $cat = $cat[0];
                        $cat = get_category($cat);
                        $cat = __('in', THEME_SLUG) . ' <a href="'.get_category_link($cat->cat_ID).'">'.$cat->name.'</a>';
                    }

                    $format = get_post_format($ID);
                    if (!$format) $format = 'standard';

                    switch ($format) {
                        case 'standard': $format = 'icon-pencil'; break;
                        case 'image': $format = 'icon-camera'; break;
                        case 'video': $format = 'icon-videocam'; break;
                        case 'link': $format = 'icon-attach'; break;
                        case 'quote': $format = 'icon-comment'; break;
                        case 'gallery': $format = 'icon-camera'; break;
                        case 'audio': $format = 'icon-music'; break;
                        default: $format = 'icon-pencil'; break;
                    }

                    $return .= '
                        <div class="'. $el_class . $vcCssClass .'">
                            <div class="blog-images">
                                <div class="view view-fifth">
                                    <img src="'.$image.'" alt="'.$title.'">
                                    <div class="mask"><a href="'.$link.'" class="btn-blog">'.__("Read More", THEME_SLUG).'</a></div>
                                </div>
                            </div>
                            <div class="blog-icon"><i class="'.$format.'"></i></div>
                            <div class="blog-name"><a href="'.$link.'">'.$title.'</a></div>
                            <div class="blog-desc">' .
                                get_the_time('F j, Y ') .
                                __('by', THEME_SLUG) . ' <a href="'.$author_link.'">'.$author.'</a>, ' .
                                $cat .
                            '</div>
                        </div>';
                }
            }

            wp_reset_postdata();

            $return .= "</div>";

            return $return;
        }

        return false;
    }


    public function testimonials ($attrs, $content = null)
    {
        static $counter = 0;

        extract( shortcode_atts(array(
            "layout" => "box",
            "css" => null
        ), $attrs) );

        $vcCssClass = null;
        if (function_exists('vc_shortcode_custom_css_class')) {
            $vcCssClass = vc_shortcode_custom_css_class( $css, ' ' );
        }

        $testimonials = array(
            "post_type" => THEME_SLUG . '_testimonials',
            "post_status" => "publish",
            "posts_per_page" => -1,
            "nopaging" => true
        );

        $testimonials = new WP_Query($testimonials);

        if ($layout == 'slider') {
            $cnt = 0;
            $return =
            '<div class="prl-1'. $vcCssClass .'">
                <div class="prlx">
                    <div class="container">
                      <div class="row">
                        <div class="col-lg-12 marg50"><div class="quote"><i class="fa fa-quote-right"></i></div></div>
                        <div class="col-lg-12">
                          <div class="testimonials">
                            <div id="carousel-testimonials-'.$counter.'" class="carousel slide">';
        } else {
            $return = '<div class="phoenix-shortcode-testimonials'. $vcCssClass . '">'."\n".
                        '<div class="testimonialrotator skin_default" id="phoenix-tr-'.$counter.'">'."\n";
        }

        $ol = '<ol class="carousel-indicators">';

        for ($i = 0; $i < $testimonials->post_count; $i++) {
            $acti = null;
            if ($i == 0) {
                $acti = ' class="active"';
            }
            $ol .= '<li data-target="#carousel-testimonials-'.$counter.'" data-slide-to="'.$i.'"'.$acti.'></li>';
        }

        $ol .= '</ol>';

        $inner = '<div class="carousel-inner">';

        if ($testimonials->have_posts()) {
            while ($testimonials->have_posts()) {
                $testimonials->the_post();

                $rate = null;

                $author = rwmb_meta(THEME_SLUG . '_testimonials_author', null);
                $pic = rwmb_meta(THEME_SLUG . '_testimonials_author_pic', array('type' => 'image', 'size' => 'thumbnail'));
                $company = rwmb_meta(THEME_SLUG . '_testimonials_authors_company', null);
                $text = rwmb_meta(THEME_SLUG . '_testimonials_text', null);
                $rating = rwmb_meta(THEME_SLUG . '_testimonials_rating', null);

                if ($layout == 'slider') {
                    $active = null;
                    if ($cnt == 0) {
                        $active = " active";
                        $return .= $ol . $inner;
                    }

                    if ($text) {
                        $text = '<p class="testimonial-quote">'.$text.'</p>'."\n";
                    }

                    if ($author) {
                         $author = '<p class="testimonial-author">'.$author.'</p>'."\n";
                    }

                    $return .=
                        '<div class="item'.$active.'">' .
                              $text .
                              $author .
                        '</div>';

                    $cnt++;
                } else {
                    if ($text) {
                        $text = '<div class="testtext" style="border:none">'. $text .'</div>'."\n";
                    }

                    if (is_array($pic) && count($pic) > 0) {
                        $pic = array_shift($pic);
                        $pic = $pic['url'];
                        $pic = '<div class="testauthor-img"><img src="'.$pic.'" alt="'.get_the_title().'"></div>'."\n";
                    } else {
                        $pic = null;
                    }

                    if ($company) {
                        $company = '<div class="testauthor-desc">'. $company .'</div>'."\n";
                    }

                    if ($rating) {
                        $rate = '<div class="testauthor-rating"><ul>'."\n";
                        $rate .= str_repeat('<li><i class="icon-star"></i></li>'."\n", $rating);
                        $rate .= '</ul></div>'."\n";
                    }

                    if ($author) {
                         $author = '<div class="testauthor">'. $author .'</div>'."\n";
                    }

                    $return .=
                    '<div class="testimonial-tobe">' ."\n" .
                         $text . "\n" .
                         $pic . "\n" .
                         $author . "\n" .
                         $company . "\n" .
                         $rate . "\n" .
                    '</div>' . "\n";
                }

            }
        }

        if ($layout == 'slider') {
            $return .=
                                '</div>
                                <a class="left carousel-control" href="#carousel-testimonials-'.$counter.'" data-slide="prev">&lsaquo;</a>
                                <a class="right carousel-control" href="#carousel-testimonials-'.$counter.'" data-slide="next">&rsaquo;</a>
                            </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>';
        } else {
            $return .= '</div>'. "\n" .'</div>' . "\n";
        }

        wp_reset_postdata();
        $counter++;
        return $return;
    }


    public function widget_contact_form ($attrs, $content = null)
    {
        extract( shortcode_atts(array(
            'css' => null,
            'attachment' => null,
        ), $attrs) );

        $type = 'PhoenixTeam_Widget_ContactForm';
        $args = array();

        $vcCssClass = null;
        if (function_exists('vc_shortcode_custom_css_class')) {
            $vcCssClass = vc_shortcode_custom_css_class( $css, ' ' );
        }

        $result = '<div class="'. THEME_SLUG .'-shortcode-contact-form'. $vcCssClass .'">';

        ob_start();
        the_widget($type, $attrs, $args);
        $result .= ob_get_clean();

        $result .= '</div>';

        return $result;
    }


    public function widget_twitter ($attrs, $content = null)
    {
        $result = null;

        extract( shortcode_atts(array(
            'style' => 'box',
            'css' => null
        ), $attrs) );

        $vcCssClass = null;
        if (function_exists('vc_shortcode_custom_css_class')) {
            $vcCssClass = vc_shortcode_custom_css_class( $css, ' ' );
        }

        $attrs['title'] = isset($attrs['title']) ? $attrs['title'] : null;
        $attrs['username'] = isset($attrs['username']) ? $attrs['username'] : THEME_TEAM;
        $attrs['qty'] = isset($attrs['qty']) ? $attrs['qty'] : 3;

        $result = '<div class="'. THEME_SLUG .'-shortcode-twitter-feed'. $vcCssClass .'">';

        if ($style == 'slider') {
            $result .= '<div class="prl-3 marg50 phoenix-twitter-slider-wrapper">
            <div class="prlx-3">
              <div class="container marg75">
              <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 col-ms-12">
                  <div class="twit-icon"><i class="fa fa-twitter"></i></div>
                </div>
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-11 col-ms-12">';
        }

        $type = 'PhoenixTeam_Widget_Twitter';
        $args = array();

        ob_start();
        the_widget($type, $attrs, $args);
        $result .= ob_get_clean();

        if ($style == 'slider') {
            $result .= '</div>';
            $result .= '<div class="col-lg-1 col-md-1 col-sm-1 hidden-xs">
                          <div class="paginat">
                              <a id="prev">&lsaquo;</a>
                              <a id="next">&rsaquo;</a>
                          </div>
                      </div>';
            $result .= '</div>';
            $result .= '</div>';
            $result .= '</div>';
        }
        $result .= '</div>';

        return $result;
    }


    public function team_member ($attrs, $content = null)
    {
        extract( shortcode_atts(array(
            'id' => null,
            'title' => null,
            'css' => null
        ), $attrs) );

        $vcCssClass = null;
        // $css = $this->buildCSS($css);
        if (function_exists('vc_shortcode_custom_css_class')) {
            $vcCssClass = vc_shortcode_custom_css_class( $css, ' ' );
        }

        if ($id) {
            $member = array(
                "post_type" => THEME_SLUG . "_team",
                "post_status" => "publish",
                "p" => $id
            );

            $member = new WP_Query($member);
            wp_reset_postdata();

            if (!isset($member->post))
                return false;

            $member = $member->post;

            if (!$title)
                $title = $member->post_title;

            $pic = rwmb_meta(THEME_SLUG . '_team_member_pic', array('type' => 'image', 'size' => 'medium'), $id);
            if (is_array($pic) && count($pic)) {
                $pic = array_shift($pic);
                $pic = $pic['full_url'];
                $pic = '<img src="'.$pic.'" alt="'.$title.'">';
            } else {
                $pic = '<img src="'.THEME_URI . '/assets/images/nopicture.png" alt="'.$title.'">';
            }

            $about = rwmb_meta(THEME_SLUG . '_team_member_text', null, $id);
            $position = rwmb_meta(THEME_SLUG . '_team_member_position', null, $id);
            $email = rwmb_meta(THEME_SLUG . '_team_member_email', null, $id);

            if ($position)
                $position = '<div class="about-desc">'.$position.'</div>';

            if ($about)
                $about = '<div class="about-texts">'.$about.'</div>';

            $socials = PhoenixTeam_Utils::get_member_socials($id);

            $socials_html = null;
            $socials_before = null;
            $socials_after = null;

            if ($socials) {
                $count = count($socials);

                for ($i=0; $i < $count; $i++) {
                    if ($socials[$i]['url']) {
                        $socials_html .= '<li><a href="'.$socials[$i]['url'].'" title="'.$title.' '.$socials[$i]['name'].' '.__("profile", THEME_SLUG).'"><i class="fa '.$socials[$i]['icon'].'"></i></a></li>';
                    }
                }
            }

            if ($email) {
                $socials_html .= '<li><a href="mailto:'. antispambot($email) .'"><i class="fa fa-envelope"></i></a></li>';
            }

            if ($socials_html) {
                $socials_before = '<ul class="soc-about">';
                $socials_after = '</ul>';
            }

            $return = '
                <div class="phoenix-shortcode-about-us about-us'. $vcCssClass .'">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-6 col-xs-6 col-ms-12">' .
                            $pic .
                        '</div>' .
                        '<div class="col-lg-6 col-md-12 col-sm-6 col-xs-6 col-ms-12">'.
                            '<div class="about-name">'.$title.'</div>' .
                            $position .
                            $about .
                            $socials_before .
                            $socials_html .
                            $socials_after .
                        '</div>
                    </div>
                </div>';

            return $return;
        }

        return false;

    }


    public function clients_slider ($attrs, $content = null)
    {
        extract( shortcode_atts(array(
            'images' => null,
            'popup' => false,
            'autoplay' => null,
            'nav' => null,
            'css' => null
        ), $attrs) );

        $vcCssClass = null;
        if (function_exists('vc_shortcode_custom_css_class')) {
            $vcCssClass = vc_shortcode_custom_css_class( $css, ' ' );
        }

        if ($images && count($images) > 0) {
            $images = explode( ',', $images );
        } else {
            return '<div class="phoenix-clients-carousel"><p>'. __("You didn't select any image.", THEME_SLUG) .'</p></div>';
        }

        $uID = null;
        $script = null;

        if ($autoplay) {
            $uID = 'jcarousel-shortcode-id-' . uniqid();
            $script =
            "<script>
                (function($) {
                    'use strict';

                    // Set autoscroll
                    $(function() {
                        setTimeout(function() {
                            var jcarousel = $('#". $uID ."');

                            console.log(jcarousel);

                            jcarousel.jcarouselAutoscroll({
                                target: '+=1'
                            });
                        });
                    }, 2000);

                })(jQuery);
            </script>";
        }

        $return =
        '<div class="phoenix-clients-carousel'. $vcCssClass .'">
        <div class="jcarousel-wrapper">
          <div class="jcarousel" id="'. $uID .'">
            <ul>';


        foreach ( $images as $attach_id ) {
            $thumb = wp_get_attachment_image_src( $attach_id, 'full', true );
            $thumb = $thumb[0];

            if ($popup) {
                $return .= '<li><a class="phoenix-image-link" href="'.$thumb.'"><img src="'.$thumb.'" alt=""></a></li>';
            } else {
                $return .= '<li><img src="'.$thumb.'" alt=""></li>';
            }
            // $return .= '<li><a class="phoenix-image-link" href="'.$thumb.'"><img src="'.bfi_thumb( $thumb, array("width" => 170, "height" => 100, "crop" => true) ).'" alt=""></a></li>';
        }

        $return .= '</ul></div>';

        if ( $nav !== 'yes' ) {
            $return .=
                '<a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                 <a href="#" class="jcarousel-control-next">&rsaquo;</a>';
        }

        $return .= '</div></div>';
        $return .= $script;

        return $return;
    }


    public function service ($attrs, $content = null)
    {
        $return = null;
        $icon = null;
        $text = null;

        extract( shortcode_atts(array(
            'id' => null,
            'title' => null,
            'layout' => 'block',
            'css' => null,
            "link"  => null,
            "target" => null
        ), $attrs) );

        $vcCssClass = null;
        if (function_exists('vc_shortcode_custom_css_class')) {
            $vcCssClass = vc_shortcode_custom_css_class( $css, ' ' );
        }

        if ($id) {
            $service = array(
                "post_type" => THEME_SLUG . '_services',
                "post_status" => "publish",
                "p" => $id
            );

            $service = new WP_Query($service);
            wp_reset_postdata();

            if (!isset($service->post))
                return false;

            $service = $service->post;

            if (!$title)
                $title = $service->post_title;

            $icon = rwmb_meta(THEME_SLUG . '_services_icons_list', null, $id);
            $text = rwmb_meta(THEME_SLUG . '_services_text', null, $id);

            if ($target)
                $target = ' target="_blank"';

            if ($link) {
                $link = '<a class="phoenix-service-link" href="'. $link .'"'. $target .'>';
                $link_closed = '</a>';
            } else {
                $link = $link_closed = null;
            }

            if ($layout == 'list') {
                $return = '
                    <div class="other-serv'. $vcCssClass .'">
                        <div class="serv-icon">'. $link .'<i class="fa '.$icon.'"></i>'. $link_closed .'</div>
                        <div class="serv-name">'.$title.'</div>
                        <div class="serv-desc">'.$text.'</div>
                    </div>';
            } else {
                $return = '
                    <div class="hi-icon-effect'. $vcCssClass .'">' .
                        $link . '<div class="hi-icon fa '. $icon .'"></div>' . $link_closed .
                        '<div class="service-name">'.$title.'</div>
                        <div class="service-text">'.$text.'</div>
                    </div>';
            }

            return $return;
        }

        return false;
    }


    public function portfolio_grid ($attrs, $content = null)
    {
        $return = null;
        $icon = null;
        $text = null;

        extract( shortcode_atts(array(
            'qty' => 6,
            'css' => null
        ), $attrs) );

        wp_enqueue_script(THEME_SLUG . '-portfolio');

        if (function_exists('vc_shortcode_custom_css_class')) {
            $vcCssClass = vc_shortcode_custom_css_class( $css, ' ' );
        }

        $portfolio = array(
            'post_type' => THEME_SLUG . '_portfolio',
            'posts_per_page' => $qty,
            'post_status' => 'publish'
        );

        $portfolio = new WP_Query($portfolio);

        if ($portfolio->have_posts()) {
            $return = '<script>portSetts = {inlineError: "'.__("Error! Please refresh the page!", THEME_SLUG).'", moreLoading: "'.__("Loading...", THEME_SLUG).'", moreNoMore: "'.__("No More Works", THEME_SLUG).'"}; '.THEME_TEAM.'["queryVars"] = \''. serialize($portfolio->query_vars) .'\'; '.THEME_TEAM.'["currentPage"] = 1;</script> ' . "\n";

            $return .= '<div class="phornix-shortcode-portfolio-grid'. $vcCssClass .'"><div class="grid hover-3">
                <div class="cbp-l-grid-projects" id="grid-container-portfolio">
                    <ul>';

            while($portfolio->have_posts()) {
                $portfolio->the_post();

                $ID = get_the_id();

                $the_cat = get_the_terms( $ID , THEME_SLUG . '_portfolio_category');
                $categories = '';
                if (is_array($the_cat)) {
                    foreach($the_cat as $cur_term) {
                        $categories .= $cur_term->slug . ' ';
                    }
                }

                $thumb_params = array('width' => 555,'height' => 416, 'crop' => true);
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

                    $return .=
                    '<li class="cbp-item '.$categories.'">
                        <div class="portfolio-main">
                            <figure>';

                    if ($thumb) {
                        $return .= '<img src="'. bfi_thumb( $thumb, $thumb_params ) .'" alt="'. $title .'" />';
                    }

                    $return .=
                    '<figcaption>
                        <h3>'.$title.'</h3>
                        <span>'.$author.'</span>
                            <a href="'.$thumb.'" class="portfolio-attach cbp-lightbox" data-title="'.$title.'<br>'.__('by', THEME_SLUG).' '.$author.'"><i class="icon-search"></i></a>
                            <a href="'.site_url() . '/wp-admin/admin-ajax.php?p='.$ID. '" class="portfolio-search cbp-singlePageInline"><i class="icon-attach"></i></a>
                                </figcaption>
                            </figure>
                        </div>
                    </li>';
            }

            $return .= '
                        </ul>
                    </div>
                    <div class="col-lg-12">
                        <div class="button-center"><a href="#" class="btn-simple cbp-l-loadMore-button-link">'. __('Load Full Portfolio', THEME_SLUG) .'</a></div>
                    </div>
                </div>
            </div>';

            wp_reset_postdata();

            return $return;
        }

        return false;
    }


    public static function promo_title ( $attrs, $content = null )
    {
        extract( shortcode_atts(array(
            'title' => 'Title',
            'dot' => false,
            'css' => null
        ), $attrs) );

        $cssClass = "phoenix-shortcode-promo-block";
        $vcCssClass = null;

        if (function_exists('vc_shortcode_custom_css_class')) {
            $vcCssClass = vc_shortcode_custom_css_class( $css, ' ' );
        }

        $result = '<div class="'. $cssClass . $vcCssClass .'" style="margin-bottom: 15px;">';
        $result .= '<div class="promo-block" style="margin-bottom: 15px;">';

        if ($title)
            $result .= '<div class="promo-text">'. $title .'</div>';

        if (!$dot)
            $result .= '<div class="center-line"></div>';

        $result .= '</div>';

        if ($content)
            $result .= '<div class="promo-paragraph">'.$content.'</div>';

        $result .= '</div>';

        return $result;
    }


    public function widget_get_in_touch ( $attrs, $content = null )
    {
        $result = null;

        extract(shortcode_atts(array(
            'adress' => null,
            'phone' => null,
            'fax' => null,
            'skype' => null,
            'email' => null,
            'weekend' => null,
            'css' => null
        ), $attrs));

        $vcCssClass = null;
        if (function_exists('vc_shortcode_custom_css_class')) {
            $vcCssClass = vc_shortcode_custom_css_class( $css, ' ' );
        }

        $result = '<div class="'. THEME_SLUG .'-shortcode-contact'. $vcCssClass .'">';
        $type = 'PhoenixTeam_Widget_GetInTouch';
        $args = array();

        ob_start();
        the_widget($type, $attrs, $args);
        $result .= ob_get_clean();

        $result .= '</div>';

        return $result;
    }

}
