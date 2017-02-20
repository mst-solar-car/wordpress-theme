<?php
/**
 * Footer
 *
 * @author Michael Rouse
 * Displays the footer for all pages
 */
?>
        </div> <!-- End content -->
      </div><!-- End Wrapper -->


      <!-- Footer -->
      <footer>
        <div class="fluid-footer width-limit reading-width">
          <div class="footer-center">
            <h2 style="text-transform: uppercase;font-weight:600;font-size:2.25em;"><?php bloginfo( 'name' ); ?></h2>

            <?php if ( get_theme_mod( 'include_donate_button', '' ) == 'y' ) : ?>
                <?php if ( is_setting( 'give_url' ) ) : ?>
                    <br/>
                    <a href="<?php setting( 'give_url' ) ?>" class="no-underline donateNowLink"><button class="btn"><?php setting( 'donate_btn_text', 'Donate Now' ) ?></button></a>
                    <br/>
                <?php endif; ?>
            <?php endif; ?>

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

            <br />
            <br />
          </div>
        </div> <!-- End Fluid Footer -->
    </footer> <!-- End Footer -->

    <div id="imageGalleryOverlay"></div>

    <!-- Page Load JavaScript --
    <script type="text/javascript">window.addEventListener('load', function(){document.querySelector('body').classList.remove('is-loading');});window.addEventListener('beforeunload', function(){document.querySelector('body').classList.add('is-loading');});</script>-->

    <script type="text/javascript" src="<?php asset( 'require.js' ); ?>" data-main="<?php asset( 'js/theme.js' ); ?>"></script>

    <?php show_custom_js(); ?>

    <?php wp_footer(); ?>
  </body>
</html>
