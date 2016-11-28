<?php get_header(); ?>
<section id="context">
     <div class="container">
        <div class="row">
            <div class="col-md-8">
		<?php if ( have_posts() ) : ?>
			<?php if ( is_home() && ! is_front_page() ) : ?>
			<?php endif; ?>
			<?php
			while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<?php endif; ?>
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
	<?php the_post_thumbnail(); ?>
	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Zobacz więcej', 'domos' ),
				get_the_title()
			) );
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'domos' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'domos' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

			<?php endwhile;
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'domos' ),
				'next_text'          => __( 'Next page', 'domos' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'domos' ) . ' </span>',
			) );
		// If no content, include the "No posts found" template.
		else : ?>
            <h1>404</h1>
		<?php endif;
		?>




            </div>
       <div class="col-md-4">
            <section id="sidebar">

           <?php dynamic_sidebar('sidebar-2'); ?>

           </section>
            </div>
    </div>
    </div>

</section>

      <?php get_footer(); ?>
