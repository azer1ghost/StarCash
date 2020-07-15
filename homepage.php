<?php
session_start();
ob_start();

$token = $_SESSION['token'];
$user = $_SESSION['user'.$token]; ?>
<html class=" js csstransforms csstransforms3d csstransitions">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Star Cash</title>
      <link rel="shortcut icon" href="favicon.ico">
      <!--pageMeta-->

      <style>body{font-size:16px;}</style>
      <style>/*! CSS Used from: http://localhost/old%20projects/builder%20ades/builder/elements/css/animate.css */
         .animated{-webkit-animation-duration:1s;animation-duration:1s;-webkit-animation-fill-mode:both;animation-fill-mode:both;}
         .fadeInLeft{-webkit-animation-name:fadeInLeft;animation-name:fadeInLeft;}
         .fadeInRight{-webkit-animation-name:fadeInRight;animation-name:fadeInRight;}
         .zoomIn{-webkit-animation-name:zoomIn;animation-name:zoomIn;}
         /*! CSS Used from: http://localhost/old%20projects/builder%20ades/builder/elements/css/font-awesome.min.css */
         .fa{display:inline-block;font:normal normal normal 14px/1 FontAwesome;font-size:inherit;text-rendering:auto;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;transform:translate(0, 0);}
         .fa-search:before{content:"\f002";}
         .fa-lock:before{content:"\f023";}
         .fa-headphones:before{content:"\f025";}
         .fa-tint:before{content:"\f043";}
         .fa-thumbs-o-up:before{content:"\f087";}
         .fa-twitter:before{content:"\f099";}
         .fa-facebook:before{content:"\f09a";}
         .fa-angle-up:before{content:"\f106";}
         .fa-dribbble:before{content:"\f17d";}
         /*! CSS Used from: http://localhost/old%20projects/builder%20ades/builder/elements/css/bootstrap.min.css */
         html{font-family:sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;}
         body{margin:0;}
         header,nav,section{display:block;}
         a{background-color:transparent;}
         a:active,a:hover{outline:0;}
         h1{margin:.67em 0;font-size:2em;}
         img{border:0;}

         input{line-height:normal;}
         @media print{
         *,:after,:before{color:#000!important;text-shadow:none!important;background:0 0!important;-webkit-box-shadow:none!important;box-shadow:none!important;}
         a,a:visited{text-decoration:underline;}
         a[href]:after{content:" (" attr(href) ")";}
         a[href^="#"]:after{content:"";}
         img{page-break-inside:avoid;}
         img{max-width:100%!important;}
         h2,h3,p{orphans:3;widows:3;}
         h2,h3{page-break-after:avoid;}
         .navbar{display:none;}
         }
         *{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
         :after,:before{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;}
         html{font-size:10px;-webkit-tap-highlight-color:rgba(0,0,0,0);}
         body{font-family:"Helvetica Neue",Helvetica,Arial,sans-serif;font-size:14px;line-height:1.42857143;color:#333;background-color:#fff;}

         a{color:#337ab7;text-decoration:none;}
         a:focus,a:hover{color:#23527c;text-decoration:underline;}
         a:focus{outline:thin dotted;outline:5px auto -webkit-focus-ring-color;outline-offset:-2px;}
         img{vertical-align:middle;}
         .img-responsive{display:block;max-width:100%;height:auto;}
         .sr-only{position:absolute;width:1px;height:1px;padding:0;margin:-1px;overflow:hidden;clip:rect(0,0,0,0);border:0;}
         h1,h2,h3{font-family:inherit;font-weight:500;line-height:1.1;color:inherit;}
         h1,h2,h3{margin-top:20px;margin-bottom:10px;}
         h1{font-size:36px;}
         h2{font-size:30px;}
         h3{font-size:24px;}
         p{margin:0 0 10px;}
         ul{margin-top:0;margin-bottom:10px;}
         .container{padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto;}
         @media (min-width:768px){
         .container{width:750px;}
         }
         @media (min-width:992px){
         .container{width:970px;}
         }
         @media (min-width:1200px){
         .container{width:1170px;}
         }
         .row{margin-right:-15px;margin-left:-15px;}
         .col-md-6,.col-md-7,.col-sm-5{position:relative;min-height:1px;padding-right:15px;padding-left:15px;}
         @media (min-width:768px){
         .col-sm-5{float:left;}
         .col-sm-5{width:41.66666667%;}
         }
         @media (min-width:992px){
         .col-md-6,.col-md-7{float:left;}
         .col-md-7{width:58.33333333%;}
         .col-md-6{width:50%;}
         }
         .form-control{display:block;width:100%;height:34px;padding:6px 12px;font-size:14px;line-height:1.42857143;color:#555;background-color:#fff;background-image:none;border:1px solid #ccc;border-radius:4px;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075);box-shadow:inset 0 1px 1px rgba(0,0,0,.075);-webkit-transition:border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;-o-transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;transition:border-color ease-in-out .15s,box-shadow ease-in-out .15s;}
         .form-control:focus{border-color:#66afe9;outline:0;-webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(102,175,233,.6);}
         .form-control::-moz-placeholder{color:#999;opacity:1;}
         .form-control:-ms-input-placeholder{color:#999;}
         .form-control::-webkit-input-placeholder{color:#999;}
         .collapse{display:none;}
         .input-group{position:relative;display:table;border-collapse:separate;}
         .input-group .form-control{position:relative;z-index:2;float:left;width:100%;margin-bottom:0;}
         .input-group .form-control{display:table-cell;}
         .input-group .form-control:first-child{border-top-right-radius:0;border-bottom-right-radius:0;}
         .nav{padding-left:0;margin-bottom:0;list-style:none;}
         .nav>li{position:relative;display:block;}
         .nav>li>a{position:relative;display:block;padding:10px 15px;}
         .nav>li>a:focus,.nav>li>a:hover{text-decoration:none;background-color:#eee;}
         .navbar{position:relative;min-height:50px;margin-bottom:20px;border:1px solid transparent;}
         @media (min-width:768px){
         .navbar{border-radius:4px;}
         }
         @media (min-width:768px){
         .navbar-header{float:left;}
         }
         .navbar-collapse{padding-right:15px;padding-left:15px;overflow-x:visible;-webkit-overflow-scrolling:touch;border-top:1px solid transparent;-webkit-box-shadow:inset 0 1px 0 rgba(255,255,255,.1);box-shadow:inset 0 1px 0 rgba(255,255,255,.1);}
         @media (min-width:768px){
         .navbar-collapse{width:auto;border-top:0;-webkit-box-shadow:none;box-shadow:none;}
         .navbar-collapse.collapse{display:block!important;height:auto!important;padding-bottom:0;overflow:visible!important;}
         }
         .container>.navbar-collapse,.container>.navbar-header{margin-right:-15px;margin-left:-15px;}
         @media (min-width:768px){
         .container>.navbar-collapse,.container>.navbar-header{margin-right:0;margin-left:0;}
         }
         .navbar-brand{float:left;height:50px;padding:15px 15px;font-size:18px;line-height:20px;}
         .navbar-brand:focus,.navbar-brand:hover{text-decoration:none;}
         .navbar-brand>img{display:block;}
         @media (min-width:768px){
         .navbar>.container .navbar-brand{margin-left:-15px;}
         }
         .navbar-toggle{position:relative;float:right;padding:9px 10px;margin-top:8px;margin-right:15px;margin-bottom:8px;background-color:transparent;background-image:none;border:1px solid transparent;border-radius:4px;}
         .navbar-toggle:focus{outline:0;}
         .navbar-toggle .icon-bar{display:block;width:22px;height:2px;border-radius:1px;}
         .navbar-toggle .icon-bar+.icon-bar{margin-top:4px;}
         @media (min-width:768px){
         .navbar-toggle{display:none;}
         }
         .navbar-nav{margin:7.5px -15px;}
         .navbar-nav>li>a{padding-top:10px;padding-bottom:10px;line-height:20px;}
         @media (min-width:768px){
         .navbar-nav{float:left;margin:0;}
         .navbar-nav>li{float:left;}
         .navbar-nav>li>a{padding-top:15px;padding-bottom:15px;}
         }
         @media (min-width:768px){
         .navbar-right{float:right!important;margin-right:-15px;}
         .navbar-right~.navbar-right{margin-right:0;}
         }
         .navbar-default{background-color:#f8f8f8;border-color:#e7e7e7;}
         .navbar-default .navbar-brand{color:#777;}
         .navbar-default .navbar-brand:focus,.navbar-default .navbar-brand:hover{color:#5e5e5e;background-color:transparent;}
         .navbar-default .navbar-nav>li>a{color:#777;}
         .navbar-default .navbar-nav>li>a:focus,.navbar-default .navbar-nav>li>a:hover{color:#333;background-color:transparent;}
         .navbar-default .navbar-nav>.active>a,.navbar-default .navbar-nav>.active>a:focus,.navbar-default .navbar-nav>.active>a:hover{color:#555;background-color:#e7e7e7;}
         .navbar-default .navbar-toggle{border-color:#ddd;}
         .navbar-default .navbar-toggle:focus,.navbar-default .navbar-toggle:hover{background-color:#ddd;}
         .navbar-default .navbar-toggle .icon-bar{background-color:#888;}
         .navbar-default .navbar-collapse{border-color:#e7e7e7;}
         .close{float:right;font-size:21px;font-weight:700;line-height:1;color:#000;text-shadow:0 1px 0 #fff;filter:alpha(opacity=20);opacity:.2;}
         .close:focus,.close:hover{color:#000;text-decoration:none;cursor:pointer;filter:alpha(opacity=50);opacity:.5;}
         .clearfix:after,.clearfix:before,.container:after,.container:before,.nav:after,.nav:before,.navbar-collapse:after,.navbar-collapse:before,.navbar-header:after,.navbar-header:before,.navbar:after,.navbar:before,.row:after,.row:before{display:table;content:" ";}
         .clearfix:after,.container:after,.nav:after,.navbar-collapse:after,.navbar-header:after,.navbar:after,.row:after{clear:both;}
         .visible-xs{display:none!important;}
         @media (max-width:767px){
         .visible-xs{display:block!important;}
         }
         @media (min-width:768px)and (max-width:991px){
         .hidden-sm{display:none!important;}
         }
         /*! CSS Used from: http://localhost/old%20projects/builder%20ades/builder/elements/css/headers.css */
         header .form-control{border:1px solid #ededed;border-radius:0;box-shadow:none;padding:6px 12px;height:34px;}
         header .form-control:focus{border-color:#31aae2;box-shadow:none;}
         header button:focus{outline:none;}
         header .offcanvas-menu h1{font-size:20px;padding:15px 25px;color:#999;text-transform:capitalize;border-bottom:1px solid rgba(255,255,255,0.2);margin-top:0;margin-bottom:25px;}
         header .hippo-offcanvas-container > div{visibility:hidden;}
         header .offcanvas-menu .close{color:#fff;text-shadow:none;filter:alpha(opacity=100);opacity:1;width:44px;height:52px;-webkit-transition:all 0.3s ease 0s;-moz-transition:all 0.3s ease 0s;-o-transition:all 0.3s ease 0s;transition:all 0.3s ease 0s;}
         header .offcanvas-menu .close:hover{background-color:#31aae2;}
         header #menu > li{margin-left:15px;line-height:40px;border-bottom:1px solid rgba(255, 255, 255, 0.2);}
         header #menu>li:last-child{border-bottom:0;}
         header #menu li a{display:block;text-decoration:none;color:#999999;padding:0 15px;}
         header #menu li a:hover,header #menu li.active a{color:#fff;background:rgba(255,255,255,0.2);}
         header .mega-menu .nav,header .mega-menu .collapse{position:static;}
         @media (min-width: 768px){
         .header6 .navbar-default{border:0;border-radius:0;}
         .header6 .navbar-brand{height:110px;padding:35px 15px;}
         .header6 .navbar-default .navbar-nav>li>a{margin:40px 0 36px;}
         .header6 .navbar-nav>li{margin-right:10px;}
         .header6 .navbar-nav>li:last-child{margin-right:0;}
         .header6 .navbar-default .navbar-nav.main-nav>li a{padding:7px 19px;}
         }
         .header6 .navbar-default{background-color:#fff;margin-bottom:0;}
         @media (max-width: 767px){
         .header6 .navbar-brand{padding:5px 15px;}
         }
         .header6 .navbar-default .navbar-nav>li>a{color:#969595;text-transform:uppercase;border-radius:20px;}
         .header6 .navbar-default .navbar-nav>li>a:focus,.header6 .navbar-default .navbar-nav>li>a:hover{color:#fff;background-color:#31aae2;border-color:#31aae2;}
         .header6 .navbar-default .navbar-nav>.active>a,.header6 .navbar-default .navbar-nav>.active>a:focus,.header6 .navbar-default .navbar-nav>.active>a:hover{color:#fff;background-color:#31aae2;border-color:#31aae2;}
         .header6 .navbar-nav.head-search{position:relative;line-height:86px;margin-left:18px;}
         .header6 .navbar-nav.head-search .search-form{padding:40px 0 36px;}

         .header6 .navbar-nav.head-search .search-form .form-control{border-radius:20px;background:#F1F1F1;font-size:12px;width:180px;}
         .header6 .navbar-nav.head-social{margin:41px 0 35px 10px;}
         .header6 .navbar-nav.head-social li{margin-right:5px;}
         .header6 .navbar-nav.head-social li a{width:33px;height:33px;line-height:33px;display:block;text-align:center;font-size:12px;color:#fff;border-radius:50%;margin:0;padding:0;}
         .header6 .navbar-nav.head-social li a:hover{background:#f1f1f1!important;color:#969595;}
         .header6 .navbar-nav.head-social li a.fb-bg{background:#0b5fa6;}
         .header6 .navbar-nav.head-social li a.twt-bg{background:#41bef2;}
         .header6 .navbar-nav.head-social li a.dbl-bg{background:#e11396;}
         .header6 .navbar-toggle{border-radius:0;}
         .header6 .navbar-default .navbar-toggle:focus,.header6 .navbar-default .navbar-toggle:hover{background-color:#31aae2;border-color:transparent;}
         .header6 .navbar-default .navbar-toggle:hover .icon-bar{background-color:#fff;}
         @media (max-width: 767px){
         .navbar-brand{padding:5px 15px;}
         }
         @media (max-width: 767px){
         .navbar-brand{padding:5px 15px;}
         }
         /*! CSS Used from: http://localhost/old%20projects/builder%20ades/builder/elements/css/style.css */
         body{font-family:'Open Sans',sans-serif;font-size:13px;line-height:24px;color:#969595;font-weight:400;overflow-x:hidden;-webkit-font-smoothing:antialiased;}
         h1,h2,h3{margin:0 0 15px;color:#313131;font-weight:400;}
         h1{font-size:30px;line-height:24px;}
         h2{font-size:24px;line-height:24px;}
         h3{font-size:20px;line-height:24px;}
         a{color:#31aae2;text-decoration:none;-webkit-transition:all .3s ease 0s;-moz-transition:all .3s ease 0s;-o-transition:all .3s ease 0s;transition:all .3s ease 0;}
         a,a:active,a:focus{text-decoration:none;outline:none;}
         a:hover,a:focus{text-decoration:none;}

         ul{margin:0;padding:0;list-style:none;}
         .form-control{height:53px;padding:6px 20px;font-size:13px;line-height:24px;color:#969595;border:1px solid #F1F1F1;border-radius:0;box-shadow:none;}
         .form-control:focus{border:1px solid #31aae2!important;box-shadow:none;}
         .pt-100{padding-top:100px;}
         #toTop{position:fixed;bottom:30px;right:30px;color:#31aae2;cursor:pointer;display:none;z-index:9999;width:30px;height:30px;border:1px solid #31aae2;text-align:center;font-size:24px;line-height:28px;}
         #totop:hover{color:#fff;background-color:#31aae2;border:1px solid transparent;-webkit-transition:all .3s ease 0s;-moz-transition:all .3s ease 0s;-o-transition:all .3s ease 0s;transition:all .3s ease 0;}

         .fb-bg{background:#1b57a1;}
         .twt-bg{background:#0cbce2;}
         .form-control{height:53px;padding:15px 20px;font-size:13px;line-height:24px;border:1px solid #F1F1F1;border-radius:0;box-shadow:none;}
         .form-control:focus{box-shadow:none;}
         .hippo-offcanvas-contents{position:relative;}
         .hippo-offcanvas-wrapper{position:relative;}
         .hippo-offcanvas-pusher{z-index:99;-webkit-transition:-webkit-transform .5s;-moz-transition:-moz-transform .5s;-ms-transition:-ms-transform .5s;-o-transition:-o-transform .5s;transition:transform .5s;}
         .hippo-offcanvas-wrapper::after{position:absolute;top:0;right:0;width:0;height:0;background:rgba(0,0,0,0.5);content:'';opacity:0;display:none;-webkit-transition:opacity 0.5s,width .1s 0.5s,height .1s .5s;-moz-transition:opacity 0.5s,width .1s 0.5s,height .1s .5s;-o-transition:opacity 0.5s,width .1s 0.5s,height .1s .5s;transition:opacity 0.5s,width .1s 0.5s,height .1s .5s;z-index:999;}
         .hippo-offcanvas-container{position:absolute;top:0;left:0;z-index:9999;visibility:hidden;width:300px;height:100%;background:#27272C;-webkit-transition:all .5s;-moz-transition:all .5s;-o-transition:all .5s;transition:all .5s;}
         .hippo-offcanvas-container::after{position:absolute;top:0;right:0;width:100%;height:100%;background:rgba(0,0,0,0.5);content:'';opacity:1;-webkit-transition:opacity .5s;-moz-transition:opacity .5s;-o-transition:opacity .5s;transition:opacity .5s;}
         .hippo-offcanvas-container > div{overflow-y:scroll;overflow-x:hidden;height:calc(100% - 45px);}
         .hippo-offcanvas-container > div > div{visibility:visible;}
         .hippo-offcanvas-left .hippo-offcanvas-container{left:0;}
         .hippo-offcanvas-left.slide-in-on-top .hippo-offcanvas-container{-webkit-transform:translate3d(-100%,0,0);-moz-transform:translate3d(-100%,0,0);-ms-transform:translate(-100%,0);-o-transform:translate3d(-100%,0,0);transform:translate3d(-100%,0,0);}
         .slide-in-on-top .hippo-offcanvas-container::after{display:none;}
         #toTop{position:fixed;bottom:30px;right:30px;color:#31aae2;cursor:pointer;display:none;z-index:9999;width:30px;height:30px;border:1px solid #31aae2;text-align:center;font-size:24px;line-height:28px;}
         .pt-100{padding-top:100px;}
         .fullWidthTwentyOne{background:url(style/fullwidth-bg-2.jpg) no-repeat center center #4B7FCB;background-size:cover;color:#9dd1f6;}
         .fullWidthTwentyOne img{width:90%;}
         @media (max-width: 767px){
         .fullWidthTwentyOne img{margin-bottom:30px;}
         }
         .fullWidthTwentyOne h2{font-size:24px;color:#fff;margin-top:60px;}
         .fullWidthTwentyOne .feature-wrapper{margin-top:50px;}
         .fullWidthTwentyOne .feature-content h3{font-size:15px;line-height:50px;color:#fff;margin-bottom:10px;}
         .fullWidthTwentyOne .feature-content i{float:left;margin-right:20px;display:block;width:50px;height:50px;font-size:16px;line-height:50px;text-align:center;border:1px solid #9dd1f6;border-radius:50%;-webkit-transition:all .3s ease 0s;-moz-transition:all .3s ease 0s;-o-transition:all .3s ease 0s;transition:all .3s ease 0;}
         .fullWidthTwentyOne .feature-wrapper:hover .feature-content i{background-color:#fff;color:#31aae2;border:1px solid transparent;}
         /*! CSS Used from: http://localhost/old%20projects/builder%20ades/builder/elements/css/responsive.css */
         @media (max-width : 766px){
         .navbar-brand{padding:5px 15px;}
         .navbar-default{background-color:#000;}
         }
         @media (min-width : 768px) and (max-width : 991px){
         .main-nav{margin-right:10px!important;padding-right:10px;}
         .navbar-nav>li>a{padding:30px 8px;}
         .navbar-brand{padding:20px 10px 20px 15px;}
         }
         @media (min-width : 992px) and (max-width : 1199px){
         .main-nav{padding-right:40px;}
         .navbar-nav>li>a{padding:30px 15px;}
         }
         /*! CSS Used keyframes */
         @-webkit-keyframes fadeInLeft{0%{opacity:0;-webkit-transform:translate3d(-100%,0,0);transform:translate3d(-100%,0,0);}100%{opacity:1;-webkit-transform:none;transform:none;}}
         @keyframes fadeInLeft{0%{opacity:0;-webkit-transform:translate3d(-100%,0,0);transform:translate3d(-100%,0,0);}100%{opacity:1;-webkit-transform:none;transform:none;}}
         @-webkit-keyframes fadeInRight{0%{opacity:0;-webkit-transform:translate3d(100%,0,0);transform:translate3d(100%,0,0);}100%{opacity:1;-webkit-transform:none;transform:none;}}
         @keyframes fadeInRight{0%{opacity:0;-webkit-transform:translate3d(100%,0,0);transform:translate3d(100%,0,0);}100%{opacity:1;-webkit-transform:none;transform:none;}}
         @-webkit-keyframes zoomIn{0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3);}50%{opacity:1;}}
         @keyframes zoomIn{0%{opacity:0;-webkit-transform:scale3d(.3,.3,.3);transform:scale3d(.3,.3,.3);}50%{opacity:1;}}
         /*! CSS Used fontfaces */

 }
         @font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/mem6YaGs126MiZpBA-UFUK0Udc1UAw.woff2) format('woff2');unicode-range:U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;}
         @font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/mem6YaGs126MiZpBA-UFUK0ddc1UAw.woff2) format('woff2');unicode-range:U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;}
         @font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/mem6YaGs126MiZpBA-UFUK0Vdc1UAw.woff2) format('woff2');unicode-range:U+1F00-1FFF;}
         @font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/mem6YaGs126MiZpBA-UFUK0adc1UAw.woff2) format('woff2');unicode-range:U+0370-03FF;}
         @font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/mem6YaGs126MiZpBA-UFUK0Wdc1UAw.woff2) format('woff2');unicode-range:U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;}
         @font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/mem6YaGs126MiZpBA-UFUK0Xdc1UAw.woff2) format('woff2');unicode-range:U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;}
         @font-face{font-family:'Open Sans';font-style:italic;font-weight:400;src:local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/mem6YaGs126MiZpBA-UFUK0Zdc0.woff2) format('woff2');unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:300;src:local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN_r8OX-hpOqc.woff2) format('woff2');unicode-range:U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:300;src:local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN_r8OVuhpOqc.woff2) format('woff2');unicode-range:U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:300;src:local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN_r8OXuhpOqc.woff2) format('woff2');unicode-range:U+1F00-1FFF;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:300;src:local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN_r8OUehpOqc.woff2) format('woff2');unicode-range:U+0370-03FF;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:300;src:local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN_r8OXehpOqc.woff2) format('woff2');unicode-range:U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:300;src:local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN_r8OXOhpOqc.woff2) format('woff2');unicode-range:U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:300;src:local('Open Sans Light'), local('OpenSans-Light'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN_r8OUuhp.woff2) format('woff2');unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFWJ0bbck.woff2) format('woff2');unicode-range:U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFUZ0bbck.woff2) format('woff2');unicode-range:U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFWZ0bbck.woff2) format('woff2');unicode-range:U+1F00-1FFF;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFVp0bbck.woff2) format('woff2');unicode-range:U+0370-03FF;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFWp0bbck.woff2) format('woff2');unicode-range:U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFW50bbck.woff2) format('woff2');unicode-range:U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:400;src:local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFVZ0b.woff2) format('woff2');unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UNirkOX-hpOqc.woff2) format('woff2');unicode-range:U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UNirkOVuhpOqc.woff2) format('woff2');unicode-range:U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UNirkOXuhpOqc.woff2) format('woff2');unicode-range:U+1F00-1FFF;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UNirkOUehpOqc.woff2) format('woff2');unicode-range:U+0370-03FF;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UNirkOXehpOqc.woff2) format('woff2');unicode-range:U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UNirkOXOhpOqc.woff2) format('woff2');unicode-range:U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:600;src:local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UNirkOUuhp.woff2) format('woff2');unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:700;src:local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN7rgOX-hpOqc.woff2) format('woff2');unicode-range:U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:700;src:local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN7rgOVuhpOqc.woff2) format('woff2');unicode-range:U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:700;src:local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN7rgOXuhpOqc.woff2) format('woff2');unicode-range:U+1F00-1FFF;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:700;src:local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN7rgOUehpOqc.woff2) format('woff2');unicode-range:U+0370-03FF;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:700;src:local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN7rgOXehpOqc.woff2) format('woff2');unicode-range:U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:700;src:local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN7rgOXOhpOqc.woff2) format('woff2');unicode-range:U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:700;src:local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN7rgOUuhp.woff2) format('woff2');unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:800;src:local('Open Sans ExtraBold'), local('OpenSans-ExtraBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN8rsOX-hpOqc.woff2) format('woff2');unicode-range:U+0460-052F, U+1C80-1C88, U+20B4, U+2DE0-2DFF, U+A640-A69F, U+FE2E-FE2F;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:800;src:local('Open Sans ExtraBold'), local('OpenSans-ExtraBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN8rsOVuhpOqc.woff2) format('woff2');unicode-range:U+0400-045F, U+0490-0491, U+04B0-04B1, U+2116;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:800;src:local('Open Sans ExtraBold'), local('OpenSans-ExtraBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN8rsOXuhpOqc.woff2) format('woff2');unicode-range:U+1F00-1FFF;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:800;src:local('Open Sans ExtraBold'), local('OpenSans-ExtraBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN8rsOUehpOqc.woff2) format('woff2');unicode-range:U+0370-03FF;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:800;src:local('Open Sans ExtraBold'), local('OpenSans-ExtraBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN8rsOXehpOqc.woff2) format('woff2');unicode-range:U+0102-0103, U+0110-0111, U+1EA0-1EF9, U+20AB;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:800;src:local('Open Sans ExtraBold'), local('OpenSans-ExtraBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN8rsOXOhpOqc.woff2) format('woff2');unicode-range:U+0100-024F, U+0259, U+1E00-1EFF, U+2020, U+20A0-20AB, U+20AD-20CF, U+2113, U+2C60-2C7F, U+A720-A7FF;}
        .hesab{color:#955;background-color:#e7e7e7;}
         @font-face{font-family:'Open Sans';font-style:normal;font-weight:800;src:local('Open Sans ExtraBold'), local('OpenSans-ExtraBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN8rsOUuhp.woff2) format('woff2');unicode-range:U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;}
      </style>
      <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   </head>
   <body>
      <div id="main-wrapper" class="hippo-offcanvas-wrapper hippo-offcanvas-left slide-in-on-top">

         <!-- fullWidthTwentyOne end -->
         <header class="header6">

            <!-- offcanvas-menu end -->
            <div class="offcanvas-pusher hippo-offcanvas-pusher">
               <div class="content-wrapper hippo-offcanvas-contents">
                  <nav class="navbar mega-menu navbar-default">
                     <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                           <a class="navbar-brand" href="index.html"><img style="max-width:100px" src="logo.png" alt=""></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                           <!-- /.head-social -->

                           <ul class="nav navbar-nav navbar-right main-nav">
                              <li class="active"><a href="#">Ana Səhifə</a></li>
                              <li><a href="prices.html">Paketlər</a></li>
                              <li><a href="#">Haqqımızda</a></li>
                              <li class="hesab"><a href="login.php">Hesab</a></li>

                              <?php if (!empty($user)) {  ?>
                                <a href="profile.php"><u>
                                    <?php echo $user."</u></a>  ";  ?>
                                    <a href="logout.php"><i class="fa fa-lg fa-sign-out"></i></a>

                                <?php }  ?>


                           </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                     </div>
                     <!-- /.container -->
                  </nav>
               </div>
               <!-- /.content-wrapper -->
            </div>
            <!-- .offcanvas-pusher -->
         </header>
         <!-- fullWidthTwentyOne start -->
         <section class="fullWidthTwentyOne pt-100">
            <div class="container">
               <div class="row">
                  <div class="col-sm-5">
                     <img class="img-responsive animated fadeInLeft" src="style/iphone-3.png" alt="">
                  </div>
                  <!-- /.col-md-5 -->
                  <div class="col-md-7">
                     <h2 class="animated fadeInRight">StarCoin Azerbaijan</h2>
                     <div class="row">
                        <div class="col-md-6">
                           <div class="feature-wrapper animated zoomIn">
                              <div class="feature-content clearfix">
                                 <i class="fa fa-lock"></i>
                                 <h3>Güvənli</h3>
                                 <p>Hesablarınız gizliyi şifrələmə ilə qorunur <br> Ödənişlər hesabınız üzərindən aparılır .</p>
                              </div>
                           </div>
                           <!-- /.feature-wrapper -->
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-md-6">
                           <div class="feature-wrapper animated zoomIn" data-wow-delay="250ms">
                              <div class="feature-content clearfix">
                                 <i class="fa fa-headphones"></i>
                                 <h3>Sərfəli</h3>
                                 <p>Oyun içindəki paketləri münasib  <br> qiymətə təqdim edirik</p>
                              </div>
                           </div>
                           <!-- /.feature-wrapper -->
                        </div>
                        <!-- /.col-md-6 -->
                     </div>
                     <!-- /.row -->
                     <div class="row">
                        <div class="col-md-6">
                           <div class="feature-wrapper animated zoomIn" data-wow-delay="500ms">
                              <div class="feature-content clearfix">
                                 <i class="fa fa-tint"></i>
                                 <h3>Sürətli</h3>
                                 <p>Ödəniş olunduqdan təsdiq olunduqda <br> 1 saat ərzində məbləğ balansınıza köcürülür</p>
                              </div>
                           </div>
                           <!-- /.feature-wrapper -->
                        </div>
                        <!-- /.col-md-6 -->
                        <div class="col-md-6">
                           <div class="feature-wrapper animated zoomIn" data-wow-delay="750ms">
                              <div class="feature-content clearfix">
                                 <i class="fa fa-thumbs-o-up"></i>
                                 <h3>Sadə və rahat</h3>
                                 <p>Milliön ödəniş terminalında birbaşa ödəmə<br> Çek vasitəsi ilə</p>
                              </div>
                           </div>
                           <!-- /.feature-wrapper -->
                        </div>
                        <!-- /.col-md-6 -->
                     </div>
                     <!-- /.row -->
                  </div>
                  <!-- /.col-md-7 -->
               </div>
               <!-- /.row -->
            </div>
            <!-- /.container -->
         </section>
         <!-- fullWidthTwentyOne end -->
      </div>
      <!-- /#page -->
      <!-- Javascript Files -->
      <div id="toTop"><i class="fa fa-angle-up"></i></div>
      <iframe scrolling="no" frameborder="0" allowtransparency="true" src="https://platform.twitter.com/widgets/widget_iframe.a600a62a1c92aa33bb89e73fa1e8b3b3.html?origin=http%3A%2F%2Flocalhost&amp;settingsEndpoint=https%3A%2F%2Fsyndication.twitter.com%2Fsettings" title="Twitter settings iframe" style="display: none;"></iframe><iframe scrolling="no" frameborder="0" allowtransparency="true" src="https://platform.twitter.com/widgets/widget_iframe.a600a62a1c92aa33bb89e73fa1e8b3b3.html?origin=http%3A%2F%2Flocalhost&amp;settingsEndpoint=https%3A%2F%2Fsyndication.twitter.com%2Fsettings" title="Twitter settings iframe" style="display: none;"></iframe>
      <div id="toTop"><i class="fa fa-angle-up"></i></div>
   </body>
</html>
