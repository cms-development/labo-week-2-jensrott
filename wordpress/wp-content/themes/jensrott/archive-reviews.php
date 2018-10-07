<?php 

/*
Template: Archive for all reviews
Show all the reviews
*/
?>

<!-- HEADER -->
<?php get_template_part('header'); ?>

<?php wp_head() ?> <!-- css, js --> 

<main>
  
  <?php
  /* Alle reviews */
    $args = array(
      'post_type'   => 'reviews',
      'post_status' => 'publish',
      /* TODO: more specific
      'tax_query'   => array(
        array(
          'taxonomy' => 'allergens',
          'field'    => 'slug',
        )
      )
      */
    );

  $reviews = new WP_Query($args);
  if($reviews->have_posts()): ?>
    <div class="container">
      <h2>All Reviews</h2>
      <div class="row">
        <div class="col-12">
          <?php while( $reviews->have_posts() ) :
            $reviews->the_post(); 
          ?>
            <div class="card mb-5">
              <h4 class="card-header"><?php the_title(); ?></h4>
              <p><?php the_content();?></p>
            </div> 
          <?php endwhile; ?>
            <?php else : ?>
              <p> <?php __('No Recipes created!'); ?></p>
          <?php endif; wp_reset_postdata(); ?>
        </div>
      </div>

    <div class="row">
      <div class="col-12">
        <!-- FOOTER -->
        <?php get_template_part('footer') ?>
      </div>
    </div>
  </div>

  <?php wp_footer(); ?> <!-- get the top bar to go to the back-end -->

</main>