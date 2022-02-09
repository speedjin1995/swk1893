<!DOCTYPE html>
<?php
require_once 'php/db_connect.php';

session_start();

if(!isset($_SESSION['userID'])){
  echo '<script type="text/javascript">';
  echo 'window.location.href = "login.html";</script>';
}
else{
  $user = $db->query("SELECT * FROM user where id = '".$_SESSION['userID']."'");
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SWK | Update Profile</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <style type="text/css">
    #background-image-preview {
      width: 700px;
      height: 400px;
      position: relative;
      overflow: hidden;
      background-color: #ffffff;
      color: #ecf0f1;
    }
    #background-image-preview input {
      line-height: 200px;
      font-size: 200px;
      position: absolute;
      opacity: 0;
      z-index: 10;
    }
    #background-image-preview label {
      position: absolute;
      z-index: 5;
      opacity: 0.8;
      cursor: pointer;
      background-color: #bdc3c7;
      width: 200px;
      height: 50px;
      font-size: 20px;
      line-height: 50px;
      text-transform: uppercase;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      margin: auto;
      text-align: center;
    }

    #profile-image-preview {
      width: 400px;
      height: 400px;
      position: relative;
      overflow: hidden;
      background-color: #ffffff;
      color: #ecf0f1;
    }
    #profile-image-preview input {
      line-height: 200px;
      font-size: 200px;
      position: absolute;
      opacity: 0;
      z-index: 10;
    }
    #profile-image-preview label {
      position: absolute;
      z-index: 5;
      opacity: 0.8;
      cursor: pointer;
      background-color: #bdc3c7;
      width: 200px;
      height: 50px;
      font-size: 20px;
      line-height: 50px;
      text-transform: uppercase;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      margin: auto;
      text-align: center;
    }
  </style>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to to the body tag
to get the desired effect
|---------------------------------------------------------|
|LAYOUT OPTIONS | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="https://durianduke.com/" class="brand-link">
      <img src="../images/logo.png" alt="Durian Duke Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SWK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!--div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div-->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="blog.php" class="nav-link">
              <i class="nav-icon fas fa-th "></i>
              <p>Testimony</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="message.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Message Resource</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="usermanagement.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>User Management</p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>Product Management</p>
            </a>
          </li>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                User Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="profile.php" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="changepassword.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="php/logout.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>Logout</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" id="mainContents" style="min-height: 432.688px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Update Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item">Settings</li>
                        <li class="breadcrumb-item active">Update Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
          <form role="form" id="userForm" method="post" action="php/profile.php" enctype="multipart/form-data">
            <div class="card-body">
              <?php while($row=mysqli_fetch_assoc($user)){ ?>
                <div class="form-group"> 
                  <input type="hidden" class="form-control" id="id" name="id" value="<?=$_SESSION['userID'] ?>" >
                </div>
                <div class="form-group">
                  <input type="hidden" class="form-control" name="username" id="username" value="<?=$row['user_name'] ?>" >
                </div>
                <div class="form-group">
                  <label for="fileToUpload">Background Image</label>
                  <div id="background-image-preview">
                    <label for="background-image" id="background-image-label">Choose Image</label>
                    <input type="file" name="background-image" id="background-image" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="fileToUpload">Profile Image</label>
                  <div id="profile-image-preview">
                    <label for="profile-image" id="profile-image-label">Choose Image</label>
                    <input type="file" name="profile-image" id="profile-image" />
                  </div>
                </div>
                <div class="form-group">
                  <label for="Name">Name *</label>
                  <input class="form-control" name="name" id="name" value="<?=$row['user_name'] ?>" required>
                </div>
                <div class="form-group">
                  <label for="engContent">English Content *</label>
                  <textarea class="form-control" id="engDescription" name="engDescription" value="<?=$row['english_description'] ?>" required><?=$row['english_description'] ?></textarea>
                </div>
                <div class="form-group"> 
                  <label for="chineseContent">中文内容 *</label>
                  <textarea class="form-control" id="chineseDescription" name="chineseDescription" value="<?=$row['chinese_description'] ?>" required><?=$row['chinese_description'] ?></textarea>
                </div>
                <div class="form-group"> 
                  <label for="chineseContent">Phone Number *</label>
                  <input class="form-control" id="phone" name="phone" value="<?=$row['phone_number'] ?>" required>
                </div>
                <div class="form-group"> 
                  <label for="chineseContent">Email *</label>
                  <input class="form-control" id="email" name="email" value="<?=$row['user_email'] ?>" required>
                </div>
                <div class="form-group"> 
                  <label for="chineseContent">Address *</label>
                  <textarea class="form-control" id="address" name="address" value="<?=$row['address'] ?>" required></textarea>
                </div>
                <div class="form-group">
                  <?php 
                    $social = json_decode($row['social_media'], true);
                    echo '<div class="row">';

                    if(array_key_exists('facebook', $social) && $social['facebook'] != null && $social['facebook'] != ''){
                      echo '<div class="col-4">
                      <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input class="form-control" name="facebook" id="facebook" value="'.$social['facebook'].'" >
                      </div>
                    </div>';
                    }
                    else{
                      echo '<div class="col-4">
                      <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input class="form-control" name="facebook" id="facebook">
                      </div>
                    </div>';
                    }

                    if(array_key_exists('twitter', $social) && $social['twitter'] != null && $social['twitter'] != ''){
                      echo '<div class="col-4">
                      <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input class="form-control" name="twitter" id="twitter" value="'.$social['twitter'].'">
                      </div>
                    </div>';
                    }
                    else{
                      echo '<div class="col-4">
                      <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input class="form-control" name="twitter" id="twitter">
                      </div>
                    </div>';
                    }

                    if(array_key_exists('instagram', $social) && $social['instagram'] != null && $social['instagram'] != ''){
                      echo '<div class="col-4">
                      <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input class="form-control" name="instagram" id="instagram" value="'.$social['instagram'].'">
                      </div>
                    </div>';
                    }
                    else{
                      echo '<div class="col-4">
                      <div class="form-group">
                        <label for="instagram">Instagram</label>
                        <input class="form-control" name="instagram" id="instagram">
                      </div>
                    </div>';
                    }

                    echo '</div>';
                    echo '<div class="row">';

                    if(array_key_exists('youtube', $social) && $social['youtube'] != null && $social['youtube'] != ''){
                      echo '<div class="col-4">
                      <div class="form-group">
                        <label for="twitter">Youtube</label>
                        <input class="form-control" name="youtube" id="youtube" value="'.$social['youtube'].'">
                      </div>
                    </div>';
                    }
                    else{
                      echo '<div class="col-4">
                      <div class="form-group">
                        <label for="twitter">Youtube</label>
                        <input class="form-control" name="youtube" id="youtube">
                      </div>
                    </div>';
                    }
                    
                    if(array_key_exists('wechat', $social) && $social['wechat'] != null && $social['wechat'] != ''){
                      echo '<div class="col-4">
                      <div class="form-group">
                        <label for="instagram">WeChat</label>
                        <input class="form-control" name="wechat" id="wechat" value="'.$social['wechat'].'">
                      </div>
                    </div>';
                    }
                    else{
                      echo '<div class="col-4">
                      <div class="form-group">
                        <label for="instagram">WeChat</label>
                        <input class="form-control" name="wechat" id="wechat">
                      </div>
                    </div>';
                    }

                    echo '</div>';
                  ?>
                </div>
              <?php } ?>
            </div>
                
            <div class="card-footer">
                <button type="submit" class="btn btn-success" name="submit"><i class="fas fa-save"></i> Save</button>
            </div>
          </form>
        </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="https://www.dqit4u.com/">dqit</a>.</strong>All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/image-preview/jquery.uploadPreview.min.js"></script>
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script>
$(function () {
  $.uploadPreview({
      input_field: "#profile-image",   // Default: .image-upload
      preview_box: "#profile-image-preview",  // Default: .image-preview
      label_field: "#profile-image-label",    // Default: .image-label
      label_default: "Choose Image",   // Default: Choose File
      label_selected: "Change Image",  // Default: Change File
      no_label: false                 // Default: false
  });

  $.uploadPreview({
      input_field: "#background-image",   // Default: .image-upload
      preview_box: "#background-image-preview",  // Default: .image-preview
      label_field: "#background-image-label",    // Default: .image-label
      label_default: "Choose Image",   // Default: Choose File
      label_selected: "Change Image",  // Default: Change File
      no_label: false                 // Default: false
  });
});
</script>
</body>
</html>