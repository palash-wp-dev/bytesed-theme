<?php
/**
 * Template part for displaying single post
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bytesed
 */
$bytesed = Bytesed();
$img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false ;
$img_url_val = $img_id ? wp_get_attachment_image_src($img_id,'bytesed_product',false) : '';
$img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
$img_alt =  $img_id ? get_post_meta($img_id,'_wp_attachment_image_alt',true) : '';

//download metabox
$_cut_price = get_post_meta(get_the_ID(),'bytesed_cut_price',true);
$_rating = get_post_meta(get_the_ID(),'bytesed_rating',true);
$_rating = !empty($_rating) ? $_rating : '';
$_rating_count = get_post_meta(get_the_ID(),'bytesed_rating_count',true);
$demo_url = get_post_meta(get_the_ID(),'bytesed_demo_url',true);
$product_type = get_post_meta(get_the_ID(),'bytesed_type',true);
$envato_product_id = get_post_meta(get_the_ID(),'bytesed_envato_product_id',true);
$average_rating = !empty($_rating) ? ($_rating * 100 ) / 5 : 0;
?>
<div class="col-lg-4 col-md-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('bytesed-download-grid'); ?>>
        <div class="thumbnail">
            <a href="<?php the_permalink();?>"> <img src="<?php echo esc_url($img_url);?>" alt="<?php echo esc_attr($img_alt);?>"></a>
        </div>
        <div class="content">
            <div class="top-content">
                <div class="bytesed-cats">
		            <?php
		            $all_category = wp_get_post_terms(get_the_ID(),'download_category');
		            foreach ($all_category as $cat){
			            printf('<a href="%1$s" class="%3$s">%2$s</a>',get_term_link($cat->term_id),esc_html($cat->name),esc_attr($cat->slug));
		            }
		            ?>
                </div>
                <?php if (!empty($_rating)):?>
               <div class="rating-wrap">
                    <div class="ratings">
                        <span class="hide-rating"></span>
                        <span class="show-rating" style="width: <?php echo esc_attr($average_rating.'%');?>"></span>
                    </div>
                    <span class="total-ratings">(<?php echo esc_html($_rating_count)?>)</span>
                </div>
                <?php endif;?>

            </div>
            <div class="middle-content">
                <a href="<?php the_permalink();?>"><h4 class="title"><?php the_title();?></h4></a>
            </div>
            <div class="bottom-content">
                <div class="price-wrap">
		            <?php
		            edd_price(get_the_ID());
		            if(!empty($_cut_price)) printf('<del class="cut-price">%1$s%2$s</del>',edd_currency_symbol(),esc_html($_cut_price));
		            ?>
                </div>
                <div class="bytesed-download-options">
                    <ul>
                        <li><a href="<?php echo esc_url($demo_url);?>" title="<?php echo esc_attr('Live Preview','bytesed');?>" data-toggle="tooltip" data-placement="top" target="_blank"><i class="fas fa-desktop"></i></a></li>
                        <?php
                            if ($product_type == 'envato') printf('<li><a href="%1$s" title="%2$s" data-toggle="tooltip" data-placement="top" target="_blank"><i class="fas fa-shopping-cart"></i></a></li>',esc_url('https://themeforest.net/cart/add_items?item_ids='.$envato_product_id),esc_attr('Buy Now From Envato','bytesed'));
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </article><!-- #post-<?php the_ID(); ?> -->
</div>
