<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();?>
	
	<?php $backgroundImage = wp_get_attachment_image_src( 258, array( 3000, 3000 ) ); ?>

		<div>

			<div id="company-header" style="background: url(' <?php echo $backgroundImage[0]; ?> ');">
		
				

			</div>
	
			<div class="post">
				<div class="entry">
					<?php the_content(); ?>
				</div>
			</div>

		</div>

	
<?php endwhile; endif; ?>

<?php get_footer(); ?>