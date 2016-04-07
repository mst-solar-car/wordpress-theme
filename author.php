<?php
/**
 * Author Page
 *
 * @author Michael Rouse
 * Displays an author's bio and some recent posts by them
 */
?>
<?php
$author = null;

if ( isset( $author_name ) ) {
  $author = get_user_by( 'slug', $author_name );
} else {
  get_userdata( intval( $author ) );
}

$curauth = $author; // I think this is needed for wordpress, but I want the variable named as $author...

    get_header(); ?>

    <div class="author-page">
      <?php avatar( $author->user_email, [ 'size' =>'200' ] ); ?>
      <h1 class="author-name"><?php echo $author->display_name; ?></h1>
      <a href="mailto:<?php echo $author->user_email; ?>" class="email-link"><?php echo $author->user_email; ?></a><br/>
      <?php if ( !empty( $author->user_url ) ): ?>
        <a href="<?php echo $author->user_url; ?>" class="website-link" target="_blank"><?php echo str_replace( 'http://', '', $author->user_url ); ?></a>
      <?php endif; ?>

      <div class="author-page-about">
        <?php echo $author->description; ?>
      </div>
      <hr/>
      <div class="author-posts">
        <?php
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            get_template_part( 'article', 'preview' );
          endwhile;
         else:
          ?> No posts to show. <?php
        endif;
        ?>
      </div>

    </div>
    <?php get_footer(); ?>
