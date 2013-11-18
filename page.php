<?php get_header(); ?>

<?php if ( $post->post_parent !== 0 ) {
	
	get_template_part( 'products', 'page' );

} else {
	
	get_template_part( 'products', 'index' );

} ?>

<?php wp_register( $before, $after, $echo); ?> 



	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	    <div class="post">
	        <div class="entry">
	                <?php the_content(); ?>
	        </div>
	    </div>
	<?php endwhile; endif; ?>

<?php get_footer(); ?>