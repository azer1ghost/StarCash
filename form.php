<?php
date_default_timezone_set('Asia/Baku');
session_start();
ob_start();


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

?>


    <style>

        body{
          @import url('https://fonts.googleapis.com/css?family=Roboto');
        }
        ol{
            padding-inline-start: 0px;
        }

        .comment{
          border: 1px solid #ccc;
          border-radius: 10px;
          padding: 7px;
          box-shadow:0 4px 6px rgba(0,0,0,0.1);
        }

        .comment-author{
          padding-top: 5px;
          font-size:16px;
          font-family: 'Roboto', sans-serif;
        }

        .user{
          font-size: 16px;
          font-weight: bold;
          color: #365899;
        }

        .reply{
          text-align: right;
        }

        .commentlist{
          list-style: none;
        }

        .comment-messsage{
          padding-left: 10px;
          padding-top: 10px;
          font-size:16px;
          font-family: 'Roboto', sans-serif;
        }

        .comment-date{
          padding-left: 0spx;
          color: #616770;
        }
        .replys{
          padding-left: 20px;
        }
        .reply-user{
          font-size:16px;
          font-family: 'Roboto', sans-serif;
          font-weight: bold;
          margin: 0;
          color: #365899;
          font-size: 14px;
          line-height: 1.38;
        }
        .reply-messsage{
          margin-top: 3px;
          font-size: 14px;
          margin-bottom: 0;
          font-family: 'Roboto', sans-serif;
        }
        .reply-area{
          padding: 25px;
        }
        .reply-button{
          padding: 10px;
        }
        .reply-button a{
          color: #007bff;
          text-decoration: none;
          font-weight: 700;
        }

        .reply-button a:hover{
          color: #0ccc;
        }

        .reply-button a:active{
          color: #007bff;
        }
        .profile_photo {
          float: left;
          width: 50px;
          height: 50px;
          border: 1px solid #b5b5b5db ;
          border-radius: 50%;
          overflow: hidden;
          margin-right: 10px;
        }
        .profile_photo img{
          vertical-align: middle;
          max-width: 52px;
          margin-left: auto;
          margin-right: auto;
        }
        #newComment{
          margin: 10px;
          font-size: 16px;
          font-family: 'Roboto', sans-serif;
          padding: 20px;
          width: 96%;
          resize:vertical;
	        box-shadow:0 4px 6px rgba(0,0,0,0.1);
        }
        .replymessage{
          font-family: 'Roboto', sans-serif;
          background-color: #f2f3f5;
          border: 1px solid #ccd0d5;
          font-size: 14px;
          width: 90%;
          height:36px;
          resize:vertical;
          border-radius: 16px;
          line-height: 16px;
          overflow: hidden;
          padding: 8px 12px;
          float: left;
        }
        .replymessage:focus{
           outline:none;
        }
        .sendButton{
          margin-left: 10px;
          border: 1px solid #007bff;
          border-radius: 16px;
          line-height: 16px;
          height:36px;
          width: 8%;
          color :#007bff;
          box-shadow: none;
          background-color: transparent;
          -webkit-transition: color 0.4s; /* Safari */
          transition: color 0.4s;
          -webkit-transition: background-color 0.3s; /* Safari */
          transition: background-color 0.3s;
        }
        @media only screen and (max-width: 600px) {
          .sendButton{
            border-radius: 14px;
            height:36px;
            width: 12%;
            padding: 0;
            margin-left: 5px;
          }l
          .replymessage{
            width: 86%;
          }
        }
        .sendButton:focus{
           outline:none;
        }
        .sendButton:hover{
          color :#fff;
          background-color: #007bff;
        }
        .loading{
          text-align: center;
          line-height: 10px;
        }
        .loading p{
          padding-top: 20px;
          animation: blinker 1s linear infinite;
        }
        @keyframes blinker {
          50% {
            color: red;
          }
        }
        .loading img{
          max-width: 100px;
          height: 50px
        }
        .setting{
          float:right;
        }
        .seticon{
          float: right;
          font-size: 18px;
        }
        .boxsetting li {
          font-size: 16px;
          color: #616770;
        }
        .boxsetting b{
          font-size: 14px;
        }
        .setting li:hover{
          cursor: pointer;
          color: #3675c1;
        }
        .boxsetting{
          border: solid #aeafb9 1px;
          border-radius: 5px;
          background-color: #ffffff;
          box-shadow:0 4px 6px rgba(0,0,0,0.3);
          margin-top: 16px;
        }

        .boxsetting ul{
          margin: 5px;
          padding-inline-start: 0px;
          list-style-type: none;
        }

    </style>
</head>

<body>

    <ol class="commentlist">

      <li class="comment commentadder" style="margin-bottom:25px">
          <div class="comment-body">

              <div class="comment-author" style="padding:20px;text-align:center">
                <span class="says">Salam <span class="user"><?php echo $user?></span>.
                Suallarını və şikayətlərini burada etdə bilərsən. Unutma ki, paylaşılan bütün suallar hamı tərəfindən görünür.</span>

              </div>

              <textarea name="name" placeholder="Səni maraqlandıran nədir?" id="newComment" maxlength="3000" rows="1" ></textarea>

              <br>
              <div class="reply-button">
                <a href="#" onclick="addNewComment()" style="padding-right:15px">
                  <i class="fa fa-share"></i> Paylaş
                </a>
              </div>

          </div>
      </li>

      <?php $comsor=$db->prepare("SELECT * from comments Order by com_id DESC");
            $comsor->execute(array()); $n=0;
            $valuye=$comsor->rowCount();
            if ($valuye == null){ ?>

              <p>Hal hazırda heç bir şikayət vəya sual yoxdur</p>


      <?php } else{ ?>

      <?php  while($comcek=$comsor->fetch(PDO::FETCH_ASSOC)){ $n++;
             $commID = $comcek['com_id'];
        ?>

        <li class="comment" id="commentID<?php echo $commID;?>">
            <div class="comment-body">

                <div class="profile_photo">
                  <img src="style/profile.jpg" alt="">
                </div>
                <?php if ($user == $comcek['com_username']) {?>

                <div class="setting">
                  <i onclick="ShowSettingComment(<?php echo $commID; ?>)" class="fa fa-ellipsis-h seticon"></i>

                  <div id="setting<?php echo $commID; ?>" class="boxsetting" style="display:none">
                    <ul>
                      <li onclick="RemoveComment(<?php echo $commID; ?>)" ><i class="fa fa-trash"></i> <b>Sil</b></li>
                      <li onclick="CommentEdit(<?php echo $commID; ?>)" ><i class="fa fa-pencil"></i> <b>Düzənlə</b></li>
                    </ul>
                  </div>



                </div>

              <?php } ?>

                <div class="comment-author">
                  <span class="user"><?php echo $comcek['com_username']?></span>
                  <span class="says">soruşur :</span>
                </div>

                <small class="comment-date"><i class="fa fa-clock-o"></i>
                  <u>
                    <?php $d=strtotime($comcek['com_date']); echo tarix(date("j M H:i:", $d));?>
                  </u>
                </small>

                <p id="ComMessage<?php echo $commID?>" class="comment-messsage"><?php echo $comcek['com_message']?></p>

                <br>

                <div class="reply-button">
                  <a href="#" onclick="ShowAllSubCommnets('<?php echo $commID?>')" style="padding-right:15px">
                    <i class="fa fa-comment-o"></i> Cavablar
                  </a>

                  <a onclick="ShowReply('<?php echo $commID?>')" href="#" style="padding-right:15px">
                    <i class="fa fa-reply"></i> Cavabla
                  </a>

                  <a href="#">
                    <i class="fa fa-eye"></i> 15
                  </a>
                </div>



                <?php $repysor=$db->prepare("SELECT * from subcomment Where sub_comment_id=:comment_id Order by sub_date ASC");
                      $repysor->execute(array('comment_id'=>$comcek['com_id'])); $n=0;
                      $valuye=$repysor->rowCount();
                      if ($valuye == null){ ?>

                      <hr>
                      <p id="counter<?php echo $commID?>" style="text-align:center">ilk cavab verən sən ol</p>
                      <div class="subCom<?php echo $commID?>">
                <?php } else{ ?>

              <div  class="subCom<?php echo $commID?>"  style="display:none">

                <?php  while($repycek=$repysor->fetch(PDO::FETCH_ASSOC)){ $n++;  ?>

                <div <?php if ($user == $repycek['sub_username']) { ?> id="replys<?php echo $repycek['sub_id'] ?>" onmouseover="showDeleteSubComment(<?php echo $repycek['sub_id'] ?>)" <?php } ?> class="replys">
                  <hr>
                  <p class="reply-messsage"><span class="reply-user"><?php echo $repycek['sub_username'] ?></span> <?php echo $repycek['sub_message'] ?></p>
                  <i id="trash<?php echo $repycek['sub_id'] ?>" style="float:right;cursor:pointer;display:none" onclick="deleteSubComment(<?php echo $repycek['sub_id'] ?>)" class="fa fa-trash-o"></i>
                  <small class="comment-date"><i class="fa fa-clock-o"></i>
                    <u>
                      <?php $d=strtotime( $repycek['sub_date']); echo tarix(date("j M H:i:", $d));?>
                    </u>
                  </small>
                </div>

                <?php } } ?>
              </div>

                <div class="reply-area" id="textarea<?php echo $commID?>" style="display:none">
                  <textarea maxlength="500" placeholder="Cavabınızı paylaşın" id="mes<?php echo $commID?>" class="replymessage"></textarea>
                  <button onclick="sendReply(<?php echo $commID?>)" type="submit" class="sendButton"><i class="fa fa-paper-plane-o"></i></button>
                </div>

            </div>
        </li>
        <br>
        <?php } } ?>

    </ol>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://rawgit.com/jackmoore/autosize/master/dist/autosize.min.js"></script>
<script type="text/javascript">



autosize($('#newComment'));
autosize($('.replymessage'));

function showDeleteSubComment(id){
  $('#replys'+id).hover(function(){
      $("#trash"+id).show();
  },function(){
      $("#trash"+id).hide();
  });
}


function deleteSubComment(id) {
  $.ajax({
            type: 'post',
            url: 'engine.php',
            data: {
                  sub_id: id,
                  sub_comment_delete: 'ok'
            }, // serializes the form's elements.
            success: function() {
              setTimeout(function(){
                 $( '#replys'+id ).remove();
              }, 100);
            }
        })
}

$(window).load(function() {
    $('#newComment').focus()
});


function CommentEdit(id){
  ComMessage = $('#ComMessage'+id)
  ComMessageText = ComMessage.text()
  $(ComMessage).replaceWith( "<p class='comment-messsage'><textarea id='replace"+id+"' placeholder='Düzənləmə modu' class='comment-messsage' autofocus style='width:96%;padding-bottom:10px;border:none'>"+ComMessageText+"</textarea><i style='color:green;float:right;cursor:pointer;font-size:25px' onclick='SaveEditedCom("+id+")' class='fa fa-check'></i></p>")
  ShowSettingComment(id)
  autosize($('#replace'+id))
}

function SaveEditedCom(id){
  message = $('#replace'+id).val()
  $.ajax({
            type: 'post',
            url: 'engine.php',
            data: {
                  com_id: id,
                  message: message,
                  main_comment_update: 'ok'
            }, // serializes the form's elements.
            success: function() {
              setTimeout(function(){
                 window.location.reload();
              }, 100);
            }
        })
}

function RemoveComment(id){
  $.ajax({
            type: 'post',
            url: 'engine.php',
            data: {
                  com_id: id,
                  main_comment_delete: 'ok'
            }, // serializes the form's elements.
            success: function() {
              setTimeout(function(){
                 window.location.reload();
              }, 100);
            }
        })
}


function ShowSettingComment(id){

  var setting = document.getElementById('setting'+id);

       if(setting.style.display == 'block')
          setting.style.display = 'none';
       else{
           $( ".boxsetting" ).each(function( i ) {
               if ( this.style.display !== "none" ) {
                 this.style.display = "none";
               } else {
                 this.style.display = "none";
               }
             });

             setting.style.display = 'block' }

}


function addNewComment(){

  var comment = document.getElementById("newComment").value;
  if (comment != "") {
    $.ajax({
              type: 'post',
              url: 'engine.php',
              data: {
                    com_message: comment,
                    main_comment_reciver: 'ok'
              }, // serializes the form's elements.
              success: function() {
                $( "<div class='loading'> <p>Paylaşılır. Lütfən gözləyin</p> <img src='style/loading.gif'> </div>" ).insertAfter( ".commentadder" );
                setTimeout(function(){
                   window.location.reload(1);
                }, 2000);
                $('#newComment').val('');
              }
          })
  }
}

function sendReply(id){

  var message = document.getElementById('mes'+id).value;
    if (message != "") {
  $.ajax({
            type: 'post',
            url: 'engine.php',
            data: {
                  sub_message: message,
                  sub_comment_id: id,
                  sub_comment_reciver: 'ok'
            }, // serializes the form's elements.
            success: function() {
              $( '#counter'+id  ).remove();

              if ($('.subCom'+id ).children('div').length > 0) {
                  $( '.subCom'+id ).append( "<div class='replys'><hr><p class='reply-messsage'><span class='reply-user'><?php echo $user ?> </span> "+message+"</p> <small class='comment-date'><i class='fa fa-clock-o'></i> <u> indicə </u> </small> </div>" );
              }else {
                  $( '.subCom'+id ).append( "<div class='replys'><p class='reply-messsage'><span class='reply-user'><?php echo $user ?> </span> "+message+"</p> <small class='comment-date'><i class='fa fa-clock-o'></i> <u> indicə </u> </small> </div>" );
              }

              $('#mes'+id).val('');
            }
        })
      }
}


function ShowAllSubCommnets(id) {

  var subCommet = document.getElementsByClassName('subCom'+id)[0];

       if(subCommet.style.display == 'block'){
          subCommet.style.display = 'none';
        }
       else{
          subCommet.style.display = 'block'
          $('html, body').animate({
            scrollTop: $('.subCom'+id).offset().top - 150
          }, 'slow');

        }
    }




function ShowReply(id) {

  var textarea = document.getElementById('textarea'+id);
  var subCommet = document.getElementsByClassName('subCom'+id)[0];
       if(textarea.style.display == 'block'){
          textarea.style.display = 'none';
          subCommet.style.display = 'none';
       }else{

         $( ".reply-area" ).each(function( i ) {
             if ( this.style.display !== "none" ) {
               this.style.display = "none";
             } else {
               this.style.display = "none";
             }
           });

          textarea.style.display = 'block'
          subCommet.style.display = 'block'
          if(jQuery('#counter'+id).length != 1){

          }

          $('html, body').animate({
            scrollTop: $('#mes'+id).offset().top - 150
          }, 'slow');

          $('#mes'+id).focus()

        }
    }

</script>
