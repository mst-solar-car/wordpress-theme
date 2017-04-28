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
            <br/><br/>
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
