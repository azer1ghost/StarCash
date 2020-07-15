<?php
date_default_timezone_set('Asia/Baku');
session_start();
ob_start();
include 'config.php';
include 'function.php';

$token = $_SESSION['tokenadmin'];

$adminsor=$db->prepare("SELECT * from `admins` where admin_login=:login");
$adminsor->execute(array(
'login' => $_SESSION['admin'.$token]));
$user = $_SESSION['admin'.$token];
$say=$adminsor->rowCount();

  if($say==0){

      header("Location:adlogin.php?durum=nolog");

      exit;

    }

?>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Star Coin userpanel</title>
      <link rel="shortcut icon" href="favicon.ico">
      <link rel="stylesheet" href="style/font-awesome.min.css">


      <!-- Bootstrap core CSS -->
      <!-- Custom styles for this template -->
      <style>body{font-size:16px;}</style>
      <style>/*! CSS Used from: https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css */
         :root{--blue:#007bff;--indigo:#6610f2;--purple:#6f42c1;--pink:#e83e8c;--red:#dc3545;--orange:#fd7e14;--yellow:#ffc107;--green:#28a745;--teal:#20c997;--cyan:#17a2b8;--white:#fff;--gray:#6c757d;--gray-dark:#343a40;--primary:#007bff;--secondary:#6c757d;--success:#28a745;--info:#17a2b8;--warning:#ffc107;--danger:#dc3545;--light:#f8f9fa;--dark:#343a40;--breakpoint-xs:0;--breakpoint-sm:576px;--breakpoint-md:768px;--breakpoint-lg:992px;--breakpoint-xl:1200px;--font-family-sans-serif:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";--font-family-monospace:SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;}
         *,::after,::before{box-sizing:border-box;}
         html{font-family:sans-serif;line-height:1.15;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;-ms-overflow-style:scrollbar;-webkit-tap-highlight-color:transparent;}
         main,nav{display:block;}
         body{margin:0;font-family:-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol";font-size:1rem;font-weight:400;line-height:1.5;color:#212529;text-align:left;background-color:#fff;}
         h1,h2,h6{margin-top:0;margin-bottom:.5rem;}
         ul{margin-top:0;margin-bottom:1rem;}
         a{color:#007bff;text-decoration:none;background-color:transparent;-webkit-text-decoration-skip:objects;}
         a:hover{color:#0056b3;text-decoration:underline;}
         svg:not(:root){overflow:hidden;}
         table{border-collapse:collapse;}
         th{text-align:inherit;}
         button{border-radius:0;}
         button:focus{outline:1px dotted;outline:5px auto -webkit-focus-ring-color;}
         button,input{margin:0;font-family:inherit;font-size:inherit;line-height:inherit;}
         button,input{overflow:visible;}
         button{text-transform:none;}
         button{-webkit-appearance:button;}
         button::-moz-focus-inner{padding:0;border-style:none;}
         .h2,h1,h2,h6{margin-bottom:.5rem;font-family:inherit;font-weight:500;line-height:1.2;color:inherit;}
         h1{font-size:2.5rem;}
         .h2,h2{font-size:2rem;}
         h6{font-size:1rem;}
         .container-fluid{width:100%;padding-right:15px;padding-left:15px;margin-right:auto;margin-left:auto;}
         .row{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-right:-15px;margin-left:-15px;}
         .col-lg-10,.col-md-2,.col-md-9,.col-sm-3{position:relative;width:100%;min-height:1px;padding-right:15px;padding-left:15px;}
         @media (min-width:576px){
         .col-sm-3{-webkit-box-flex:0;-ms-flex:0 0 25%;flex:0 0 25%;max-width:25%;}
         }
         @media (min-width:768px){
         .col-md-2{-webkit-box-flex:0;-ms-flex:0 0 16.666667%;flex:0 0 16.666667%;max-width:16.666667%;}
         .col-md-9{-webkit-box-flex:0;-ms-flex:0 0 75%;flex:0 0 75%;max-width:75%;}
         }
         @media (min-width:992px){
         .col-lg-10{-webkit-box-flex:0;-ms-flex:0 0 83.333333%;flex:0 0 83.333333%;max-width:83.333333%;}
         }
         .table{width:100%;max-width:100%;margin-bottom:1rem;background-color:transparent;}
         .table td,.table th{padding:.75rem;vertical-align:top;border-top:1px solid #dee2e6;}
         .table thead th{vertical-align:bottom;border-bottom:2px solid #dee2e6;}
         .table-sm td,.table-sm th{padding:.3rem;}
         .table-striped tbody tr:nth-of-type(odd){background-color:rgba(0,0,0,.05);}
         .table-responsive{display:block;width:100%;overflow-x:auto;-webkit-overflow-scrolling:touch;-ms-overflow-style:-ms-autohiding-scrollbar;}
         .form-control{display:block;width:100%;padding:.375rem .75rem;font-size:1rem;line-height:1.5;color:#495057;background-color:#fff;background-clip:padding-box;border:1px solid #ced4da;border-radius:.25rem;transition:border-color .15s ease-in-out,box-shadow .15s ease-in-out;}
         .form-control::-ms-expand{background-color:transparent;border:0;}
         .form-control:focus{color:#495057;background-color:#fff;border-color:#80bdff;outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25);}
         .form-control::-webkit-input-placeholder{color:#6c757d;opacity:1;}
         .form-control::-moz-placeholder{color:#6c757d;opacity:1;}
         .form-control:-ms-input-placeholder{color:#6c757d;opacity:1;}
         .form-control::-ms-input-placeholder{color:#6c757d;opacity:1;}
         .form-control::placeholder{color:#6c757d;opacity:1;}
         .form-control:disabled{background-color:#e9ecef;opacity:1;}
         .btn{display:inline-block;font-weight:400;text-align:center;white-space:nowrap;vertical-align:middle;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;border:1px solid transparent;padding:.375rem .75rem;font-size:1rem;line-height:1.5;border-radius:.25rem;transition:color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;}
         .btn:focus,.btn:hover{text-decoration:none;}
         .btn:focus{outline:0;box-shadow:0 0 0 .2rem rgba(0,123,255,.25);}
         .btn:disabled{opacity:.65;}
         .btn:not(:disabled):not(.disabled){cursor:pointer;}
         .btn-outline-secondary{color:#6c757d;background-color:transparent;background-image:none;border-color:#6c757d;}
         .btn-outline-secondary:hover{color:#fff;background-color:#6c757d;border-color:#6c757d;}
         .btn-outline-secondary:focus{box-shadow:0 0 0 .2rem rgba(108,117,125,.5);}
         .btn-outline-secondary:disabled{color:#6c757d;background-color:transparent;}
         .btn-sm{padding:.25rem .5rem;font-size:.875rem;line-height:1.5;border-radius:.2rem;}
         .dropdown-toggle::after{display:inline-block;width:0;height:0;margin-left:.255em;vertical-align:.255em;content:"";border-top:.3em solid;border-right:.3em solid transparent;border-bottom:0;border-left:.3em solid transparent;}
         .dropdown-toggle:empty::after{margin-left:0;}
         .btn-group{position:relative;display:-webkit-inline-box;display:-ms-inline-flexbox;display:inline-flex;vertical-align:middle;}
         .btn-group>.btn{position:relative;-webkit-box-flex:0;-ms-flex:0 1 auto;flex:0 1 auto;}
         .btn-group>.btn:hover{z-index:1;}
         .btn-group>.btn:active,.btn-group>.btn:focus{z-index:1;}
         .btn-group .btn+.btn{margin-left:-1px;}
         .btn-toolbar{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-pack:start;-ms-flex-pack:start;justify-content:flex-start;}
         .btn-group>.btn:first-child{margin-left:0;}
         .btn-group>.btn:not(:last-child):not(.dropdown-toggle){border-top-right-radius:0;border-bottom-right-radius:0;}
         .btn-group>.btn:not(:first-child){border-top-left-radius:0;border-bottom-left-radius:0;}
         .nav{display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;padding-left:0;margin-bottom:0;list-style:none;}
         .nav-link{display:block;padding:.5rem 1rem;}
         .nav-link:focus,.nav-link:hover{text-decoration:none;}
         .navbar{position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-align:center;-ms-flex-align:center;align-items:center;-webkit-box-pack:justify;-ms-flex-pack:justify;justify-content:space-between;padding:.5rem 1rem;}
         .navbar-brand{display:inline-block;padding-top:.3125rem;padding-bottom:.3125rem;margin-right:1rem;font-size:1.25rem;line-height:inherit;white-space:nowrap;}
         .navbar-brand:focus,.navbar-brand:hover{text-decoration:none;}
         .navbar-nav{display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;padding-left:0;margin-bottom:0;list-style:none;}
         .navbar-nav .nav-link{padding-right:0;padding-left:0;}
         .navbar-dark .navbar-brand{color:#fff;}
         .navbar-dark .navbar-brand:focus,.navbar-dark .navbar-brand:hover{color:#fff;}
         .navbar-dark .navbar-nav .nav-link{color:rgba(255,255,255,.5);}
         .navbar-dark .navbar-nav .nav-link:focus,.navbar-dark .navbar-nav .nav-link:hover{color:rgba(255,255,255,.75);}
         .bg-light{background-color:#f8f9fa!important;}
         .bg-dark{background-color:#343a40!important;}
         .border-bottom{border-bottom:1px solid #dee2e6!important;}
         .d-none{display:none!important;}
         .d-flex{display:-webkit-box!important;display:-ms-flexbox!important;display:flex!important;}
         @media (min-width:768px){
         .d-md-block{display:block!important;}
         }
         .flex-column{-webkit-box-orient:vertical!important;-webkit-box-direction:normal!important;-ms-flex-direction:column!important;flex-direction:column!important;}
         .flex-wrap{-ms-flex-wrap:wrap!important;flex-wrap:wrap!important;}
         .justify-content-between{-webkit-box-pack:justify!important;-ms-flex-pack:justify!important;justify-content:space-between!important;}
         .align-items-center{-webkit-box-align:center!important;-ms-flex-align:center!important;align-items:center!important;}
         @media (min-width:768px){
         .flex-md-nowrap{-ms-flex-wrap:nowrap!important;flex-wrap:nowrap!important;}
         }
         .sr-only{position:absolute;width:1px;height:1px;padding:0;overflow:hidden;clip:rect(0,0,0,0);white-space:nowrap;-webkit-clip-path:inset(50%);clip-path:inset(50%);border:0;}
         .w-100{width:100%!important;}
         .mr-0{margin-right:0!important;}
         .mb-1{margin-bottom:.25rem!important;}
         .mr-2{margin-right:.5rem!important;}
         .mb-2{margin-bottom:.5rem!important;}
         .mb-3{margin-bottom:1rem!important;}
         .mt-4,.my-4{margin-top:1.5rem!important;}
         .my-4{margin-bottom:1.5rem!important;}
         .p-0{padding:0!important;}
         .pb-2{padding-bottom:.5rem!important;}
         .pt-3{padding-top:1rem!important;}
         .px-3{padding-right:1rem!important;}
         .px-3{padding-left:1rem!important;}
         .px-4{padding-right:1.5rem!important;}
         .px-4{padding-left:1.5rem!important;}
         @media (min-width:576px){
         .ml-sm-auto{margin-left:auto!important;}
         }
         @media (min-width:768px){
         .mb-md-0{margin-bottom:0!important;}
         }
         .text-nowrap{white-space:nowrap!important;}
         .text-muted{color:#6c757d!important;}
         @media print{
         *,::after,::before{text-shadow:none!important;box-shadow:none!important;}
         a:not(.btn){text-decoration:underline;}
         thead{display:table-header-group;}
         tr{page-break-inside:avoid;}
         h2{orphans:3;widows:3;}
         h2{page-break-after:avoid;}
         body{min-width:992px!important;}
         .navbar{display:none;}
         .table{border-collapse:collapse!important;}
         .table td,.table th{background-color:#fff!important;}
         }
         /*! CSS Used from: https://getbootstrap.com/docs/4.0/examples/dashboard/dashboard.css */
         body{font-size:.875rem;}
         .feather{width:16px;height:16px;vertical-align:text-bottom;}
         .sidebar{position:fixed;top:0;bottom:0;left:0;z-index:100;padding:0;box-shadow:inset -1px 0 0 rgba(0, 0, 0, .1);}
         .sidebar-sticky{position:-webkit-sticky;position:sticky;top:48px;height:calc(100vh - 48px);padding-top:.5rem;overflow-x:hidden;overflow-y:auto;}
         .sidebar .nav-link{font-weight:500;color:#333;}
         .sidebar .nav-link .feather{margin-right:4px;color:#999;}
         .sidebar .nav-link.active{color:#007bff;}
         .sidebar .nav-link:hover .feather,.sidebar .nav-link.active .feather{color:inherit;}
         .sidebar-heading{font-size:.75rem;text-transform:uppercase;}
         .navbar-brand{padding-top:.75rem;padding-bottom:.75rem;font-size:1rem;background-color:rgba(0, 0, 0, .25);box-shadow:inset -1px 0 0 rgba(0, 0, 0, .25);}
         .navbar .form-control{padding:.75rem 1rem;border-width:0;border-radius:0;}
         .form-control-dark{color:#fff;background-color:rgba(255, 255, 255, .1);border-color:rgba(255, 255, 255, .1);}
         .form-control-dark:focus{border-color:transparent;box-shadow:0 0 0 3px rgba(255, 255, 255, .25);}
         .border-bottom{border-bottom:1px solid #e5e5e5;}
         /*! CSS Used from: Embedded */
         .chartjs-render-monitor{-webkit-animation:chartjs-render-animation 0.001s;animation:chartjs-render-animation 0.001s;}
         /*! CSS Used keyframes */
         @-webkit-keyframes chartjs-render-animation{from{opacity:0.99;}to{opacity:1;}}
         @keyframes chartjs-render-animation{from{opacity:0.99;}to{opacity:1;}}
        .button{background-color:#4CAF50;border:none;color:white;padding:8px 20px;text-align:center;text-decoration:none;display:inline-block;font-size:13px;margin:4px 2px;-webkit-transition-duration:0.4s;transition-duration:0.4s;cursor:pointer;border-radius:7px;}
        .button1{background-color:white;color:black;border:2px solid #4CAF50;}
        .button1:hover{background-color:#4CAF50;color:white;}
        .button2 {background-color: white;color: black;border: 2px solid red;}
        .button2:hover{background-color:red;color:white;}
        .button3 {background-color: white;color: black;border: 2px solid #fff;}
        .button3:hover{background-color:#fff;color:white;}

    </style>
   </head>
   <body>
      <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
         <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Star Coin</a>

         <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
               <a class="nav-link" href="logout.php">Çıxış</a>
            </li>
         </ul>
      </nav>
      <div class="container-fluid">
         <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">

              <h2 style="padding:10px;font-size:22px;border-bottom:solid 1px  blue;">
                  <?php echo $user ?>
              </h2>

               <div class="sidebar-sticky">
                  <ul class="nav flex-column">
                    <!--
                     <li class="nav-item">
                        <a class="nav-link " href="#">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                              <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                              <polyline points="9 22 9 12 15 12 15 22"></polyline>
                           </svg>
                           Ana Səhifə <span class="sr-only">(current)</span>
                        </a>
                     </li> -->

                     <li class="nav-item">
                        <a class="nav-link active" href="admin.php">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file">
                              <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                              <polyline points="13 2 13 9 20 9"></polyline>
                           </svg>
                           Sifarişlərim
                        </a>
                     </li>
<!--
                     <li class="nav-item">
                        <a class="nav-link" href="#">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">
                              <circle cx="9" cy="21" r="1"></circle>
                              <circle cx="20" cy="21" r="1"></circle>
                              <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                           </svg>
                           Star Market
                        </a>
                     </li>
-->
                     <li class="nav-item">
                        <a class="nav-link" href="users.php">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
                              <line x1="18" y1="20" x2="18" y2="10"></line>
                              <line x1="12" y1="20" x2="12" y2="4"></line>
                              <line x1="6" y1="20" x2="6" y2="14"></line>
                           </svg>
                           İstifadəçilər
                        </a>
                     </li>

                     <li class="nav-item">
                        <a class="nav-link" href="comments.php">
                           <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart-2">
                              <line x1="18" y1="20" x2="18" y2="10"></line>
                              <line x1="12" y1="20" x2="12" y2="4"></line>
                              <line x1="6" y1="20" x2="6" y2="14"></line>
                           </svg>
                           Şikayətlər
                        </a>
                     </li>


                  </ul>
               </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
               <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                  <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                     <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                     <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                  </div>
               </div>
               <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
                  <h1 class="h2">Əməliyatlar</h1>

                  <!--
                  <div class="btn-toolbar mb-2 mb-md-0">
                     <div class="btn-group mr-2">
                        <button class="btn btn-sm btn-outline-secondary">Share</button>
                        <button class="btn btn-sm btn-outline-secondary">Export</button>
                     </div>
                  </div> -->
               </div>


               <div class="table-responsive">
                  <table class="table table-striped table-sm">

                    <?php $ordersor=$db->prepare("SELECT * from orders Where order_durum!='Gözləmədə' order by order_id DESC");
                          $ordersor->execute(array()); $n=0;
                          $valuye=$ordersor->rowCount();
                          if ($valuye == null){ ?>

                           <tr>
                             <td>Hal hazırda heç bir sifarişiniz yoxdur</td>
                           </tr>

                    <?php } else{ ?>

                     <thead>
                        <tr>
                           <th>№</th>
                           <th>Sifarişçi</th>
                           <th>Tarix</th>
                           <th>Paket adı</th>
                           <th>Qiyməti</th>
                           <th>Vəziyyət</th>
                           <th></th>
                           <th>Təsdiq</th>
                        </tr>
                     </thead>
                     <tbody>


                     <?php } while($ordercek=$ordersor->fetch(PDO::FETCH_ASSOC)){ $n++;  ?>


                       <div class="time"  style="display:none">
                         <?php echo $ordercek['order_time'] ?>
                       </div>

                        <tr>
                           <td><?php echo $n; ?></td>
                           <td><?php echo $ordercek['order_username']; ?></td>
                           <td><?php echo $ordercek['order_datetime']; ?></td>
                           <td><?php echo $ordercek['order_name']; ?></td>
                           <th><?php echo $ordercek['order_price']; ?> AZN</th>
                           <td><?php echo $ordercek['order_durum']; ?></td>
                           <td><button onclick="ShowCheck('uploads/<?php echo $ordercek['order_imgurl']; ?>')" class="button button1">BAX</button></td>
                        <?php if ($ordercek['order_durum'] != "Tamamlandı"): ?>
                           <td><button onclick="CheckOrder(<?php echo $ordercek['order_id']; ?> , 'ok')" class="button button1">Təsdiq et</button></td>
                        <?php endif; ?>
                           <td><button onclick="CheckOrder(<?php echo $ordercek['order_id']; ?> , 'cancel')" class="button button2">Ləğv et</button></td>
                       </tr>

                      <?php } ?>

                     </tbody>
                  </table>
               </div>
            </main>
         </div>
      </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<script type="text/javascript">

function CheckOrder(id, type){

if (type === 'cancel') {
  swal({
    content: {
    element: "textarea",
    attributes: {
      placeholder: "mesajınızı yazın",
      style: "width:90%",
      id: "order_message"
    }
  }
}).then(function(result){
  var order_message = $('#order_message').val()
  sendPost(id, type, order_message)
})



} else{

  sendPost(id, type, "none")

}



}



function sendPost(id, type, message){
  $.ajax({
      type: 'post',
      url: 'engine.php',
      data: {
            ordersubmitter: type,
            order_id: id,
            order_message: message
      }, // serializes the form's elements.
      success: function() {
        if (type === 'ok') {
          swal("Təsdiq olundu", {icon: "success"}).then(function(result){
            window.location.reload()
          })
        } else {
          swal("Ləğv olundu", {icon: "info"}).then(function(result){
            window.location.reload()
          })
        }
      }
  })
}





function ShowCheck(imgUrl){
  swal({
    content: {
    element: "img",
    attributes: {
      src: imgUrl,
      style: "width:60%",
    },
  },
  })
}


<?php

if (!empty($_GET['order_id'])) {

$order_id = $_GET['order_id'];  ?>

var user = "<?php echo $user; ?>";
var order_id = <?php echo $order_id; ?>;
swal({
        title: "Yeni Sifariş?",
        text: "Yeni sifariş əlavə edirsiniz. Sifarişi ödəmədikdə 48 saat ərzində avtomatik olaraq silinəcək",
        icon: "warning",
        buttons: ["Ləğv et!", true],
    })
    .then((willOK) => {
        if (willOK) {
            $.ajax({
                type: 'post',
                url: 'engine.php',
                data: {
                    order_username: user,
                    neworder: 'ok',
                    order_id: order_id
                }, // serializes the form's elements.
                success: function() {
                    swal("Artıq bir sifariş verdiniz. Ödənişi necə etməyinizi bilmək istəyirsinizsə düyməyə toxun", {
                        icon: "success",
                    }).then(() => {
                        popitup('tutorial.html');
                        window.location.replace(location.pathname);
                    });
                }
            });

        } else {
            swal("Sifariş ləğv olundu!");
        }
    });

<?php }?>
function openWindowWithPostRequest(id) {
      var winName='Setting';
      var winURL='usersettingpopup.php';
      var windowoption='resizable=yes,height=500,width=800,location=0,menubar=0,scrollbars=1';
      var params = { 'user' : id};
      var form = document.createElement("form");
      form.setAttribute("method", "post");
      form.setAttribute("action", winURL);
      form.setAttribute("target",winName);
      for (var i in params) {
        if (params.hasOwnProperty(i)) {
          var input = document.createElement('input');
          input.type = 'hidden';
          input.name = i;
          input.value = params[i];
          form.appendChild(input);
        }
      }
      document.body.appendChild(form);
      window.open('', winName,windowoption);
      form.target = winName;
      form.submit();
      document.body.removeChild(form);
    }

/////////////////////////////////////////////////////////////////////////////////////////////////
// setting change ajax post popub window
function paymentWindow(id) {
      var winName='Setting';
      var winURL='payment.php';
      var windowoption='resizable=yes,height=700,width=800,location=0,menubar=0,scrollbars=1';
      var params = {'order_id' : id};
      var form = document.createElement("form");
      form.setAttribute("method", "post");
      form.setAttribute("action", winURL);
      form.setAttribute("target",winName);
      for (var i in params) {
        if (params.hasOwnProperty(i)) {
          var input = document.createElement('input');
          input.type = 'hidden';
          input.name = i;
          input.value = params[i];
          form.appendChild(input);
        }
      }
      document.body.appendChild(form);
      var win = window.open('', winName,windowoption);
      form.target = winName;
      form.submit();
      document.body.removeChild(form);


      var timer = setInterval(function() {
          if(win.closed) {
              clearInterval(timer);
              window.location.replace(location.pathname);
          }
      }, 100);
    }
/////////////////////////////////////////////////////////////////////////////////////////////////



/////////////////////////////////////////////////////////////////////////////////////////////////

function removeOrder(order_id){
   swal({
     html:true,
     title: "Tamamlanmamış sifariş silmə?",
     text: "Sifarişi daha sonra yenidən həyata keçirə bilərsiniz!",
     icon: "warning",
     buttons: true,
     dangerMode: true,
   })
   .then((willDelete) => {
     if (willDelete) {
       ordelete(order_id);
     } else {
       swal("Sifarişinizi silmədiniz!");
     }
   });
}




//----------------------------------------------------------------------------//

function ordelete(id){

$.ajax({
       type: "POST",
       url: "engine.php",
       data: {order_id: id, orderdelete: 'ok'}, // serializes the form's elements.
       success: function ()
       {
         swal("Poof! Ödənilməmiş sifarişiniz silindi!", {
           icon: "success",
         }).then(function(result){
           window.location.reload();
        })

       }
     });
}

//--------------------------------------------------------------------------------

function popitup(url) {
        newwindow=window.open(url,'name','height=600,width=800');
        if (window.focus) {newwindow.focus()}
        return false;
    }



</script>



   </body>
</html>
