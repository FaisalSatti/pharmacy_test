<?php 
// ob_start();
// ob_clean();
// if (session_status() == PHP_SESSION_NONE) {
//   session_start();
// }
// if(!isset($_SESSION['data'])){
//   header('location:index.php');die();
// }elseif(!isset($_SESSION['company_id'])){
//   header('location:index.php');die();
// }elseif(!isset($_SESSION['project'])){
//   header('location:project.php');die();
// }

// header("Content-Type: application/json");
// $json_array = array();
// $user_id = $_SESSION['data']['NAMENAME'];
// print_r($user_id);

// include("api/auth/db.php");
// $user_id = $_SESSION['data']['NAMENAME'];
?>
<?php

session_start();
 include 'includes/header.php';
$data = $_SESSION['data'];
$user_name = $data['user_name'];
$role =  $data['role'];


$permissions = " ";

if ($role != 'Admin') {
  $permissions = $_SESSION['permissions'];
}

?>
<head>
  
<style>
  body { 
    padding-right: 0 !important ;
  }[class*=sidebar-dark-]{
    background-color: #183654 !important;
  }.navbar-dark{
    background-color: #183654 !important;
  }
  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active,
  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:focus, 
  [class*=sidebar-dark-] .nav-treeview>.nav-item>.nav-link.active:hover {
    /* color:black; */
    background-color: rgb(94 94 94 / 90%);
  }.layout-navbar-fixed .wrapper .sidebar-dark-primary .brand-link:not([class*=navbar]){
    background-color: #183654 !important;
  }
    .card-primary:not(.card-outline)>.card-header {
        background-color: #3f4a56 !important;
    }
    .head_top {
  text-shadow:0 1px 2px #333;
  color: white;
  font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  }
  ::placeholder {
    color: #909090  !important;
    font-style: italic !important;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif !important;
    font-weight: bold !important;
  }
  .words {
    text-align:center;
    position: absolute;
    left: 50%;
    top: 50%;
    height: 50px;
    width: 300px;
    margin-left: -150px;
    margin-top: -25px;
  }

  @-moz-keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
      -moz-transform: translateY(0);
      transform: translateY(0);
    }
    40% {
      -moz-transform: translateY(-30px);
      transform: translateY(-30px);
    }
    60% {
      -moz-transform: translateY(-15px);
      transform: translateY(-15px);
    }
  }
  @-webkit-keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
      -webkit-transform: translateY(0);
      transform: translateY(0);
    }
    40% {
      -webkit-transform: translateY(-30px);
      transform: translateY(-30px);
    }
    60% {
      -webkit-transform: translateY(-15px);
      transform: translateY(-15px);
    }
  }
  @keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
      -moz-transform: translateY(0);
      -ms-transform: translateY(0);
      -webkit-transform: translateY(0);
      transform: translateY(0);
    }
    40% {
      -moz-transform: translateY(-30px);
      -ms-transform: translateY(-30px);
      -webkit-transform: translateY(-30px);
      transform: translateY(-30px);
    }
    60% {
      -moz-transform: translateY(-15px);
      -ms-transform: translateY(-15px);
      -webkit-transform: translateY(-15px);
      transform: translateY(-15px);
    }
  }
  .cont {
    height: 2px;
  }
  .below {
    height: 95px;
  }
  .arr {
    display: block;
    color: #fff;
  }
  .arrow {
    position: absolute;
    bottom: 0;
    left: 50%;
    margin-left: -20px;
    width: 40px;
    height: 60px; /*change with size of arrow to make sit on bottom */
  /*   background-image: url(); */
  /*   background-size: contain; */
  }

  .bounce {
    -moz-animation: bounce 2s infinite;
    -webkit-animation: bounce 2s infinite;
    animation: bounce 2s infinite;
  }

    

  .loading {
    font-family: "Arial Black", "Arial Bold", Gadget, sans-serif;
    text-transform:uppercase;
    
    width:170px;
    text-align:center;
    line-height:12px;
    
    position:relative;
    left:0;right:0;top:22%;
    margin:auto;
    transform:translateY(50);
        row-gap:1em;
  }

  .loading span {
    position:relative;
    z-index:999;
    color:black;
  }
  .loading:before {
    content:'';
    background:#61bdb6;
    width:180px;
    height:35px;
    display:block;
    position:absolute;
    top:-40%;left:0;right:0;bottom:0;
    margin:auto;
    
    animation:2s loadingBefore infinite ease-in-out;
  }

  @keyframes loadingBefore {
    0%   {transform:translateX(-14px);}
    50%  {transform:translateX(14px);}
    100% {transform:translateX(-14px);}
  }


  .loading:after {
    content:'';
    background:#ff3600;
    width:14px;
    height:50px;
    display:block;
    position:absolute;
    top:-56%;left:0;right:0;bottom:0;
    margin:auto;
    opacity:.5;
    
    animation:2s loadingAfter infinite ease-in-out;
  }

  @keyframes loadingAfter {
    0%   {transform:translateX(-50px);}
    50%  {transform:translateX(50px);}
    100% {transform:translateX(-50px);}
  }
  @media only screen and (max-width: 575px) {
    .loading {
      position:absolute;
      left:0;right:0;top:69%;
      margin:auto;
      transform:translateY(-50%);
    }
    .animate-charcter{
      display:grid;
      place-items:center;
    }
  }
  @media only screen and (max-width: 995px) and (min-width: 575px){
    .loading {
      position:absolute;
      left:0;right:0;top:60%;
      margin:auto;
      transform:translateY(-50%);
    }
  }
  .loading{
      margin-top:-5px !important;
  } 
    aside{
      /* background: #8d88b1;
      background: linear-gradient(90deg,#8d88b1 0%, rgba(67,60,118,0.97) 55%);
      background: -webkit-linear-gradient(90deg,#8d88b1 0%, rgba(67,60,118,0.97) 55%);
      background: -moz-linear-gradient(90deg,#8d88b1 0%, rgba(67,60,118,0.97) 55%); */

      /* background: rgba(61,153,112,0.59);
      background: linear-gradient(90deg,rgba(61,153,112,0.59) 0%, #1c3e2c 55%);
      background: -webkit-linear-gradient(90deg,rgba(61,153,112,0.59) 0%, #1c3e2c 55%);
      background: -moz-linear-gradient(90deg,rgba(61,153,112,0.59) 0%, #1c3e2c 55%); */

      /* background: rgba(69,77,85,0.57);
      background: linear-gradient(90deg,rgba(69,77,85,0.57) 0%, #363b41 45%);
      background: -webkit-linear-gradient(90deg,rgba(69,77,85,0.57) 0%, #363b41 45%);
      background: -moz-linear-gradient(90deg,rgba(69,77,85,0.57) 0%, #363b41 45%); */
    }
    .main-header{
      /* background: #8d88b1;
      background: linear-gradient(0deg,#8d88b1 0%, rgba(67,60,118,0.97) 55%);
      background: -webkit-linear-gradient(0deg,#8d88b1 0%, rgba(67,60,118,0.97) 55%);
      background: -moz-linear-gradient(0deg,#8d88b1 0%, rgba(67,60,118,0.97) 55%); */

      /* background: rgba(61,153,112,0.59);
      background: linear-gradient(0deg,rgba(61,153,112,0.59) 0%, #1c3e2c 55%);
      background: -webkit-linear-gradient(0deg,rgba(61,153,112,0.59) 0%, #1c3e2c 55%);
      background: -moz-linear-gradient(0deg,rgba(61,153,112,0.59) 0%, #1c3e2c 55%); */
      
      /* background: rgba(69,77,85,0.57);
      background: linear-gradient(0deg,rgba(69,77,85,0.57) 0%, #363b41 45%);
      background: -webkit-linear-gradient(0deg,rgba(69,77,85,0.57) 0%, #363b41 45%);
      background: -moz-linear-gradient(0deg,rgba(69,77,85,0.57) 0%, #363b41 45%); */
    }
    aside a,.main-header a{
      color:white !important;
    }
</style>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed" >
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item ">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto ">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>

        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fa fa-credit-card mr-2"></i> 8 transactions
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
              class="fas fa-th-large"></i></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href = "logout.php" role="button">
          <b>Logout</b> <i class="fas fa-sign-out"></i>
          </a>
        </li>
        
      </ul>
    </nav>

    <!-- /.navbar12 -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="docs/assets/img/logo.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>PHARMACY</b></span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <a href="#" class="d-block" id="profile">
              <div class="image">
                <img src="docs/assets/img/dummy_image.png" class="img-circle elevation-2 imgg" alt="User Image">
                <span class="brand-text font-weight-light"><b style="text-transform:uppercase">  &emsp;<u><?php echo $user_name; ?></u></b></span>
              </div>
            </a>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar text-sm nav-flat nav-legacy nav-child-indent flex-column sidebar-menu" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="#" class="nav-link active" id="dashboard_main">
                <i class="far fa-tachometer-alt nav-icon"></i>
                <p id="dashboard">Dashboard</p>
              </a>
            </li>
            
            <li class="nav-item 100 show1"  id="setup_files">
              <a href="#" id="" class="nav-link">
                <i class="far fa-cog nav-icon"></i>
                <p> Setup Files</p>
              </a>
            </li>
            <li class="nav-item 200 show1" >
              <a href="" class="nav-link menu-trigger-dashboard">
                <i class="fas fa-balance-scale nav-icon"> </i>
                <p>Financial Management</p>
                <p><i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="menu-dashboard nav nav-treeview" >
                <!-- <li class="nav-item 601" >
                  <a href="#" id="inventory_dashbaord" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li> -->
                <li class="nav-item 201 show1" >
                  <a href="#" id="vouchers" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                    Account Vouchers
                    </p>
                  </a>
                </li>
                <li class="nav-item 202 show1" >
                  <a href="#" id="process" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                    Process
                    </p>
                  </a>
                </li>


                <li class="nav-item 203 show1" >
                  <a href="#" id="mis" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                    MIS
                    </p>
                  </a>
                </li>
                
                
                
                <!-- <li class="nav-item 600" >
                  <a href="" class="nav-link menu-trigger-dashboard">
                    <i class="fas fa-file nav-icon"> </i>
                    <p>MIS</p>
                    <p><i class="fas fa-angle-left right"></i></p>
                  </a>
                  <ul class="menu-dashboard nav nav-treeview" >
                    <-- <li class="nav-item 601" >
                      <a href="#" id="inventory_dashbaord" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>
                    </li> --
                    <li class="nav-item 601" >
                      <a href="#" id="online_ledger" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                        Online Ledger
                        </p>
                      </a>
                    </li>
                    <li class="nav-item 601" >
                      <a href="#" id="trial_balance" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>
                        Trial Balance
                        </p>
                      </a>
                    </li>
                  </ul>
                </li>  -->
              </ul>
            </li>
            <li class="nav-item 300 show1" >
              <a href="" class="nav-link menu-trigger-dashboard">
                <i class="far fa-shopping-cart nav-icon"> </i>
                <p>Sale Module</p>
                <p><i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="menu-dashboard nav nav-treeview" >
                <!-- <li class="nav-item 601" >
                  <a href="#" id="inventory_dashbaord" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li> -->
                <li class="nav-item 301 show1" >
                  <a href="#" id="transaction_files" class="nav-link">
                    <i class="far fa-exchange  nav-icon"></i>
                    <p>
                    Transaction Files
                    </p>
                  </a>
                </li>
                <li class="nav-item 302 show1" >
                  <a href="#" id="reports" class="nav-link">
                    <i class="far fa-file  nav-icon"></i>
                    <p>
                    Reports
                    </p>
                  </a>
                </li>
                <li class="nav-item 303 show1" >
                  <a href="#" id="process_sale" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                    Process
                    </p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item 400 show1" >
              <a href="" class="nav-link menu-trigger-dashboard">
                <i class="far fa-inventory nav-icon"> </i>
                <p>Inventory Module</p>
                <p><i class="fas fa-angle-left right"></i></p>
              </a>
              <ul class="menu-dashboard nav nav-treeview" >
                <!-- <li class="nav-item 601" >
                  <a href="#" id="inventory_dashbaord" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Dashboard
                    </p>
                  </a>
                </li> -->
                <li class="nav-item 401 show1" >
                  <a href="#" id="inventory_local" class="nav-link">
                    <i class="far fa-exchange  nav-icon"></i>
                    <p>
                    Inventory Local
                    </p>
                  </a>
                </li>
                <li class="nav-item 402 show1" >
                  <a href="#" id="process_inventory" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                    Process
                    </p>
                  </a>
                </li>

                <li class="nav-item 403 show1" >
                  <a href="#" id="inventory_mis_report" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                    MIS Report
                    </p>
                  </a>
                </li>
                
              </ul>
            </li>
            <li style = "display:none;" class="nav-item 500 show1"  id="user_setup">
              <a href="#" id="" class="nav-link">
                <i class="far fa-cog nav-icon"></i>
                <p> User Setup</p>
              </a>
            </li>
            <style>
              .menu-trigger-dashboard {display: block; width: 8; text-decoration: none;}
              .menu-dashboard {display: none;}
              .menu-dashboard.open {display: block;}
            </style>
          </ul>
        </nav> 
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div id="content"> 
      <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
    <!-- /.content -->
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <footer class="main-footer">
    <!-- <strong>Copyright &copy; 2020 <a href="https://www.ccodez.com" target="_blank">Ccodez Pvt. Ltd</a>.</strong>
    All rights reserved. -->
    <!-- <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div> -->
  </footer>
  <!--Include Footer File-->
  <?php include 'includes/footer.php' ?>
  <!-- <script src="Chart.min.js"></script> -->
  <script>

var role = "<?php echo $role; ?>";
      if (role != 'Admin') {
        var permissions = "<?php echo $permissions; ?>";
   
   

        var permissions1 = permissions.split(",");


        if (permissions1 != '') {
          $.each(permissions1, function(key, value) {
            document.getElementById(value).style.display = "";
            console.log(value);
          });
          
        }


    
      }else{
        console.log("abc");
        var rights = document.getElementsByClassName("show1");
        $.each(rights, function(key, value) {
          $(value).css("display", "");

        });

      }
$(document).ready(function() {

    });
  </script>
           


    
  
