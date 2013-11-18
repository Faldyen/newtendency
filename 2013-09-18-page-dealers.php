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
		
		<?php foreach ($row as $field ) : ?>
		
			<ul style="margin: 0 0 20px 0;">
			
				<?php if( $field['company'] ) : echo '<li>' . $field['company'] . '</li>'; endif; ?>
				<?php if( $field['address_01'] ) : echo '<li>' . $field['address_01'] . '</li>'; endif; ?>
				<?php if( $field['address_02'] ) : echo '<li>' . $field['address_02'] . '</li>'; endif; ?>
				<?php if( $field['city'] ) : echo '<li>' . $field['zip'] . ' ' . $field['city'] . '</li>'; endif; ?>
				<?php if( $field['state'] ) : echo '<li>' . $field['state'] . '</li>'; endif; ?>
				<?php if( $field['country'] ) : echo '<li>' . $field['country'] . '</li>'; endif; ?>
					
			</ul>
				
		<?php endforeach; ?>
		
		
	<?php endforeach; ?>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>