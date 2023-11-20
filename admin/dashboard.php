<?php 
require '../include/user_session.php'; // $user_id
include '../include/accessrightfunc.php'; //dashboard access
checkAccessRights($user_id, 'ar_dashboard');
include 'nav-bar.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> CUDHO | Dashboard </title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

 <div class="content-wrapper" style="min-height: 820px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-1 text-dark">Incoming Dashboard</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><i class="fas fa-home"></i> Incoming Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="row">

            <div class="col-lg-3 col-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>150</h3>
                        <p>ASSISTANCE</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>150</h3>
                        <p>REQUEST</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-document-text"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>150</h3>
                        <p>SPONSORSHIP</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ribbon-b"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>53<sup style="font-size: 20px">%</sup></h3>
                        <p>OTHER DOCUMENTS</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-briefcase"></i>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <div class="content">
        <div class="col-md-15">
            <div class="card card" >
                <div class="card-header" style="background-color:maroon; padding: .10rem;">
                <h7 style="font-size: 15px;margin-left: 10px;">
                    Recently Received Documents
                </h7>
                </div>

                <div class="card" style="margin-left:10px; margin-right:10px; margin-top:10px">
                    <div class="row">
                        <div class="col-12">
                        <div class="card">
                        <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                        <thead style="background-color: #ffcc00;">
                        <tr>
                        <th>DATE RECORDED</th>
                        <th>REQUESTING PARTY</th>
                        <th>LETTER CONTENT</th>
                        <th>ASSIGNED TO</th>
                        <th>STATUS</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                            // require '../include/connect.php'; //$con
                            // $sql = "SELECT * FROM user";
                            // $result = $con->query($sql);

                            // while($row = $result->fetch_assoc()){
                            //     echo "<tr>
                            //             <td>" . $row["isactive"] . "</td>
                            //             <td style='text-align: left'>" . $row["username"] . "</td>
                            //             <td style='text-align: left'>" . $row["firstname"] . " " . $row["middlename"] . " " . $row["lastname"] . "</td>
                            //             <td>" . $row["contactno"] . "</td>
                            //             <td>" . $row["memberof"] . "</td>
                            //         </tr>";
                            // }

                            ?>

                        </tbody>
                        </table>
                        </div>

                        </div>

                        </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

</div>

</body>
</html>

<?php include ('footer.php'); ?>