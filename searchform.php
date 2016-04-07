<?php
/**
 * Search Form
 *
 * @author Michael Rouse
 * Simple little search form, and JS to process the form
 */
?>
<form id="search-form" method="get" class="searchform">
  <input id="search-form-search" type="text" placeholder="Search" value="<?php echo ( ( get_search_query() ) ?: '' ); ?>">
  <input id="search-form-submit" type="submit" value="Search">
</form>
<script type="text/javascript">window.addEventListener('load',function(){document.getElementById('search-form-submit').addEventListener('click',function(e){var a=encodeURIComponent(document.getElementById('search-form-search').value);e.preventDefault();var b='<?php echo site_url(); ?>/search/'+a;window.open(b,'_self')})});</script>
