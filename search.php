<?php
/**
 * Search Page
 *
 * @author Michael Rouse
 * Page that shows search results
 */
?>
<?php

  get_header();

  ?>
  <h1>Results for '<?php echo get_search_query(); ?>'</h1>
  <?php get_search_form(); ?>

  <?php
  $i = 0; // Counter for how many POSTS were returned, since the search doesn't return pages, only posts
  if ( have_posts() )
  {
    while (have_posts() )
    {
      the_post();
      if($post->post_type != 'page') // Do not show pages in result
      {
        $i++; // Count number of posts returned
        get_template_part('article', 'preview');
      }
    }
  ?>
  <?php if ($i > 0) {?>
  <div class="pagination">
    <div class="pagination-older"><?php next_posts_link( '&larr; Older' ); ?></div>
    <div class="pagination-newer"><?php previous_posts_link( ' Newer &rarr;' ); ?></div>
  </div>
  <?php }
  }
  if ($i == 0)
  {
    ?> No posts were found matching your search critera... &#x1F641; <br/>
    <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>">View all Posts</a><br/>
    <a href="<?php echo get_site_url(); ?>">Return Home</a>
    <?php
  }

  get_footer(); ?>
