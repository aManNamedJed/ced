<?php
/* Template Name: Home Page Template */  
	get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>    
<section class="bliccaThemes-waypoint" data-animate-down="on-sticky" data-animate-up="off-sticky"> 
  <div class="container"><div class="row"><div class="col-md-12 bt-reset-pd">
  <!-- Page Content Start -->
    <?php the_content(); ?>
  </div></div></div>
</section>
<?php endwhile; // end of the loop. ?>
<?php get_footer();?>