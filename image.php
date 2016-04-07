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

  ?>

  <?php
  if ( have_posts() ) :
    while ( have_posts() ) : the_post();
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="post-meta post-header">
          <h1 class="post-title"><?php echo preg_replace( '/(_|\+|%20)/i', ' ', get_the_title() ); ?></h1>
        </header><!-- end of post meta -->

        <!-- Post Content -->
        <section class="post-entry">
          <?php
          echo wp_get_attachment_image( get_the_ID(), 'full' );?>

          <?php the_content(); ?>

        </section> <!-- end of post entry -->

        <?php // Social Media Share Buttons ?>
        <?php get_template_part( 'social-media', 'share' ); ?>

        <?php get_template_part( 'back-button' ); ?>

      </article> <!-- End of Article -->
      <?php
    endwhile;
  endif;

  get_footer();
