<?php 
require '../include/user_session.php';
include '../include/accessrightfunc.php'; //access rights
checkAccessRights($user_id, 'ar_systman');
include '../admin/nav-bar.php';
include '../functions/displayTable.php'; // Table Data
include '../functions/scripts.php';
?>

<title> CUDHO | User Account </title>

<div class="content-wrapper" style="min-height: 820px;">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-1 text-dark">Audit Trail
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><i class="fas fa-home"></i> Audit Trail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="col-md-15">
            <div class="card card">
            <div class="cheader-color">
                <div class="row">
                    <div class="col">
                    <h3 class="cheader-text" style="margin-top: 5px; font-size: 18px;">Log Activities</h3>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead class="btn-yellow">
                        <th class="text-center" style="width: 20%">DATE COMMITED</th>
                        <th class="text-center" style="width: 20%">USER ID</th>
                        <th class="text-center" style="width: 40%">ACTION DONE</th>
                        <th class="text-center" style="width: 20%">SUBJECT</th>
                    </thead>
                    <tbody id="auditTableBody" >
                        <?php
                            auditDisplayTbl() //functions/displayTable.php
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

        </div>
    </div>

</div>

<?php include('../admin/footer.php'); ?>