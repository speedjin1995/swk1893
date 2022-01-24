<!DOCTYPE html>
<?php
require_once 'php/db_connect.php';

session_start();

if(!isset($_SESSION['userID'])){
  echo '<script type="text/javascript">';
  echo 'window.location.href = "login.html";</script>';
}
else{
  $user = $db->query("SELECT * FROM user");
  $role = $db->query("SELECT * FROM user_role");
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SWK | User Management</title>

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
    <a href="#" class="brand-link">
      <img src="../assets/demo/logo.png" alt="SWK Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
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
            <a href="usermanagement.php" class="nav-link active">
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
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                User Setting
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <!--li class="nav-item">
                <a href="profile.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Update Profile</p>
                </a>
              </li-->
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
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User Management</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
                <button type="button" class="btn btn-block btn-primary btn-sm" id="addBlog" style="width: 10%;float: right;">Add</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <!--th>No.</th-->
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php while($row=mysqli_fetch_assoc($user)){ ?>
                        <tr class="message_row">
                            <!--td></td-->
                            <td><?=$row['user_name'] ?></td>
                            <td><?=$row['user_email'] ?></td>
                            <td><?=$row['user_role']?></td>
                            <td>
                                <div class="row">
                                    <div class="col-3">
                                        <button type="button" id="edit<?=$row['id'] ?>" onclick="edit(<?=$row['id'] ?>)" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                    </div>
                                    <div class="col-3">
                                        <button type="button" id="delete<?=$row['id'] ?>" onclick="deletes(<?=$row['id'] ?>)" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </td>
                          </tr>
                      <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  <div class="modal fade" id="userModal" style="overflow: auto;">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <form role="form" id="userForm" method="post" action="php/user.php" enctype="multipart/form-data">
          <div class="modal-header">
            <h4 class="modal-title">User Details</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input type="hidden" class="form-control" id="id" name="id">
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
              <label for="userName">Username *</label>
              <input class="form-control" name="username" id="username" placeholder="Enter Username for Subdomain" required>
            </div>
            <div class="form-group">
              <label for="newPassword">New Password *</label>
              <input type="password" class="form-control" name="password" id="password" placeholder="Enter User Password" required>
            </div>
            <div class="form-group">
              <label for="confirmPassword">Confirm Password *</label>
              <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" placeholder="Re-type User Password" required="">
            </div>
            <div class="form-group">
              <label for="Name">Name *</label>
              <input class="form-control" name="name" id="name" placeholder="Enter Company Name" required>
            </div>
            <div class="form-group">
              <label for="engContent">English Content *</label>
              <textarea class="textarea" id="engDescription" name="engDescription" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
            <div class="form-group"> 
              <label for="chineseContent">中文内容 *</label>
              <textarea class="textarea" id="chineseDescription" name="chineseDescription" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
            <div class="form-group"> 
              <label for="chineseContent">Phone Number *</label>
              <input class="form-control" id="phone" name="phone" placeholder="Enter your phone number" required>
            </div>
            <div class="form-group"> 
              <label for="chineseContent">Email *</label>
              <input class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="form-group"> 
              <label for="chineseContent">Address *</label>
              <textarea class="form-control" id="address" name="address" placeholder="Enter your address" required></textarea>
            </div>
            <div class="form-group">
              <label for="roleCode">Role Code *</label>
              <select class="form-control" id="roleCode" name="roleCode" required>
                <?php while($row2=mysqli_fetch_assoc($role)){ ?>
                  <option value="<?=$row2['role_code'] ?>"><?=$row2['role_name'] ?></option>
                <?php } ?>
              </select>
              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label for="facebook">Facebook</label>
                    <input class="form-control" name="facebook" id="facebook">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="instagram">Instagram</label>
                    <input class="form-control" name="instagram" id="instagram">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="instagram">WeChat</label>
                    <input class="form-control" name="wechat" id="wechat">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-4">
                  <div class="form-group">
                    <label for="twitter">Twitter</label>
                    <input class="form-control" name="twitter" id="twitter">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="twitter">Youtube</label>
                    <input class="form-control" name="youtube" id="youtube">
                  </div>
                </div>
                <div class="col-4">
                  <div class="form-group">
                    <label for="twitter">Tiktok</label>
                    <input class="form-control" name="tiktok" id="tiktok">
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group"> 
              <label for="video1">Video 1</label>
              <input class="form-control" id="video1" name="video1" placeholder="Video URL">
            </div>
            <div class="form-group"> 
              <label for="video2">Video 2</label>
              <input class="form-control" id="video2" name="video2" placeholder="Video URL">
            </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="submit" id="submitUser">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>

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
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
      "paging": true,
      "searching": true,
      "ordering": true,
      "info": true,
    });
    
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

    $('#engDescription').summernote();
    $('#chineseDescription').summernote();
    
    $('#addBlog').on('click', function(){
      $('#userModal').find('#id').val('');
      $('#userModal').find('#username').val('');
      $('#userModal').find('#password').val('');
      $('#userModal').find('#confirmPassword').val('');
      $('#userModal').find('#name').val("");
      $('#userModal').find('#engDescription').summernote("code", "");
      $('#userModal').find('#chineseDescription').summernote("code", "");
      $('#userModal').find('#phone').val("");
      $('#userModal').find('#email').val("");
      $('#userModal').find('#address').val("");
      $('#userModal').find('#roleCode').val("");
      $('#userModal').find('#facebook').val("");
      $('#userModal').find('#instagram').val("");
      $('#userModal').find('#twitter').val("");
      $('#userModal').find('#youtube').val("");
      $('#userModal').find('#wechat').val("");
      $('#userModal').find('#tiktok').val("");

      $('#userModal').find('#password').removeAttr('readonly');
      $('#userModal').find('#confirmPassword').removeAttr('readonly');
      $('#userModal').modal('show');
      
      $('#userForm').validate({
          errorElement: 'span',
          errorPlacement: function (error, element) {
              error.addClass('invalid-feedback');
              element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
              $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
              $(element).removeClass('is-invalid');
          }
      });
    });
});

function edit(id){
    $.post( "php/getUser.php", { messageId: id}, function( data ) {
        var decode = JSON.parse(data)
        
        if(decode.status === 'success'){
          $('#userModal').find('#id').val(decode.message.id);
          $('#userModal').find('#username').val(decode.message.user_name);
          $('#userModal').find('#password').val(decode.message.password);
          $('#userModal').find('#confirmPassword').val(decode.message.password);
          $('#userModal').find('#name').val(decode.message.name);
          $('#userModal').find('#engDescription').summernote("code", decode.message.english_description);
          $('#userModal').find('#chineseDescription').summernote("code", decode.message.chinese_description);
          $('#userModal').find('#phone').val(decode.message.phone_number);
          $('#userModal').find('#email').val(decode.message.user_email);
          $('#userModal').find('#address').val(decode.message.address);
          $('#userModal').find('#roleCode').val(decode.message.user_role);
          $('#userModal').find('#video1').val(decode.message.video_1);
          $('#userModal').find('#video2').val(decode.message.video_2);
          $('#userModal').find('#password').attr('readonly', true);
          $('#userModal').find('#confirmPassword').attr('readonly', true);

          var social = JSON.parse(decode.message.social_media);

          $('#userModal').find('#facebook').val(social.facebook);
          $('#userModal').find('#instagram').val(social.instagram);
          $('#userModal').find('#twitter').val(social.twitter);
          $('#userModal').find('#youtube').val(social.youtube);
          $('#userModal').find('#wechat').val(social.wechat);
          $('#userModal').find('#tiktok').val(social.tiktok);

          $('#userModal').modal('show');
          
          $('#userForm').validate({
              errorElement: 'span',
              errorPlacement: function (error, element) {
                  error.addClass('invalid-feedback');
                  element.closest('.form-group').append(error);
              },
              highlight: function (element, errorClass, validClass) {
                  $(element).addClass('is-invalid');
              },
              unhighlight: function (element, errorClass, validClass) {
                  $(element).removeClass('is-invalid');
              }
          });
        }
    });
}

function deletes(id){
    $.post( "php/deleteblog.php", { messageId: id}, function( data ) {
        var decode = JSON.parse(data)
        
        if(decode.status === 'success'){
            alert(decode.message);
            $('#delete' + id).parents('.message_row').remove();
        }
    });
}
</script>
</body>
</html>
