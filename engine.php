<?php
session_start();
ob_start();
date_default_timezone_set('Asia/Baku');
$date = date("Y-m-d H:i");

include 'config.php';
include 'function.php';

// username control edirem eger varsa parol hisesine gonderirem
if ($_POST['account'] == 'control') {

  $username = htmlspecialchars(trim($_POST['username']));
  $sorgu=$db->prepare("SELECT * from customer WHERE customer_username=:usname");

  $sorgu->execute(array(
    'usname'=>$username
  ));

  $say=$sorgu->rowCount();

  if ($say>0) {

    $_SESSION['usernoncheck'] = $username;
    $order_id = $_SESSION['order_id'];
    GoToUrl ("login.php", "order_id=$order_id&durum=hesabvar");

  } else{

    $order_id = $_SESSION['order_id'];
    GoToUrl ("register.php", "order_id=$order_id");

  }

}



// parol duzduse onda girise icaze verirem
if ($_POST['passcheck'] == 'check') {

  $username = $_SESSION['usernoncheck'];
  $pass = htmlspecialchars(trim($_POST['pass']));

  $sorgu=$db->prepare("SELECT * from customer WHERE customer_username=:usname and customer_pass=:pass");

  $sorgu->execute(array(
    'usname'=>$username,
    'pass'=>$pass
  ));

  $say=$sorgu->rowCount();

  if ($say>0) {

    $order_id = $_SESSION['order_id'];

    $token = rand(1000000, 9999999);
    $_SESSION['token'] = $token;


    $_SESSION['user'.$token] = $username;

    GoToUrl ("profile.php", "order_id=$order_id");
    unset ($_SESSION['order_id']);


  }else {

    session_destroy();
    header("Location:homepage.php?durum=exit");

  }

}


// teze nick register etmek ucun kod (eyni zamanda niki yoxayir eger varsa parolu isteyir)
if ($_POST['account'] == 'addnewacc') {

  $name = htmlspecialchars(trim($_POST['name']));
  $surname = htmlspecialchars(trim($_POST['surname']));
  $email = htmlspecialchars(trim($_POST['email']));
  $birth_date = htmlspecialchars(trim($_POST['birth_date']));
  $username = htmlspecialchars(trim($_POST['username']));
  $pass = htmlspecialchars(trim($_POST['pass']));


  $sorgu=$db->prepare("SELECT * from customer WHERE customer_username=:usname");

  $sorgu->execute(array(
    'usname'=>$username
  ));

  $say=$sorgu->rowCount();

  if ($say>0) {

    $_SESSION['usernoncheck'] = $username;

    $link = "login.php";
    $get = "durum=hesabvar";
    GoToUrl ($link, $get);

}else {

    $save=$db->prepare("INSERT INTO customer SET   	#tablo adi
  	 #sutun adi--> leqebi
  		customer_name=:a,
  		customer_surname=:b,
  		customer_email=:c,
      customer_birth=:d,
      customer_username=:e,
      customer_pass=:f,
      customer_date=:g ");
  	$insert=$save->execute(array(
  	 #sutun leqebi --> adi
  		'a'=>$name,
  		'b'=>$surname,
      'c'=>$email,
      'd'=>$birth_date,
      'e'=>$username,
      'f'=>$pass,
      'g'=>$date
  		 ));

    if ($insert) {

         $_SESSION['user'] = $username;
         GoToUrl ("profile.php", "welcome=ok" );
       }

     }

}



##########################  new order ##########################################
if ($_POST['neworder'] == "ok") {

$order_username = $_POST['order_username'];
$order_pack_id = $_POST['order_id'];


$packsor=$db->prepare("SELECT * FROM `packs` WHERE pack_id=:id");
$packsor->execute(array('id'=>$order_pack_id));
$packcek=$packsor->fetch(PDO::FETCH_ASSOC);


$save=$db->prepare("INSERT INTO orders SET   	#tablo adi
#sutun adi--> leqebi
	order_pack_id=:a,
	order_username=:b,
  order_name=:c,
  order_price=:e,
  order_durum=:h,
	order_datetime=:d
	");
$save->execute(array(
 #sutun leqebi --> adi
	'a'=>$order_pack_id,
	'b'=>$order_username,
  'c'=>$packcek['pack_name'],
  'e'=>$packcek['pack_price'],
  'h'=>"Gözləmədə",
	'd'=>$date
	));
}



##########################  delete order ##########################################
if ($_POST['orderdelete']=="ok"){	            #sil duymesinden gelen ad

	$sil=$db->prepare("DELETE from orders where order_id=:id"); #ne silinecek
	$sil->execute(array('id' => $_POST['order_id']));	#ne silinecek hardan

}




#######################################################################
##########################  cek yukle  ##########################
if (isset($_POST['cekgonder'])) {          #duyme adi

  if(isset($_FILES['image'])){
        $errors= array();
        $a = rand(255, 999);
        $b = rand(100, 255);
        $file_name = $a.$b.$_FILES['image']['name'];
        $file_size =$_FILES['image']['size'];
        $file_tmp =$_FILES['image']['tmp_name'];
        $file_type=$_FILES['image']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

        $extensions= array("jpeg","jpg","png");

        if(in_array($file_ext,$extensions)=== false){
           $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 2097152){
           $errors[]='File yaddaşı maksumum 2 MB ola bilər';
        }

        if(empty($errors)==true){
           move_uploaded_file($file_tmp,"uploads/".$file_name);
           echo "Tamamlandı <button onclick='window.close();'>Bağla</button>";

             $save=$db->prepare("UPDATE orders SET  #tablo adi

             #sutun adi--> leqebi
             order_durum=:a,
             order_verifytime=:c,
             order_imgurl=:b


             WHERE order_id={$_POST['order_id']}");
             $update=$save->execute(array(
              #sutun leqebi --> adi
             'a'=>'Yoxlamada',
             'c'=>$date,
             'b'=>$file_name
              ));

        }else{
           print_r($errors);
        }
     }


}
################################################################################################
//---------------------------------------------------------------------//





// teze nick register etmek ucun kod (eyni zamanda niki yoxayir eger varsa parolu isteyir)
if ($_POST['userupdate'] == 'ok') {

  $name = htmlspecialchars(trim($_POST['name']));
  $surname = htmlspecialchars(trim($_POST['surname']));
  $email = htmlspecialchars(trim($_POST['email']));
  $birth_date = htmlspecialchars(trim($_POST['birth_date']));
  $username = htmlspecialchars(trim($_POST['username']));

   $save=$db->prepare("UPDATE customer SET  #tablo adi

   #sutun adi--> leqebi
   customer_name=:a,
   customer_surname=:b,
   customer_email=:c,
   customer_birth=:d,
   customer_username=:e

   WHERE customer_id={$_POST['customer_id']}");
   $update=$save->execute(array(
    #sutun leqebi --> adi
    'a'=>$name,
    'b'=>$surname,
    'c'=>$email,
    'd'=>$birth_date,
    'e'=>$username
    ));

} elseif ($_POST['userupdate'] == 'pass') {
  $name = htmlspecialchars(trim($_POST['name']));
  $surname = htmlspecialchars(trim($_POST['surname']));
  $email = htmlspecialchars(trim($_POST['email']));
  $birth_date = htmlspecialchars(trim($_POST['birth_date']));
  $username = htmlspecialchars(trim($_POST['username']));
  $pass = htmlspecialchars(trim($_POST['pass']));

  $save=$db->prepare("UPDATE customer SET  #tablo adi

  #sutun adi--> leqebi
  customer_name=:a,
  customer_surname=:b,
  customer_email=:c,
  customer_birth=:d,
  customer_username=:e,
  customer_pass=:f


  WHERE customer_id={$_POST['customer_id']}");
  $update=$save->execute(array(
   #sutun leqebi --> adi
   'a'=>$name,
   'b'=>$surname,
   'c'=>$email,
   'd'=>$birth_date,
   'e'=>$username,
   'f'=>$pass
   ));
}


// parol duzduse onda girise icaze verirem
if ($_POST['admin'] == 'login') {

  $username = htmlspecialchars(trim($_POST['admin_username']));
  $pass = md5(htmlspecialchars(trim($_POST['pass'])));

  $sorgu=$db->prepare("SELECT * from admins WHERE admin_login=:usname and admin_pass=:pass");

  $sorgu->execute(array(
    'usname'=>$username,
    'pass'=>$pass
  ));

  $say=$sorgu->rowCount();

  if ($say>0) {


    $token = rand(1000000, 9999999);
    $_SESSION['tokenadmin'] = $token;


    $_SESSION['admin'.$token] = $username;

    GoToUrl ("admin.php", "#");


  }else {

    session_destroy();
    header("Location:adlogin.php?durum=no");

  }

}



if ($_POST['ordersubmitter'] == 'ok') {

  $order_id= htmlspecialchars(trim($_POST['order_id']));

  $save=$db->prepare("UPDATE `orders` SET  #tablo adi

   #sutun adi--> leqebi
   order_durum=:a

   WHERE order_id={$order_id}");
   $update=$save->execute(array(
    #sutun leqebi --> adi
    'a'=>"Tamamlandı"
    ));

}elseif ($_POST['ordersubmitter'] == 'cancel') {

    $order_id= htmlspecialchars(trim($_POST['order_id']));
    $order_message= htmlspecialchars(trim($_POST['order_message']));

    $save=$db->prepare("UPDATE `orders` SET  #tablo adi

     #sutun adi--> leqebi
     order_durum=:a,
     order_message=:b

     WHERE order_id={$order_id}");
     $update=$save->execute(array(
      #sutun leqebi --> adi
      'a'=>"Ləğv olunub",
      'b'=>$order_message
      ));

}





##########################  new subcommnet ##########################################
if ($_POST['sub_comment_reciver'] == "ok") {

  $token = $_SESSION['token'];

  $adminsor=$db->prepare("select * from customer where customer_username=:login");
  $adminsor->execute(array(
  'login' => $_SESSION['user'.$token]));
  $user = $_SESSION['user'.$token];


$sub_message= htmlspecialchars(trim($_POST['sub_message']));
$sub_username = $user;
$sub_comment_id = $_POST['sub_comment_id'];

$save=$db->prepare("INSERT INTO subcomment SET   	#tablo adi
#sutun adi--> leqebi
	sub_message=:a,
	sub_username=:b,
  sub_date=:c,
  sub_comment_id=:d
	");
$save->execute(array(
 #sutun leqebi --> adi
	'a'=>$sub_message,
	'b'=>$sub_username,
	'c'=>$date,
  'd'=>$sub_comment_id
	));
}




##########################  new subcommnet ##########################################
if ($_POST['main_comment_reciver'] == "ok") {

  $token = $_SESSION['token'];

  $adminsor=$db->prepare("select * from customer where customer_username=:login");
  $adminsor->execute(array(
  'login' => $_SESSION['user'.$token]));
  $user = $_SESSION['user'.$token];


$com_message= htmlspecialchars(trim($_POST['com_message']));
$com_username = $user;

$save=$db->prepare("INSERT INTO comments SET   	#tablo adi
#sutun adi--> leqebi
	com_message=:a,
	com_username=:b,
  com_date=:c
	");
$save->execute(array(
 #sutun leqebi --> adi
	'a'=>$com_message,
	'b'=>$com_username,
	'c'=>$date
	));
}


##########################  delete Comment ##########################################
if ($_POST['main_comment_delete']=="ok"){	            #sil duymesinden gelen ad

	$sil=$db->prepare("DELETE from comments where com_id=:id"); #ne silinecek
	$sil->execute(array('id' => $_POST['com_id']));	#ne silinecek hardan

  $sil=$db->prepare("DELETE from subcomment where sub_comment_id=:id"); #ne silinecek
	$sil->execute(array('id' => $_POST['com_id']));	#ne silinecek hardan

}

##########################  delete SubComment ##########################################
if ($_POST['sub_comment_delete']=="ok"){	            #sil duymesinden gelen ad

  $sil=$db->prepare("DELETE from subcomment where sub_id=:id"); #ne silinecek
	$sil->execute(array('id' => $_POST['sub_id']));	#ne silinecek hardan

}







// teze nick register etmek ucun kod (eyni zamanda niki yoxayir eger varsa parolu isteyir)
if ($_POST['main_comment_update'] == 'ok') {

  $message = htmlspecialchars(trim($_POST['message']));

   $save=$db->prepare("UPDATE comments SET  #tablo adi

   #sutun adi--> leqebi
   com_message=:a

   WHERE com_id={$_POST['com_id']}");
   $update=$save->execute(array(
    #sutun leqebi --> adi
    'a'=>$message
    ));

}























 ?>
