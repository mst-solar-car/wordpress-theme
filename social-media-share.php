<?php
/**
 * Sharing Buttons for Social Media
 *
 * @author Michael Rouse
 * Displays the share buttons for Social Media
 */
?>
<!-- Social Media Share Buttons -->
<div class="social-media-share fifty-top-margin">
  <ul class="social-share">
    <li class="entypo-twitter" onclick="javascript:ss('t')" title="Share on Twitter"></li>
    <li class="entypo-facebook" onclick="javascript:ss('f')" title="Share on Facebook"></li>
    <li class="entypo-gplus" onclick="javascript:ss('g')" title="Share on Google+"></li>
  </ul>
</div>
<script type="text/javascript">function ss(e){var o="<?php echo the_permalink(); ?>",t="http://";e=e.toLowerCase(),"t"==e?t+="twitter.com/intent/tweet?url="+o:"f"==e?t+="facebook.com/sharer/sharer.php?u="+o:"g"==e&&(t+="plus.google.com/share?url="+o),window.open(t,"ssw","resizable=yes, width=500, height=400")}</script>
