<?php 

/*
Template: Archive for all recipes
Show all the recipes
*/
?>

<!-- HEADER -->
<?php get_template_part('header'); ?>

<?php wp_head() ?> <!-- css, js --> 

<main>
  
  <?php
  /* Alle recepten */
    $args = array(
      'post_type'   => 'recipes',
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

  $recipes = new WP_Query($args);
  if($recipes->have_posts()): ?>
    <div class="container">
      <h2>All Recipes</h2>
      <div class="row">
        <div class="col-12">
          <?php while( $recipes->have_posts() ) :
            $recipes->the_post(); 
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