<?php
    session_start();

try{
              
    $db = mysqli_connect('localhost', 'root', '', 'form_builder_db');
    // $email = 
    // $password = $_POST['password'];

    $Login = "Select * from alumni_details where Email = '".$_POST['email']."' and Password = '".$_POST['password']."' ";

    $result = mysqli_query($db, $Login);
    if(mysqli_fetch_assoc( $result )){
       $_SESSION['email'] = $_POST['email'];
      header("Location: ../UserDashBoard.php");
    // echo "<script>window.location.href='UserDashBoard.php';</script>";
    }
    else{
        echo "error";
    }
}catch(Exception $e){
        // echo 'Message: ' .$e->getMessage();
        print_r( 'Message: ' .$e->getMessage());
} 

?>