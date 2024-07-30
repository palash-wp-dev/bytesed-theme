<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bytesed
 */
$bytesed = Bytesed();
$post_meta = get_post_meta(get_the_ID(),'bytesed_post_gallery_options',true);
$post_meta_gallery = isset($post_meta['gallery_images']) && !empty($post_meta['gallery_images']) ? $post_meta['gallery_images'] : '';
$post_single_meta = Bytesed_Group_Fields_Value::post_meta('blog_single_post');
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-details-item'); ?>>
    <?php
    if (has_post_thumbnail() || !empty($post_meta_gallery) ):
	    $get_post_format = get_post_format();
	    if ('video' == $get_post_format || 'gallery' == $get_post_format){
		    get_template_part('template-parts/common/thumbnail',$get_post_format);
	    }else{
		    get_template_part('template-parts/common/thumbnail');
	    }
    endif;
	    ?>
    <div class="entry-content">
        <?php if ('post' == get_post_type()):?>
        <ul class="post-meta">
            <?php if($post_single_meta['posted_by']):?>
            <li><?php $bytesed->posted_on();?></li>
            <?php endif;?>
	        <?php if($post_single_meta['posted_on']):?>
            <li><?php $bytesed->posted_by();?></li>
	        <?php endif;?>
	        <?php if($post_single_meta['posted_category']):?>
            <li class="cat"><i class="fas fa-tags"></i> <?php the_category(', ')?></li>
            <?php endif;?>
        </ul>
      <?php
      endif;
        the_content();
        $bytesed->link_pages();
        ?>
    </div>
    <?php if ( 'post' == get_post_type() && ((has_tag() && $post_single_meta['posted_tag']) || (shortcode_exists('bytesed_post_share') && $post_single_meta['posted_share']) )):?>
    <div class="blog-details-footer">
        <?php if(has_tag() && $post_single_meta['posted_tag']): ?>
        <div class="left">
            <?php $bytesed->posted_tag();?>
        </div>
        <?php endif; ?>
        <div class="right">
            <?php
            if (shortcode_exists('bytesed_post_share') && $post_single_meta['posted_share']){
	            echo do_shortcode('[bytesed_post_share]');
            }
            ?>
        </div>
    </div>
    <?php endif;?>
    <?php if(get_post_type() == 'post' && (!empty(get_previous_post_link()) || get_next_post_link())):;?>
    <div class="post-navigation-area">
        <div class="post-navigation-inner">
            <div class="left-content-area">
            <span class="prev-post"><?php esc_html_e('Previous Post','bytesed')?></span>
                <?php echo get_previous_post_link('<h4 class="title">%link</h4>');?>
            </div>
            <div class="right-content-area">
            <span class="next-post"><?php esc_html_e('Next Post','bytesed')?></span>
                <?php echo get_next_post_link('<h4 class="title">%link</h4>');?>
            </div>
        </div>
    </div>
    <?php endif;?>
</article><!-- #post-<?php the_ID(); ?> -->
