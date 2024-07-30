<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bytesed
 */
$bytesed = Bytesed();
?>
<div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay=".1s">
    <article id="post-<?php the_ID(); ?>" <?php post_class('single_blog'); ?>>
        <?php $bytesed->post_thumbnail(); ?>
        <div class="single_blog__contents mt-3">
            <?php
                get_template_part('template-parts/common/post-meta');
            ?>
            <?php the_title( '<h2 class="single_blog__title mt-3"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
</div>



