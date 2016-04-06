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
  if ( have_posts())
  {
    while (have_posts())
    {
      the_post();
      ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="post-meta post-header">
          <h1 class="post-title"><?php the_title(); ?></h1>
          <div class="sub-heading">
            Posted by <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><author><?php the_author_meta('display_name'); ?></author></a> on <time class="post-date"><?php the_date(); ?></time>
            <?php
            // Show the date the post was modified, if needed
            if (get_the_modified_date() != get_the_date()) {
            ?>
            <em>(Modified <time class="post-modified-date"><?php echo the_modified_date(); ?></time>)</em>
            <?php } ?>
          </div>
        </header><!-- end of post meta -->

        <!-- Post Content -->
        <section class="post-entry">
          <?php the_content(); ?>
        </section> <!-- end of post entry -->

        <?php // Social Media Share Buttons ?>
        <?php get_template_part('social-media', 'share'); ?>

        <!-- Back Button -->
        <a onclick="javascript:window.history.back();" class="back-button">&larr; Back</a>
        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="all-posts-link">&larr; All Posts</a>
        <script type="text/javascript">function brurl(l){return 0==l.indexOf("http://")&&(l=l.substr(7)),0==l.indexOf("www.")&&(l=l.substr(4)),l.split("/")[0]}var bkl=document.querySelector(".back-button"),all_link=document.querySelector(".all-posts-link");window.history.length<=1?(bkl.style.display="none",all_link.style.display="inline-block"):(brurl(document.referrer)==brurl(window.location.href))?bkl.style.display="inline-block":(bkl.style.display="none",all_link.style.display="inline-block");</script>

        <!-- Author Section -->
        <section class="author-meta">
          About the Author<br/>
          <div class="author-meta-image">
            <?php avatar(get_the_author_meta('email')); ?>
          </div>
          <div class="author-meta-description">
            <?php
            the_author_posts_link();
            ?>
            <div class="about-author">
              <?php
              the_author_meta('description');
              ?>
            </div>

          </div>
        </section> <!-- End of author meta -->

      </article> <!-- End of Article -->
      <?php
    }
  }

  get_footer();
