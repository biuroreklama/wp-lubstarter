<?php get_header(); ?>
         <!-- Half Page Image Background Carousel Header -->

<section id="context">
    <div class="container">

        <div class="row">
            <div class="col-md-8">

           <?php
		// Start the loop.
		while ( have_posts() ) : the_post(); ?>


        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
            <div class="line-red2"></div>
             <div class="breadcrumbs" typeof="BreadcrumbList" vocab="http://schema.org/">
    <?php if(function_exists('bcn_display'))
    {
        bcn_display();
    }?>
</div>
<p><?php the_date(); ?></p>
<div class="featured-image">
	<?php the_post_thumbnail(); ?>
            </div>
	<div class="entry-content">
		<?php
			the_content();

			if ( '' !== get_the_author_meta( 'description' ) ) {
				get_template_part( 'template-parts/biography' );
			}
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->


		<?php
			if ( is_singular( 'attachment' ) ) {
				// Parent post navigation.
				the_post_navigation( array(
					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'lubstarter' ),
				) );
			} elseif ( is_singular( 'post' ) ) {
				// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( ' ', 'lubstarter' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( '', 'lubstarter' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( ' ', 'lubstarter' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( ' ', 'lubstarter' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );
			}
			// End of the loop.
		endwhile;
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
