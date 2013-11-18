<?php get_header(); ?>
	
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
	
	
		<?php wp_login_form(); ?>

 		<a href="<?php echo wp_lostpassword_url( get_permalink() ); ?>">Forgot Password</a>



<?php endwhile; endif; ?>

<?php get_footer(); ?>
