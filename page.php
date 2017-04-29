<?php
/**
 * Default Page Template
 *
 * @author Michael Rouse
 * Shows a page, no social media at the bottom
 */
?>
    <?php get_header(); ?>
      <h1><?php the_title(); ?></h1>
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php the_content();
        endwhile;?>
      <?php endif; ?>
    <?php get_footer(); ?>
