jQuery.extend({
    random: function(X) {
        return Math.floor(X * (Math.random() % 1));
    },
    randomBetween: function(MinV, MaxV) {
        return MinV + jQuery.random(MaxV - MinV + 1);
    }
});
jQuery(function($) {
	// Add event when resize ends
	$(window).resize(function() {
        if (screen.width >= 1024) {
            if(this.resizeTO) clearTimeout(this.resizeTO);
            this.resizeTO = setTimeout(function() {
                $(this).trigger('resizeEnd');
            }, 500);
        }
        
    });
    // add or destroy masonry
    function defyMasonry(flag) {
        if ($('body').hasClass('index')) {
            var alb = $('.albums'),
                blgItms = $('#blog .blog-items');
            if (flag) {
                //alert(1);
                alb = alb.masonry({
                    itemSelector : '.box',
                    columnWidth: 330,
                    isAnimated: true
                }),
                blgItms = blgItms.masonry({
                    itemSelector: '.one-item',
                    isAnimated: true
                });
            }
            else {
                alb.masonry('destroy');
                blgItms.masonry('destroy');
            }
        } 
    };
	// return state of window/screen to preform conditions
    function dimensions() {
    	var result = [],
    		screenWidth = screen.width,
            bodyWidth = $('body').width();
		if (screenWidth < 640) {
			result[0] = 640;
		}
		else if (screenWidth > 640 && screenWidth < 1024)  {
			result[0] = 1000;
		}
        else {
            result[0] = 1100;
        }
        if (bodyWidth < 640) {
            result[1] = 640;
        }
        else if (bodyWidth > 640 && bodyWidth < 1024) {
            result[1] = 1000;
        }
        else {
            result[1] = 1100;
        }
    	return result;
    };
    // Set viewPort tag dynamically
    function controlViewport() {
        var viewPortTag=document.createElement('meta');
        viewPortTag.id = "viewport";
        viewPortTag.name = "viewport";
        viewPortTag.content = "width=device-width, initial-scale=1.0";
        document.getElementsByTagName('head')[0].appendChild(viewPortTag);
    }
    // Other things
    $("html").removeClass('no-js');
    // On-Off scripts on window width
    if (dimensions()[0] == 640) {
        controlViewport();
        $('nav').removeClass('sticky tablet').addClass('mobile');
    }
    else if (dimensions()[0] == 1000) {
        $('nav').removeClass('sticky mobile').addClass('tablet');
    }
    else if (dimensions()[0] == 1100 && dimensions()[1] == 640) {
        $('nav').removeClass('sticky tablet').addClass('mobile');
    }
    else if (dimensions()[0] == 1100 && dimensions()[1] == 1000) {
        $('nav').removeClass('sticky mobile').addClass('tablet');
    }
    else if (dimensions()[0] == 1100 && dimensions()[1] == 1100) {
        $('body.index nav').removeClass('tablet mobile').addClass('sticky');
    }
    if (dimensions()[0] == 1100 && dimensions()[1] == 1100) {
        if ($('body').hasClass('index')) {
            prepareElements();
        }
    }
    else {
        destroyAnimation();
    }
    // On-off scripts on resize of window
    $(window).on('resizeEnd', function() {
        if (dimensions()[0] == 1100 && dimensions()[1] == 640) {
            $('nav').removeClass('sticky tablet').addClass('mobile').find('ul').fadeOut();
        }
        else if (dimensions()[0] == 1100 && dimensions()[1] == 1000) {
            $('nav').removeClass('sticky mobile').addClass('tablet').find('ul').fadeIn();
        }
        else if (dimensions()[0] == 1100 && dimensions()[1] == 1100) {
            $('body.index nav').removeClass('tablet mobile').addClass('sticky');
        }
        if (dimensions()[0] == 1100 && dimensions()[1] == 1100) {
            if ($('body').hasClass('index')) {
                prepareElements();
                animationsForHome();
            }
        }
        else {
            destroyAnimation();
        }
    });
    // Mobile menu slideDown or Up
    (function mobileMenu(){
        var nav  = $('nav'),
            navul = nav.find('ul');
        nav.find('.mobile_menu').on('click', function(){
            if (nav.hasClass('mobile')) {
                navul.slideToggle(300);
            }
        });
        navul.find('a').on('click', function(){
            if (nav.hasClass('mobile')) {
                navul.slideUp(300);
            }
        });
    })();
    // Sticky menu
    (function stickyMenu() {
        if ($('body').hasClass('index')) {
            var $window = $(window),
                nav = $('nav');
            function launchStickness(formenu) {
                if ($window.scrollTop() > formenu) {
                    nav.addClass('fixed');
                }
                $window.on('scroll', function(){
                    if ($(this).scrollTop() > formenu) {
                        if (!nav.hasClass('fixed')) {
                            nav.addClass('fixed');
                        }
                    }
                    else {
                        nav.removeClass('fixed');
                    }
                });
            };
            if (nav.hasClass('sticky')) {
                launchStickness($('#home').height());
            }
            $(window).on('resizeEnd', function() {
                if (nav.hasClass('sticky')) {
                    launchStickness($('#home').height());
                }
            });
        }
    })();
    // Init some stuff that don't need any dimension conditions
    if ($('body').hasClass('index')) { // Only on home page
        $("body").queryLoader2({
            barColor: "#228b68",
            backgroundColor: "transparent",
            percentage: true,
            barHeight: 0,
            minimumTime: 100,
            onComplete: function() {
                // Home section animations control
                function controlHomeAnim(flag) {
                    if (flag) {
                         $('.logo-resize').animate({
                            'margin-top': 0,
                            'left': 0,
                            'width': '100%',
                            'height': '100%'
                        }, 500, function() {
                            $('.logo').fadeIn(300, function() {
                                $('.header-holder li').each(function() {
                                    $(this).addClass('enable-hover').fadeIn($.randomBetween(200, 1000));
                                });
                            });
                        });
                    }
                    else {
                        $('.logo-resize').css({
                            'margin-top': 0,
                            'left': 0,
                            'width': '100%',
                            'height': '100%'
                        });
                        $('.logo, .header-holder li').css('display','block');
                    }
                };
                $('#percentage-box').remove();
                if (dimensions()[0] == 1100 && dimensions()[1] == 1100) {
                    controlHomeAnim(true);
                    animationsForHome();
                }
                else if (dimensions()[0] != 640 && dimensions()[1] != 640) {
                    controlHomeAnim(false);
                }
                // Set up masonry
                if (dimensions()[0] == 640 || dimensions()[1] == 640) {
                    defyMasonry(false);
                }
                else {
                   defyMasonry(true); 
                }
                $(window).on('resizeEnd', function() {
                    if (dimensions()[0] != 640 && dimensions()[1] != 640) {
                        controlHomeAnim(true);
                    }
                    if (dimensions()[0] == 640 || dimensions()[1] == 640) {
                        defyMasonry(false);
                    }
                    else {
                       defyMasonry(true); 
                    }
                });
            }
        });
        $('.fancybox').fancybox({
            padding : 0,
            maxWidth : 780,
            afterShow :function () {
                function setArrowsPos() {
                    $('.fancybox-nav').css({
                        'margin-top' : '0px',
                        'top' : ($('.fancybox-inner .fancy-inner-item').outerHeight() / 2) - 30
                    });
                };
                if (dimensions()[0] != 640 && dimensions()[1] != 640) {
                    setArrowsPos();
                }
                $(window).on('resizeEnd', function() {
                    if (dimensions()[0] != 640 && dimensions()[1] != 640) {
                        setArrowsPos();
                    }
                });
            }
        });
        activateMenu();
        $('#testimonials').slides({
            preload: true,
            generatePagination : 0,
            play : 5000
        });
    // Attach google map
        // create map center
        var latlng = new google.maps.LatLng(40.714997,-73.994293); 
        // Create map options
        var options = {  
            zoom: 7,
            center: latlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            scrollwheel : false
        };  
        // Init map
        var map = new google.maps.Map(document.getElementById('map'), options);  
        //create marker
        var marker = new google.maps.Marker({
                position: new google.maps.LatLng(40.714997,-73.994293), 
                map: map,
                title : 'We are here'
            });
    }
});