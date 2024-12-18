<?php
session_start();
//  require_once('notif\functions.php');


if(isset($_SESSION['UserData'])){

    if($_SESSION['UserData']['isAdmin'] != 0){
        header("location: /alumnitracer/Views/Admin/index.php");
      }

    ob_start();
    // require_once('...\classes\DBConnection.php');
    require_once $_SERVER['DOCUMENT_ROOT'] . 'AlumniTracer/classes/DBConnection.php';
    $db = new DBConnection();
    $page = isset($_GET['p']) ? $_GET['p'] : "forms";
    ob_end_flush();


    $user = $_SESSION['email'];
    echo '<a href ="classes\Controller.php?a=logout"> logout</a>';


}else{
    header("Location: /AlumniTracer/Views/SharedView/Login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<!-- <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/alumniTracer/css/nav.css">
    <link rel="stylesheet" href="style.css">
    <script src="/alumniTracer/js/jquery-3.6.0.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <title></title>Alumni Tracer</title>
</head> -->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/alumniTracer/css/nav.css">
    <link rel="stylesheet" href="style.css">
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
    <!-- <link rel="stylesheet" href="node_modules\bootstrap-icons\font\bootstrap-icons.css"> -->
    <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="crossorigin="anonymous"></script> -->
    <!-- <script
  src="https://code.jquery.com/jquery-2.2.4.min.js"
  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
  crossorigin="anonymous"></script> -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
     <title></title>Alumni Tracer</title>
</head>
<body style="background-color: var(--body-color);">
    <nav>
        <div class="nav-bar ">
            <i class='bx bx-menu sidebarOpen' ></i>
            <span class="logo navLogo"><a href="#">Alumni Tracer</a></span>
            
            <div class="darkLight-searchBox d-flex justify-content-end">
            <div class="menu ">
                <div class="logo-toggle">
                    <span class="logo"><a href="#">Alumni Tracer</a></span>
                    <i class='bx bx-x siderbarClose'></i>
                </div>
                <ul class="nav-links">
                    <!-- <li><a href="#">Home</a></li> -->
                    <!-- <li><a href="#">About</a></li>
                    <li><a href="#">Portfolio</a></li>
                    <li><a href="#">Services</a></li> -->
                </ul>
            </div>
                <div class="dark-light">
                    <i class='bx bx-moon moon'></i>
                    <i class='bx bx-sun sun'></i>
                </div>
                <div class="searchBox">
                   <div class="searchToggle">
                    <i class='bx bx-x cancel'></i>
                    <span id="notifCounter" class="NotifCounter">0</span>
                    <i class='bx bx-bell search' id="search"></i>
                    <!-- <i class='bx bx-log-out'></i> -->
                   </div>
                    <div class="search-field">
                     <div class="container">
                        <div class="row">
                        <div class="card card-body">
                            <div id="notification">
                                <center> Nothing </center>
                            </div>
                        </div>
                      </div>
                    </div>
                    </div>
                </div>
                <div class="dark-logout" style="padding-top:.3rem;    margin: 0 5px;">
                    <a href="/AlumniTracer/classes/Controller.php?a=logout"><i class="bx bx-log-out logout"></i></a>
                    <!-- <i class='bx bx-log-out'><a href='https://getbootstrap.com/docs/4.0/utilities/flex/'></a></i> -->
                </div>
            </div>
        </div>
    </nav>

    
      <div class="d-flex justify-content-center" style="margin:5rem;" >
            <div class="AdminPostDesign" style="margin:1rem;" id="adminpost">
            </div>
    
      </div>
    <label class=" d-none" id="AlumniEmail"><?php echo $_SESSION['email']?></label>
<script>

      const body = document.querySelector("body"),
      nav = document.querySelector("nav"),
      adminpost = document.querySelector(".AdminPostDesign"),
      modeToggle = document.querySelector(".dark-light"),
      searchToggle = document.querySelector(".searchToggle"),
      sidebarOpen = document.querySelector(".sidebarOpen"),
      siderbarClose = document.querySelector(".siderbarClose");
      let getMode = localStorage.getItem("mode");
          if(getMode && getMode === "dark-mode"){
            body.classList.add("dark");
          }
// js code to toggle dark and light mode
      modeToggle.addEventListener("click" , () =>{
        modeToggle.classList.toggle("active");
        body.classList.toggle("dark");
        // js code to keep user selected mode even page refresh or file reopen
        if(!body.classList.contains("dark")){
            localStorage.setItem("mode" , "light-mode");
            $(".frame__container").removeClass("dark");
        }else{
            localStorage.setItem("mode" , "dark-mode");
            $(".frame__container").addClass("dark");
        }
      });
// js code to toggle search box
        searchToggle.addEventListener("click" , () =>{
        searchToggle.classList.toggle("active");
      });
 
      
//   js code to toggle sidebar
sidebarOpen.addEventListener("click" , () =>{
    nav.classList.add("active");
});
body.addEventListener("click" , e =>{
    let clickedElm = e.target;
    if(!clickedElm.classList.contains("sidebarOpen") && !clickedElm.classList.contains("menu")){
        nav.classList.remove("active");
    }
});
</script>
</body>

<script>
    
</script>


<script src="/alumniTracer/Views/Alumni/app.js"></script>
</html>