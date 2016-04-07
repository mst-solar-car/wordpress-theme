<?php
/**
 * Article Preview
 *
 * @author Michael Rouse
 * Displays the preview for an article
 */
?>
<article id="post-<?php the_ID(); ?>"  class="post-preview">
  <header class="post-meta post-header">
    <h2 class="post-title"><a href="<?php echo post_permalink(); ?>"><?php the_title();?></a></h2>
    <div class="preview-sub-heading">
      By <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><author><?php the_author_meta( 'display_name' ); ?></author></a>
      on
      <time class="post-date"><?php the_date(); ?></time>
    </div>
  </header> <!-- End Post Meta -->

  <!-- Post Preivew -->
  <section class="post-entry post-content-preview">
    <?php post_content( 'Continue Reading...' ); ?>
  </section>

</article>
