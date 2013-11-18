<?php get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post();?>

		<h2><?php the_title(); ?></h2>
		<div class="tags"><?php the_tags('', ', ', ''); ?></div>						

		<div class="productDescription"><?php the_field('product_description'); ?></div>
		
		<?php $image = wp_get_attachment_image_src( get_field('featured_image'), array( 950, 950 ) ); ?>
		<?php $imageLarge = wp_get_attachment_image_src( get_field('featured_image'), 'full' ); ?>

		<img class="jetzoom" src="<?php echo $image[0]; ?>" data-jetzoom="zoomImage: '<?php echo $imageLarge[0]; ?>'" />

	<?php endwhile; endif; ?>

<?php get_footer(); ?>
