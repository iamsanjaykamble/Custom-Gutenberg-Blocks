<?php
/**
 * CGB Header Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'cgb-header-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}

// Load values and assign defaults.
$title  = get_field( 'title' ) ?: 'Insights & Resources';
$text   = get_field( 'text' ) ?: 'Introductory copy that goes underneath the H1 to better contextualise what this does and who it’s for.';

?>
<div <?php echo $anchor; ?>class="<?php echo esc_attr( $class_name ); ?>" style="<?php //echo esc_attr( $style ); ?>">
    <div class="cgb-container">
        <h1 class="cgb-header-title"><?php echo $title; ?></h1>
        <p class="cgb-header-text"><?php echo $text; ?></p>
    </div>
</div>