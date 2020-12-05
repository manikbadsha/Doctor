$(document).ready(function () {

    //masonry
    $('#masonry').masonry();

    //Select2
    $(".basic-single").select2({
        theme: "bootstrap"
    });
    //Datepicker
    $('.datepicker').datepicker({
        autoclose: true
    });
    //File ipload
    $('.file-upload').file_upload();

    //Tooltips
    $('[data-toggle="tooltip"]').tooltip();

//back to top
    $('body').append('<div id="toTop" class="btn btn-top"><span class="ti-arrow-up"></span></div>');
    $(window).scroll(function () {
        if ($(this).scrollTop() !== 0) {
            $('#toTop').fadeIn();
        } else {
            $('#toTop').fadeOut();
        }
    });
    $('#toTop').on('click', function () {
        $("html, body").animate({scrollTop: 0}, 600);
        return false;
    });

    //navbar sticky
    var windows = $(window);
    var stick = $(".header-sticky");
    windows.on('scroll', function () {
        var scroll = windows.scrollTop();
        if (scroll < 245) {
            stick.removeClass("sticky");
        } else {
            stick.addClass("sticky");
        }
    });


    //navbar dropdown
    $('.dropdown-menu a.dropdown-toggle').on('click', function (e) {
        var $el = $(this);
        var $parent = $(this).offsetParent(".dropdown-menu");
        if (!$(this).next().hasClass('show')) {
            $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
        }
        var $subMenu = $(this).next(".dropdown-menu");
        $subMenu.toggleClass('show');

        $(this).parent("li").toggleClass('show');

        $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function (e) {
            $('.dropdown-menu .show').removeClass("show");
        });

        if (!$parent.parent().hasClass('navbar-nav')) {
            $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
        }
        return false;
    });


    /*------------------------------------
     Mobile Menu
     -------------------------------------- */

    $("#mobile-menu").metisMenu();

    $("#sidebar").mCustomScrollbar({
        theme: "minimal",
        scrollInertia: 100
    });

    $('#dismiss, .overlay').on('click', function () {
        $('#sidebar').removeClass('active');
        $('.overlay').fadeOut();
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').addClass('active');
        $('.overlay').fadeIn();
    });



    //Slider Preloader 
    var slider_preloader_status = $(".slider_preloader_statusr");
    var slider_preloader = $(".slider_preloader");
    var header_slider = $(".header-slider");
    slider_preloader_status.fadeOut();
    slider_preloader.delay(350).fadeOut('slow');
    header_slider.removeClass("header-slider-preloader");

    // Slider JS
    $('#animation-slide').owlCarousel({
        autoHeight: true,
        items: 1,
        loop: true,
        autoplay: false,
        dots: true,
        nav: true,
        autoplayTimeout: 7000,
        navText: ["<i class='ti-angle-left'></i>", "<i class='ti-angle-right'></i>"],
        //animateIn: "fadeIn",
        //animateOut: "fadeIn",
        autoplayHoverPause: false,
        touchDrag: true,
        mouseDrag: true
    });
    $("#animation-slide").on("translate.owl.carousel", function () {
        $(this).find(".owl-item .slide-text > *").removeClass("fadeInUp animated").css("opacity", "0");
        $(this).find(".owl-item .slide-img").removeClass("fadeInRight animated").css("opacity", "0");
    });
    $("#animation-slide").on("translated.owl.carousel", function () {
        $(this).find(".owl-item.active .slide-text > *").addClass("fadeInUp animated").css("opacity", "1");
        $(this).find(".owl-item.active .slide-img").addClass("fadeInRight animated").css("opacity", "1");
    });

    //Smooth Page Scrolling in jQuery
    $('a.js-scroll-trigger[href*="#"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: (target.offset().top - 48)
                }, 1000, "easeInOutExpo");
                return false;
            }
        }
    });

    //Page header carousel
    $('.page-header-carousel').owlCarousel({
        loop: true,
        dots: false,
        nav: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 1
            },
            1000: {
                items: 1
            }
        }
    });

    //Owl testimonial
    $('.owl-testimonial').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: ['<i class="ti-angle-left"></i>', '<i class="ti-angle-right"></i>'],
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 1,
                nav: false
            },
            1000: {
                items: 1,
                nav: true,
                loop: false
            }
        }
    });

});


//{
//    const config = {
//        hador: {
//            in: {
//                base: {
//                    duration: 1,
//                    delay: 100,
//                    easing: 'linear',
//                    opacity: 1
//                },
//                path: {
//                    duration: 1000,
//                    easing: 'easeOutExpo',
//                    delay: function (t, i) {
//                        return i * 150;
//                    },
//                    scale: [0, 1],
//                    translateY: function (t, i, c) {
//                        return i === c - 1 ? ['50%', '0%'] : 0;
//                    },
//                    rotate: function (t, i, c) {
//                        return i === c - 1 ? [90, 0] : 0;
//                    }
//                },
//                content: {
//                    duration: 600,
//                    delay: 750,
//                    easing: 'easeOutExpo',
//                    scale: [0.5, 1],
//                    opacity: {
//                        value: 1,
//                        easing: 'linear',
//                        duration: 400
//                    }
//                },
//                trigger: {
//                    translateX: [
//                        {value: '30%', duration: 200, easing: 'easeInExpo'},
//                        {value: ['-30%', '0%'], duration: 200, easing: 'easeOutExpo'}
//                    ],
//                    opacity: [
//                        {value: 0, duration: 200, easing: 'easeInExpo'},
//                        {value: 1, duration: 200, easing: 'easeOutExpo'}
//                    ],
//                    color: [
//                        {value: '#037d71', duration: 1, delay: 200, easing: 'easeOutExpo'}
//                    ]
//                }
//            },
//            out: {
//                base: {
//                    duration: 1,
//                    delay: 450,
//                    easing: 'linear',
//                    opacity: 0
//                },
//                path: {
//                    duration: 300,
//                    easing: 'easeOutExpo',
//                    delay: function (t, i, c) {
//                        return (c - i - 1) * 50;
//                    },
//                    scale: 0
//                },
//                content: {
//                    duration: 200,
//                    easing: 'easeOutExpo',
//                    scale: 0.7,
//                    opacity: {
//                        value: 0,
//                        duration: 50,
//                        easing: 'linear'
//                    }
//                },
//                trigger: {
//                    translateX: [
//                        {value: '30%', duration: 100, easing: 'easeInQuad'},
//                        {value: ['-30%', '0%'], duration: 100, easing: 'easeOutQuad'}
//                    ],
//                    opacity: [
//                        {value: 0, duration: 100, easing: 'easeInQuad'},
//                        {value: 1, duration: 100, easing: 'easeOutQuad'}
//                    ],
//                    color: [
//                        {value: '#353d57', duration: 1, delay: 100, easing: 'easeOutQuad'}
//                    ]
//                }
//            }
//        }
//    };
//
//    const tooltips = Array.from(document.querySelectorAll('.tooltip'));
//
//    class Tooltip {
//        constructor(el) {
//            this.DOM = {};
//            this.DOM.el = el;
//            this.type = this.DOM.el.getAttribute('data-type');
//            this.DOM.trigger = this.DOM.el.querySelector('.tooltip__trigger');
//            this.DOM.triggerSpan = this.DOM.el.querySelector('.tooltip__trigger-text');
//            this.DOM.base = this.DOM.el.querySelector('.tooltip__base');
//            this.DOM.shape = this.DOM.base.querySelector('.tooltip__shape');
//            if (this.DOM.shape) {
//                this.DOM.path = this.DOM.shape.childElementCount > 1 ? Array.from(this.DOM.shape.querySelectorAll('path')) : this.DOM.shape.querySelector('path');
//            }
//            this.DOM.deco = this.DOM.base.querySelector('.tooltip__deco');
//            this.DOM.content = this.DOM.base.querySelector('.tooltip__content');
//
//            this.DOM.letters = this.DOM.content.querySelector('.tooltip__letters');
//            if (this.DOM.letters) {
//                // Create spans for each letter.
//                charming(this.DOM.letters);
//                // Redefine content.
//                this.DOM.content = this.DOM.letters.querySelectorAll('span');
//            }
//            this.initEvents();
//        }
//        initEvents() {
//            this.mouseenterFn = () => {
//                this.mouseTimeout = setTimeout(() => {
//                    this.isShown = true;
//                    this.show();
//                }, 75);
//            }
//            this.mouseleaveFn = () => {
//                clearTimeout(this.mouseTimeout);
//                if (this.isShown) {
//                    this.isShown = false;
//                    this.hide();
//                }
//            }
//            this.DOM.trigger.addEventListener('mouseenter', this.mouseenterFn);
//            this.DOM.trigger.addEventListener('mouseleave', this.mouseleaveFn);
//            this.DOM.trigger.addEventListener('touchstart', this.mouseenterFn);
//            this.DOM.trigger.addEventListener('touchend', this.mouseleaveFn);
//        }
//        show() {
//            this.animate('in');
//        }
//        hide() {
//            this.animate('out');
//        }
//        animate(dir) {
//            if (config[this.type][dir].base) {
//                anime.remove(this.DOM.base);
//                let baseAnimOpts = {targets: this.DOM.base};
//                anime(Object.assign(baseAnimOpts, config[this.type][dir].base));
//            }
//            if (config[this.type][dir].shape) {
//                anime.remove(this.DOM.shape);
//                let shapeAnimOpts = {targets: this.DOM.shape};
//                anime(Object.assign(shapeAnimOpts, config[this.type][dir].shape));
//            }
//            if (config[this.type][dir].path) {
//                anime.remove(this.DOM.path);
//                let shapeAnimOpts = {targets: this.DOM.path};
//                anime(Object.assign(shapeAnimOpts, config[this.type][dir].path));
//            }
//            if (config[this.type][dir].content) {
//                anime.remove(this.DOM.content);
//                let contentAnimOpts = {targets: this.DOM.content};
//                anime(Object.assign(contentAnimOpts, config[this.type][dir].content));
//            }
//            if (config[this.type][dir].trigger) {
//                anime.remove(this.DOM.triggerSpan);
//                let triggerAnimOpts = {targets: this.DOM.triggerSpan};
//                anime(Object.assign(triggerAnimOpts, config[this.type][dir].trigger));
//            }
//            if (config[this.type][dir].deco) {
//                anime.remove(this.DOM.deco);
//                let decoAnimOpts = {targets: this.DOM.deco};
//                anime(Object.assign(decoAnimOpts, config[this.type][dir].deco));
//            }
//        }
//        destroy() {
//            this.DOM.trigger.removeEventListener('mouseenter', this.mouseenterFn);
//            this.DOM.trigger.removeEventListener('mouseleave', this.mouseleaveFn);
//            this.DOM.trigger.removeEventListener('touchstart', this.mouseenterFn);
//            this.DOM.trigger.removeEventListener('touchend', this.mouseleaveFn);
//        }
//    }
//
//    const init = (() => tooltips.forEach(t => new Tooltip(t)))();
//}
//;






