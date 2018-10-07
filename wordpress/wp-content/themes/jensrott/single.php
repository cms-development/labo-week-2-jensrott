<?php 
/* Template Name: Single Page Template */
?>

<?php wp_head() ?> <!-- css, js --> 

<?php get_header(); ?> 

<?php if(have_posts()) : while(have_posts()) : the_post() ?>
  <div class="container">
    <div class="card mb-3">
      <h1 class="card-header"><?php the_title() ?></h1>
      <p class="card-text"><?php the_content() ?></p>
    </div> 
  </div>
<?php endwhile; ?>

<?php else : ?>
  <?php __('No posts found'); ?>
<?php endif ?>;

<?php get_footer(); ?>

<? wp_footer(); ?>