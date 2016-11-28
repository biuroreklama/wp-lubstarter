<?php get_header(); ?>
         <!-- Half Page Image Background Carousel Header -->
    <header class="page-head" style="background: url('http://tomek.68798.v.tld.pl/domosystem2/wp-content/uploads/2016/10/background.jpg') no-repeat; background-position: center;
    background-size: cover;">
    </header>

<section id="context">
      <div class="container">
        <div class="row">
            <div class="col-md-8">

                	<?php if ( have_posts() ) : ?>


				<?php
					the_archive_title( '<h1 class="entry-title">', '</h1>' );
				?>
<div class="line-red2"></div>


			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post(); ?>

        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
  <?php the_date(); ?>

	<?php the_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_content( sprintf(
				__( 'Zobacz więcej', 'domos' ),
				get_the_title()
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->

			<?php endwhile;
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Poprzednie', 'domos' ),
				'next_text'          => __( 'Następna', 'domos' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( ' ', 'twentysixteen' ) . ' </span>',
			) );
		// If no content, include the "No posts found" template.
		else : ?>

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
