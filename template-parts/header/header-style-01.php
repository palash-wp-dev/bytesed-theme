<header class="header-style-01">
    <nav class="navbar navbar-area nav-absolute navbar-expand-lg">
        <div class="container nav-container">
            <div class="logo-wrapper">
                <?php
                    $header_one_logo = cs_get_option('header_one_logo');
                    if (has_custom_logo() && empty($header_one_logo['id'])){
                        the_custom_logo();
                    }elseif (!empty($header_one_logo['id'])){
                        printf('<a class="site-logo" href="%1$s"><img src="%2$s" alt="%3$s"/></a>',get_home_url(),$header_one_logo['url'],$header_one_logo['alt']);
                    }
                    else{
                        printf('<a class="site-title" href="%1$s">%2$s</a>',get_home_url(),get_bloginfo('title'));
                    }
                ?>
            </div>
            <div class="responsive-mobile-menu d-lg-none">
                <a href="javascript:void(0)" class="click-nav-right-icon">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#xilancer_menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="xilancer_menu">
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'main-menu',
                    'menu_class' => 'navbar-nav',
                    'container' => 'div',
                    'container_class' => 'collapse navbar-collapse',
                    'container_id' => 'bytesed_main_menu'
                ));
                ?>
            </div>
            <div class="navbar-right-content show-nav-content">
                <div class="single-right-content">
                    <div class="navbar-right-flex">
                        <div class="btn-wrapper">
                            <a href="javascript:void(0)" class="cmn-btn gradient-outline-1 color-one"> <span><?php esc_html_e('My Account','bytesed');?></span> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
