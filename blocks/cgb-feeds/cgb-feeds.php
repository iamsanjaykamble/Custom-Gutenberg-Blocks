<?php
/**
 * CGB Feeds Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */

// Dynamic block ID
$block_id = 'cgb-feeds-' . $block['id'];

// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'cgb-feeds-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
// WP Query Args
$queryArgs = array(
    'post_type' => 'post',
);

// Create a new WP_Query instance
$posts = new WP_Query( $queryArgs );

// Expose the response of WP_Query to the render template
$data['posts'] = $posts;
?>

<div id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
<div class="cgb-container cgb-flex">
    <!-- Our front-end template to loop the posts -->
    <?php
    if( $data['posts']->have_posts() ) {
        while( $data['posts']->have_posts() ) {
            $time_to_read  = get_field( 'time_to_read', get_the_ID() ) ?: '5 minute read';
            $data['posts']->the_post(); ?>
            <div class="post">
                <?php echo get_the_post_thumbnail(); ?>
                <div class="cgb-category">
                <?php
                    $categories = get_the_category();
                    if ( ! empty( $categories ) ) {
                        echo '<a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
                    }
                ?>
                </div>
                <p class="cgb-date">
                    <?php
                    the_time( 'F j, Y' );
                    echo str_repeat('&nbsp;', 3)."|".str_repeat('&nbsp;', 3) . $time_to_read;
                    ?>
                </p>
                <h2><?php the_title(); ?></h2>
                <div class="post-content">
                    <?php the_excerpt(); ?>
                </div>
                <div class="cgb-tags">
                    <?php 
                        $tags = get_the_tags();
                        foreach($tags as $tag){
                            echo '<a href="' . get_tag_link( $tag ) . '">' . $tag->name . '</a>';
                        }
                    ?>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>
</div>