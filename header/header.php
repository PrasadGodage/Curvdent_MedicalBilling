<?php
session_start();
include('config.php');
include('functions.php');
if(!isset($_SESSION['id']))
{
  // header()
  header('Location:logout.php');
  // echo "<script>";
  // echo 'window.location.href="Dashboard.php";'; 
  // echo "</script>";
}

$userrole=$_SESSION['usertype'];
?>

<!DOCTYPE html>
<html lang="en">


<!-- blank.html  21 Nov 2019 03:54:41 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Panel</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="assets/css/app.min.css">
  <link rel="stylesheet" href="assets/bundles/prism/prism.css">
  
  <!-- Template CSS -->
  <link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
  <link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/components.css">
  
  <!-- search in select tag code  -->
  <link rel="stylesheet" href="chosen.css" />
  
  <!-- ends searching code  -->


  <!-- Custom style CSS -->
  <link rel="stylesheet" href="assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />

<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->


</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
          </ul>
        </div>
        <ul class="navbar-nav navbar-right">
         
          
          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <a href="logout.php" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand pt-3">
            <a href="Dashboard.php" class="mt-5"> <p>Admin Panel</p> 
            </a>
          </div>
          <?php


if($userrole=="admin")
{?>
<!-- Admin menu goes here  -->
<ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="dashboard.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a></li>

              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="check-circle"></i><span>Manage Masters</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="categorymaster.php">Category Master</a></li>
                  <li><a class="nav-link" href="unitmaster.php">Units Master</a></li>
                  <li><a class="nav-link" href="bankmaster.php">Bank Master</a></li>
                  <li><a class="nav-link" href="customermaster.php">Customer Master</a></li>
                  <li><a class="nav-link" href="manageitem.php">Item Master</a></li>
                  <li><a class="nav-link" href="firmmaster.php">Company Master</a></li>                
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="edit"></i><span>Manage Sales</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="sales.php">New Sales</a></li>
                  <li><a class="nav-link" href="managesales.php">Manage Bills</a></li>
                </ul>
              </li>
         
              <li class="dropdown">
                <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="save"></i><span>Reports</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="salesreport.php">Sales Report</a></li>
                </ul>
              </li>
        

            
            
          </ul>
<?php
}  ?>

        </aside>
      </div>