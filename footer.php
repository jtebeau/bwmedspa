<?php
  global $data;
  $copyright = isset($data['copyright_text']) ? $data['copyright_text'] : null;
  $layout = isset($data['footer_layout']) ? $data['footer_layout'] : 3;
  $use_footer = isset($data['use_footer']) ? $data['use_footer'] : 1;
  $use_footer = ($use_footer) ? ' footer-bottom-top-section-present' : null;
?>
<!-- footer -->
  <div class="footer general-font-area<?php echo $use_footer; ?>">

<?php if ($use_footer) : ?>

    <div class="container">
      <div class="row">
        <?php if ($layout == 4) : ?>
            <div class="col-lg-3 col-md-3 col-sm-3">
<?php
                if ( function_exists('dynamic_sidebar') && is_active_sidebar('Footer 1') ) {
                    dynamic_sidebar('Footer 1');
                } else {
                    echo '<h4 class="widget-title">Footer Sidebar 1</h4><p class="footer-no-widgets">' . __('Drop a widget on "Footer Sidebar 1" sidebar at Appearance > Widgets page.', THEME_SLUG) . '</p>';
                }
?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
<?php
                if ( function_exists('dynamic_sidebar') && is_active_sidebar('Footer 2') ) {
                    dynamic_sidebar('Footer 2');
                } else {
                    echo '<h4 class="widget-title">Footer Sidebar 2</h4><p class="footer-no-widgets">' . __('Drop a widget on "Footer Sidebar 2" sidebar at Appearance > Widgets page.', THEME_SLUG) . '</p>';
                }
?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
<?php
                if ( function_exists('dynamic_sidebar') && is_active_sidebar('Footer 3') ) {
                    dynamic_sidebar('Footer 3');
                } else {
                    echo '<h4 class="widget-title">Footer Sidebar 3</h4><p class="footer-no-widgets">' . __('Drop a widget on "Footer Sidebar 3" sidebar at Appearance > Widgets page.', THEME_SLUG) . '</p>';
                }
?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3">
<?php
                if ( function_exists('dynamic_sidebar') && is_active_sidebar('Footer 4') ) {
                    dynamic_sidebar('Footer 4');
                } else {
                    echo '<h4 class="widget-title">Footer Sidebar 4</h4><p class="footer-no-widgets">' . __('Drop a widget on "Footer Sidebar 4" sidebar at Appearance > Widgets page.', THEME_SLUG) . '</p>';
                }
?>
            </div>
        <?php else : ?>
            <div class="col-lg-4 col-md-4 col-sm-4">
<?php
                if ( function_exists('dynamic_sidebar') && is_active_sidebar('Footer 1') ) {
                    dynamic_sidebar('Footer 1');
                } else {
                    echo '<h4 class="widget-title">Footer Sidebar 1</h4><p class="footer-no-widgets">' . __('Drop a widget on "Footer Sidebar 1" sidebar at Appearance > Widgets page.', THEME_SLUG) . '</p>';
                }
?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
<?php
                if ( function_exists('dynamic_sidebar') && is_active_sidebar('Footer 2') ) {
                    dynamic_sidebar('Footer 2');
                } else {
                    echo '<h4 class="widget-title">Footer Sidebar 2</h4><p class="footer-no-widgets">' . __('Drop a widget on "Footer Sidebar 2" sidebar at Appearance > Widgets page.', THEME_SLUG) . '</p>';
                }
?>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
<?php
                if ( function_exists('dynamic_sidebar') && is_active_sidebar('Footer 3') ) {
                    dynamic_sidebar('Footer 3');
                } else {
                    echo '<h4 class="widget-title">Footer Sidebar 3</h4><p class="footer-no-widgets">' . __('Drop a widget on "Footer Sidebar 3" sidebar at Appearance > Widgets page.', THEME_SLUG) . '</p>';
                }
?>
            </div>
        <?php endif; ?>
        </div>
    </div>

<?php endif; ?>

    <div class="container">
      <div class="footer-bottom">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6 col-ms-12 pull-left">
            <div class="copyright">
              <?php if ($copyright) echo $copyright; ?>
            </div>
          </div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-ms-12 pull-right">
            <div class="foot_menu">
            	<?php PhoenixTeam_Utils::create_nav('footer-menu', 1, 'foot_menu'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /wrapper -->

<?php wp_footer(); ?>

	</body>
</html>
