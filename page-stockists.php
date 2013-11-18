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



	$items = count($dealers) + count($result);

	$i = 0;
	$rows = 4;

	?>



	<ul>

	<?php foreach( $result as $key => $row ) : ?>
		
		<li><h2 class="helvetica" ><?php echo $key; ?></h2></li>
		
		<?php $i++; ?>
		<?php if($i % ceil($items / $rows) == 0 && $i != 0) : ?></ul><ul><?php endif ?>

		<?php foreach ($row as $field ) : ?>				

				<li class="helvetica small">

					<span style="text-transform: uppercase;"><?php if( $field['company'] ) : echo $field['company'] . '<br>'; endif; ?></span>
					<?php if( $field['address_01'] ) : echo $field['address_01'] . '<br>'; endif; ?>
					<?php if( $field['address_02'] ) : echo $field['address_02'] . '<br>'; endif; ?>
					<?php if( $field['city'] ) : echo $field['zip'] . ' ' . $field['city'] . '<br>'; endif; ?>
					<?php if( $field['state'] ) : echo $field['state'] . '<br>'; endif; ?>
					<?php if( $field['country'] ) : echo $field['country']; endif; ?>
				</li>

				<?php $i++; ?>
				<?php if($i % ceil($items / $rows) == 0 && $i != 0) : ?></ul><ul><?php endif ?>
			
		<?php endforeach; ?>

	<?php endforeach; ?>

	</ul>
	
<?php endwhile; endif; ?>

<?php get_footer(); ?>