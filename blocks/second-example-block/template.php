<?php

$heading = get_field( 'heading' );
$content = get_field( 'content' );
$show_image = get_field( 'show_image' );
$image = get_field( 'image' );
$list = get_field( 'list' );

$align_class = $block['align'] ? 'align' . $block['align'] : ''; 
$class_name = isset($block['className']) ? $class_name : "";

?>
<div class="<?php echo $class_name . $align_class; ?>">
	
<h3><?php echo $heading; ?></h3>
	<?php
	if ( 'Yes' === $show_image && ! empty( $image ) ) {
		echo wp_get_attachment_image( $image['ID'], 'medium' );
	}
	?>
	<p><?php echo $content; ?></p>
	<?php if ( is_array( $list ) ) : ?>
	<ul>
		<?php foreach ( $list as $item ) : ?>
		<li><?php echo $item['list_items']; ?></li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
</div>
