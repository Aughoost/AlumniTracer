<?php
// include("classes\DBConnection.php");
require_once('DBConnection.php');
Class Controller extends DBConnection{
    
    public function __construct(){
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
    public function Save_AlumniData(){

  
    $db = mysqli_connect('localhost', 'root', '', 'form_builder_db');
    $FirstName  = $_POST['FirstName'];
    $lastname = $_POST['lastname'];
    $email  = $_POST['email'];
    $Password = $_POST['Password'];
    $course  = $_POST['course'];
    $YearGraduated  = $_POST['YearGraduated'];

    $SaveQuery = "INSERT INTO alumni_details (Email,Password,FirstName,LastName,YearGraduated,Course) VALUES ('$email','$Password','$FirstName','$lastname','$course','$YearGraduated')";
    mysqli_query($db, $SaveQuery);
    if($SaveQuery){
        echo "success";
    }else{
        echo "error";
        // $resp['error'] = $this->conn->error;
    }
    // return json_encode($resp);
    }
    public function login(){
        session_start();
        try{
            $db = mysqli_connect('localhost', 'root', '', 'form_builder_db');
            // $email = 
            // $password = $_POST['password'];

            $email = mysqli_real_escape_string($db,$_POST['email'] );
            $password = mysqli_real_escape_string($db,$_POST['password'] );
            $Login = "Select * from alumni_details where Email = '".$email."' and Password = '".$password."' ";
            $result = mysqli_query($db, $Login);


            if(mysqli_num_rows( $result )>0){
                $data = mysqli_fetch_assoc($result);
                $_SESSION['UserData'] = $data;

                if($data['isAdmin'] == 0){
                    $_SESSION['email'] = $_POST['email'];
                    header("Location: ..\Views\Alumni\UserDashBoard.php");
                }else{
                    header("location: /alumnitracer/Views/Admin/index.php");
                }
            }
            else{
                header("location: /alumnitracer/Views/SharedView/Login.php?error=Invalid Login Details");
            }
        }catch(Exception $e){
                print_r( 'Message: ' .$e->getMessage());
        }         
    }
    public function save_post(){
        try{
            session_start();
            $db = mysqli_connect('localhost', 'root', '', 'form_builder_db');
            // $email = 
            // $password = $_POST['password'];
            $title = $_POST['Title'];
            $Details = $_POST['Details'];

            
            $SaveQuery = "INSERT INTO announcement (title,Details) VALUES ('$title','$Details')";
        
            $result = mysqli_query($db, $SaveQuery);

            if($result){
                $data = array(
                              'status'=>'true',
                      );
                         echo json_encode($data);
            }else{
                $data = array(
                    'status'=>'false',
                  
                );
            
                echo json_encode($data);
            }
            // return;
        }catch(Exception $e){
                // echo 'Message: ' .$e->getMessage();
                print_r( 'Message: ' .$e->getMessage());
        }         
    }
    public function deletepost(){
        try{
            $con = mysqli_connect('localhost', 'root', '', 'form_builder_db');
            $PostId = $_POST['id'];
            $sql = "DELETE FROM announcement WHERE id='$PostId'";
            $delQuery =mysqli_query($con,$sql);
            if($delQuery==true)
            {
                 $data = array(
                    'status'=>'success',
                   
                );
            
                echo json_encode($data);
            }
            else
            {
                 $data = array(
                    'status'=>'failed',
                  
                );
            
                echo json_encode($data);
            }
        }catch(Exception $e){
                // echo 'Message: ' .$e->getMessage();
                print_r( 'Message: ' .$e->getMessage());
        }         
    }
    public function fetchdata(){
       
$con = mysqli_connect('localhost','root','','form_builder_db');

if(mysqli_connect_errno()){
    echo"database error";
}

$output= array();
$sql = "SELECT * FROM announcement ";

$totalQuery = mysqli_query($con,$sql);
$total_all_rows = mysqli_num_rows($totalQuery);

$columns = array(
	0 => 'id',
	1 => 'title',
	2 => 'Details',
);

if(isset($_POST['search']['value']))
{
	$search_value = $_POST['search']['value'];
	$sql .= " WHERE id like '%".$search_value."%'";
	$sql .= " OR title like '%".$search_value."%'";
	$sql .= " OR Details like '%".$search_value."%'";
}

if(isset($_POST['order']))
{
	$column_name = $_POST['order'][0]['column'];
	$order = $_POST['order'][0]['dir'];
	$sql .= " ORDER BY ".$columns[$column_name]." ".$order."";
}
else
{
	$sql .= " ORDER BY id desc";
}

if($_POST['length'] != -1)
{
	$start = $_POST['start'];
	$length = $_POST['length'];
	$sql .= " LIMIT  ".$start.", ".$length;
}	

$query = mysqli_query($con,$sql);
$count_rows = mysqli_num_rows($query);
$data = array();
while($row = mysqli_fetch_assoc($query))
{
	$sub_array = array();
	$sub_array[] = $row['Id'];
	$sub_array[] = $row['title'];
	$sub_array[] = $row['Details'];
    $sub_array[] = $row['TimeStamp'];
	$sub_array[] = '<a href="javascript:void();" data-id="'.$row['Id'].'"  class="btn btn-info btn-sm editbtn" >Edit</a>  <a href="javascript:void();" data-id="'.$row['Id'].'"  class="btn btn-danger btn-sm deleteBtn" >Delete</a>';
	$data[] = $sub_array;
}

$output = array(
	'draw'=> intval($_POST['draw']),
	'recordsTotal' =>$count_rows ,
	'recordsFiltered'=>   $total_all_rows,
	'data'=>$data,
);
echo  json_encode($output);
       
    }
    public function logout(){
        session_start();
        if(isset($_GET['a'])){
            session_destroy();
            header("Location: /Alumnitracer/Views/SharedView/Login.php");
        }
    }

   

    public function updateuser(){
        try{
        $con = mysqli_connect('localhost','root','','form_builder_db');
        
        $id = $_POST['id'];
        $Title = $_POST['Title'];
        $Details = $_POST['Details'];
        // $TimeStamp = $_POST['Details'];
        // $city = $_POST['city'];
        // $id = $_POST['id'];
        
        $sql = "UPDATE `announcement` SET  `Title`='$Title' , `Details`= '$Details' WHERE id='$id' ";
        $query= mysqli_query($con,$sql);
        $lastId = mysqli_insert_id($con);
        if($query ==true)
        {
           
            $data = array(
                'status'=>'true',
               
            );
        
            echo json_encode($data);
        }
        else
        {
             $data = array(
                'status'=>'false',
              
            );
        
            echo json_encode($data);
        } 
        }
        catch(Exception $e){
            print_r( 'Message: ' .$e->getMessage());
        }
    }

    public function getpostdata(){
        $con = mysqli_connect('localhost','root','','form_builder_db');

        $id = $_POST['id'];
        $sql = "SELECT * FROM announcement WHERE id='$id' LIMIT 1";
        $query = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($query);
        echo json_encode($row);
    }

    public function displayadminpost(){
        
        if(isset($_POST['key']) && ($_POST['key'] == 'displayadminpost')){
            $data = [];
            $db = mysqli_connect("localhost","root","","form_builder_db");
            $announcement = mysqli_query($db,"SELECT * FROM `announcement` order by date(TimeStamp) desc");
            
            if($announcement){
                foreach($announcement as $rows){
                    $data[] = $rows;
                }
            }
            echo json_encode($data);
        }
    }
    
}

try{
    $Controller = new Controller();
    $action = !isset($_GET['a']) ? 'none' : strtolower($_GET['a']);
    switch ($action) {
        case 'displayadminpost':
            echo $Controller->displayadminpost();
        break;
        case 'save_alumnidata':
            echo $Controller->Save_AlumniData();
        break;
        case 'login':
            echo $Controller->login();
        break;
        case 'logout':
            echo $Controller->logout();
        break;
        case 'save_post':
            echo $Controller->save_post();
        break;
        case 'deletepost':
            echo $Controller->deletepost();
        break;
        case 'fetchdata':
            echo $Controller->fetchdata();
        break;
        case 'updateuser':
            echo $Controller->updateuser();
        break;
        case 'getpostdata':
            echo $Controller->getpostdata();
        break;
        // case 'usernotif':
        //     echo $Controller->usernotif();
        // break;
    }
}
catch(Exception $e){
    // echo 'Message: ' .$e->getMessage();
    print_r( 'Message: ' .$e->getMessage());
}

?>