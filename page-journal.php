<?php get_header(); ?>

<div class="posts">

<?php

$args = array(
	
	'post_type'		=> 'post',
	'post_status'	=> 'publish',
	'orderby'		=> 'date',
	'order'			=> 'DESC',
	'category__not_in' => 28,
	'posts_per_page'=> 1
	
	);

$custom_query = new WP_Query( $args );

?>

<!-- FIRST POST -->

<?php if ($custom_query->have_posts()) : ?>
	<?php while ( $custom_query->have_posts()) : $custom_query->the_post(); ?>    

		<?php $postid = get_the_ID(); ?>
		<?php $backgroundImage = wp_get_attachment_image_src( get_field('featured_image' ), array( 950, 1266 ) ); ?>

			<a href="<?php echo get_permalink(); ?>" class="featured post <?php if( $backgroundImage[1] > $backgroundImage[2] ) : echo 'landscape'; else : echo 'portrait'; endif; ?>">

				<div class="title table wrapper">

					<div class="title cell wrapper">
	
						<div class="title">

							<h2><?php the_title(); ?></h2>
						
							<?php #echo get_tags('<ul class="tags helvetica tags"><li>','</li><li>','</li></ul>'); ?>
							<?php #echo get_the_tag_list('<ul><li>','</li><li>','</li></ul>'); ?>
							<?php $posttags = get_the_tags(); if ($posttags) { ?><ul class="tags helvetica tags"><?php foreach($posttags as $tag) { echo '<li>' . $tag->name . '</li>'; } ?> </ul> <?php } ?>
							
							<hr>

						</div>
	
					</div>

				</div>
				<div class="background image" style="background: url('<?php echo $backgroundImage[0]; ?>'); background-size: cover; background-repeat: no-repeat; background-position: center center;"></div>

			</a><!-- .post -->
			
<?php endwhile; endif; ?>

<?php

$i = $p = $a = 0;

$posts_1 = array();
$posts_2 = array(array(0, 0, -1));
$posts_3 = array();

$args = array(
	
	'post_type'		=> 'post',
	'post_status'	=> 'publish',
	'orderby'		=> 'date',
	'order'			=> 'DESC',
	'post__not_in'	=> array($postid),
	'posts_per_page'=> -1,
	
	);

$custom_query = new WP_Query( $args );

?>

<!-- FOLLOWING POSTS -->

<?php if ($custom_query->have_posts()) : ?>
	<?php while ( $custom_query->have_posts()) : $custom_query->the_post(); ?>

		<?php $backgroundImage = wp_get_attachment_image_src( get_field('featured_image' ), array( 950, 950 ) ); ?>

		<?php if ( get_field('featured_image_size') == 1 ) : $highlight = 'highlighted'; else : $highlight = 'regular'; endif; ?>
		<?php if( $backgroundImage[1] > $backgroundImage[2] ) : $aspect_ratio = 'landscape'; else : $aspect_ratio = 'portrait'; endif; ?>
		<?php $attributes = array( $highlight, $aspect_ratio ); ?>
		<?php array_push( $posts_1, $attributes ); ?>

		<?php if ( get_field('featured_image_size') == 1 ) : 

			$attributes = array( $highlight, $aspect_ratio, count( $posts_1 ) - 1 );
			array_push( $posts_2, $attributes );

		endif; ?>
		

<?php endwhile; endif; ?>




<?php 

	for ($i=0; $i < count($posts_2); $i++) { 
			
		$current_hightlight = $posts_2[$i][2];
		$next_highlight = $posts_2[$i+1][2];



		if ($next_highlight == '') { $next_highlight = count($posts_1); }


		$difference = $next_highlight - ($current_hightlight + 1);

		$d = $current_hightlight + 1;


		if ( $difference % 2 == 0 ) {


			while ($d < $next_highlight - 1) {
	
	
				if ( ( $posts_1[$d][1] == $posts_1[$d+1][1] ) && ( $posts_1[$d][1] == 'landscape' ) ) {
					
					$posts_1[$d][0] = 'row';
					$posts_1[$d+1][0] = 'row last';
					$d = $d + 2;
				}
	
				elseif ( ( $posts_1[$d][1] == $posts_1[$d+1][1] ) && ( $posts_1[$d][1] == 'portrait' ) ) {
	
					$posts_1[$d][0] = 'row';
					$posts_1[$d+1][0] = 'row last';
					$d = $d + 2;
	
				}
	
				elseif ( ( $posts_1[$d][1] != $posts_1[$d+1][1] ) && ( $posts_1[$d][1] == 'landscape' ) ) {
	
					$posts_1[$d][0] = '';
					$posts_1[$d+1][0] = 'last';
					$d = $d + 2;
				}
	
				elseif ( ( $posts_1[$d][1] != $posts_1[$d+1][1] ) && ( $posts_1[$d][1] == 'portrait' ) ) {
	
					$posts_1[$d][0] = '';
					$posts_1[$d+1][0] = 'last';
					$d = $d + 2;
	
				}
	
				else {
	
					$d = $d + 1;
	
				}
	
	
			}
	

		}

		else {


			while ($d < $next_highlight - 1) {	
					
				if ($d == $current_hightlight +1) {

					$posts_1[$d][0] = 'highlighted';
					$d = $d + 1;


				}

				else {


					if ( ( $posts_1[$d][1] == $posts_1[$d+1][1] ) && ( $posts_1[$d][1] == 'landscape' ) ) {
						
						$posts_1[$d][0] = 'row';
						$posts_1[$d+1][0] = 'row last';
						$d = $d + 2;
					}
		
					elseif ( ( $posts_1[$d][1] == $posts_1[$d+1][1] ) && ( $posts_1[$d][1] == 'portrait' ) ) {
		
						$posts_1[$d][0] = 'row';
						$posts_1[$d+1][0] = 'row last';
						$d = $d + 2;
		
					}
		
					elseif ( ( $posts_1[$d][1] != $posts_1[$d+1][1] ) && ( $posts_1[$d][1] == 'landscape' ) ) {
		
						$posts_1[$d][0] = '';
						$posts_1[$d+1][0] = 'last';
						$d = $d + 2;
					}
		
					elseif ( ( $posts_1[$d][1] != $posts_1[$d+1][1] ) && ( $posts_1[$d][1] == 'portrait' ) ) {
		
						$posts_1[$d][0] = '';
						$posts_1[$d+1][0] = 'last';
						$d = $d + 2;
		
					}
		
					else {
		
						$d = $d + 1;
		
					}


				}
	

	
	
			}


		}


	}


?>

<?php #print_r($posts_1); ?>
<?php #print_r($posts_2); ?>

<?php if ($custom_query->have_posts()) : ?>
	<?php while ( $custom_query->have_posts()) : $custom_query->the_post(); ?>

		<?php 

		# INSTAGRAM

		if (in_category('28')) : ?>

		<?php

					$content = get_the_content();

					preg_match("/<img .*?(?=src)src=\"([^\"]+)\"/si", $content, $backgroundImage);
					preg_match("/<img .*?(?=src)src=\"([^\"]+)\"/si", $content, $backgroundImage);

				?>

			<div class="post square" style="background: url('<?php echo $backgroundImage[1]; ?>'); background-size: cover; background-repeat: no-repeat; background-position: center center;"></div>

		<?php else : ?>

			<?php $backgroundImage = wp_get_attachment_image_src( get_field('featured_image' ), array( 950, 950 ) ); ?>
			<?php #if ( get_field('featured_image_size') == 1 ) : echo 'highlighted'; endif; ?> <?php #if( $backgroundImage[1] > $backgroundImage[2] ) : echo 'landscape'; else : echo 'portrait'; endif; ?>
			<!-- onclick="location.href='<?php #echo get_permalink(); ?>';" -->
			<a id="<?php echo $a; ?>" href="<?php echo get_permalink(); ?>" class="post <?php echo $posts_1[$a][0] ?> <?php echo $posts_1[$a][1] ?>">

					<div class="title table wrapper">
	
						<div class="title cell wrapper">
		
							<div class="title">
	
								<h2><?php the_title(); ?></h2>
							
								<?php #the_tags('<ul class="tags helvetica tags"><li>','</li><li>','</li></ul>'); ?>
								<?php $posttags = get_the_tags(); if ($posttags) { ?><ul class="tags helvetica tags"><?php foreach($posttags as $tag) { echo '<li>' . $tag->name . '</li>'; } ?> </ul> <?php } ?>


								<hr>
	
							</div>
		
						</div>
	
					</div>

					<div class="background image" style="background: url('<?php echo $backgroundImage[0]; ?>'); background-size: cover; background-repeat: no-repeat; background-position: center center;"></div>

			</a><!-- .post -->

		<?php endif; ?>

	<?php $a++; ?>
			
<?php endwhile; endif; ?>

</div>

<ul class="categories helvetica small uppercase">

	<?php wp_list_categories( 'title_li=' ); ?> 

</ul>

<?php get_footer(); ?>
