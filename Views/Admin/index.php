<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php 

session_start();
if(isset($_SESSION['UserData'])){

  if($_SESSION['UserData']['isAdmin'] == 0){
    header("Location: /alumnitracer/Views/Alumni/UserDashBoard.php");
  }
  
  ob_start();
  require_once($_SERVER['DOCUMENT_ROOT'] . 'AlumniTracer/classes/DBConnection.php');
  $db = new DBConnection();
  
  $page = isset($_GET['p']) ? $_GET['p'] : "forms";
  ob_end_flush();

}else{
  header("Location: /AlumniTracer/Views/SharedView/Login.php");
}

?>
  <head>
    
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/alumniTracer/css/SideNav.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- <link rel="stylesheet" href="/alumniTracer/fontawesome-free/css/all.min.css"> -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/alumniTracer/css/bootstrap.min.css">
    <!-- <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="/alumniTracer/DataTables/datatables.min.css">
<link rel="stylesheet" href="/alumniTracer/css/custom.css">
<script src="/alumniTracer/js/jquery-3.6.0.min.js"></script>
<script src="/alumniTracer/js/popper.min.js"></script>
<script src="/alumniTracer/js/jquery-ui.js"></script>
<script src="/alumniTracer/js/bootstrap.min.js"></script>
<script src="/alumniTracer/DataTables/datatables.min.js"></script>
<script src="/alumniTracer/js/script.js"></script>
</head>
<body>
  <div class="sidebar">
    <div class="logo-details">
      <i class='bxl-c-plus-plus fa fa-child icon'></i>
        <div class="logo_name">Survey Maker</div>
        <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav-list">
      <!-- <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> -->
      <li>
        <a href="./index.php">
          <i class='bx bx-grid-alt'></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
     <li>
       <a href="./index.php?p=analytics">
         <i class='bx bx-pie-chart-alt-2' ></i>
         <span class="links_name">Analytics</span>
       </a>
       <span class="tooltip">Analytics</span>
     </li>
     <li>
       <a href="./index.php?p=manage_forms">
         <i class='bx bxs-file' ></i>
         <span class="links_name">Create New Survey</span>  
       </a>
       <span class="tooltip">Create New Survey</span>
     </li>
     <li>
       <a href="./index.php?p=AdminAnnounce">
         <i class='fa fa-bullhorn' ></i>
         <span class="links_name">Create Announcement</span>
       </a>
       <span class="tooltip">Create Announcement</span>
     </li>
     <li>
       <a href="/AlumniTracer/classes/Controller.php?a=logout">
         <i class='fa fa-sign-out' ></i>
         <span class="links_name">Logout</span>
       </a>
       <span class="tooltip">Logout</span>
     </li>
    </ul>
  </div>
  <section class="home-section">
    <div class="text">
    <!-- $_SERVER['DOCUMENT_ROOT'] . 'AlumniTracer/classes/DBConnection.php' -->
    <?php include($_SERVER['DOCUMENT_ROOT'] ."/Alumnitracer/Views/Admin/".$page.".php") ?>

    </div>
  </section>
  <script>
  let sidebar = document.querySelector(".sidebar");
  let closeBtn = document.querySelector("#btn");
  // let searchBtn = document.querySelector(".bx-search");
  closeBtn.addEventListener("click", ()=>{
    sidebar.classList.toggle("open");
    menuBtnChange();//calling the function(optional)
  });
  // searchBtn.addEventListener("click", ()=>{ // Sidebar open when you click on the search iocn
  //   sidebar.classList.toggle("open");
  //   menuBtnChange(); //calling the function(optional)
  // });
  // following are the code to change sidebar button(optional)
  function menuBtnChange() {
   if(sidebar.classList.contains("open")){
     closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
   }else {
     closeBtn.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
   }
  }
  </script>
</body>
</html>


