<?php

$cta_bg_clr = get_field('blog_cta_bg_color');
$cta_title = get_field('blog_cta_title');
$cta_text = get_field('blog_cta_text');
$cta_button_text = get_field('blog_cta_button_text');
$cta_button_link = get_field('blog_cta_button_link');

$align_class = $block['align'] ? 'align' . $block['align'] : ''; 
$class_name = isset($block['className']) ? $class_name : "";

?>
<aside class="blog-cta bg-magnetic <?php echo $cta_bg_clr . $class_name . $align_class; ?>">
	<h2 class="fl-heading">
		<span class="fl-heading-text h3"><?php echo $cta_title; ?></span>
	</h2>
	<div class="blog-cta-text"><?php echo $cta_text; ?></div>
	<div class="fl-button-wrap fl-button-width-auto fl-button-left">
		<a href="<?php echo $cta_button_link; ?>" target="_self" class="fl-button banner-click" role="button">
			<span class="fl-button-text"><?php echo $cta_button_text; ?></span>
		</a>
	</div>
</aside>
