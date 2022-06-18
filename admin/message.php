<!DOCTYPE html>
<?php
require_once 'php/db_connect.php';

session_start();

if(!isset($_SESSION['userID'])){
  echo '<script type="text/javascript">';
  echo 'window.location.href = "login.html";</script>';
}
else{
    $message = $db->query("SELECT * FROM message_resource");
    $userRole = $_SESSION['userRole'];
}
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>SWK | Message Resource</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

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
            <a href="slideblog.php" class="nav-link">
              <i class="nav-icon fas fa-th "></i>
              <p>Testimony Slide</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="knowledge.php" class="nav-link">
              <i class="nav-icon fas fa-th "></i>
              <p>Knowledge</p>
            </a>
          </li>                    
          <li class="nav-item">
            <a href="message.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Message Resource</p>
            </a>
          </li>
          <?php if($userRole=="EDITOR" || $userRole=="PRIADMIN"){
            echo '<li class="nav-item">
            <a href="usermanagement.php" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>User Management</p>
            </a>
          </li>';
          } ?>
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
            <h1 class="m-0 text-dark">Message Resources</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Message Resources</li>
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
                <button type="button" class="btn btn-block btn-primary btn-sm" id="addMessage" style="width: 10%;float: right;">Add</button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="messageTable" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>No.</th>
                        <th>Message Code</th>
                        <th>English</th>
                        <th>Chinese</th>
                        <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php while($row=mysqli_fetch_assoc($message)){ ?>
                        <tr class="message_row">
                            <td><?=$row['id'] ?></td>
                            <td><?=$row['message_key_code'] ?></td>
                            <td><?=$row['en'] ?></td>
                            <td><?=$row['ch'] ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-4">
                                        <button type="button" id="edit<?=$row['id'] ?>" onclick="edit(<?=$row['id'] ?>)" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></button>
                                    </div>
                                    <div class="col-4">
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
  
  <div class="modal fade" id="messageModal">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <form role="form" id="messageForm" method="post" action="php/message.php">
            <div class="modal-header">
              <h4 class="modal-title">Message Resource Details</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <div class="form-group">
    					<input type="hidden" class="form-control" id="keyId" name="keyId">
    				</div>
    				<div class="form-group">
    					<label for="keyCode">Message Key Code *</label>
    					<input class="form-control" name="keyCode" id="keyCode" placeholder="Message Key Code" required>
    				</div>
    				<div class="form-group">
    					<label for="englishDecs">English Description</label>
    					<textarea class="form-control" name="englishDecs" id="englishDecs" rows="3" placeholder="English Description" required></textarea>
    				</div>
    				<div class="form-group">
    					<label for="chineseDecs">中文解释</label>
    					<textarea class="form-control" name="chineseDecs" id="chineseDecs" rows="3" placeholder="中文解释" required></textarea>
    				</div>
    			</div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" name="submit" id="submitMessage">Submit</button>
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
    <strong>Copyright &copy; 2021 <a href="https://www.dqit4u.com/">dqit</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
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
<script>
$(function () {
    $("#messageTable").DataTable({
      "responsive": true,
      "autoWidth": false,
      "paging": true,
      "searching": true,
      "ordering": true,
      "info": true,
    });
    
    $('#addMessage').on('click', function(){
        $('#messageModal').find('#keyId').val('');
        $('#messageModal').find('#keyCode').val('');
        $('#messageModal').find('#englishDecs').val('');
        $('#messageModal').find('#chineseDecs').val('');
        $('#messageModal').modal('show');
        
        $('#messageForm').validate({
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
    $.post( "php/getmessage.php", { messageId: id}, function( data ) {
        var decode = JSON.parse(data)
        
        if(decode.status === 'success'){
            $('#messageModal').find('#keyId').val(decode.message.id);
            $('#messageModal').find('#keyCode').val(decode.message.message_key_code);
            $('#messageModal').find('#englishDecs').val(decode.message.en);
            $('#messageModal').find('#chineseDecs').val(decode.message.ch);
            $('#messageModal').modal('show');
            
            $('#messageForm').validate({
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
    $.post( "php/deletemessage.php", { messageId: id}, function( data ) {
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
