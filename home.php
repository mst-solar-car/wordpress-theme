<?php
/**
 * Posts Page
 *
 * @author Michael Rouse
 * Shows all of the posts, must have WordPress set to a static front page
 */
?>
<?php
  get_header();

  get_search_form();

  if ( have_posts() ) :
    while ( have_posts() ) : the_post();
      get_template_part( 'article', 'preview' );
    endwhile;

?>

<div class="pagination">
  <div class="pagination-older"><?php next_posts_link( '&larr; Older' ); ?></div>
  <div class="pagination-newer"><?php previous_posts_link( ' Newer &rarr;' ); ?></div>
</div>

<?php
  endif;

  get_footer(); ?>
