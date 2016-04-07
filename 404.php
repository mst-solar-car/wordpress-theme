<?php
/**
 * 404 Page
 *
 * @author Michael Rouse
 * This is the page that is shown when something is not found (404 Error)
 */
?>
<?php
  get_header();
 ?>
 <h1 style="font-size:60px">Whoops!</h1>
 <p>Oh no... What have you done?</p>
 <br/>
 <h3>Do Not Panic!</h3>
 <p>This error is nothing serious, to fix it all you need to do is <a href="<?php bloginfo( 'url' ); ?>">Click Here</a> and you will return to the homepage.</p>
 <br/>
 <h3>What Caused This?</h3>
 <p>This could have been caused by an incorrect/mistyped URL, or the page/post you requested no longer exists.</p>
 <?php

    get_footer(); ?>
