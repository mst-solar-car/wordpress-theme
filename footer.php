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
        <div class="fluid-footer width-limit">
          <div class="footer-center">
            <h2 style="text-transform: uppercase;font-weight:600;font-size:2.25em;"><?php bloginfo( 'name' ); ?></h2>
            <br/><br/>
            <div class="footer-sponsors">
              <?php if ( is_setting( 'sponsor1' ) ) :?><div class="footer-sponsor"><a href="/sponsors" class="no-underline"><img src="<?php setting( 'sponsor1' ) ?>"></a></div><?php endif; ?>
              <?php if ( is_setting( 'sponsor2' ) ) :?><div class="footer-sponsor"><a href="/sponsors" class="no-underline"><img src="<?php setting( 'sponsor2' ) ?>"></a></div><?php endif; ?>
              <?php if ( is_setting( 'sponsor3' ) ) :?><div class="footer-sponsor"><a href="/sponsors" class="no-underline"><img src="<?php setting( 'sponsor3' ) ?>"></a></div><?php endif; ?>
              <?php if ( is_setting( 'sponsor4' ) ) :?><div class="footer-sponsor"><a href="/sponsors" class="no-underline"><img src="<?php setting( 'sponsor4' ) ?>"></a></div><?php endif; ?>
              <?php if ( is_setting( 'sponsor5' ) ) :?><div class="footer-sponsor"><a href="/sponsors" class="no-underline"><img src="<?php setting( 'sponsor5' ) ?>"></a></div><?php endif; ?>
            </div>
          </div>
        </div> <!-- End Fluid Footer -->
    </footer> <!-- End Footer -->

    <div id="imageGalleryOverlay"></div>

    <script type="text/javascript" src="<?php asset( 'require.js' ); ?>" data-main="<?php asset( 'js/theme.js' ); ?>"></script>

    <?php show_custom_js(); ?>

    <?php wp_footer(); ?>
  </body>
</html>
