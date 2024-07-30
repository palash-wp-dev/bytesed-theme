<?php
/**
 * @package Bytesed
 * @author Ir Tech
 */
if (!defined("ABSPATH")) {
	exit(); //exit if access directly
}

if (!class_exists('Bytesed_Customize')) {

	class Bytesed_Customize
	{
		/*
		* $instance
		* @since 1.0.0
		* */
		protected static $instance;

		public function __construct()
		{
			//excerpt more
			add_action('excerpt_more',array($this,'excerpt_more'));
			//back top
			add_action('bytesed_after_body',array($this,'back_top'));
			//preloader
			add_action('bytesed_after_body',array($this,'preloader'));
			//breadcrumb
			add_action('bytesed_before_page_content',array($this,'breadcrumb'));
			//order comment form
            add_filter('comment_form_fields',array($this,'comment_fields_reorder'));
		}

		/**
		 * getInstance()
		 * */
		public static function getInstance()
		{
			if (null == self::$instance) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 * Excerpt More
		 * @since 1.0.0
		 * */
		public function excerpt_more($more){
			$more = ' ';
			return $more;
		}
		/**
		 * Breadcrumb
		 * @since 1.0.0
		 * */
		public function breadcrumb(){
			$page_id = Bytesed()->page_id();
			$check_page = (!is_home() && !is_front_page() && is_singular()) || is_search() || is_author() || is_404() || is_archive() ? true : false ;
			$check_home_page = Bytesed('Frontend')->is_home_page();
			$page_header_meta = Bytesed_Group_Fields_Value::page_container('bytesed','header_options');
			$header_variant_class = isset($page_header_meta['navbar_type']) ? 'navbar-'.$page_header_meta['navbar_type'] : 'navbar-default';
			$page_breadcrumb_enable = isset($page_header_meta['page_breadcrumb_enable']) && $page_header_meta['page_breadcrumb_enable'] ? $page_header_meta['page_breadcrumb_enable'] : false;
			$breadcrumb_enable = false;
			if (is_singular('download')){
				$header_variant_class .=' single-download-page ';
            }
			if ( !$check_home_page && !$check_page){
				$breadcrumb_enable = true;
			}elseif (!$page_breadcrumb_enable && $check_page){
				$breadcrumb_enable = true;
			}
			$breadcrumb_enable =  !cs_get_switcher_option('breadcrumb_enable') ? false : $breadcrumb_enable;

			if ( !$breadcrumb_enable ){
				return;
			}
			?>
			<div class="breadcrumb-area <?php echo esc_attr($header_variant_class);?>">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="breadcrumb-inner">
								<?php
								if ( is_archive() ){
								    if (is_post_type_archive('download')){
									    print ('<div class="left-content-area">');
									    the_archive_title( '<h2 class="page-title">', '</h1>' );
									    bytesed_breadcrumb();
									    print ('</div>');
									    ?>
									    <div class="right-content-area">
										    <form action="<?php echo get_home_url('/')?>/our-products/" class="product-search-form" method="get">
											    <div class="form-group">
												    <input type="text" class="form-control" placeholder="<?php esc_html_e('Search...','bytesed');?>" name="search">
											    </div>
											    <button type="submit" class="submit-btn"><i class="fa fa-search"></i></button>
										    </form>
									    </div>
									    <?php
                                    }else{
								        the_archive_title( '<h2 class="page-title">', '</h1>' );
								    }
								}elseif ( is_404() ){
									printf('<h2 class="page-title">%1$s</h2>',esc_html__('Error 404','bytesed'));
								}elseif ( is_search() ){
									printf('<h2 class="page-title">%1$s %2$s</h2>',esc_html__('Search Results for:','bytesed'),get_search_query());
								}elseif ( is_singular('post') ){
									printf('<h2 class="page-title">%1$s </h2>',get_the_title());
								}elseif ( is_singular('page') ){
									if ( $page_header_meta['page_title']) {
										printf('<h2 class="page-title">%1$s </h2>',get_the_title());
									}
								}elseif(is_singular('download')){
									bytesed_breadcrumb();
									printf('<h2 class="page-title" itemprop="name">%1$s </h2>',strip_tags(get_the_title()));

								}else{
									printf('<h2 class="page-title">%1$s </h2>',get_the_title($page_id));
								}
								if ( $page_header_meta['page_breadcrumb'] && !is_singular('download') && !is_post_type_archive('download') ){
									bytesed_breadcrumb();
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}

		/**
		 * back top
		 * @since 1.0.0
		 * */
		public function back_top(){
			$back_top_enable = cs_get_switcher_option('back_top_enable');
			$back_top_icon = cs_get_option('back_top_icon') ? cs_get_option('back_top_icon') : 'fa fa-angle-up';
			if (!$back_top_enable){
				return;
			}
			?>
			<div class="back-to-top">
				<span class="back-top"><i class="<?php echo esc_attr($back_top_icon);?>"></i></span>
			</div>
			<?php
		}
		/**
		 * Preloader
		 * @since 1.0.0
		 * */
		public function preloader(){
			$preloader_enable = cs_get_switcher_option('preloader_enable');
			if (!$preloader_enable){
				return;
			}
			?>
			<div class="preloader" id="preloader">
				<div class="preloader-inner">
                    <div class="gooey">
                        <span class="dot"></span>
                        <div class="dots">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
				</div>
			</div>
			<?php
		}

		/**
		 * @since 1.0.0
         * reorder comments form
		 * */
		public function comment_fields_reorder($fileds){
		    $comment_filed = $fileds['comment'];
		    unset($fileds['comment']);
		    $fileds['comment'] = $comment_filed;

			if (isset($fileds['cookies'])){
				$comment_cookies = $fileds['cookies'];
				unset($fileds['cookies']);
				$fileds['cookies'] = $comment_cookies;
			}

		    return $fileds;
        }


	}//end class
	if (class_exists('Bytesed_Customize')){
		Bytesed_Customize::getInstance();
	}
}
