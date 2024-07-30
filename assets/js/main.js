(function($) {
    "use strict";

    $(document).ready(function() {

        /* 
        ========================================
            Pagination On Click Js
        ========================================
        */
        $(document).on('click', '.pagination_list__item', function() {
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
        });
        /* Next Previous btn Click */
        $(document).on('click', '.pagination_list__item__next', function() {
            $(this).parent().find('.pagination_list__item.active').next('.pagination_list__item').addClass('active');
            $(this).parent().find('.pagination_list__item.active').prev('.pagination_list__item').removeClass('active');
        });
        $(document).on('click', '.pagination_list__item__prev', function() {
            $(this).parent().find('.pagination_list__item.active').prev('.pagination_list__item').addClass('active');
            $(this).parent().find('.pagination_list__item.active').next('.pagination_list__item').removeClass('active');
        });


        /* 
        ========================================
            Navbar Toggler
        ========================================
        */
        $(document).on('click', '.navbar-toggler', function() {
            $(".navbar-toggler").toggleClass("active");
        });

        $(document).on('click', '.click-nav-right-icon', function() {
            $(".show-nav-content").toggleClass("show");
        });

        /* 
        ========================================
            Show nav right content
        ========================================
        */
        $(document).on('click', '.click-content-show', function() {
            $(".right-contents-show").toggleClass("show");
        });
        /* 
        ========================================
            Navbar scroll add class Js
        ========================================
        */

        if ($('#navigation').length) {
            window.onscroll = function() { myFunction() };
            var navbar = document.getElementById("navigation");
            var sticky = navbar.offsetTop;

            function myFunction() {
                if (window.pageYOffset >= sticky) {
                    navbar.classList.add("sticky_top")
                } else {
                    navbar.classList.remove("sticky_top");
                }
            }
        }

        /* 
    =====================================================
        Start active menu
    ======================================================
    */
        let sectionsNav = jQuery('section'),
            nav = jQuery('.breadcrumb_nav'),
            nav_height = nav.outerHeight();

        jQuery(window).on('scroll', function() {
            let cur_pos = jQuery(this).scrollTop();

            sectionsNav.each(function() {
                var top = jQuery(this).offset().top - nav_height,
                    bottom = top + jQuery(this).outerHeight();

                if (cur_pos >= top && cur_pos <= bottom) {
                    nav.find('a').removeClass('active');
                    sectionsNav.removeClass('active');

                    jQuery(this).addClass('active');
                    nav.find('a[href="#' + jQuery(this).attr('id') + '"]').addClass('active');
                }
            });
        });

        /* 
        ========================================
            Click Active Class
        ========================================
        */
        $(document).on('click', '.active-list .item', function() {
            $(this).siblings().removeClass('active');
            $(this).toggleClass('active');
        });
        $(document).on('click', '.click-notification', function() {
            $(this).addClass('active');
        });


        /*-------------------------------
            Click Slide Open Close
        ------------------------------*/
        $(document).on('click', '.single-shop-left-title .title', function(e) {
            var shopTitle = $(this).parent('.single-shop-left-title');
            if (shopTitle.hasClass('open')) {
                shopTitle.removeClass('open');
                shopTitle.find('.single-shop-left-inner').removeClass('open');
                shopTitle.find('.single-shop-left-inner').slideUp(300);
            } else {
                shopTitle.addClass('open');
                shopTitle.children('.single-shop-left-inner').slideDown(300);
                shopTitle.siblings('.single-shop-left-title').children('.single-shop-left-inner').slideUp(300);
                shopTitle.siblings('.single-shop-left-title').removeClass('open');
            }
        });

        /* 
        ========================================
            Nice Select
        ========================================
        */
        $('.js_nice_select').niceSelect();

        /*
        ========================================
           Faq accordion
        ========================================
        */
        $('.faq-contents .faq-title').on('click', function(e) {
            var element = $(this).parent('.faq-item');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.find('.faq-panel').removeClass('open');
                element.find('.faq-panel').slideUp(300);
            } else {
                element.addClass('open');
                element.children('.faq-panel').slideDown(300);
                element.siblings('.faq-item').children('.faq-panel').slideUp(300);
                element.siblings('.faq-item').removeClass('open');
                element.siblings('.faq-item').find('.faq-title').removeClass('open');
                element.siblings('.faq-item').find('.faq-panel').slideUp(300);
            }
        });

        /*
        ========================================
            Blog Details Title open Close
        ========================================
        */
        $(document).on('click', '.blog-details-side-title .title', function(e) {
            var element = $(this).parent('.blog-details-side-title');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.find('.blog-details-side-inner').slideUp(300);
            } else {
                element.addClass('open');
                element.children('.blog-details-side-inner').slideDown(300);
                element.siblings('.blog-details-side-title').children('.blog-details-side-inner').slideUp(300);
                element.siblings('.blog-details-side-title').removeClass('open');
            }
        });

        /*
        ========================================
            wow js init
        ========================================
        */
        new WOW().init();

        /* 
        ========================================
            Password Show Hide On Click
        ========================================
        */
        $(document).on("click", ".toggle-password", function(e) {
            e.preventDefault();
            let inputPass = $(this).parent().find("input");
            $(this).toggleClass("show-pass");
            if (inputPass.attr("type") == "password") {
                inputPass.attr("type", "text");
            } else {
                inputPass.attr("type", "password");
            }
        });

        /*
        ========================================
            Global Slider Init
        ========================================
        */
        var globalSlickInit = $('.global-slick-init');
        if (globalSlickInit.length > 0) {
            //todo have to check slider item 
            $.each(globalSlickInit, function(index, value) {
                if ($(this).children('div').length > 1) {
                    //todo configure slider settings object
                    var sliderSettings = {};
                    var allData = $(this).data();
                    var infinite = typeof allData.infinite == 'undefined' ? false : allData.infinite;
                    var arrows = typeof allData.arrows == 'undefined' ? false : allData.arrows;
                    var autoplay = typeof allData.autoplay == 'undefined' ? false : allData.autoplay;
                    var focusOnSelect = typeof allData.focusonselect == 'undefined' ? false : allData.focusonselect;
                    var swipeToSlide = typeof allData.swipetoslide == 'undefined' ? false : allData.swipetoslide;
                    var slidesToShow = typeof allData.slidestoshow == 'undefined' ? 1 : allData.slidestoshow;
                    var slidesToScroll = typeof allData.slidestoscroll == 'undefined' ? 1 : allData.slidestoscroll;
                    var speed = typeof allData.speed == 'undefined' ? '500' : allData.speed;
                    var dots = typeof allData.dots == 'undefined' ? false : allData.dots;
                    var cssEase = typeof allData.cssease == 'undefined' ? 'linear' : allData.cssease;
                    var prevArrow = typeof allData.prevarrow == 'undefined' ? '' : allData.prevarrow;
                    var nextArrow = typeof allData.nextarrow == 'undefined' ? '' : allData.nextarrow;
                    var centerMode = typeof allData.centermode == 'undefined' ? false : allData.centermode;
                    var centerPadding = typeof allData.centerpadding == 'undefined' ? false : allData.centerpadding;
                    var rows = typeof allData.rows == 'undefined' ? 1 : parseInt(allData.rows);
                    var autoplay = typeof allData.autoplay == 'undefined' ? false : allData.autoplay;
                    var pauseOnHover = typeof allData.pauseonhover == 'undefined' ? false : allData.pauseonhover;
                    var autoplaySpeed = typeof allData.autoplayspeed == 'undefined' ? 2000 : parseInt(allData.autoplayspeed);
                    var lazyLoad = typeof allData.lazyload == 'undefined' ? false : allData.lazyload; // have to remove it from settings object if it undefined
                    var appendDots = typeof allData.appenddots == 'undefined' ? false : allData.appenddots;
                    var appendArrows = typeof allData.appendarrows == 'undefined' ? false : allData.appendarrows;
                    var asNavFor = typeof allData.asnavfor == 'undefined' ? false : allData.asnavfor;
                    var verticalSwiping = typeof allData.verticalswiping == 'undefined' ? false : allData.verticalswiping;
                    var vertical = typeof allData.vertical == 'undefined' ? false : allData.vertical;
                    var fade = typeof allData.fade == 'undefined' ? false : allData.fade;
                    var rtl = typeof allData.rtl == 'undefined' ? false : allData.rtl;
                    var responsive = typeof $(this).data('responsive') == 'undefined' ? false : $(this).data('responsive');
                    //slider settings object setup
                    sliderSettings.infinite = infinite;
                    sliderSettings.arrows = arrows;
                    sliderSettings.autoplay = autoplay;
                    sliderSettings.focusOnSelect = focusOnSelect;
                    sliderSettings.swipeToSlide = swipeToSlide;
                    sliderSettings.slidesToShow = slidesToShow;
                    sliderSettings.slidesToScroll = slidesToScroll;
                    sliderSettings.speed = speed;
                    sliderSettings.dots = dots;
                    sliderSettings.cssEase = cssEase;
                    sliderSettings.prevArrow = prevArrow;
                    sliderSettings.nextArrow = nextArrow;
                    sliderSettings.rows = rows;
                    sliderSettings.autoplaySpeed = autoplaySpeed;
                    sliderSettings.autoplay = autoplay;
                    sliderSettings.verticalSwiping = verticalSwiping;
                    sliderSettings.vertical = vertical;
                    sliderSettings.rtl = rtl;
                    if (centerMode != false) {
                        sliderSettings.centerMode = centerMode;
                    }
                    if (centerPadding != false) {
                        sliderSettings.centerPadding = centerPadding;
                    }
                    if (lazyLoad != false) {
                        sliderSettings.lazyLoad = lazyLoad;
                    }
                    if (appendDots != false) {
                        sliderSettings.appendDots = appendDots;
                    }
                    if (appendArrows != false) {
                        sliderSettings.appendArrows = appendArrows;
                    }
                    if (asNavFor != false) {
                        sliderSettings.asNavFor = asNavFor;
                    }
                    if (pauseOnHover != false) {
                        sliderSettings.pauseOnHover = pauseOnHover;
                    }
                    if (fade != false) {
                        sliderSettings.fade = fade;
                    }
                    if (responsive != false) {
                        sliderSettings.responsive = responsive;
                    }
                    $(this).slick(sliderSettings);
                }
            });
        }

        /*
        ========================================
            Mouse Cursor Js
        ========================================
        */
        var myCursor = $('.mouse-move');
        if (myCursor.length) {
            if ($('body')) {
                const e = document.querySelector('.mouse-inner'),
                    t = document.querySelector('.mouse-outer');
                let n, i = 0,
                    o = !1;
                window.onmousemove = function(s) {
                    o || (t.style.transform = "translate(" + s.clientX + "px, " + s.clientY + "px)"), e.style.transform = "translate(" + s.clientX + "px, " + s.clientY + "px)", n = s.clientY, i = s.clientX
                }, $('body').on("mouseenter", "a, .cursor-pointer", function() {
                    e.classList.add('mouse-hover'), t.classList.add('mouse-hover')
                }), $('body').on("mouseleave", "a, .cursor-pointer", function() {
                    $(this).is("a") && $(this).closest(".cursor-pointer").length || (e.classList.remove('mouse-hover'), t.classList.remove('mouse-hover'))
                }), e.style.visibility = "visible", t.style.visibility = "visible"
            }
        }

        /* 
        ========================================
            back to top
        ========================================
        */
        $(document).on('click', '.back-to-top', function() {
            $("html,body").animate({
                scrollTop: 0
            }, 700);
        });

    });
    /* 
    ========================================
        back to top
    ========================================
    */
    $(window).on('scroll', function() {
        //back to top show/hide
        var ScrollTop = $('.back-to-top');
        if ($(window).scrollTop() > 200) {
            ScrollTop.fadeIn(10);
        } else {
            ScrollTop.fadeOut(10);
        }
    });

    /*-----------------
        Preloader
    ------------------*/
    // $(window).on('load', function() {
    //     var preLoader = $("#preloader");
    //     preLoader.fadeOut(1000);

    // });

    /*-----------------
        Preloader
    ------------------*/
    $(window).on('load', function() {
        $('#preloader').delay(300).fadeOut('slow');
        $('body').delay(300).css({
            'overflow': 'visible'
        });
    });


})(jQuery);