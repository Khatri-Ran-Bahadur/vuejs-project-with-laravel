function prepareElements(){
    function getElements () {
        return  $window = $(window),
                startScroll = $window.scrollTop(),
                buffer = Math.round($window.height() * 0.6),
                buffer2 = Math.round($window.height() * 0.7),
                nav = $('nav.clearfix'),
                sections = $('body>section'),
                headings = $('section.page-title'),
                aboutElements = $('section#about').find('.slogan, .card-list, .col.half article, .skills'),
                servicesElements = $('section#services').find('.devices, .teasers'),
                portfolioElements = $('#portfolio .box'),
                blogElements = $('#blog .one-item'),
                allElements = headings.add(aboutElements).add(servicesElements).add(portfolioElements).add(blogElements);
    };
    getElements();
    allElements.removeClass('animationComplete');
    headings.each(function(){
        var el = $(this);
        el.css('overflow', 'hidden');
        el.find('span.h-line').addClass('paddingAnimation');
        el.find('span.h-ico').addClass('slideLeft');
        el.find('h2').addClass('slideRight');
    });
    aboutElements.each(function(){
        var el = $(this);
        if (el.hasClass('skills')) {
            el.addClass('animateFade');
            el.find('.skill-bar>div').width('10%');
        }
        else if (el.hasClass('card-list')) {
            el.children('div').addClass('animateFade');
        }
        else {
            el.addClass('animateFade');
        }
    });
    servicesElements.each(function(){
        var el = $(this);
        if (el.hasClass('devices')) {
            el.children().addClass('slideLeft');
        }
        else if (el.hasClass('teasers')) {
            el.find('article').each(function(){
                $(this).addClass('animateFade');
            });
        }
    });
    portfolioElements.each(function(){
        $(this).addClass('animateFade');
    });
    blogElements.each(function(){
        $(this).addClass('animateFade');
    });

    return getElements();
};
function activateMenu() {
    var $window = $(window),
        sections = $('body>section'),
        buffer2 = Math.round($window.height() * 0.7),
        scrollLinks = $('nav.clearfix a, #home .header-holder li a, #home .home-scroll'),
        nav = $('nav.clearfix'),
        flag = false;
    scrollLinks.on('click.link', function(){
        flag = true;
        nav.find('li').removeClass('active');
        var target = $('section'+$(this).attr('href')).offset().top;
        $('html, body').animate({
            scrollTop : target
        }, 600, function(){
            return flag = false;
        });
    });
    nav.find('li').on('click', function(){
        $(this).addClass('active');
    });
    sections.each(function(){
        if($(this).offset().top >= $window.scrollTop() && $(this).offset().top <= $window.scrollTop() + buffer2 ) {
            nav.find('a[href="#'+$(this).attr('id')+'"]').parent().addClass('active').siblings().removeClass('active');
        }
    });
    $window.on('scroll.menuactives', function(){
        sections.each(function (i){
            var el = $(this),
                sectEnd = el.offset().top + el.outerHeight();
            if(el.offset().top <= $window.scrollTop() && sectEnd >= $window.scrollTop() && flag === false) {
                nav.find('a[href="#'+el.attr('id')+'"]').parent().addClass('active').siblings().removeClass('active');
            }
        });
    });
};
function animationsForHome() {
    animateForvard($window.scrollTop() + buffer);
    $window.on('scroll.anims', function(){
        var tempScroll = $window.scrollTop(),
            curScroll = tempScroll + buffer,
            antiCurScroll = tempScroll + buffer2;
        if (tempScroll > startScroll) {
            animateForvard(curScroll);
        }
        else if (tempScroll < startScroll) {
            animateBackvard(antiCurScroll);
        }
        startScroll = tempScroll;
    });
    function animateForvard(curScroll) {
        allElements.each(function(){
            var el = $(this);
            if (curScroll >= el.offset().top && !el.hasClass('animationComplete')) {
                el.addClass('animationComplete');
                if (el.hasClass('page-title')) {
                    el.children('span.h-ico, h2').addClass('animationComplete');
                    el.children('.h-line').css('transition-delay', '0.3s').addClass('animationComplete');
                }
                if (el.hasClass('card-list')) {
                    el.children('div').each(function (i){
                        $(this).css('transition-delay', (i*1)/10+'s');
                        $(this).addClass('animationComplete');
                    });
                }
                if (el.hasClass('skills')) {
                    el.find('.skill-bar>div').each(function (i){
                        $(this).css('transition-delay', (i*1)/10+'s');
                        $(this).width($(this).text());
                    });
                }
                if (el.hasClass('devices')) {
                    el.children('.imac').addClass('animationComplete');
                    el.children('.ipad').css('transition-delay', '0.1s').addClass('animationComplete');
                    el.children('.macbook').css('transition-delay', '0.2s').addClass('animationComplete');
                    el.children('.iphone').css('transition-delay', '0.3s').addClass('animationComplete');
                }
                if (el.hasClass('teasers')) {
                    el.find('article').each(function (i){
                        $(this).css('transition-delay', (i*1)/10+'s');
                        $(this).addClass('animationComplete');
                    });
                }
            }
        });
    };
    function animateBackvard(antiCurScroll) {
        allElements.each(function(){
            var el = $(this);
            if (antiCurScroll <= el.offset().top && el.hasClass('animationComplete')) {
                el.removeClass('animationComplete');
                if (el.hasClass('page-title')) {
                    el.children('span.h-ico, h2').removeClass('animationComplete');
                    el.children('.h-line').css('transition-delay', '0.3s').removeClass('animationComplete');
                }
                if (el.hasClass('card-list')) {
                    el.children('div').each(function (i){
                        $(this).css('transition-delay', (i*1)/10+'s');
                        $(this).removeClass('animationComplete');
                    });
                }
                if (el.hasClass('skills')) {
                    el.find('.skill-bar>div').each(function (i){
                        $(this).css('transition-delay', (i*1)/10+'s');
                        $(this).width($(this).text());
                    });
                }
                if (el.hasClass('devices')) {
                    el.children('.imac').removeClass('animationComplete');
                    el.children('.ipad').css('transition-delay', '0.1s').removeClass('animationComplete');
                    el.children('.macbook').css('transition-delay', '0.2s').removeClass('animationComplete');
                    el.children('.iphone').css('transition-delay', '0.3s').removeClass('animationComplete');
                }
                if (el.hasClass('teasers')) {
                    el.find('article').each(function (i){
                        $(this).css('transition-delay', (i*1)/10+'s');
                        $(this).removeClass('animationComplete');
                    });
                }
            }
        });
    };
};
function destroyAnimation() {
    var classes = '.animateFade, .paddingAnimation, .slideRight, .slideLeft, .animationComplete';
    $(classes).removeClass('animateFade paddingAnimation slideRight slideLeft animationComplete');
    $('.skill-bar>div').each(function (i){
        $(this).css('transition-delay', (i*1)/10+'s');
        $(this).width($(this).text());
    });
    $(window).off('scroll.anims');
}