<?php 

/*
Template: Single page for an event
Show a specific event
*/
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php bloginfo('description') ?>">
    <title><?php bloginfo('name') ?> 
    <?php is_front_page() ? bloginfo('description') : wp_title(); ?>
     ></title>
    <!-- Styles for this template are registered in functions.php -->
    <?php wp_head() ?> <!-- important stuff --> 
  </head>
  <body>
  <!-- HEADER -->
  <?php get_template_part('header'); ?>

  <div class="container">
    <div class="row">

      <?php if(have_posts()) : while(have_posts()) : the_post() ?>
        <div class="container">
          <div class="card mb-3">
            <h1 class="card-header"><?php the_title() ?></h1>
            <p class="card-text"><?php the_content() ?></p>
            <img class="card-img" src="<?php the_post_thumbnail() ?>" alt="Card image">
          </div> 
        </div>
      <?php endwhile; ?>

      <?php else : ?>
        <?php __('No events found'); ?>
      <?php endif; ?>
      
    </div>
  
    <div class="row">
      <div class="col-12">
        <!-- FOOTER -->
        <?php get_template_part('footer') ?>
      </div>
    </div>
  </div>
  <?php wp_footer() ?> <!-- get the top bar to go to the back-end -->
  </body>
</html>

