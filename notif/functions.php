<?php
require_once('db.php');

function notifications(){

    echo'
    <div class="nf-all ">
     <div class="nf-message" id="notifications">Nothing</div>
        <div class="nf-area">
            <button class="btn-noti" id="nf-btn"><i class="bi bi-bell"></i></button>
            <span id="nf-n">0</span>
        </div>
       
    </div>    
    
    ';
}

function seenNotification($uniqueid){
    $db = new Connect;
    global $tbl_Notifications;

    $seenNoti = $db->prepare("Update $tbl_Notifications SET noti_seen='seen' where noti_uniqueid=$uniqueid");
    $seenNoti ->execute();
}


function postNotification($type, $uniqueid){
    $db = new Connect();
    global $tbl_Notifications;

    $date = date("F j, Y, g:i a");


    if($type == 'contact'){
        $noti_url = 'contact.php';
        $noti_table = 'contact';
        $unique_user = "0";
    }

    $insert = $db->prepare("INSERT INTO $tbl_Notifications SET 
    noti_user_uniqueid=:noti_user_uniqueid ,noti_status=:noti_status, noti_date=:noti_date, noti_type=:noti_type ,noti_url=:noti_url, noti_uniqueid=:noti_uniqueid,
    noti_table=:noti_table, noti_seen=:noti_seen
    ");

    $insert -> execute(array(
        'noti_user_uniqueid' => $unique_user,
        'noti_status' => 'active',
        'noti_date' => $date,
        'noti_type' => $type,
        'noti_url' => $noti_url,
        'noti_uniqueid' => $uniqueid,
        'noti_table' => $noti_table,
        'noti_seen' => 'unseen',

    ));
}

?>
