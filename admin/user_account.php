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
                    <h4 class="m-1 text-dark">User Account
                        <small> manages system end-users</small>
                    </h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><i class="fas fa-home"></i> User Account</li>
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
                    <h3 class="cheader-text" style="margin-top: 5px; font-size: 18px;">Account Management</h3>

                    </div>
                    <div class="col text-right">
                    <button class="btn btn-primary btn-sm custom-btn" id='addUserBtn' data-toggle='modal' data-target='#myModal'>Add User Account</button>
                    </div> 
                </div>
            </div>

            <div class="card-body">
                <table class="table table-hover text-bordered table-condensed table-striped">
                    <thead class="btn-yellow">
                        <th class="text-center">ISACTIVE</th>
                        <th class="text-center">USERNAME</th>
                        <th class="text-center">FULLNAME</th>
                        <th class="text-center">CONTACTNO</th>
                        <th class="text-center">MEMBEROF</th>
                    </thead>
                    <tbody id="userTableBody">
                        <?php
                                userDisplayTbl() //functions/displayTable.php
                        ?>
                    </tbody>
                </table>
            </div>

        </div>

        </div>
    </div>

</div>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addmember">User Account Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            <div class="modal-body">
            <div class="card" style="border: 2px solid maroon;">
                <div class="card-body">
                    <div class="row" style="margin-top:-10px">

                    <div class="col-md-4 text-center">
                        <div class="col-md-12">
                            <label>Username:</label>
                        </div>
                        <div class="col-md-12">
                            <input id="username" name="username" type="text" size="20" placeholder="Username">
                        </div>

                        <div class="col-md-12 mt-2">
                            <label>Password:</label>
                        </div>
                        <div class="col-md-12">
                            <input id="password" type="passsword" size="20" placeholder="Password">
                        </div>

                        <div class="col-md-12 mt-2">
                            <label>MemberOf:</label>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <select id="memberof"style="width: 200px; height: 30px;">
                                    <option value="ENCODER">ENCODER</option>    
                                    <option value="ADMINISTRATOR">ADMINISTRATOR</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12" style="margin-top: -9px;">
                            <label>isActive:</label>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <select id="isactive" style="width: 200px; height: 30px;">
                                    <option value="ACTIVE">ACTIVE</option>
                                    <option value="INACTIVE">INACTIVE</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-4 text-center">
                        <div class="col-md-12">
                            <label>Lastname:</label>
                        </div>
                        <div class="col-md-12">
                            <input id="lastname" type="text" size="20" placeholder="Lastname">
                        </div>

                        <div class="col-md-12 mt-2">
                            <label>Firstname:</label>
                        </div>
                        <div class="col-md-12">
                            <input id="firstname" type="text" size="20" placeholder="Firsname">
                        </div>

                        <div class="col-md-12 mt-2">
                            <label>Middlename:</label>
                        </div>
                        <div class="col-md-12">
                            <input id="middlename" type="text" size="20" placeholder="Middlename">
                        </div>

                        <div class="col-md-12 mt-2">
                            <label>ContactNo:</label>
                        </div>
                        <div class="col-md-12">
                            <input id="contactno" type="text" size="20" placeholder="ContactNo">
                        </div>
                    </div>

                    <div class="col-md-4 text-left" style="font-size: 14px;">
                        <div class="col-md-12 text-center" style="font-size: 15px;">
                            <label>Access Rights:</label>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" id="dashboard" name="dashboard" value="checked" style="margin-right:5px;">
                            <label for="dashboard" style="margin-top:6px; margin-right:30px;">Dashboard</label>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" id="record" name="record" value="checked" style="margin-right:5px;">
                            <label for="record" style="margin-top:6px; margin-right:30px;">Records</label>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" id="report" name="report" value="checked" style="margin-right:5px;">
                            <label for="report" style="margin-top:6px; margin-right:30px;">Reports</label>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" id="systmanager" name="systmanager" value="checked" style="margin-right:5px;">
                            <label for="systmanager" style="margin-top:6px; margin-right:30px;">System Manager</label>
                        </div>
                    </div>

                    </div>
                </div>
            </div>
            </div>

            <div class="modal-footer">
                <button id ="deletebutton" class="btn btn-danger mr-auto btn-sm" style="margin-left:10px" data-dismiss="modal" data-toggle="modal" data-target="#confirmationModal">Delete</button>
                <button data-dismiss="modal" data-toggle="modal" data-target="#confirmationModal" class="btn btn-primary btn-sm" style="margin-right:10px;">Save</button>
            </div>
       
    </div>
    </div>
</div>

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Are you sure you want to save these data?</h5>
        </div>
        <div class="modal-body d-flex justify-content-end">
            <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal" data-toggle="modal" data-target="#myModal">No</button>
            <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="proceedChanges()">Yes</button>
        </div>
        </div>
    </div>
</div>

<script> 
var addUserBtn = document.getElementById("addUserBtn");
var id = '';
var userOption = '';
var deletebutton = document.getElementById("deletebutton");

var isactive = document.getElementById("isactive");
var username = document.getElementById("username");
var password = document.getElementById("password");
var firstname = document.getElementById("firstname");
var middlename = document.getElementById("middlename");
var lastname = document.getElementById("lastname");
var contactno = document.getElementById("contactno");
var memberof = document.getElementById("memberof");
var dashboard = document.getElementById("dashboard");
var record = document.getElementById("record");
var report = document.getElementById("report");
var systmanager = document.getElementById("systmanager");

addUserBtn.addEventListener("click", function() {
    userOption = 'add';
    deletebutton.style.display = "none";
    username.value = "";
    password.value = "";
    isactive.value = "ACTIVE";
    firstname.value = "";
    middlename.value = "";
    lastname.value = "";
    contactno.value = "";
    memberof.value = "ENCODER";
    dashboard.checked = false;
    report.checked = false;
    record.checked = false;
    systmanager.checked = false;
});

deletebutton.addEventListener("click", function() {
    userOption = 'delete';
});

// Function to register event listener for "editUserBtns"
function registerEditUserBtnListeners() {
  var editUserBtns = document.querySelectorAll('tr.editUserBtn');
  editUserBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
      id = this.getAttribute('id');
      var xhr = new XMLHttpRequest();
      xhr.open('POST', '../inc_backend/userDataModal.php');
      xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          userOption = 'edit';
          deletebutton.style.display = "block";

          var userResp = JSON.parse(xhr.responseText);
          username.value = userResp.username;
          firstname.value = userResp.firstname;
          middlename.value = userResp.middlename;
          lastname.value = userResp.lastname;
          isactive.value = userResp.isactive;
          contactno.value = userResp.contactno;
          memberof.value = userResp.memberof;
          dashboard.checked = userResp.ar_dashboard;
          report.checked = userResp.ar_report;
          record.checked = userResp.ar_record;
          systmanager.checked = userResp.ar_systman;
        }
      };
      xhr.send('id=' + encodeURIComponent(id));
    });
  });
}

// Call the function to register event listeners when the page loads
document.addEventListener('DOMContentLoaded', function() {
  registerEditUserBtnListeners();
});

function proceedChanges() {
  $.ajax({
    url: '../inc_backend/userAddEdit_inc.php',
    type: 'POST',
    data: { id: id, userOption: userOption, username: username.value, isactive: isactive.value, password: password.value,  
            firstname: firstname.value, middlename: middlename.value, lastname: lastname.value,
            contactno: contactno.value, memberof: memberof.value, dashboard: dashboard.checked,
            report: report.checked, record: record.checked, systmanager: systmanager.checked},
    success: function(response) {
      //clear the table body
      var tbody = document.getElementById("userTableBody");
      while (tbody.firstChild) {
        tbody.removeChild(tbody.firstChild);
      }

      // data retrieve in ajax
      var data = JSON.parse(response);

      for (var index in data.username) {
        $('#userTableBody').append(
          "<tr class='editUserBtn' data-toggle='modal' data-target='#myModal' id='" + data.id[index] + "'>" +
          '<td>' + data.isactive[index] + '</td>' +
          '<td>' + data.username[index] + '</td>' +
          '<td>' + data.firstname[index] + " " + data.middlename[index] + " " + data.lastname[index] + '</td>' +
          '<td>' + data.contactno[index] + '</td>' +
          '<td>' + data.memberof[index] + '</td></tr>'
        );
      }

      // After adding new elements, register event listeners again
      registerEditUserBtnListeners();
    },
    error: function(xhr, status, error) {
      console.error(xhr.responseText);
    }
  });
}

</script>

<?php include('../admin/footer.php'); ?>