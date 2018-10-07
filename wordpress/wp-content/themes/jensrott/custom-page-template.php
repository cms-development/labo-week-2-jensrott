<?php
/*
Template: Custom page template
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
      <div class="col-sm-12">
        <?php if(have_posts()): ?>
          <?php while(have_posts()) : the_post(); ?>
            <?php get_template_part('homepage-template'); ?> <!-- Make code cleaner in our index file -->
          <?php endwhile; ?>
         <?php else : ?>
          <p> <?php __('No posts found'); ?></p>
         <?php endif; ?>
      </div>
      <!-- No sidebar -->
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

