<?php ob_start (); ?>
<?php session_start(); ?>
<?php include "../includes/db.php"; ?>
<?php include "functions.php"; ?>

   <?php

      if(!isset($_SESSION['user_role'])){

        header("Location:../SignInPage.php");  

      }
    ?> 

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Talevent Tech</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/ionicons/dist/css/ionicons.css">
    <link rel="stylesheet" href="assets/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.addons.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
 
</head>

<body>
      
    
    <div class="container-scroller">  
        <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
          <a class="navbar-brand brand-logo" href="index.php">
            <img src="assets/images/logo.svg" alt="logo" /> </a>
          <a class="navbar-brand brand-logo-mini" href="index.php">
            <img src="assets/images/logo-mini.svg" alt="logo" /> </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown d-none d-xl-inline-block user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle" src="../images/<?php echo $_SESSION['image'] ?>" alt="Profile image"> </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <img class="img-md rounded-circle" src="../images/<?php echo $_SESSION['image'] ?>" alt="Profile image">
                  <p class="mb-1 mt-3 font-weight-semibold">
                      <?php
                      
                      if(isset($_SESSION['firstname'])){
                          
                        echo $_SESSION['firstname']; 
                         
                      }
                      
                      ?>
                      
                    </p>
                  <p class="font-weight-light text-muted mb-0">
                      <?php
                   
                      if(isset($_SESSION['email'])){
                          
                        echo $_SESSION['email']; 
                         
                      }
                      ?>
                      
                    </p>
                </div>
                <a class="dropdown-item" href="./profile.php">My Profile <span class="badge badge-pill badge-danger">1</span><i class="dropdown-item-icon ti-dashboard"></i></a>
                  
                <a class="dropdown-item"href="../includes/logout.php">Sign Out<i class="dropdown-item-icon ti-power-off"></i></a>
              </div>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
          </button>
        </div>
        </nav>
        
    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
              <li class="nav-item nav-category">Main Menu</li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <i class="menu-icon typcn typcn-document-text"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Inventory</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                      <a class="nav-link" href="./categories.php">
                      <i class="menu-icon typcn typcn-shopping-bag"></i>
                    <span class="menu-title">Categories</span>
                      </a>
                  </li>  
                  <li class="nav-item">
                    <a class="nav-link" href="inventory.php">Stock List</a>
                  </li>  
                  <li class="nav-item">
                    <a class="nav-link" href="inventory.php?source=add_stock">Add Stock</a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth1" aria-expanded="false" aria-controls="auth1">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Invoice</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth1">
                <ul class="nav flex-column sub-menu">     
                  <li class="nav-item">
                    <a class="nav-link" href="reports.php">View All Invoices</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="invoice.php">Create Invoice</a>
                  </li>
                </ul>
              </div>
            </li> 
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth2" aria-expanded="false" aria-controls="auth2">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Customers</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth2">
                <ul class="nav flex-column sub-menu">   
                  <li class="nav-item">
                    <a class="nav-link" href="customers.php">View All Customers</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="customers.php?source=add_customer">Add Customer</a>
                  </li>
                </ul>
              </div>
            </li> 
            <li class="nav-item">
              <a class="nav-link" data-toggle="collapse" href="#auth3" aria-expanded="false" aria-controls="auth3">
                <i class="menu-icon typcn typcn-coffee"></i>
                <span class="menu-title">Supplier</span>
                <i class="menu-arrow"></i>
              </a>
              <div class="collapse" id="auth3">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item">
                    <a class="nav-link" href="suppliers.php">View All Suppliers</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link" href="suppliers.php?source=add_supplier">Add Suppliers</a>
                  </li>
                </ul>
              </div>
            </li>
              
                <?php

                   if($_SESSION['user_role']!=="User"){

                ?> 
              
            <li class="nav-item">
              <a class="nav-link" href="users.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Users</span>
              </a>
            </li>

             <?php 
              
                }
              
             ?>  
              
              
            <li class="nav-item">
              <a class="nav-link" href="./profile.php">
                <i class="menu-icon typcn typcn-shopping-bag"></i>
                <span class="menu-title">Profile</span>
              </a>
            </li>
           
          </ul>
        </nav>   