<?php
/**
 * Block Name: Testimonial
 *
 * This is the template that displays the testimonial block.
 */

// get image field (array)
$avatar = get_field('image');

// create id attribute for specific styling
$id = 'testimonial-' . $block['id'];

// create align class ("alignwide") from block setting ("wide")
$align_class = $block['align'] ? 'align' . $block['align'] : '';

?>
<blockquote id="<?php echo $id; ?>" class="testimonial <?php echo $align_class; ?>">
    <p><?php the_field('title'); ?></p>
    <cite>
    	<img src="<?php echo $avatar['url']; ?>" alt="<?php echo $avatar['alt']; ?>" />
    	<h4 class="text"><?php the_field('name'); ?></h4>
    	<p class="text"><?php the_field('designation'); ?></p>
    </cite>
</blockquote>
<style type="text/css">
	#<?php echo $id; ?> {
		background: <?php the_field('background_colour'); ?>;
		color: <?php the_field('text_colour'); ?>;
		text-align: <?php the_field('text_align'); ?>;
	}
	.text{
		color: <?php the_field('text_colour'); ?> !important;
		margin: auto !important;
	}
</style>