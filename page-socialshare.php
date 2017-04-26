<?php
/**
 * Template Name: Social Media Sharing Enabled
 *
 * @author Michael Rouse
 * Displays a page, but has share buttons for popular social media sites at the bottom
 */
?>
    <?php get_header(); ?>
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile;?>
      <?php endif; ?>
    <?php get_template_part( 'social-media', 'share' ); ?>
    <?php get_footer(); ?>
