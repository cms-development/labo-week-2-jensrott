<?php 

/*
Template: Archive for all events
Show all the events
*/
?>

<!-- HEADER -->
<?php get_template_part('header'); ?>

<?php wp_head() ?> <!-- css, js --> 

<main>
  
  <?php
  /* Alle eventen */
    $args = array(
      'post_type'   => 'events',
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

  $events = new WP_Query($args);
  if($events->have_posts()): ?>
    <div class="container">
      <h2>All Events</h2>
      <div class="row">
        <div class="col-12">
          <?php while( $events->have_posts() ) :
            $events->the_post(); 
          ?>
            <div class="card mb-5">
              <h4 class="card-header"><?php the_title(); ?></h4>
              <p><?php the_content();?></p>
            </div> 
          <?php endwhile; ?>
            <?php else : ?>
              <p> <?php __('No Events created!'); ?></p>
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