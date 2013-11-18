<?php get_header(); ?>

<?php

$args = array(
	
	'post_type'		=> 'page',
	'post_parent'	=> '76',
	'post_status'	=> 'publish',
	'orderby'		=> 'menu_order',
	'order'			=> 'DESC',
	'posts_per_page'=> 10,
	
	);


$custom_query = new WP_Query( $args );

?>

<ul class="products">

<?php if ($custom_query->have_posts()) : ?>
	<?php while ( $custom_query->have_posts()) : $custom_query->the_post(); ?>    

		<li>

			<a href="<?php echo get_permalink(); ?>">

				<?php echo wp_get_attachment_image( get_field('featured_image' ), array( 310, 415 ) ); ?>

			</a>

		</li>
		
	<?php endwhile; endif; ?>

</ul>

<?php get_footer(); ?>
