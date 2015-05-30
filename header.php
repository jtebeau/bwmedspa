<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
        <title><?php wp_title(''); ?> <?php bloginfo('name'); ?></title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1" name="viewport"/>
        <?php echo PhoenixTeam_Utils::favicons(); ?>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

    <div class="wrapper<?php echo PhoenixTeam_Utils::template_layout(); ?>">

    <header>
        <div class="top_line">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 pull-left general-font-area">
                        <?php echo PhoenixTeam_Utils::show_top_contacts(); ?>
                    </div>
                    <div class="col-lg-3 col-md-3 pull-right hidden-phone">
                        <ul class="social-links">
                            <?php echo PhoenixTeam_Utils::show_top_socials(); ?>
                            <li id="search-btn"><a href="#"><i class="icon-search"></i></a></li>
                        </ul>
                        <div class="search-input" id="search-input" style="display: none;">
                            <?php get_search_form( true ); ?>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </header>

    <div class="page_head">
        <div id="nav-container" class="nav-container" style="height: auto;">
            <nav role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 pull-left">
                            <div class="logo">
                                <?php echo PhoenixTeam_Utils::show_logo(); ?>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-6 pull-right">
                            <div class="menu phoenix-menu-wrapper">
                                <?php if (PhoenixTeam_Utils::dep_exists('megamenu')) : ?>
                                    <?php PhoenixTeam_Utils::create_nav('header-menu'); ?>
                                <?php else : ?>
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"></button>
                                    <div class="navbar-collapse collapse">
                                        <?php PhoenixTeam_Utils::create_nav('header-menu'); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
