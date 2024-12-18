<?php

require_once('db.php');
$db = new Connect;
$data = [];
global $tbl_Notifications;

if(isset($_POST['key']) && ($_POST['key'] == '123')){

    $alummniEmail = $_POST['AlumniEmail'];
    // $notifications = $db->prepare("SELECT * FROM $tbl_Notifications ORDER BY id DESC limit 10");
    $notifications = $db->prepare("SELECT notif.noti_date,notif.noti_status,notif.noti_table,notif.noti_type,notif.noti_uniqueid,notif.noti_url,notif.noti_user_uniqueid,notif_seen.notif_seen FROM $tbl_Notifications LEFT JOIN notif_seen ON notif.noti_url=notif_seen.notif_url and notif_seen.notif_alumniuser = '$alummniEmail'");
    $notifications -> execute(); 
    $n_notifications = $notifications->rowCount();

    if($n_notifications > 0 ){
        $n_number  = $db->prepare("SELECT * FROM $tbl_Notifications Where noti_status='active' order by id desc");
        $n_number -> execute();
        $n_numbers = $n_number->rowCount();

        array_push($data, (object)[
            'total' => $n_numbers,
        ]);
        while($notification = $notifications->fetch(PDO::FETCH_ASSOC)){
            $data[]= $notification;
        }
        // $notifications1 = $db->prepare("SELECT notif.noti_date,notif.noti_status,notif.noti_table,notif.noti_type,notif.noti_uniqueid,notif.noti_url,notif.noti_user_uniqueid,notif_seen.notif_seen FROM $tbl_Notifications LEFT JOIN notif_seen ON notif.noti_url=notif_seen.notif_url and notif_seen.notif_alumniuser = '$alummniEmail'");
        // $notifications1 -> execute(); 
        // $n_notifications1 = $notifications->rowCount();

        // if($n_notifications1 > 0){
        //     while($notification = $notifications1->fetch(PDO::FETCH_ASSOC)){
        //         $data[]= $notification;
        //     }
        // }
        // else{
            
        // }
    }
    echo json_encode($data);
}

// $notifications = $db->prepare("SELECT * FROM $tbl_Notifications ORDER BY id DESC limit 10");
//     $notifications -> execute();
//     $n_notifications = $notifications->rowCount();
//     if($n_notifications > 0){
    
//         $n_number  = $db->prepare("SELECT * FROM $tbl_Notifications Where noti_status='active' order by id desc");
//         $n_number -> execute();
//         $n_numbers = $n_number->rowCount();
    
//         array_push($data, (object)[
//             'total' => $n_numbers,
//         ]);
    
//         while($notification = $notifications->fetch(PDO::FETCH_ASSOC)){
//             $data[]= $notification;
//         }
    
//     }
//     echo json_encode($data);
    


// $notifications = $db->prepare("SELECT * FROM $tbl_Notifications ORDER BY id DESC");
// $notifications->execute();
// $n_notifications = $notifications->rowCount();


// if($n_notifications > 0){

//     $n_number  = $db->prepare("SELECT * FROM $tbl_Notifications Where noti_status='active' order by id desc");
//     $n_number -> execute();
//     $n_numbers = $n_number->rowCount();

//     array_push($data, (object)[
//         'total' => $n_numbers,
//     ]);

//     while($notification = $notifications->fetch(PDO::FETCH_ASSOC)){
//         $data[]= $notification;
//     }

// }
// echo json_encode($data);

if(isset($_POST['key']) && ($_POST['key'] == '1234')){
    $countActiveNoti = $db->prepare("UPDATE $tbl_Notifications SET noti_status = 'inactive' where noti_status ='active'");
    $countActiveNoti -> execute();
}
// if(isset($_POST['key']) && ($_POST['key'] == 'Seen')){


//     $Alumni = $_POST['Alumni'];
//     $noti_uniqueid = $_POST['noti_uniqueid'];

//     $n_number  = $db->prepare("SELECT notif_seen FROM notif_seen Where notif_alumniuser='$Alumni' and notif_url='noti_uniqueid' order by id desc");
//     $n_number -> execute();
//     while($notification = $n_number->fetch(PDO::FETCH_ASSOC)){
//         $data[]= $notification;
//     }
//     echo json_encode($data);
// }

?>