<?php

new PhoenixTeam_PageBuilder();

class PhoenixTeam_PageBuilder {

    public function __construct ()
    {
        add_action('vc_before_init', array($this, 'vcSetAsTheme'));

        add_filter('vc_load_default_templates', array($this, 'vcRemoveDefaultTemplates'));

        add_action('vc_load_default_templates', array($this, 'vcContactsPageTemplate'));
        add_action('vc_load_default_templates', array($this, 'vcServicesPageTemplate'));
        add_action('vc_load_default_templates', array($this, 'vcAboutUsPageTemplate'));
        add_action('vc_load_default_templates', array($this, 'vcIndustrialHomepageTemplate'));
        add_action('vc_load_default_templates', array($this, 'vcBusinessHomepageTemplate'));
        add_action('vc_load_default_templates', array($this, 'vcCorporateHomepageTemplate'));
    }

    public function vcRemoveDefaultTemplates ($data)
    {
        return array();
    }


    public function vcSetAsTheme ()
    {
        vc_set_as_theme(true);
    }


    public function vcCorporateHomepageTemplate ($data)
    {
        $template                 = array();
        $template['name']         = __('Corporate Homepage Layout', THEME_SLUG);
        // $template['image_path']   = preg_replace( '/\s/', '%20', plugins_url( 'js_composer/assets/vc/templates/landing_page.png', __FILE__ ) );
        $template['custom_class'] = 'custom_template_for_vc_custom_template';
        $template['content']      =

<<<CONTENT
[vc_row row_type="fullwidth"][vc_column width="1/1"][rev_slider_vc alias="slider"][/vc_column][/vc_row][vc_row row_type="container"][vc_column width="1/1"][xenia_promo_title title="Our Services" css=".vc_custom_1410029523792{margin-top: 75px !important;}"][vc_row_inner][vc_column_inner width="1/4"][xenia_service id="51"][/vc_column_inner][vc_column_inner width="1/4"][xenia_service id="52"][/vc_column_inner][vc_column_inner width="1/4"][xenia_service id="53"][/vc_column_inner][vc_column_inner width="1/4"][xenia_service id="54"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="fullwidth" css=".vc_custom_1408467419477{margin-top: 74px !important;border-top-width: 1px !important;background-color: #fafafa !important;border-top-color: #f2f2f2 !important;}"][vc_column width="1/1"][vc_row_inner css=".vc_custom_1408467203674{padding-top: 50px !important;padding-bottom: 35px !important;background-color: #fafafa !important;}"][vc_column_inner width="1/1"][xenia_promo_title title="Recent Works"]Pellentesque luctus ac lorem id luctus. Aenean sagittis magna sit amet purus vehicsula. Tristique nunc a felis ultrices phasellus vitae ultrices lectus, eget posuere est. Win none ipsum suspendisse eu velit sodales, viverra lorem vitae, accumsan orci sagittis[/xenia_promo_title][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1408467222363{padding-bottom: 50px !important;}"][vc_column_inner width="1/1"][xenia_portfolio_grid qty="6"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="fullwidth"][vc_column width="1/1"][xenia_testimonials layout="slider"][/xenia_testimonials][/vc_column][/vc_row][vc_row row_type="container" css=".vc_custom_1408480430787{margin-top: 75px !important;}"][vc_column width="1/2"][xenia_promo_title title="About Company" css=".vc_custom_1409969157720{margin-bottom: 50px !important;}"][vc_column_text dropcaps="1"]Chasellus vitae ultrices lectus, eget posuere est. In non mi ipsum. Suspendisse velit ticol sodales, viverra lorem vitae, accumsan orci. Mauris nec ipsum tempus, laorei lorem vel, sodales ante. Praesent quis interdum sapien, et pulvinar leo. Vivamus mattis fermentum eros vel ullamcorper. Integer egestas metus vitae mi molestie, ac euismod quam vestibulum. Pellentesque ac molestie eros. Praesent at nunc vel est tempor aliqua.[/vc_column_text][vc_column_text]
<ul class="list-check">
<li><i class="icon-ok"></i> Clean And Minimal Design</li>
<li><i class="icon-ok"></i> We Love Our Clients</li>
<li><i class="icon-ok"></i> Powerful &amp; Flexible Settings</li>
<li><i class="icon-ok"></i> Online Premium Support</li>
</ul>
[/vc_column_text][/vc_column][vc_column width="1/2"][xenia_promo_title title="Recent Post" css=".vc_custom_1409969166836{margin-bottom: 50px !important;}"][xenia_postbox id="7" qty="2" cat="cat == false"][/vc_column][/vc_row][vc_row row_type="container" css=".vc_custom_1408480852748{margin-top: 75px !important;}"][vc_column width="1/1"][xenia_promo_title title="Our Clients"][xenia_clients images="141,142,143,145,146,144,152,151,150,149,147,148"][/vc_column][/vc_row][vc_row row_type="fullwidth" css=".vc_custom_1409090512417{margin-bottom: -50px !important;}"][vc_column width="1/1"][xenia_tweetfeed qty="3" style="slider" username="@ Ph0enixTeam"][/xenia_tweetfeed][/vc_column][/vc_row]
CONTENT;

        array_unshift($data, $template);

        return $data;
    }


    public function vcBusinessHomepageTemplate ($data)
    {
        $template                 = array();
        $template['name']         = __('Business Homepage Layout', THEME_SLUG);
        // $template['image_path']   = preg_replace( '/\s/', '%20', plugins_url( 'js_composer/assets/vc/templates/landing_page.png', __FILE__ ) );
        $template['custom_class'] = 'custom_template_for_vc_custom_template';
        $template['content']      =

<<<CONTENT
[vc_row row_type="fullwidth"][vc_column width="1/1"][rev_slider_vc alias="slider"][/vc_column][/vc_row][vc_row row_type="container"][vc_column width="1/1"][xenia_promo_title title="Our Services" css=".vc_custom_1410107431154{margin-top: 75px !important;}"][vc_row_inner][vc_column_inner width="1/4"][xenia_service id="51"][/vc_column_inner][vc_column_inner width="1/4"][xenia_service id="52"][/vc_column_inner][vc_column_inner width="1/4"][xenia_service id="53"][/vc_column_inner][vc_column_inner width="1/4"][xenia_service id="54"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="container" css=".vc_custom_1410106167587{margin-top: 50px !important;background-color: #ffffff !important;}"][vc_column width="1/1"][vc_row_inner css=".vc_custom_1410105394382{padding-top: 50px !important;padding-bottom: 35px !important;background-color: #ffffff !important;}"][vc_column_inner width="1/1"][xenia_promo_title title="Recent Works"]Pellentesque luctus ac lorem id luctus. Aenean sagittis magna sit amet purus vehicsula. Tristique nunc a felis ultrices phasellus vitae ultrices lectus, eget posuere est. Win none ipsum suspendisse eu velit sodales, viverra lorem vitae, accumsan orci sagittis[/xenia_promo_title][/vc_column_inner][/vc_row_inner][vc_row_inner css=".vc_custom_1408467222363{padding-bottom: 50px !important;}"][vc_column_inner width="1/1"][xenia_portfolio_grid qty="6"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="fullwidth" css=".vc_custom_1410107190929{margin-top: 25px !important;padding-top: 50px !important;padding-bottom: 50px !important;background-color: #fafafa !important;}"][vc_column width="1/1"][vc_row_inner][vc_column_inner width="1/4"][xenia_facts icon="icon-thumbs-up" data="357" name="Happy Customers"][/vc_column_inner][vc_column_inner width="1/4"][xenia_facts icon="icon-lightbulb" data="899" name="Ideas Generated"][/vc_column_inner][vc_column_inner width="1/4"][xenia_facts icon="icon-cup" data="726" name="Cups Of Coffee"][/vc_column_inner][vc_column_inner width="1/4"][xenia_facts icon="icon-diamond" data="477" name="Successful Projects"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="container" css=".vc_custom_1408480430787{margin-top: 75px !important;}"][vc_column width="1/2"][xenia_promo_title title="Testimonials" css=".vc_custom_1410104734044{margin-bottom: 50px !important;}"][xenia_testimonials layout="box"][/xenia_testimonials][/vc_column][vc_column width="1/2"][xenia_promo_title title="Our Services" css=".vc_custom_1410104744496{margin-bottom: 50px !important;}"][vc_accordion][vc_accordion_tab title="Pellentesque habitant"][vc_column_text]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod eu ligula ac fermentum. In nisi lectus, egestas sed urna in, pellentesque euismod lacus. Nulla commodo leo risus, porttitor congue lectus gravida at. Quisque pulvinar, elit sit amet ultricies pretium, sem nisi rutrum ante, et suscipit risus metus ac urna.[/vc_column_text][/vc_accordion_tab][vc_accordion_tab title="Tristique senectus"][vc_column_text]Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod eu ligula ac fermentum. In nisi lectus, egestas sed urna in, pellentesque euismod lacus. Nulla commodo leo risus, porttitor congue lectus gravida at. Quisque pulvinar, elit sit amet ultricies pretium, sem nisi rutrum ante, et suscipit risus metus ac urna.[/vc_column_text][/vc_accordion_tab][vc_accordion_tab title="Pulvinar magnis nunc"][vc_column_text]
<div class="container marg75">
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-12">
<div class="marg50">
<div class="ac-container">
<div><article class="ac-medium">You think water moves fast? You should see ice. It moves like it has a mind. Like it knows it killed the world once and got a taste for murder. After the avalanche, it took us a week to climb out. Now, I don't know exactly when we turned on each other, but I know that seven of us survived the slide... and only five made it out. Now we took an oath, that I'm breaking now. We said we'd say it was the snow that killed the other two, but it wasn't. Nature is lethal but it doesn't hold a candle to man.</article></div>
</div>
</div>
</div>
</div>
</div>
<div class="container marg75"></div>
[/vc_column_text][/vc_accordion_tab][/vc_accordion][/vc_column][/vc_row][vc_row row_type="container" css=".vc_custom_1408480852748{margin-top: 75px !important;}"][vc_column width="1/1"][xenia_promo_title title="Our Clients"][xenia_clients images="141,142,143,145,146,144,152,151,150,149,147,148"][/vc_column][/vc_row]
CONTENT;

        array_unshift($data, $template);

        return $data;
    }

    public function vcIndustrialHomepageTemplate ($data)
    {
        $template                 = array();
        $template['name']         = __('Industrial Homepage Layout', THEME_SLUG);
        // $template['image_path']   = preg_replace( '/\s/', '%20', plugins_url( 'js_composer/assets/vc/templates/landing_page.png', __FILE__ ) );
        $template['custom_class'] = 'custom_template_for_vc_custom_template';
        $template['content']      =

<<<CONTENT
[vc_row row_type="fullwidth"][vc_column width="1/1"][rev_slider_vc alias="slider"][/vc_column][/vc_row][vc_row row_type="container"][vc_column width="1/1"][xenia_promo_title title="Our Services" css=".vc_custom_1410029523792{margin-top: 75px !important;}"][vc_row_inner][vc_column_inner width="1/4"][xenia_service id="51"][/vc_column_inner][vc_column_inner width="1/4"][xenia_service id="52"][/vc_column_inner][vc_column_inner width="1/4"][xenia_service id="53"][/vc_column_inner][vc_column_inner width="1/4"][xenia_service id="54"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="fullwidth" css=".vc_custom_1410123653091{margin-top: 74px !important;border-top-width: 1px !important;background-color: #ffffff !important;}"][vc_column width="1/1"][vc_row_inner css=".vc_custom_1410123664969{padding-top: 50px !important;padding-bottom: 35px !important;background-color: #ffffff !important;}"][vc_column_inner width="1/1"][xenia_promo_title title="Recent Works"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="fullwidth" css=".vc_custom_1410123686422{margin-bottom: 75px !important;}"][vc_column width="1/1"][xenia_portfolio_grid qty="10"][/vc_column][/vc_row][vc_row row_type="fullwidth"][vc_column width="1/1"][xenia_testimonials layout="slider"][/xenia_testimonials][/vc_column][/vc_row][vc_row row_type="container" css=".vc_custom_1408480430787{margin-top: 75px !important;}"][vc_column width="1/2"][xenia_promo_title title="About Company" css=".vc_custom_1409969157720{margin-bottom: 50px !important;}"][vc_column_text dropcaps="1"]Chasellus vitae ultrices lectus, eget posuere est. In non mi ipsum. Suspendisse velit ticol sodales, viverra lorem vitae, accumsan orci. Mauris nec ipsum tempus, laorei lorem vel, sodales ante. Praesent quis interdum sapien, et pulvinar leo. Vivamus mattis fermentum eros vel ullamcorper. Integer egestas metus vitae mi molestie, ac euismod quam vestibulum. Pellentesque ac molestie eros. Praesent at nunc vel est tempor aliqua.[/vc_column_text][vc_column_text]
<ul class="list-check">
    <li><i class="icon-ok"></i> Clean And Minimal Design</li>
    <li><i class="icon-ok"></i> We Love Our Clients</li>
    <li><i class="icon-ok"></i> Powerful &amp; Flexible Settings</li>
    <li><i class="icon-ok"></i> Online Premium Support</li>
</ul>
[/vc_column_text][/vc_column][vc_column width="1/2"][xenia_promo_title title="Testimonials" css=".vc_custom_1410109566045{margin-bottom: 50px !important;}"][xenia_testimonials layout="box"][/xenia_testimonials][/vc_column][/vc_row][vc_row row_type="fullwidth" css=".vc_custom_1409090512417{margin-bottom: -50px !important;}"][vc_column width="1/1"][xenia_tweetfeed qty="3" style="slider" username="@ Ph0enixTeam"][/xenia_tweetfeed][/vc_column][/vc_row]
CONTENT;

        array_unshift($data, $template);

        return $data;
    }


    public function vcAboutUsPageTemplate ($data)
    {
        $template                 = array();
        $template['name']         = __('About Us Page', THEME_SLUG);
        // $template['image_path']   = preg_replace( '/\s/', '%20', plugins_url( 'js_composer/assets/vc/templates/landing_page.png', __FILE__ ) );
        $template['custom_class'] = 'custom_template_for_vc_custom_template';
        $template['content']      =

<<<CONTENT
[vc_row row_type="container" css=".vc_custom_1409252127529{margin-top: 75px !important;}"][vc_column width="1/1"][xenia_promo_title title="Mini Introduction"]Pellentesque luctus ac lorem id luctus. Aenean sagittis magna sit amet purus vehicsula. Tristique nunc a felis ultrices phasellus vitae ultrices lectus, eget posuere est. Win none ipsum suspendisse eu velit sodales, viverra lorem vitae, accumsan orci sagittis[/xenia_promo_title][vc_row_inner css=".vc_custom_1409252139612{margin-top: 50px !important;}"][vc_column_inner width="1/3"][vc_single_image image="175" alignment="center" border_color="grey" img_link_target="_self" img_size="full"][vc_column_text]
<div class="introduction">
<div class="intro-name">Who We Are?</div>
<div class="intro-desc">Pellentesque luctus ac lorem id luctus. Aenean sagittis magna sit amet purus vehicsula. Tristique nunc a felis ultrices phasellus vitae ultrices lectus eget posuere est.</div>
</div>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3"][vc_single_image image="176" alignment="center" border_color="grey" img_link_target="_self" img_size="full"][vc_column_text]
<div class="introduction">
<div class="intro-name">What We Do?</div>
<div class="intro-desc">Pellentesque luctus ac lorem id luctus. Aenean sagittis magna sit amet purus vehicsula. Tristique nunc a felis ultrices phasellus vitae ultrices lectus eget posuere est.</div>
</div>
[/vc_column_text][/vc_column_inner][vc_column_inner width="1/3"][vc_single_image image="174" alignment="center" border_color="grey" img_link_target="_self" img_size="full"][vc_column_text]
<div class="introduction">
<div class="intro-name">Where We Do It?</div>
<div class="intro-desc">Pellentesque luctus ac lorem id luctus. Aenean sagittis magna sit amet purus vehicsula. Tristique nunc a felis ultrices phasellus vitae ultrices lectus eget posuere est.</div>
</div>
[/vc_column_text][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="fullwidth" css=".vc_custom_1409349057258{margin-top: 75px !important;border-top-width: 1px !important;padding-top: 50px !important;padding-bottom: 25px !important;background-color: #fafafa !important;border-top-color: #f2f2f2 !important;border-top-style: solid !important;}"][vc_column width="1/1"][xenia_promo_title title="Our Skills"][vc_row_inner css=".vc_custom_1409254339421{padding-top: 35px !important;}"][vc_column_inner width="1/2"][vc_progress_bar values="84|Front-end" view="outside" bgcolor="bar_turquoise" units="%"][vc_progress_bar values="91|Web Design" view="outside" bgcolor="bar_turquoise" units="%"][/vc_column_inner][vc_column_inner width="1/2"][vc_progress_bar values="85|Programming" view="outside" bgcolor="bar_turquoise" units="%"][vc_progress_bar values="81|Web Development" view="outside" bgcolor="bar_turquoise" units="%"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="container" css=".vc_custom_1409254758887{margin-top: 75px !important;}"][vc_column width="1/1"][xenia_promo_title title="Our Awesome Team"][vc_row_inner css=".vc_custom_1409254768198{margin-top: 50px !important;}"][vc_column_inner width="1/2"][xenia_team id="181"][xenia_team id="186" css=".vc_custom_1409254836624{margin-top: 50px !important;}"][/vc_column_inner][vc_column_inner width="1/2"][xenia_team id="187"][xenia_team id="188" css=".vc_custom_1409254843993{margin-top: 50px !important;}"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="fullwidth" css=".vc_custom_1409349081804{margin-top: 75px !important;border-top-width: 1px !important;padding-top: 50px !important;padding-bottom: 50px !important;background-color: #fafafa !important;border-top-color: #f2f2f2 !important;border-top-style: solid !important;}"][vc_column width="1/1"][xenia_promo_title title="Interesting Fact's"][vc_row_inner css=".vc_custom_1409348047621{padding-top: 35px !important;}"][vc_column_inner width="1/4"][xenia_facts icon="icon-thumbs-up" data="357" name="Happy Customers"][/vc_column_inner][vc_column_inner width="1/4"][xenia_facts icon="icon-diamond" data="477" name="Successful Projects"][/vc_column_inner][vc_column_inner width="1/4"][xenia_facts icon="icon-mail" data="899" name="Letters Sent"][/vc_column_inner][vc_column_inner width="1/4"][xenia_facts icon="icon-cup" data="726" name="Cups Of Coffee"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="container" css=".vc_custom_1409348182952{margin-top: 75px !important;}"][vc_column width="1/1"][xenia_promo_title title="Our Precious Clients"][xenia_clients images="141,142,143,145,146,144,152,151,150,149,148,147"][/vc_column][/vc_row][vc_row row_type="fullwidth" css=".vc_custom_1409348438329{margin-bottom: -75px !important;}"][vc_column width="1/1"][xenia_tweetfeed qty="5" style="slider" username="@dankovtheme"][/xenia_tweetfeed][/vc_column][/vc_row]
CONTENT;

        array_unshift($data, $template);

        return $data;
    }


    public function vcServicesPageTemplate ($data)
    {
        $template                 = array();
        $template['name']         = __('Services Page', THEME_SLUG);
        // $template['image_path']   = preg_replace( '/\s/', '%20', plugins_url( 'js_composer/assets/vc/templates/landing_page.png', __FILE__ ) );
        $template['custom_class'] = 'custom_template_for_vc_custom_template';
        $template['content']      =

<<<CONTENT
[vc_row][vc_column width="1/1"][xenia_promo_title title="Why Choose Us?" css=".vc_custom_1409410418238{margin-top: 75px !important;}"][/vc_column][/vc_row][vc_row row_type="container" css=".vc_custom_1409410673954{margin-top: 35px !important;}"][vc_column width="1/2"][vc_single_image image="278" border_color="grey" img_link_target="_self" img_size="full"][/vc_column][vc_column width="1/2"][vc_column_text dropcaps="1"]Xhasellus vitae ultrices lectus, eget posuere est. In non mi ipsum. Suspendisse velit ticol sodales, viverra lorem vitae, accumsan orci. Mauris nec ipsum tempus, laorei lorem vel, sodales ante. Praesent quis interdum sapien, et pulvinar leo. Vivamus mattis fermentum eros vel ullamcorper. Integer egestas metus vitae mi molestie, ac euismod quam vestibulum. Pellentesque ac molestie eros. Praesent at nunc vel est tempor aliqua. Earum eaque itaque fugit odit hic labore inventore ullam quaerat rerum magni[/vc_column_text][vc_column_text css=".vc_custom_1409410777701{margin-top: 10px !important;}"]
<div class="row">
<div class="col-lg-6 col-md-6 col-sm-6">
<ul class="list-check">
    <li><i class="icon-ok"></i> Clean And Minimal Design</li>
    <li><i class="icon-ok"></i> We Love Our Clients</li>
    <li><i class="icon-ok"></i> Powerful &amp; Flexible Settings</li>
    <li><i class="icon-ok"></i> Online Premium Support</li>
</ul>
</div>
<div class="col-lg-6 col-md-6 col-sm-6">
<ul class="list-check">
    <li><i class="icon-ok"></i> Earum eaque itaque</li>
    <li><i class="icon-ok"></i> Niteger egestas metus</li>
    <li><i class="icon-ok"></i> Praesent quis interdum</li>
    <li><i class="icon-ok"></i> Vivamus mattis fermentum</li>
</ul>
</div>
<div class="col-lg-12">
<div class="button-center"><a class="btn-simple serv-marg" style="margin-top: 20px;" href="#"><i class="icon-money"></i> Download Our Price</a></div>
</div>
</div>
[/vc_column_text][/vc_column][/vc_row][vc_row row_type="container" css=".vc_custom_1409411678326{margin-top: 100px !important;}"][vc_column width="1/1"][xenia_promo_title title="Our Services"][vc_row_inner][vc_column_inner width="1/4"][xenia_service id="51" layout="block"][/vc_column_inner][vc_column_inner width="1/4"][xenia_service id="52" layout="block"][/vc_column_inner][vc_column_inner width="1/4"][xenia_service id="53" layout="block"][/vc_column_inner][vc_column_inner width="1/4"][xenia_service id="54" layout="block"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row][vc_row row_type="container" css=".vc_custom_1409411651091{margin-top: 100px !important;}"][vc_column width="1/2"][xenia_promo_title title="Other Services"][/vc_column][vc_column width="1/2"][xenia_promo_title title="Testimonials"][/vc_column][/vc_row][vc_row row_type="container"][vc_column width="1/4"][xenia_service id="289" layout="list"][xenia_service id="290" layout="list"][xenia_service id="292" layout="list"][/vc_column][vc_column width="1/4"][xenia_service id="295" layout="list"][xenia_service id="291" layout="list"][xenia_service id="293" layout="list"][/vc_column][vc_column width="1/2"][xenia_testimonials layout="box"][/xenia_testimonials][/vc_column][/vc_row][vc_row][vc_column width="1/1"][xenia_promo_title title="Our Precious Clients" css=".vc_custom_1409419254152{margin-top: 75px !important;}"][xenia_clients images="141,142,143,145,146,144,152,151,150,149,148,147"][/vc_column][/vc_row]
CONTENT;

        array_unshift($data, $template);

        return $data;
    }


    public function vcContactsPageTemplate ($data)
    {
        $template                 = array();
        $template['name']         = __('Contacts Page', THEME_SLUG);
        // $template['image_path']   = preg_replace( '/\s/', '%20', plugins_url( 'js_composer/assets/vc/templates/landing_page.png', __FILE__ ) );
        $template['custom_class'] = 'custom_template_for_vc_custom_template';
        $template['content']      =

<<<CONTENT
[vc_row row_type="container" css=".vc_custom_1409437002266{margin-top: 75px !important;}"][vc_column width="1/1"][xenia_promo_title title="Where Find Us?" css=".vc_custom_1409439979122{padding-bottom: 20px !important;}"][vc_gmaps link="#E-8_JTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTIwJTNDaWZyYW1lJTIwd2lkdGglM0QlMjIxMDAlMjUlMjIlMjBoZWlnaHQlM0QlMjI1MDAlMjIlMjBmcmFtZWJvcmRlciUzRCUyMjAlMjIlMjBzY3JvbGxpbmclM0QlMjJubyUyMiUyMG1hcmdpbmhlaWdodCUzRCUyMjAlMjIlMjBtYXJnaW53aWR0aCUzRCUyMjAlMjIlMjBzcmMlM0QlMjJodHRwJTNBJTJGJTJGbWFwcy5nb29nbGUucnUlMkYlM0ZpZSUzRFVURjglMjZhbXAlM0JsbCUzRDQyLjM3NjQ2NyUyQy03MS4wNjMxNzUlMjZhbXAlM0JzcG4lM0QwLjAwNjk2NyUyQzAuMDE2NTEyJTI2YW1wJTNCdCUzRG0lMjZhbXAlM0J6JTNEMTclMjZhbXAlM0JvdXRwdXQlM0RlbWJlZCUyMiUzRSUzQyUyRmlmcmFtZSUzRSUwQQ==" size="500"][/vc_column][/vc_row][vc_row row_type="container" css=".vc_custom_1409440031373{margin-top: 100px !important;}"][vc_column width="2/3"][xenia_promo_title title="Contact Form" css=".vc_custom_1409589911757{padding-bottom: 20px !important;}"][xenia_cform][/xenia_cform][/vc_column][vc_column width="1/3"][xenia_promo_title title="Information" css=".vc_custom_1409590055287{padding-bottom: 20px !important;}"][xenia_get_in_touch address="Address: 455 Martinson, Los Angeles" phone="Phone: 8 (043) 567 - 89 - 30" fax="Fax: 8 (057) 149 - 24 - 64" skype="Skype: companyname" email="E-mail: support@email.com" weekend="Weekend: from 9 am to 6 pm"][/vc_column][/vc_row]
CONTENT;

        array_unshift($data, $template);

        return $data;
    }

}
