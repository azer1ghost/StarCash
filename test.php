<?php
//set timezone


date_default_timezone_set('Asia/Baku');


//set an date and time to work with
$start = date("Y-m-d H:i");
//display the converted time
$end = date('Y-m-d H:i',strtotime('+1 hour',strtotime($start)));






  $start = strtotime($start);
  $end = strtotime($end);
  $zaman = $end - $zaman;
  $zaman_farki =  $zaman - time();
	$saniye = $zaman_farki;
	echo $dakika = round($zaman_farki/60);
	$saat = round($zaman_farki/3600);



 ?>
