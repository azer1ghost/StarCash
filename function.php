<?php

function tarix($aaa) {
 $en = array('Jan','Feb','March','Apr','May','jun','jul','Aug','Sep','Oct','Nov','Dec');
 $aze = array('Yanvar','Fevral','Mart','Aptel','May','Iyun','Iyul','Avqust','Sentyabr','Oktyabr','Noyabr','Dekabr');
 $aaa = str_replace($en,$aze,$aaa);
 $aaa = trim($aaa, '-');
 return $aaa;
}


function minuteLeft($start){
  $start = date($start);
  $end = date('Y-m-d H:i',strtotime('+1 hour',strtotime($start)));

  $start = strtotime($start);
  $end = strtotime($end);
  $zaman = $end - $zaman;
  $zaman_farki =  $zaman - time();
  $dakika = round($zaman_farki/60);

  if ($dakika > 0) {
    echo $dakika." dəqiqə";
  } else {
    echo "yoxlama bitdi";
  }
}


function GoToUrl ($link, $get){
  $gotolink= '<meta HTTP-EQUIV="REFRESH" content="0; url='."http://$_SERVER[HTTP_HOST]/starcash/$link?$get".'">';
  echo $gotolink;
}


function loginControl($db){
  $token = $_SESSION['token'];

  $adminsor=$db->prepare("select * from customer where customer_username=:login");
  $adminsor->execute(array(
  'login' => $_SESSION['user'.$token] ));

  	$say=$adminsor->rowCount();

    if($say==0){

        return false;

        header("Location:login.php?durum=nolog");

        exit;

      }else{
        return true;
      }

}
