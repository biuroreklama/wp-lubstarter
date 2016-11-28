<?php /* Template Name: Home */ ?>
<?php get_header(); ?>

    <header style="width:100%; height: 300px; background: #e8ddad;">

    </header>
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
