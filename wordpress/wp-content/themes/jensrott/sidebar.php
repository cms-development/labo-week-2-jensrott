<?php /* Sidebar template */ ?>
 
<div>
  <?php if(is_active_sidebar('sidebar')): ?>
    <?php dynamic_sidebar('sidebar'); ?>
  <?php endif; ?>
</div>

<? wp_footer(); ?>
