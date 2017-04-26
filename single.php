<?php
/**
 * Single Post
 *
 * @author Michael Rouse
 * Displays a single blog post
 */
?>
<?php
  get_header();

  if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>
        <header class="post-meta post-header">
          <h1 class="post-title"><?php the_title(); ?></h1>
          <div class="sub-heading">
            Posted on <time class="post-date"><?php the_date(); ?></time> - by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><author><?php the_author_meta( 'display_name' ); ?></author></a>
          </div>
        </header><!-- end of post meta -->

        <!-- Post Content -->

          <?php the_content(); ?>
          <?php edit_post_link( '[Edit]', '<br />', '<br />' ); ?>

        <?php // Social Media Share Buttons ?>
        <?php get_template_part( 'social-media', 'share' ); ?>

        <?php
        // Show the date the post was modified, if needed
        if ( get_the_modified_date() != get_the_date() ) : ?>
          <em style="font-size: 0.8em">Last Modified on <time class="post-modified-date"><?php echo the_modified_date(); ?></time></em>
        <?php endif; ?>

      <?php
    endwhile;
  endif;

  get_footer();
