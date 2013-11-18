<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();?>

	<?php 
	
	$dealers = get_field('dealer_address');
	
	foreach( $dealers as $key => $row ) : $country[ $key ] = $row['country']; endforeach;
	array_multisort( $country, SORT_ASC, $dealers );
	
	foreach( $dealers as $key => $row ) : $zip[ $key ] = $row['zip']; endforeach;
	array_multisort( $zip, SORT_ASC, $dealers );
	
	?>

	<?php

	$result = array();
	foreach ($dealers as $data) {
	  $id = $data['country'];
	  if (isset($result[$id])) {
	     $result[$id][] = $data;
	  } else {
	     $result[$id] = array($data);
	  }
	}

	?>

	<?php foreach( $result as $key => $row ) : ?>
		
		<h2><?php echo $key; ?></h2>
		asdf
		<ul class="<?php echo $key; ?>" style="margin: 0 0 20px 0;">

		<?php foreach ($row as $field ) : ?>
		
			
				
				<li>

					<?php if( $field['company'] ) : echo $field['company'] . '<br>'; endif; ?>
					<?php if( $field['address_01'] ) : echo $field['address_01'] . '<br>'; endif; ?>
					<?php if( $field['address_02'] ) : echo $field['address_02'] . '<br>'; endif; ?>
					<?php if( $field['city'] ) : echo $field['zip'] . ' ' . $field['city'] . '<br>'; endif; ?>
					<?php if( $field['state'] ) : echo $field['state'] . '<br>'; endif; ?>
					<?php if( $field['country'] ) : echo $field['country']; endif; ?>
				
				</li>

			
				
		<?php endforeach; ?>
		</ul>
		
	<?php endforeach; ?>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>