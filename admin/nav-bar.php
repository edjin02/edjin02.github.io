<?php 
    require '../include/connect1.php'; //$con
    
    $query = "SELECT * FROM tbl_user WHERE id = '$user_id'";
    $result = $con->query($query);

    $data = $result->fetch_assoc();

    $user_username = $data['username'];
    $ar_dashboard = $data['ar_dashboard'];
    $ar_record = $data['ar_record'];
    $ar_report = $data['ar_report'];
    $ar_systman = $data['ar_systman'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" href="../css/style.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">
    
    <link rel="stylesheet" href="../../adminLTE/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
    
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    
    <link rel="stylesheet" href="../../adminLTE/AdminLTE-3.2.0/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="../../adminLTE/AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

    <link rel="stylesheet" href="../../adminLTE/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="../../adminLTE/AdminLTE-3.2.0/plugins/jqvmap/jqvmap.min.css">

    <link rel="stylesheet" href="../../adminLTE/AdminLTE-3.2.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">

    <link rel="stylesheet" href="../../adminLTE/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.css">

    
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper" >

   
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: maroon;">
    
            <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                  <i class="fas fa-bars" style="color: white;"></i>
                  </a>
              </li>
            </ul>

            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true" style="color:white;">
                  <i class="fas fa-user"></i> <?php echo $user_username; $user_id;?>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                  <div class="dropdown-divider"></div>
                  <a href = "#" class="dropdown-item" data-toggle="modal" data-target="#changePasswordModal">
                    <i class="fas fa-envelope mr-2"></i>Change Password
                  </a>
                  <div class="dropdown-divider"></div>
                  <div class="logout">
                    <form action="../include/logout_inc.php" method="post">
                        <button type="submit" name="logout" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i>Log Out
                        </button>
                    </form>
                </div>

                  
                </div>
              </li>
            </ul>
        </nav>
      </div>

    <aside class="main-sidebar sidebar-light-primary elevation-2">
        <div class="logo" style="background-color: maroon; height: 56px;">
            <a href="index.php" class="brand-link">
              <img src="../../../cudho/img/starosalogo.png" alt="StarosaLogo" class="brand-image img-circle elevation-2" style="opacity: .8">
              <span class="brand-text font-weight-light" style="color: white;">CUDHO</span>
            </a>
        </div>
   

        <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info" >
        <a class="d-block" style="font-size: 20px;">
            <span id="currentDate"></span><br>
            <span id="currentTime"></span>
        </a>
    </div>
</div>

<script>
    function updateDateTime() {
        var currentDateElement = document.getElementById("currentDate");
        var currentTimeElement = document.getElementById("currentTime");
        
        var currentDateTime = new Date();
        var currentDate = currentDateTime.toLocaleDateString();
        var currentTime = currentDateTime.toLocaleTimeString();

        currentDateElement.textContent = currentDate;
        currentTimeElement.textContent = currentTime;
    }

    // Update the time every second
    setInterval(updateDateTime, 1000);

    // Initial call to display the time immediately
    updateDateTime();
</script>


      
        <div style="margin: -10px; text-align: center;">
          <a><h6 class="form-control form-control-sidebar" style=" color: white; background-color: black; font-size: 18px;">
            MAIN NAVIGATION
          </h6></a>
        </div>

        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Home
              </p>
            </a>
          </li>

          <li class="nav-item" <?php if ($ar_dashboard === "0") { echo ' style="display: none;"'; } ?>>
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          
          <li class="nav-item"<?php if ($ar_record === "0") { echo ' style="display: none;"'; } ?>>
            <a href="verify.php" class="nav-link">
              <i class="nav-icon fas fa-folder"></i>
              <p>Records</p>
            </a>
          </li>

          <li class="nav-item" <?php if ($ar_report === "0") { echo ' style="display: none;"'; } ?>>
          <a href="#" class="nav-link">
            <i class="nav-icon  fas fa-clipboard"></i>
            <p>
              Reports
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item ">
              <a href="masterlist.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Masterlist</p>
              </a>
            </li>
            
          </ul>
          </li>

          <li class="nav-item" <?php if ($ar_systman === "0") { echo ' style="display: none;"'; } ?>>
          <a href="#" class="nav-link">
            <i class="nav-icon  fas fa-cog"></i>
            <p>
              System Manager
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="user_account.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>User Account</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="./audit_trail.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Audit Trail</p>
              </a>
            </li>
          </ul>
          </li>
            
          </ul></nav>

          </li>
    
            </div>

        </aside>
        
        
        <!-- jQuery -->
        <script src="../../adminLTE/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="../../adminLTE/AdminLTE-3.2.0/plugins/jquery-ui/jquery-ui.min.js"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
        $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="../../adminLTE/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- ChartJS -->
        <script src="../../adminLTE/AdminLTE-3.2.0/plugins/chart.js/Chart.min.js"></script>
        <!-- Sparkline -->
        <script src="../../adminLTE/AdminLTE-3.2.0/plugins/sparklines/sparkline.js"></script>
        <!-- JQVMap -->
        <script src="../../adminLTE/AdminLTE-3.2.0/plugins/jqvmap/jquery.vmap.min.js"></script>
        <script src="../../adminLTE/AdminLTE-3.2.0/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
        <!-- jQuery Knob Chart -->
        <script src="../../adminLTE/AdminLTE-3.2.0/plugins/jquery-knob/jquery.knob.min.js"></script>
        <!-- daterangepicker -->
        <script src="../../adminLTE/AdminLTE-3.2.0/plugins/moment/moment.min.js"></script>
        <script src="../../adminLTE/AdminLTE-3.2.0/plugins/daterangepicker/daterangepicker.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="../../adminLTE/AdminLTE-3.2.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
        <!-- Summernote -->
        <script src="../../adminLTE/AdminLTE-3.2.0/plugins/summernote/summernote-bs4.min.js"></script>
        <!-- overlayScrollbars -->
        <script src="../../adminLTE/AdminLTE-3.2.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <!-- AdminLTE App -->
        <script src="../../adminLTE/AdminLTE-3.2.0/dist/js/adminlte.js"></script>
       
       
<div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="addmember">Change Password</h5>
          </div>

          <form id="changePasswordForm" action="../include/userchangepass.php" method="post">
          <div class="modal-body">
              <div class="card" style="border: 2px solid maroon;">
                  <div class="card-body">
                  <div class="row" style="margin-top:-10px">
                        
                    <div class="col">
                        <div class="col-md-12">
                            <label>Current Password:</label>
                        </div>
                        <div class="col-md-12">
                            <input name ="cur_pass" type="password" size="20" placeholder="Current Password">    
                        </div>

                        <div class="col-md-12 mt-2">
                            <label>New Password:</label>
                        </div>
                        <div class="col-md-12">
                            <input name ="new_pass" type="password" size="20" placeholder="New Password">    
                        </div>
                        
                        <div class="col-md-12 mt-2">
                            <label>Confirm Password:</label>
                        </div>
                        <div class="col-md-12">
                            <input name ="con_pass" type="password" size="20" placeholder="Confirm Password">    
                        </div>

                    </div>
                    
                    </div>

                  </div>
              </div>
              
          </div>

          <div id="alertContainer"></div>

          <div class="modal-footer">
              <button type="button" class="btn btn-warning mr-auto btn-sm" data-dismiss="modal" style="margin-left:10px;">Close</button>
              <button type="submit" value="Submit" class="btn btn-primary btn-sm" style="margin-right:10px;">Save</button>
          </div>
          </form>
      </div>
  </div>
</div>

</body>
</html>

<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="successModalLabel">Success</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Success</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="successModalOkBtn">OK</button>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function() {
    // Handle form submission
    $('#changePasswordForm').submit(function(e) {
      e.preventDefault(); // Prevent default form submission

      // Send AJAX request
      $.ajax({
        type: 'POST',
        url: $(this).attr('action'),
        data: $(this).serialize(),
        success: function(response) {
          // Display success or error alert based on response
          var alertClass = response.startsWith('Error') ? 'alert-danger' : 'alert-success';
          var alertMessage = response;

          if (alertClass === 'alert-success') {
            // Show success modal
            $('#successModal').modal('show');
          } else {
            // Show popup alert
            alert(alertMessage);
          }

        },
        error: function(xhr, status, error) {
          // Display error alert
          var alertMessage = 'An error occurred: ' + error;

          // Show popup alert
          alert(alertMessage);


          // Close the modal
          $('#changePasswordModal').modal('hide');
        }
      });
    });

    // Handle success modal OK button click
    $('#successModalOkBtn').click(function() {
      // Clear textboxes in the changePasswordModal
      $('#changePasswordModal input[type="password"]').val('');
    });
  });
</script>
