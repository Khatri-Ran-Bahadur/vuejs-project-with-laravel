<!DOCTYPE html>
<html>

<!-- Mirrored from postalservice.gov.np/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 03 Feb 2020 02:40:33 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Postal Services Department</title>
    <link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/plugins/font/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{asset('site/plugins/icon-fonts/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/plugins/lightbox/css/lightgallery.css')}}">
    <link rel="stylesheet" href="{{asset('site/plugins/timeline/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/plugins/timeline/slick.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/plugins/marquee/ticker.css')}}">
    <link rel="stylesheet" href="{{asset('site/flags/style.css')}}">
    <link rel="stylesheet" href="{{asset('site/css/custom_style.css')}}">
    <link rel="icon" type="image/png" href="{{asset('site/img/logo.png')}}" />
</head>

<body class="np">
    <div class="wrapper" id="app">

      <!-- ============================ 
                header
      ============================ -->
                @include('public.common.header')
      <!-- ============================ 
                header
      ============================ -->

            <div class="clearfix"></div>
                <public-content></public-content>

            <div class="clearfix"></div>

      <!-- ============================ 
                footer
       ============================ -->
            @include('public.common.footer')
       <!-- ============================ 
                footer
       ============================ -->
     
    <script src="{{asset('site/js/jquery2.1.4.min.js')}}"></script>
    <script src="{{asset('site/js/jquery-3.3.1.slim.min.js')}}"></script>
    <script src="{{asset('site/js/popper.min.js')}}"></script>
    <script src="{{asset('site/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('site/plugins/marquee/ticker.js')}}" rel="javascript"></script>
    <script type="text/javascript" src="{{asset('site/js/plugins/store.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('site/js/plugins/rv-jquery-fontsize-2.0.3.js')}}"></script>
    <script type="text/javascript" src="{{asset('site/js/plugins/easyview.js')}}"></script>

    <script src="{{asset('site/plugins/lightbox/js/picturefill.min.js')}}"></script>
    <script src="{{asset('site/plugins/lightbox/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('site/plugins/lightbox/js/jquery.mousewheel.min.js')}}"></script>
    <script src="{{asset('site/plugins/timeline/js/main.js')}}"></script>
    <!-- Resource jQuery -->
    <script src="{{asset('site/js/scroll.js')}}"></script>
    <!-- Resource jQuery -->
    <script src="{{asset('site/js/scrollhelper.js')}}"></script>
    <!-- Resource jQuery -->
    <script async defer ></script>
   
    <script type="text/javascript" src="{{asset('site/plugins/timeline/slick.min.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            
        })
        
        $(".s-ss").click(function() {
            $('.nav-link').parent().removeClass("act-ve");
            $(this).parent().addClass("act-ve");
        });
        $(".sublist > .nav-link").click(function() {
            $('.nav-link').removeClass("active show");
            $(this).addClass("active show");

            $('.sub-area').removeClass("active show");
            var attid = $(this).attr('href');
            $('.sub-child').removeClass("active show");
            $(attid).addClass("active show");
        });
        $(".main-tab").click(function() {
            $('.nav-item').removeClass("act-ve");
        });
    </script>
    <script src="js/app.js" defer></script>
    

    </div>
</body>

</html>