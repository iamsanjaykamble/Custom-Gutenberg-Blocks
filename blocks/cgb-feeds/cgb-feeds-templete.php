<?php
/**
 * Block Name: Feeds Loop Block
 *
 * Description: Displays a list of feeds.
 */

// The block attributes
$block = $args['block'];

// The block data
$data = $args['data'];

// Dynamic block ID
$block_id = 'cgb-feeds-' . $block['id'];

// The block ID
$block_id = $args['block_id'];

// The block class names
$class_name = $args['class_name'];
?>

<div id="<?php echo $block_id; ?>" class="<?php echo $class_name; ?>">
    <!-- Our front-end template to loop the posts -->
    <?php
    if( $data['posts']->have_posts() ) {
        while( $data['posts']->have_posts() ) {
            $data['posts']->the_post(); ?>
            <div class="post">
                <h2><?php the_title(); ?></h2>
                <div class="post-content">
                    <?php the_excerpt(); ?>
                </div>
            </div>
            <?php
        }
    }
    ?>
</div>