<?php 
require_once('DBConnection.php');

// require_once('.\notif\db.php');
Class Forms extends DBConnection{
    public function __construct(){
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
    public function save_form(){
        extract($_POST);
        $resp = array();
        $loop = true;
        $code = $form_code;
        if(empty($form_code)){
            while($loop == true){
                $code=mt_rand(0,9999999999);
                $code = sprintf("%'.09d",$code);
                $chk = $this->conn->query("SELECT * FROM `form_list` where form_code = '$code' ")->num_rows;
                if($chk <= 0)
                    break;
            }
        }
        $fname = $code.".xml";
        $create_form = file_put_contents("../forms/".$fname,$form_data);
        if(!$create_form){
            $resp['status'] = 'failed';
            $resp['error'] = 'error occured while saving the form';
            return json_encode($resp);
            exit;
        }
        $data = " form_code = '$code' ";
        $data .= ", title = '$title' ";
        // $data.= ", description = '$description' ";
        $data.= ", fname = '$fname' ";

        $date = date("F j, Y, g:i a");
        $type ='survey';
        $noti_url = $code;
        $noti_table = 'survey';
        $unique_user = "0";
        $uniqueid = $code;


        $notifQuery = $this->conn->query ("INSERT INTO notif (noti_user_uniqueid, noti_status, noti_date,noti_type,noti_url,noti_uniqueid,noti_table,noti_seen)
        VALUES ('$unique_user', 'active', '$date','$type','$noti_url','$uniqueid','$noti_table','unseen');");



        // $insert = $db->prepare("INSERT INTO $tbl_Notifications SET 
        // noti_user_uniqueid=:noti_user_uniqueid ,noti_status=:noti_status, noti_date=:noti_date, noti_type=:noti_type ,noti_url=:noti_url, noti_uniqueid=:noti_uniqueid,
        // noti_table=:noti_table, noti_seen=:noti_seen
        // ");
    
        // $insert -> execute(array(
        //     'noti_user_uniqueid' => $unique_user,
        //     'noti_status' => 'active',
        //     'noti_date' => $date,
        //     'noti_type' => $type,
        //     'noti_url' => $noti_url,
        //     'noti_uniqueid' => $uniqueid,
        //     'noti_table' => $noti_table,
        //     'noti_seen' => 'unseen',
    
        // ));



        if(empty($form_code))
            $save_form = $this->conn->query("INSERT INTO `form_list` set $data ");
        else
            $save_form = $this->conn->query("UPDATE `form_list` set $data where form_code = '$form_code' ");
        if($save_form){
            $resp['status'] = 'success';
            $resp['submitted'] = $fname;
            $resp['formTitle'] =$title;

        }else{
            $resp['status'] = 'failed';
            $resp['error'] = $this->conn->error;
        }
        return json_encode($resp);

    }
    public function save_response(){
       
        $notifUser = $_POST['notifUser'];
        $Code  = $_POST['code'];
        $ResponseList_Id = $_POST['ResponseList_Id'];
        $rl_insert = $this->conn->query("INSERT INTO response_list (form_code,ResponseList_Id) VALUES ('$Code','$ResponseList_Id') ");
        if($rl_insert){
            $rl_id = $this->conn->insert_id;
        }else{
            $resp['status'] = 'failed';
            $resp['error'] = $this->conn->error;
            return json_encode($resp);
            exit;
        }
        $mysqli = new mysqli('localhost', 'root', '', 'form_builder_db'); 
        if($mysqli->connect_errno != 0){
            echo $mysqli ->connect_error;
        }

        $QuestionLabel  = $_POST['FormData'];
        $JsonValues = json_decode($QuestionLabel, JSON_OBJECT_AS_ARRAY);

        $stmt =   $mysqli->prepare("INSERT INTO responses(meta_field,meta_value,SurveyId,ResponseList_Id)
         VALUES(?,?,?,?)
         ");
        $stmt->bind_param("ssdd", $SurveyQuestion, $surveyAnswer, $Surveycode , $ResponseList_Id1);


        $inserted_rows = 0;

        foreach($JsonValues as $data ){

            if( $data['type'] != "header"){
                $SurveyQuestion = $data['label'];
                $surveyAnswer = $data['userData'][0];
                $Surveycode = $Code;
                $ResponseList_Id1 = $ResponseList_Id;
                $stmt->execute();
                $inserted_rows ++;
            }
        }

        $notif_alumniuser = $notifUser;

        $checkifUserExistqiery = $this->conn->query ("SELECT notif_alumniuser,notif_url FROM notif_seen where notif_alumniuser = '$notif_alumniuser' and notif_url ='$Code' ");
        if(mysqli_num_rows($checkifUserExistqiery) == 0){
            $notifQuery = $this->conn->query ("INSERT INTO notif_seen (notif_alumniuser, notif_url, notif_seen)
            VALUES ('$notif_alumniuser','$Code','seen');");
        }

      
        

        if($stmt){
            echo "success";
        }
        else{
            echo "error";
        }
    }
    public function delete_form(){
        extract($_POST);

        $form_code  = $_POST['form_code'];
        $rl_id = $this->conn->query("SELECT * FROM `response_list` where form_code = '$form_code'");
        $rl_id = $rl_id->num_rows > 0 ? $rl_id->fetch_array()['form_code'] : '';
        $del = $this->conn->query("DELETE FROM `form_list` where form_code = '$form_code'");
        $del1 = $this->conn->query("DELETE FROM `response_list` where form_code = '$form_code'");
        if($rl_id > 0)
        $del2 = $this->conn->query("DELETE FROM `responses` where SurveyId = '$form_code'");
        $del3 = $this->conn->query("DELETE FROM `notif` where noti_url = '$form_code'");
        $del4 = $this->conn->query("DELETE FROM `notif_seen` where notif_url = '$form_code'");
        if(isset($this->conn->err)){
            $resp['status'] = 'failed';
            $resp['err'] = $this->conn->err;
        }else{
            unlink('../forms/'.$form_code.'.xml');
            $resp['status'] = 'success';
        }
        return json_encode($resp);
    }
}
$forms = new forms();
$action = !isset($_GET['a']) ? 'none' : strtolower($_GET['a']);
switch ($action) {
	case 'save_form':
		echo $forms->save_form();
	break;
    case 'save_response':
		echo $forms->save_response();
	break;
    case 'delete_form':
		echo $forms->delete_form();
	break;
	default:
		// echo $sysset->index();
		break;
}