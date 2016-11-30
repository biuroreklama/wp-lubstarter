<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

    <section id="slider">
          <div id="myCarousel" class="carousel slide">
            <?php $the_slides_query_ul = new WP_Query('post_type=slider'); ?>
          <?php if ( $the_slides_query_ul->have_posts() ) : ?>
              <ol class="carousel-indicators">
                  <?php while ( $the_slides_query_ul->have_posts() ) : $the_slides_query_ul->the_post(); ?>
      	    <li data-target="#myCarousel" data-slide-to="<?php echo $the_slides_query_ul->current_post ?>" class="<?php if( $the_slides_query_ul->current_post == 0 ) echo 'active' ?>"></li>
            <?php wp_reset_postdata(); ?>
      <?php endwhile; ?>
              </ol>
               <?php endif; ?>
              <!-- Wrapper for slides -->
              <?php $the_slides_query = new WP_Query('post_type=slider'); ?>
          <?php if ( $the_slides_query->have_posts() ) : ?>
              <div class="carousel-inner">
                 <?php while ( $the_slides_query->have_posts() ) : $the_slides_query->the_post(); ?>
                  <div class="item <?php if( $the_slides_query->current_post == 0 ) echo 'active' ?>">
                      <div class="fill" style="background:url(<?php echo wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) ); ?>) no-repeat; height: 500px; position: relative; background-size:cover; background-position: center;"></div>
                      <div class="carousel-caption">
                          <h2><?php the_title(); ?></h2>
                          <?php the_content(); ?>
                      </div>
                  </div>
                  <?php wp_reset_postdata(); ?>
           <?php endwhile; ?>
              </div>
            <?php endif; ?>
              <!-- Controls -->
              <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                  <span class="icon-prev"></span>
              </a>
              <a class="right carousel-control" href="#myCarousel" data-slide="next">
                  <span class="icon-next"></span>
              </a>
          </div>

    </section>
    <section id="page">
    <div class="container">
      <div class="page-header">
      <div class="title"><?php the_title(); ?></div>
      <div class="after-slider">
      <div class="title-excerpt">jcfj</div>
    </div>
    </div>
    <div id="page-content">
      <?php
    while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
    <?php endwhile;
    		?>

    </div>

    </div>
    </section>
<?php get_footer(); ?>
