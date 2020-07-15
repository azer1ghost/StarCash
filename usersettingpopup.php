<?php
date_default_timezone_set('Asia/Baku');
session_start();
ob_start();
include 'config.php';
include 'function.php';

$token = $_SESSION['token'];

$adminsor=$db->prepare("select * from customer where customer_username=:login");
$adminsor->execute(array(
'login' => $_SESSION['user'.$token]));
$user = $_SESSION['user'.$token];
$say=$adminsor->rowCount();

  if($say==0){

      header("Location:login.php?durum=nolog");

      exit;

    }

if ($_POST['user'] != $user) {
    echo '<script type="text/javascript">  window.close();</script>';
  exit;
}

 $contentsor=$db->prepare("select * from `customer` where customer_username=:user");
 $contentsor->execute(array('user' => $user));
 $print=$contentsor->fetch(PDO::FETCH_ASSOC);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>admin Setting</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" >
  </head>
  <body>
    <!-- Bootstrap core CSS -->

<div class="container">
  <h2>Admin setting</h2>
    <form id="updateadmin" onsubmit="return false" >
      <input type="hidden" name="customer_id" value="<?php echo $print['customer_id'] ?>">
    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_name">Username*:</label>
          <input required type="text" class="form-control" placeholder="Enter Name" value="<?php echo $print['customer_username'] ?>" id="admin_name" name="username">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_surname">Ad*:</label>
          <input required type="text" class="form-control" placeholder="Adınızı daxil edin" value="<?php echo $print['customer_name'] ?>" id="admin_surname" name="name">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_login">Soyad*:</label>
          <input required type="text" class="form-control" placeholder="Soyadınızı daxil edin" value="<?php echo $print['customer_surname'] ?>" id="admin_login" name="surname">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_email">Əlaqə:</label>
          <input type="text" class="form-control" placeholder="Əlaqə vasitəsi daxil edin" value="<?php echo $print['customer_email'] ?>" id="admin_email" name="email">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_date">Doğum tarixi*:</label>
          <input required type="date" class="form-control" value="<?php echo $print['customer_birth'] ?>" id="admin_date" name="birth_date">
      </div>
    </div>


    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_password1">Şifrə:</label>
          <input type="password" class="form-control" placeholder="Yeni şifrəni yaz"  id="admin_password1" name="pass">
      </div>
    </div>

    <div class="col-md-6">
      <div class="form-group">
          <label for="admin_password2">Şifrənin təkrarı:</label>
          <input type="password" class="form-control" placeholder="Yeni şifrəni təkrar yaz"  id="admin_password2" name="pass">
      </div>
    </div>


        <button type="submit" class="btn btn-primary">Yadda saxla</button>

    </form>
  </div>
    <!-- js placed at the end of the document so the admins load faster -->

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>


            $('form').on('submit', function (e) {


              var pas1 = $('#admin_password1').val();
              var pas2 = $('#admin_password2').val();

              if (pas1 != pas2) {
                swal("Diqqət!", "Şifrələr eyni olmalıdır!", "warning");
                return false;
              }

              if (pas1 == pas2 & pas1 != "" & pas2 != "") {
                $.ajax({
                  type: 'post',
                  url: 'engine.php',
                  data: $('form').serialize() + "&userupdate=pass",
                  success: function () {
                    swal("Təbiklər!", "Məlumatların  uğurla dəyişdirildi!", "success");
                  }
                });
              }


              if ( pas1 == "" & pas2 == "") {

                $.ajax({
                  type: 'post',
                  url: 'engine.php',
                  data: $('form').serialize() + "&userupdate=ok",
                  success: function () {
                    swal("Təbiklər!", "Məlumatların  uğurla dəyişdirildi!", "success");
                  }
                });

              }
                e.preventDefault();
            });


        </script>

  </body>
</html>
