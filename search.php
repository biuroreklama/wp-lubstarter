<?php get_header(); ?>
<?php if ( have_posts() ) : ?>
          <?php printf( __( 'Wyszukiwanie:', 'lubstarter' ), '' . esc_html( get_search_query() ) . '' ); ?>
      <?php printf( __( '%s', 'lubstarter' ), '' . esc_html( get_search_query() ) . '' ); ?>

<section id="another-page">
  <?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
      <div class="container">
    		<?php the_title( sprintf( '<h3 class="primary-title-single"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

        <header id="header-background" class="" style="height: 255px; background:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>) no-repeat; background-size: cover;">

        </header>

    	<?php the_excerpt(); ?>

    	<?php if ( 'post' === get_post_type() ) : ?>

    	<?php else : ?>

    	<?php endif; ?>
</div>
    </article><!-- #post-## -->
<?php  endwhile;
    			// Previous/next page navigation.
    			the_posts_pagination( array(
    				'prev_text'          => __( '<i class="fa fa-angle-left"></i>', 'lubstarter' ),
    				'next_text'          => __( '<i class="fa fa-angle-right"></i>', 'lubstarter' ),
    				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'lubstarter' ) . ' </span>',
    			) );
    		// If no content, include the "No posts found" template.
    		else : ?>
        <header id="header-background" class="" style="height: 640px; background:url(http://tomek.68798.v.tld.pl/lubstarter/wp-content/uploads/2016/11/slide2.jpg) no-repeat; background-size: cover;">

                      <div class="slider-title-single"><?php _e( 'Nie znaleziono', 'lubstarter' ); ?></div>

                        <h3 class="primary-title-single"><?php printf( __( '%s', 'lubstarter' ), '' . esc_html( get_search_query() ) . '' ); ?></h3>

        </header>
<section id="none">
	<div class="page-content">
    <div class="container">
		<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<p><?php printf( __( 'Gotowy opublikować coś nowego? <a href="%1$s">Get started here</a>.', 'lubstarter' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

		<?php elseif ( is_search() ) : ?>

			<p><?php _e( 'Nic nie znaleziono. Prosimy spróbować ponownie', 'lubstarter' ); ?></p>


		<?php else : ?>

			<p><?php _e( 'Wygląda na to, że nie możesz czegoś wyszukać. Spróbuj ponownie.', 'lubstarter' ); ?></p>


		<?php endif; ?>
  </div>
	</div><!-- .page-content -->
</section>
</section>
<?php endif;
		?>
<?php get_footer(); ?>
