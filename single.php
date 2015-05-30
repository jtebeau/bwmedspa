<?php get_header(); ?>

<?php
	global $data;

	$gen_crumbs = isset($data['breadcrumbs']) ? $data['breadcrumbs'] : null;
	$sidebar_area = isset($data['blog_sidebar_widgets_area']) ? $data['blog_sidebar_widgets_area'] : 'blog-sidebar';
	$sidebar_pos = isset($data['blog_sidebar_position']) ? $data['blog_sidebar_position'] : 'right';
?>

<?php 
if (have_posts()) :
	while (have_posts()) :
		the_post();

		$post_subtitle	=	rwmb_meta(THEME_SLUG . '_subtitle');
		$post_crumbs	=	rwmb_meta(THEME_SLUG . '_post_breadcrumbs');
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
?>
					<!-- Breadcrumbs turned off -->
<?php
		    	endif;
?>
		    </div>
		  </div>
		</div>

		<div id="<?php the_ID(); ?>" <?php post_class( array('container', 'general-font-area', 'marg50') ); ?>>
			<div class="row">
<?php
                if ($sidebar_pos == 'no') {
                    echo '<div class="col-lg-12">' . "\n";
                } elseif ($sidebar_pos == 'right') {
?>					<div class="col-lg-8">
	<?php
				    $post_format = get_post_format();
					if (!$post_format) $post_format = 'standard';

					get_template_part( 'format', $post_format );
?>
</div>
					<div class="col-lg-4">
				        <?php dynamic_sidebar($sidebar_area); ?>
				    </div><!-- sidebar end-->
<?php
                } elseif ($sidebar_pos == 'left') {
?>                  <!-- sidebar -->
                    <div class="col-lg-3">
                        <?php dynamic_sidebar($sidebar_area); ?>
                    </div><!-- sidebar end-->

                    <div class="col-lg-9">
<?php
                }
	
?>

					<div class="col-lg-12">
						<div class="wp-link-pages-container">
							<?php
								$link_pages_args = array(
									'before'           => '<div class="pride_pg">',
									'after'            => '</div>',
									'link_before'      => '',
									'link_after'       => '',
									'next_or_number'   => 'number',
									'nextpagelink'     => __('Next', THEME_SLUG),
									'previouspagelink' => __('Prev', THEME_SLUG),
									'pagelink'         => '%',
									'echo'             => 1
								);
								wp_link_pages($link_pages_args);
							?>
						</div>
					</div>

					<div class="row">
					    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						    <div class="tags-blog-single">
						        <?php the_tags('<ul class="tags-blog"><li>','</li><li>','</li></ul>'); ?>
						    </div>
					    </div>
					    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
							<?php echo PhoenixTeam_Utils::single_socials(); ?>
					    </div>
					</div>

					<div class="row">
						<div class="prev-next-links-wrapper">
							<?php if (get_previous_post_link()) : ?>
								<div class="col-lg-4 col-xs-4 pull-left">
									<span class="btn-item pull-left">
										<?php previous_post_link('%link', __('Prev', THEME_SLUG)); ?>
									</span>
								</div>
							<?php endif; ?>
							<?php if (get_next_post_link()) : ?>
								<div class="col-lg-4 col-xs-4 pull-right">
									<span class="btn-item pull-right">
										<?php next_post_link('%link', __('Next', THEME_SLUG)); ?>
									</span>
								</div>
							<?php endif; ?>
						</div>
					</div>
					<div class="cl-blog-line"></div>

					<!-- comments -->
					<div>
						<?php comments_template(); ?>
					</div>
					<!-- /comments -->

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
