<?php
/**
 * Back Button
 *
 * @author Michael Rouse
 * This will show a back button, or a link to all the posts.
 *
 * If the page before this in the browser history (if there is one), was not the current WordPress site (or no previous history), then an all posts link will
 * be displayed. If the page before the current one was the same WordPress site then a back button will be displayed.
 */
?>
<a onclick="javascript:window.history.back();" class="back-button">&larr; Back</a>
<a href="<?php echo get_permalink( get_option( 'page_for_posts' ) ); ?>" class="all-posts-link">&larr; All Posts</a>
<script type="text/javascript">function brurl(l){return 0==l.indexOf("http://")&&(l=l.substr(7)),0==l.indexOf("www.")&&(l=l.substr(4)),l.split("/")[0]}var bkl=document.querySelector(".back-button"),all_link=document.querySelector(".all-posts-link");window.history.length<=1?(bkl.style.display="none",all_link.style.display="inline-block"):(brurl(document.referrer)==brurl(window.location.href))?bkl.style.display="inline-block":(bkl.style.display="none",all_link.style.display="inline-block");</script>
