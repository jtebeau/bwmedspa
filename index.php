<?php
    get_header();

    global $data;

    $gen_crumbs = isset($data['breadcrumbs']) ? $data['breadcrumbs'] : null;
    $sidebar = isset($data['blog_sidebar_position']) ? $data['blog_sidebar_position'] : 'right';
    $layout = isset($data['blog_layout']) ? $data['blog_layout'] : 'classic';

    $page = PhoenixTeam_Utils::check_posts_page();
?>

<?php
    if ($page) {
            $page_subtitle  =   rwmb_meta(THEME_SLUG . '_subtitle', null, $page->ID);
            $page_crumbs    =   rwmb_meta(THEME_SLUG . '_page_breadcrumbs', null, $page->ID);
?>
            <div class="page-in">
              <div class="container">
                <div class="row">

                  <div class="col-lg-6 pull-left">
                    <div class="page-in-name">
<?php
                        echo $page->post_title;

                        if ($page_subtitle) 
                            echo ": <span>{$page_subtitle}</span>";
?>
                    </div>
                  </div>
<?php
                if ($gen_crumbs && $page_crumbs === '-1') :

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

            <div <?php post_class(array('container', 'general-font-area', 'marg50')); ?>>
                <div class="row">

<?php
                if ($sidebar == 'no') {
                    echo '<div class="col-lg-12">' . "\n";
                } elseif ($sidebar == 'right') {
                    echo '<div class="col-lg-9">' . "\n";
                } elseif ($sidebar == 'left') {
?>                  <!-- sidebar -->
                    <div class="col-lg-3">
                        <?php dynamic_sidebar('blog-sidebar'); ?>
                    </div><!-- sidebar end-->

                    <div class="col-lg-9">
<?php
                }

        echo $page->post_content;

        wp_reset_postdata();
    } else {
?>
            <div class="container general-font-area marg50">
                <div class="row">
<?php
                if ($sidebar == 'no') {
                    echo '<div class="col-lg-12">' . "\n";
                } elseif ($sidebar == 'right') {
                    echo '<div class="col-lg-9">' . "\n";
                } elseif ($sidebar == 'left') {
?>                  <!-- sidebar -->
                    <div class="col-lg-3">
                        <?php dynamic_sidebar('blog-sidebar'); ?>
                    </div><!-- sidebar end-->
                    <div class="col-lg-9">
<?php
                }
    } // if (page) END


    $query_args = array(
        'post_type' => 'post',
        'posts_per_page' => get_option('posts_per_page'),
        'post_status' => array('publish', 'private'),
        'paged' => get_query_var('paged')
    );

    $query = new WP_Query($query_args);

    if ($query->have_posts()) {
        while($query->have_posts()) {
            $query->the_post();

                $post_format = get_post_format();
                if (!$post_format) {
                    echo '<div class="'.$layout.'-blog post-standard">';
                    get_template_part( 'format', 'standard' );
                } else {
                    echo '<div class="'.$layout.'-blog post-'.$post_format.'">';
                    get_template_part( 'format', get_post_format() );
                }
                echo '</div>';

        }

        echo '<div class="row"><div class="col-lg-12">';
        $pagination = PhoenixTeam_Utils::pagination('pride_pg', $query);
        if (!$pagination) posts_nav_link();
        echo '</div></div>';
    } else {
?>
        <div class="container marg50">
            <h1 style="display: block; text-align: center;"><?php _e( 'Sorry, nothing to display.', THEME_TEAM ); ?></h1>
        </div>
<?php
    }
?>
            </div>

        <?php if ($sidebar == 'right') : ?>
            <!-- sidebar -->
            <div class="col-lg-3">
                <?php dynamic_sidebar('blog-sidebar'); ?>
            </div><!-- sidebar end-->
        <?php endif; ?>

        </div>

        </div><!-- container marg50 -->

<?php get_footer(); ?>
