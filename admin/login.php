
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CUDHO | Log in</title>

    <?php
        include '..\..\cudho\functions\scripts.php';
    ?>
    
</head>
<body>
    
    <div style="background-image: url(../img/santarosa_arch2.jpg); background-size: cover">
  <!-- /.login-logo -->
    <div class="container vh-100">
        <div class="row justify-content-center h-100">
            <div class="card w-25 my-auto" style="background-color: maroon; margin: 0; padding: 0" >
                
                <div class="card-header text-center" style="font-family:'Times New Roman', Times, serif; font-size: 20px;">
                    <h2><b>CUDHO</b></h2>
                    <p>Informal Settlers Record<br>
                        Management System</p>
                </div>
                <div class="card-body">

                <form id="login-form" method="POST" action="../include/loginfunc_inc.php">
                    <div class="input-group mb-3">
                    <input type="username" id="username" class="form-control" name="username" placeholder="username" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    
                    </div>
    
                    <div class="col-13">
                        <button type="submit" class="btn btn-warning btn-block" value="Login">Sign In</button>
                    </div>
                </form>


                </div>

            </div>
        </div>
    </div> 
    </div>




</body>
</html>