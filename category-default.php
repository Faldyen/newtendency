<div id="post">


	
	<?php if ( get_field( 'featured_video' ) ) : ?>
		
		<div id="featured-video">

			<?php echo apply_filters( 'the_content', get_field( 'featured_video' ) ); ?>

		</div>

	<?php else : ?>

		<?php $featuredImage = wp_get_attachment_image_src( get_field('featured_image' ), array( 950, 1330 ) ); ?>
		<img src="<?php echo $featuredImage[0]; ?>" class="<?php if( $featuredImage[1] > $featuredImage[2] ) : echo 'landscape'; else : echo 'portrait'; endif; ?>">

	<?php endif ?>

	<div id="share">
	
		<div>
			<a href="<?php echo get_permalink(); ?>" 
				onclick="
				window.open(
					'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
					'facebook-share-dialog', 
					'width=626,height=436'); 
				return false;">
			<img style="height: 15px;" src="<?php echo get_template_directory_uri(); ?>/img/icons/Facebook.png"></a>
	
		</div>
	
		<div>
	
			<a href="<?php echo get_permalink(); ?>" 
				onclick="
				window.open(
					'https://twitter.com/share?url='+encodeURIComponent(location.href)+'&hashtags=<?php $tags = ''; foreach ( wp_get_post_tags( get_the_ID() ) as $tag ) { $tags .= str_replace(' ', '', $tag->name) . ','; } echo $tags; ?>',
					'twitter-share-dialog',
					'width=626,height=436'); 
				return false;">
			<img style="height: 15px;" src="<?php echo get_template_directory_uri(); ?>/img/icons/Twitter.png"></a>
	
		</div>
	
		<div>
	
			<a href="mailto:?subject=<?php the_title_attribute(); ?>&body=Hi there,%0D%0A%0D%0Aplease have a look at the following article on www.NEWTENDENCY.de/journal %0D%0A <?php echo get_permalink(); ?>"><img style="height: 15px;" src="<?php echo get_template_directory_uri(); ?>/img/icons/Email.png"></a>
	
		</div>
	
		<div>
	
			<a href="http://www.tumblr.com/share/photo?source=<?php echo urlencode(get_permalink()) ?>&caption=<?php #echo urlencode(the_content()) ?>&clickthru=<?php echo urlencode(get_permalink()) ?>" title="Share on Tumblr"><img style="height: 15px;" src="<?php echo get_template_directory_uri(); ?>/img/icons/Tumblr.png"></a>
	
		</div>
	
	</div>

		<h1><?php the_title_attribute(); ?></h1>
	<?php the_tags('<ul class="tags helvetica tags"><li>','</li><li>','</li></ul>'); ?>

	<div class="content">
	
		<?php the_content(); ?>
	
	</div>
		
	<p class="helvetica small date">

		By <?php the_author_firstname(); ?> <?php the_author_lastname(); ?>, <?php the_date('F, Y'); ?>

	</p>
	
	<div id="social">
	
		<div>
	
			<div class="fb-like" data-href="<?php echo get_permalink(); ?>" data-width="150" data-height="22" data-colorscheme="light" data-layout="button_count" data-action="recommend" data-show-faces="false" data-send="false"></div>
	
		</div>
	
		<div>
	
			<a href="https://twitter.com/share" class="twitter-share-button" data-via="NEWTENDENCY">Tweet</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	
		</div>
	
	</div>

	<div>

		<?php $images = get_field( 'gallery' );

		if( $images ) : ?>
		
			<div id="gallery">

				<?php foreach( $images as $image ): ?>
						
					<?php if( wp_is_mobile() ) : ?>
													
						<a href="<?php echo $image['sizes']['large']; ?>" alt="<?php echo $image['alt']; ?>"><?php echo $image['caption']; ?></a>
											
					<?php else : ?>
						
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
						
					<?php endif; ?>
							
				<?php endforeach; ?>
							
			</div>

		<?php endif; ?>

	</div>

	<hr class="read-more">

</div>