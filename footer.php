<?php
/**
 * Footer
 *
 * @author Michael Rouse
 * Displays the footer for all pages
 */
?>
<?php
  $options = get_option( 'solarcar_theme_options' );
?>
        </div> <!-- End content -->
      </div><!-- End Wrapper -->


      <!-- Footer -->
      <footer>
        <div class="fluid-footer width-limit reading-width">
          <div class="footer-center">
            <?php if ( get_theme_mod( 'include_social_media', '' ) == 'y' ) : ?>
              <div class="social-media">
                <?php if ( is_setting( 'facebook_url' ) ) :?>
                  <a href="https://www.facebook.com/<?php socialmedia_url( 'facebook' ); ?>" target="_blank" title="Like us on Facebook"><span class="social facebook"></span></a>
                <?php endif; ?>
                <?php if( is_setting( 'twitter_url' ) ) :?>
                  <a href="https://twitter.com/<?php socialmedia_url( 'twitter' ); ?>" target="_blank" title="Follow us on Twitter"><span class="social twitter"></span></a>
                <?php endif; ?>
                <?php if( is_setting( 'instagram_url' ) ) :?>
                  <a href="https://instagram.com/<?php socialmedia_url( 'instagram' ); ?>" target="_blank" title="Follow us on Instagram"><span class="social instagram"></span></a>
                <?php endif; ?>
              </div>
            <?php endif; ?>

            &copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ) ?>
            <br />
            <br />
          </div>
        </div> <!-- End Fluid Footer -->
    </footer> <!-- End Footer -->

    <!-- Page Load JavaScript -->
    <script type="text/javascript">window.addEventListener('load', function(){document.querySelector('body').classList.remove('is-loading');});window.addEventListener('beforeunload', function(){document.querySelector('body').classList.add('is-loading');});</script>

    <script type="text/javascript" src="<?php asset( 'js/theme.min.js' ); ?>"></script>

    <?php if ( isset( $options['custom_js'] ) ) : ?>
      <?php if ( !empty($options['custom_js'] ) ) : ?>
        <?php echo $options['custom_js']; ?>
      <?php endif; ?>
    <?php endif; ?>

    <?php wp_footer(); ?>
  </body>
</html>
