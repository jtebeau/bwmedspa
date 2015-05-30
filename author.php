<?php
    get_header();

    global $data;

    $gen_crumbs = isset($data['breadcrumbs']) ? $data['breadcrumbs'] : null;
    $sidebar = isset($data['blog_sidebar_position']) ? $data['blog_sidebar_position'] : 'right';
    $layout = isset($data['blog_layout']) ? $data['blog_layout'] : 'classic';
?>

      <div class="page-in">
              <div class="container">
                <div class="row">

                  <div class="col-lg-6 pull-left">
                    <div class="page-in-name">
<?php
                        _e('Author', THEME_SLUG);
                        echo ": <span>";
                        echo get_the_author();
                        echo "</span>";
?>
                    </div>
                  </div>
<?php
                if ($gen_crumbs) :
                    PhoenixTeam_Utils::breadcrumbs();
                else :
                    echo "<!-- Breadcrumbs turned off -->\n";
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

                    if (have_posts()) {
                    	the_post();

						if ( get_the_author_meta('description')) : ?>
							<div class="author-bio">
								<div class="img-author"><?php echo get_avatar( get_the_author_meta( 'ID' ), 80 ); ?></div>
								<div class="name-author"><?php _e('About author:', THEME_SLUG); ?> <?php the_author_posts_link(); ?></div>
								<div class="text-author">
									<?php echo wpautop(get_the_author_meta('description')); ?>
								</div>
							</div>

							<div class="cl-blog-line"></div>
						<?php endif; ?>
<?php
						rewind_posts();
                        while(have_posts()) {
                            the_post();

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
                        PhoenixTeam_Utils::pagination('pride_pg');
                        echo '</div></div>';

                    } else {
?>
                        <div class="container general-font-area marg50">
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
