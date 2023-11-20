<?php  
    require '../include/user_session.php'; // $user_id
    include '../include/accessrightfunc.php'; //dashboard access
    checkAccessRights($user_id, 'ar_record');
    include 'nav-bar.php';
    include '../functions/scripts.php';
    include '../functions/displayTable.php'; // Table Data

    if (isset($_POST['id'])) {
        $_SESSION['selected_id'] = $_POST['id'];
        $head_id = $_POST['id'];
    } 
    
    elseif (isset($_SESSION['head_id'])) {
        $head_id = $_SESSION['head_id'];
    }
    else {    
        echo "No ID provided.";
        exit;
    }

    require '../include/datamemberview_inc.php'; // data for memberview
?>


<!-- JONATHAN'S PART - INLINE SCRIPT FOR UPLOAD IMAGES -->
<script src="../functions/memberview-drop.js"></script>

<style>
      
      /* .card {
        width: 100%;
        height: 300px;
        border: 1px solid #ccc;
        text-align: center;
        overflow-x: hidden;
      }
    
      .card img {
        max-width: 100%;
        max-height: 200px;
        margin-bottom: 10px;
        cursor: pointer;
      } */
    
      .preview-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.7);
        justify-content: center;
        align-items: center;
        z-index: 9999;
      }
    
      .preview-modal img {
        max-width: 80%;
        max-height: 80%;
      }
    /* 
      #fileInput {
        display: none;
      } */
      
      .content {
        height: 100%;
        overflow-y: auto;
        padding: 10px;
      }
      .content-wrapper {
        position: relative; /* Add position relative to the container */
      }
    
    </style>

<script>
  function handleButtonClick() {
    var fileInput = document.getElementById('fileInput');
    var headIdInput = document.getElementById('headIdInput');
    var userIdInput = document.getElementById('userIdInput');
    fileInput.click();

    fileInput.addEventListener('change', function() {
      var formData = new FormData();
      var files = fileInput.files;
      var headId = headIdInput.value;
      var userId = userIdInput.value;

      for (var i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
      }

      formData.append('head_id', headId);
      formData.append('user_id', userId); // Append the user_id to the form data

      var xhr = new XMLHttpRequest();
      xhr.open('POST', 'upload.php', true);
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
          var response = xhr.responseText;
          displayAlert(response);
          // Refresh the page
          location.reload();
        }
      };

      xhr.send(formData);
    });
  }

  function displayAlert(message) {
    alert(message);
  }
</script>

<script src="../functions/jQuerySQL.js"></script>

<title> CUDHO | MemberView </title>


 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" style="min-height: 820px;">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                    <h3 class="m-1 text-dark">Member View <a style="font-size:13px">View, Add, Edit and/or Print Member's Registration</a></h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php"><i class="fas fa-home"></i> Home</a></li>
                            <li class="breadcrumb-item">Records</li>
                            <li class="breadcrumb-item"><a href="verify.php">Verification</a></li>
                            <li class="breadcrumb-item">Member View</li>
                        </ol>   
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content-header -->

    <!-- box container -->
    <section class="content">
    <div class="col-md-20">
    <div class="card card-widget widget-user">
        <div class="cheader-color">
        <div class="row">
            <div class="col">
                <h3 class="cheader-text">Member Information</h3>
            </div>
            <div class="col text-right">
            <button type="button" class="btn btn-primary btn-sm custom-btn">Validation</button>
            </div> 
        </div>
        </div>

        <div class="cfooter1" style ="padding-top: 10px;">
        <div class="row">

            <div class="col-md-4">
                <div class="card card-widget widget-user">
                    <div class="cheader-color">
                        <div class="row">
                            <div class="col">
                                <h3 class="cheader-text">HouseHold Head Info</h3>
                            </div>

                            <div class="col text-right">
                            <button type="button" class="btn btn-primary btn-sm custom-btn"  data-toggle= "modal" data-target="#headModal" id="editHeadBtn">Edit</button>
                            </div> 

                        </div>
                    </div>
                    <div class="card-footer" style ="padding-top: 10px;">
                        <div class="row">
                            <div class="col">
                                <h8 >Household Head:</h8>
                                <?php echo "<h8>" . $head_firstname . " " . $head_middlename . " " . $head_lastname ."</h8>"; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h8>Barangay:</h8>
                                <?php echo "<h8>" . $head_barangay ."</h8>"; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h8>Tag No:</h8>
                                <?php echo "<h8>" . $head_tag ."</h8>"; ?>
                            </div>
                        </div>
                        <div class="row" >
                            <div class="col">
                                <h8>Basic Housing Data:</h8>
                                <?php //echo "<h8>" . $head_tag ."</h8>"; ?>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col">
                                <h8>Community:</h8>
                                <?php echo "<h8>" . $head_community ."</h8>"; ?>
                            </div>
                        </div>
                       
                        <div class="row">
                            <div class="col">
                                <h8>Birthdate:</h8>
                                <?php echo "<h8>" . $head_birthdatename ."</h8>"; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h8>Age:</h8>
                                <?php echo "<h8>" . $head_age ."</h8>"; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h8>Gender:</h8>
                                <?php echo "<h8>" . $head_gender ."</h8>"; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h8>Civil Status:</h8>
                                <?php echo "<h8>" . $head_civilStatus ."</h8>"; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h8>Occupation:</h8>
                                <?php echo "<h8>" . $head_occupation ."</h8>"; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h8>Monthly Income:</h8>
                                <?php echo "<h8>" . $head_monthIncome ."</h8>"; ?>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col">
                                <h8>Membership:</h8>
                                <?php echo "<h8>" . $head_pagIbigName . " " . $head_sssName . " " . $head_otherName . " " . "</h8>"; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h8>Tenurial Status:</h8>
                                <?php echo "<h8>" . $head_tenurStatus ."</h8>"; ?>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col">
                                <h8>Structure:</h8>
                                <?php echo "<h8>" . $head_structure ."</h8>"; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h8>Children Working & Living w/ Parents:</h8>
                                <?php echo "<h8>" . $work_count ."</h8>"; ?>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col">
                                <h8>Minor Children:</h8>
                                <?php echo "<h8>" . $minor_count ."</h8>"; ?>
                            </div>
                        </div>

                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col">
                                <h8>Total Monthly Income:</h8>
                                <?php echo "<h8>" . $formatted_total_monthIncome ."</h8>"; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h8>Year of Stay:</h8>
                                <?php echo "<h8>" . $head_yearStayname ."</h8>"; ?>
                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px;">
                            <div class="col">
                                <h8>Length of Stay:</h8>
                                <?php echo "<h8>" . $head_lengthStay ."</h8>"; ?>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <h8>Relocation Unavailable:</h8>
                                <?php echo "<h8>" . $head_relocUnavailable ."</h8>"; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h8>Relocated:</h8>
                                <?php echo "<h8>" . $head_relocated ."</h8>"; ?>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            <div class="col-md-4">
            <div class="card card-widget widget-user faminfo" >
                
                <div class="cheader-color">
                    <div class="row">
                        <div class="col">
                            <h3 class="cheader-text">Family Info</h3>
                        </div>

                    </div>
                </div>
                <div class="card-footer" style ="padding-top: 10px;">
                    <div class="card card-widget widget-user">
                    <div class="cheader-color">
                        <div class="row">
                            <div class="col">
                                <h3 class="cheader-text">Spouse Info</h3>
                            </div>

                            <div class="col text-right">
                            <button class="btn btn-primary btn-sm custom-btn" id='editSpouseBtn' data-toggle='modal' data-target='#spouseModal'>Edit</button>
                            </div> 

                        </div>
                    </div>
                    <div class="card-footer" style ="padding-top: 10px;">
                    <div class="row">
                        <div class="col">
                            <h8 >Spouse:</h8>
                            <?php echo "<h8>" . $spouse_firstname . " " . $spouse_middlename . " " . $spouse_lastname ."</h8>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h8>Birthdate:</h8>
                            <?php echo "<h8>" . $spouse_birthname ."</h8>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h8>Age:</h8>
                            <?php echo "<h8>" . $spouse_age ."</h8>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h8>Gender:</h8>
                            <?php echo "<h8>" . $spouse_gender ."</h8>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h8 >Civil Status:</h8>
                            <?php echo "<h8>" . $spouse_civilStatus ."</h8>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h8 >Occupation:</h8>
                            <?php echo "<h8>" . $spouse_occupation ."</h8>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h8 >Monthly Income:</h8>
                            <?php echo "<h8>" . $spouse_monthIncome ."</h8>"; ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <h8>Membership:</h8>
                            <?php echo "<h8>" . $spouse_pagIbigName . " " . $spouse_sssName . " " . $spouse_otherName . " " . "</h8>"; ?>
                        </div>
                    </div>
                    </div>
                </div>
       
                <div class="card card-widget widget-user">
                    <div class="cheader-color">
                        <div class="row">
                            <div class="col">
                                <h3 class="cheader-text">Working Children</h3>
                            </div>
                            <div class="col text-right">
                            <button  id="addWorkBtn" data-toggle='modal' data-target='#workModal' class="btn btn-primary btn-sm custom-btn" >Add</button>
                            </div> 
                        </div>
                    </div>
                    <div class="card-footer" style ="padding-top: 10px;">
                        <div class="card-body table-responsive" style="padding: 1px"> 
                            <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" >
                            <thead style="background-color: #ffcc00;">
                            <tr>
                            <th style="width: 80%">Full Name</th>
                            <th style="width: 20%">Monthly Income</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                workDisplayTbl($head_id) //functions/displayTable.php
                            ?>
                            </tbody>
                            </table>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="card card-widget widget-user">
                    <div class="cheader-color">
                        <div class="row">
                            <div class="col">
                                <h3 class="cheader-text">Minor Children</h3>
                            </div>
                            <div class="col text-right">
                            <button class="btn btn-primary btn-sm custom-btn" id='addMinorBtn' data-toggle='modal' data-target='#minorModal'>Add</button>
                            </div> 
                        </div>
                    </div>
                    <div class="card-footer" style ="padding-top: 10px;">
                        <div class="card-body table-responsive" style="padding: 1px"> 
                            <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" >
                            <thead style="background-color: #ffcc00;">
                            <tr>
                            <th style="width: 80%">Full Name</th>
                            <th style="width: 20%">Age</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                minorDisplayTbl($head_id);
                            ?>
                            </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-widget widget-user">
                    <div class="cheader-color">
                        <div class="row">
                            <div class="col">
                                <h3 class="cheader-text">Senior Citizen / PWD</h3>
                            </div>
                            <div class="col text-right">
                            <button id='addSeniorBtn' id = "addSeniorBtn" data-toggle='modal' data-target='#seniorModal' class="btn btn-primary btn-sm custom-btn" >Add</button>
                            </div> 
                        </div>
                    </div>
                    <div class="card-footer" style ="padding-top: 10px;">
                        <div class="card-body table-responsive" style="padding: 1px"> 
                            <div class="card-body table-responsive p-0">
                            <table class="table table-hover text-nowrap" >
                            <thead style="background-color: #ffcc00;">
                            <th style="width: 80%">Full Name</th>
                            <th style="width: 20%">Status</th>
                            </thead>
                            <tbody>
                            <?php
                                seniorDisplayTbl($head_id);
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

            <div class="col-md-4">
            <div class="col">
                    <div class="card" style="width: 100%; height: 300px; border: 1px solid #ccc; text-align: center; overflow-x: hidden;">
                        <div class="card-header" style="background-color: maroon; display: flex; justify-content: flex-end;">
                            <div style="margin-right: auto;">
                                <span style="color: white; padding-right: 5px;font-size:15px">Images</span>
                                <form id="uploadForm" method="POST" enctype="multipart/form-data">
                                    <input id="headIdInput" style="display: none;" type="text" name="head_id" value = <?php echo $head_id?>>
                                    <input id="userIdInput" style="display: none;" type="text" name="user_id" value = <?php echo $user_id?>>
                                    <input type="file" id="fileInput" name="files[]" multiple style="display: none;">
                                </form>
                            </div>
                            <input type="button" value="Upload" style="background-color: maroon; color: white; padding: 5px; border: none; font-family: Arial; font-size: 15px;" onclick="handleButtonClick()">
                        </div>
                        <div class="card-body" style="overflow-y: auto;">
                            <div class="col-12">
                            <div class="scrollable" id="imagePreview">
                            <?php
                            include '../include/connect1.php';
                            $query = "SELECT imagePath FROM tbl_image WHERE head_id = $head_id";
                            $result = $con->query($query);

                            if ($result) {
                                // Check if there are rows in the result set
                                if (mysqli_num_rows($result) > 0) {
                                    // Iterate over each row and display the images
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $filepath = $row['imagePath'];
                                        echo '<div style="width: 100%; margin-bottom: 10px;">';
                                        echo '<img src="' . $filepath . '" alt="Image" onclick="showPreview(\'' . $filepath . '\')" style="border: 1px solid black; max-width: 100%; max-height: 200px; cursor: pointer;">';
                                        echo '</div>';
                                        echo '<hr style="border-top: 3px solid black; margin: 5px;">';
                                    }
                                } else {
                                    echo 'No images found.';
                                }

                                // Free the result set
                                mysqli_free_result($result);
                            } else {
                                // Display the error message
                                echo 'Error executing the query: ' . mysqli_error($con);
                            }
                            
                            // Close the database connection
                            mysqli_close($con);
                            ?>
                            </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="preview-modal" id="previewModal">
                    <img id="modalImage" alt="Preview">
                </div>
                <script>
                    function showPreview(imageSrc) {
                        var modal = document.getElementById('previewModal');
                        var image = document.getElementById('modalImage');
                        
                        image.src = imageSrc;
                        modal.style.display = 'flex';
                    }
                    
                    function hidePreview() {
                        var modal = document.getElementById('previewModal');
                        modal.style.display = 'none';
                    }
                    
                    document.addEventListener('click', function(event) {
                        var modal = document.getElementById('previewModal');
                        
                        // Check if the click occurred outside the modal
                        if (event.target === modal) {
                        hidePreview();
                        }
                    });
                </script>

                <div class="card card-widget widget-user">
                    <div class="cheader-color">
                        <div class="row">
                            <div class="col">
                                <h3 class="cheader-text">Facilties</h3>
                            </div>

                            <div class="col text-right">
                            <button class="btn btn-primary btn-sm custom-btn" data-toggle='modal' data-target='#facilityModal' id='editFacilityBtn'>Edit</button>
                            </div> 

                        </div>
                    </div>
                    <div class="card-footer" style ="padding-top: 10px;">
                    <div class="row">
                        <div class="col">
                            <h8 >Electricity:</h8>
                            <?php echo "<h8>" . $electricity ."</h8>"; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h8>Water:</h8>
                            <?php echo "<h8>" . $water ."</h8>"; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h8>Toilet:</h8>
                            <?php echo "<h8>" . $toilet ."</h8>"; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h8>Kitchen:</h8>
                            <?php echo "<h8>" . $kitchen ."</h8>"; ?>
                        </div>
                    </div>

        
                </div>
       
        </div>

                <div class="card card-widget widget-user">
                    <div class="cheader-color">
                        <div class="row">
                            <div class="col">
                                <h3 class="cheader-text">Interview Information</h3>
                            </div>

                            <div class="col text-right">
                            <button class="btn btn-primary btn-sm custom-btn" id="editInterviewBtn" data-toggle='modal' data-target='#interviewModal'>Edit</button>
                            </div> 

                        </div>
                    </div>
                    <div class="card-footer" style ="padding-top: 10px;">
                    <div class="row">
                        <div class="col">
                            <h8 >Respondent:</h8>
                            <?php echo "<h8>" . $respondent_firstname . " " . $respondent_middlename . " " . $respondent_lastname ."</h8>"; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h8>Relationship:</h8>
                            <?php echo "<h8>" . $respondent_relationship ."</h8>"; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h8>Interviewer:</h8>
                            <?php echo "<h8>" . $interviewer_firstname . " " . $interviewer_middlename . " " . $interviewer_lastname ."</h8>"; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h8>Date:</h8>
                            <?php echo "<h8>" . $interviewer_date ."</h8>"; ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <h8>Remarks:</h8>
                            <?php echo "<h8>" . $interviewer_remarks ."</h8>"; ?>
                        </div>
                    </div>

        
                </div>
       
        </div>

         
        </div>
        </div>

    </div>
    </div>    
    </section>

</div>      


<div class="modal fade" id="seniorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="seniorLbl" class="modal-title">Seniors and PWDs Modal Detail</h5>
            </div>

            <form action="../inc_backend/seniorAddEdit_inc.php" method="POST">
                <input style="display: none;" type="text" name="head_id" value = <?php echo $head_id?>>
                <input style="display: none;" type="text" name="optionSenior" id="optionSenior">
                <input style="display: none;" type="text" name="senior_id" id="senior_id">
            <div class="modal-body">   
                <div class="card" style="border: 2px solid maroon;">
                <div class="card-body">
                <div class = "row">

                <div class="col-md-3 mb-3">
                    <label for="senior_gender">Gender:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="senior_gender" id="senior_gender" required>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                    </div>
                </div>       
                <div class="col-md-3 mb-3">
                <label for="senior_birthDate">Birthdate:</label>
                <div class="input-group">
                    <input type="date" class="input-border form-control" name="senior_birthDate" id="senior_birthDate"
                     placeholder="BirthDate">
                </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <input type="checkbox" value="checked" name="senior_Box" id="senior_Box" style="margin-bottom: 10px; margin-top: 6px;">
                        <label for="senior_Box" style="margin-top: 6px;">Senior Citizen</label>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div style="display: flex; flex-direction: column; align-items: center;">
                        <input type="checkbox" value="checked" name="pwd_Box" id="pwd_Box" style="margin-bottom: 10px; margin-top: 6px;">
                        <label for="pwd_Box" style="margin-top: 6px;">PWD</label>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                <label for="senior_lastName">LastName:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="senior_lastName" id="senior_lastName"
                    placeholder="Last Name">
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="senior_givenName">Given Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="senior_givenName" id="senior_givenName"
                     placeholder="Given Name">
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="senior_middleName">Middle Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="senior_middleName" id="senior_middleName"
                    placeholder="Middle Name">
                </div>
                </div>
                <div class="col-md-3 mb-3" id="seniorMaidenNameCont">
                    <label for="senior_maidenName">Maiden Name:</label>
                    <div class="input-group">
                        <input type="text" class="input-border form-control" name="senior_maidenName" id="senior_maidenName" placeholder="Maiden Name">
                    </div>
                </div>

                <div class="col-md-3 mb-3" id="seniorextensionCont">
                    <label for="senior_extension">Extension:</label>
                    <div class="input-group">
                        <input type="text" class="input-border form-control" name="senior_extension" id="senior_extension" placeholder="Extension">
                    </div>
                </div>

                </div>
                </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" id ="delSeniorBtn" class="btn btn-danger mr-auto btn-sm" style="margin-left:10px;">Delete</button>
                <button type="submit" name="submit" class="btn btn-primary btn-sm" style="margin-right:10px;">Save</button>
            </div>
            </form>
        
        </div>
    </div>
</div>

<!-- senior and pwd data -->
<script>
    var addSeniorBtn = document.getElementById("addSeniorBtn");
    var delSeniorBtn = document.getElementById("delSeniorBtn");

    var optionSenior = document.getElementById("optionSenior");
    var seniorLbl = document.getElementById("seniorLbl");

    var senior_id = document.getElementById("senior_id");
    var senior_lastname = document.getElementById("senior_lastName");
    var senior_firstname = document.getElementById("senior_givenName");
    var senior_middlename = document.getElementById("senior_middleName");
    var senior_gender = document.getElementById("senior_gender");
    var senior_birthdate = document.getElementById("senior_birthDate");
    var senior_extension = document.getElementById("senior_extension");
    var senior_maidenname = document.getElementById("senior_maidenName");
    var senior_Box = document.getElementById("senior_Box");
    var pwd_Box = document.getElementById("pwd_Box");
    
    addSeniorBtn.addEventListener("click", function() {
        seniorLbl.innerHTML = "Add Seniors and PWDs";
        optionSenior.value = "add";
        delSeniorBtn.style.display = "none";
        senior_lastname.value = "";
        senior_firstname.value = "";
        senior_middlename.value = "";
        senior_birthdate.value = "";
        senior_extension.value = "";
        senior_maidenname.value = "";
        senior_Box.checked = false;
        pwd_Box.checked = false;
    });

    delSeniorBtn.addEventListener("click", function() {
        optionSenior.value = "delete";
    });

    var editSeniorBtns = document.querySelectorAll('tr.editSeniorBtn');
    editSeniorBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
        var minor_value = this.getAttribute('minor-value');
        var head_value = this.getAttribute('head-value');
        var tbl_value = this.getAttribute('tbl-value');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../inc_backend/ajaxTbl.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                seniorLbl.innerHTML = "Edit Seniors and PWDs";
                optionSenior.value = "edit";
                delSeniorBtn.style.display = "block";

                var seniorResp = JSON.parse(xhr.responseText);
                senior_id.value = seniorResp.id;
                senior_firstname.value = seniorResp.firstname;
                senior_middlename.value = seniorResp.middlename;
                senior_lastname.value = seniorResp.lastname;
                senior_extension.value = seniorResp.extension;
                senior_maidenname.value = seniorResp.maidenname;
                senior_birthdate.value = seniorResp.birthdate;
                senior_Box.checked = seniorResp.senior; // for checkbox
                pwd_Box.checked = seniorResp.pwd;
                senior_gender.value = seniorResp.gender;
                $("#senior_gender").trigger("change");//to change children work gender
            }
        };
        xhr.send('head_value=' + encodeURIComponent(head_value) + '&minor_value=' + encodeURIComponent(minor_value) + '&tbl_value=' + encodeURIComponent(tbl_value));
    });
});

</script>

<div class="modal fade" id="workModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="workLbl" class="modal-title">Work Children Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="../inc_backend/workAddEdit_inc.php" method="POST">
                <input style="display: none;" type="text" name="head_id" value = <?php echo $head_id?>>
                <input style="display: none;" type="text" name="optionWork" id="optionWork">
                <input style="display: none;" type="text" name="work_id" id="work_id">
            <div class="modal-body">   
                <div class="card" style="border: 2px solid maroon;">
                <div class="card-body">
                <div class = "row">

                <div class="col-md-4 mb-3">
                    <label for="work_gender">Gender:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="work_gender" id="work_gender" required>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4 mb-3">
                <label for="work_birthDate">Birthdate:</label>
                <div class="input-group">
                    <input type="date" class="input-border form-control" name="work_birthDate" id="work_birthDate" required>
                </div>
                </div>
            
                <div class="col-md-4 mb-3">
                    <label for="work_civilStatus">Civil Status:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="work_civilStatus" id="work_civilStatus" required>
                            <option value="SINGLE">SINGLE</option>
                            <option value="MARRIED">MARRIED</option>
                            <option value="DIVORCED">DIVORCED</option>
                            <option value="WIDOWED">WIDOWED</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                <label for="work_lastName">LastName:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="work_lastName" id="work_lastName"
                    placeholder="Last Name" required>
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="work_givenName">Given Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="work_givenName" id="work_givenName"
                     placeholder="Given Name" required>
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="work_middleName">Middle Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="work_middleName" id="work_middleName"
                    placeholder="Middle Name">
                </div>
                </div>

                <div class="col-md-3 mb-3" id="workMaidenNameCont">
                    <label for="work_maidenName">Maiden Name:</label>
                    <div class="input-group">
                        <input type="text" class="input-border form-control" name="work_maidenName" id="work_maidenName" placeholder="Maiden Name">
                    </div>
                </div>

                <div class="col-md-3 mb-3" id="workextensionCont">
                    <label for="work_extension">Extension:</label>
                    <div class="input-group">
                        <input type="text" class="input-border form-control" name="work_extension" id="work_extension" placeholder="Extension">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                <label for="work_occupation">Occupation:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="work_occupation" id="work_occupation"
                    placeholder="Occupation" required>
                </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="work_monthSalary">Monthly Salary:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="work_monthSalary" id="work_monthSalary"
                    placeholder="Monthly Salary">
                </div>
                </div>
                
                <div class="col-md-11" style="margin-left:20px;">
                    <label>Membership in (Kasapi ng):</label>
                </div>
                
                <div class="col-md-1 mb-3">
                </div>

                <div class="col-md-2 mb-3">
                    <input type="checkbox" value="checked" name="work_pag-ibigBox" id="work_pag-ibigBox">
                    <label for="work_pag-ibigBox" style="margin-top:6px;">Pag-IBIG/HDMF</label>
                </div>

                <div class="col-md-2 mb-3">
                    <input type="checkbox" value="checked" name="work_sssBox" id="work_sssBox">
                    <label for="work_sssBox" style="margin-top:6px;">SSS/GSIS</label>
                </div>
            
                <div class="col-md-2 mb-3">
                    <input type="checkbox" value="checked" name="work_othersBox" id="work_othersBox">
                    <label for="work_othersBox" style="margin-top:6px;">Others</label>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="other-textbox-container">
                        <input type="text" class="input-border form-control" name="work_other"
                            id="work_other" placeholder="Other" >
                    </div>
                </div>

                </div>
                </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" id ="delWorkBtn" class="btn btn-danger mr-auto btn-sm" style="margin-left:10px;">Delete</button>
                <button type="submit" name="submit" class="btn btn-primary btn-sm" style="margin-right:10px;">Save</button>
            </div>
            </form>
        
        </div>
    </div>
</div>

<!-- work children data js  -->
<script>
    var addWorkBtn = document.getElementById("addWorkBtn");
    var delWorkBtn = document.getElementById("delWorkBtn");

    var optionWork = document.getElementById("optionWork");
    var workLbl = document.getElementById("workLbl");
    var work_id = document.getElementById("work_id");
    var work_lastName = document.getElementById("work_lastName");
    var work_firstName = document.getElementById("work_givenName");
    var work_middleName = document.getElementById("work_middleName");
    var work_gender = document.getElementById("work_gender");
    var work_birthdate = document.getElementById("work_birthDate");
    var work_civilStatus = document.getElementById("work_civilStatus");
    var work_occupation = document.getElementById("work_occupation");
    var work_monthIncome = document.getElementById("work_monthSalary");
    var work_extension = document.getElementById("work_extension");
    var work_maidenname = document.getElementById("work_maidenName");
    
    var work_pag_ibigBox = document.getElementById("work_pag-ibigBox");
    var work_sssBox = document.getElementById("work_sssBox");
    var work_othersBox = document.getElementById("work_othersBox");
    var work_other = document.getElementById("work_other");

    addWorkBtn.addEventListener("click", function() {
        workLbl.innerHTML = "Add Work Children";
        optionWork.value = "add";
        delWorkBtn.style.display = "none";
        work_lastName.value = "";
        work_firstName.value = "";
        work_middleName.value = "";
        work_birthdate.value = "";
        work_occupation.value = "";
        work_monthIncome.value = "";
        work_extension.value = "";
        work_maidenname.value = "";
        work_pag_ibigBox.checked = false;
        work_sssBox.checked = false;
        work_othersBox.checked = false;
        work_other.value = "";
    });

    delWorkBtn.addEventListener("click", function() {
        optionWork.value = "delete";
    });


    var editWorkBtns = document.querySelectorAll('tr.editWorkBtn');
    editWorkBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
        var minor_value = this.getAttribute('minor-value');
        var head_value = this.getAttribute('head-value');
        var tbl_value = this.getAttribute('tbl-value');

        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../inc_backend/ajaxTbl.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                workLbl.innerHTML = "Edit Work Children";
                optionWork.value = "edit";
                delWorkBtn.style.display = "block";

                var workResp = JSON.parse(xhr.responseText);
                work_id.value = workResp.id;
                work_lastName.value = workResp.lastname;
                work_firstName.value = workResp.firstname;
                work_middleName.value = workResp.middlename;
                work_birthdate.value = workResp.birthdate;
                work_civilStatus.value = workResp.civilStatus;
                work_occupation.value = workResp.occupation;
                work_monthIncome.value = workResp.monthIncome;
                work_extension.value = workResp.extension;
                work_maidenname.value = workResp.maidenname;
                work_pag_ibigBox.checked = workResp.pagIbig;
                work_sssBox.checked = workResp.sss;
                work_othersBox.checked = workResp.othercheck;
                work_other.value = workResp.other;

                work_gender.value = workResp.gender;
                $("#work_gender").trigger("change");//to change children work gender
            }
        };
        xhr.send('head_value=' + encodeURIComponent(head_value) + '&minor_value=' + encodeURIComponent(minor_value) + '&tbl_value=' + encodeURIComponent(tbl_value));
    });
});
</script>

<div class="modal fade" id="minorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 id="minorLbl" class="modal-title">Minor Children Detail</h5>
            </div>

            <form action="../inc_backend/minorAddEdit_inc.php" method="POST">
                <input style="display: none;" type="text" name="head_id" value = <?php echo $head_id?>>
                <input style="display: none;" type="text" name="optionMinor" id="optionMinor">
                <input style="display: none;" type="text" name="minor_id" id="minor_id">
            <div class="modal-body">   
                <div class="card" style="border: 2px solid maroon;">
                <div class="card-body">
                <div class = "row">
                
                <div class="col-md-6 mb-3">
                    <label for="minor_gender">Gender:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="minor_gender" id="minor_gender" required>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="minor_birthDate">Birthdate:</label>
                <div class="input-group">
                    <input type="date" class="input-border form-control" name="minor_birthDate" id="minor_birthDate" required>
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="minor_lastName">LastName:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="minor_lastName" id="minor_lastName"
                    placeholder="Last Name" required>
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="minor_givenName">Given Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="minor_givenName" id="minor_givenName"
                     placeholder="Given Name" required>
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="minor_middleName">Middle Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="minor_middleName" id="minor_middleName"
                    placeholder="Middle Name">
                </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="minor_extension">Extension:</label>
                    <div class="input-group">
                        <input type="text" class="input-border form-control" name="minor_extension" id="minor_extension" placeholder="Extension">
                    </div>
                </div>

                </div>
                </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="submit" name="submit" id ="delMinorBtn" class="btn btn-danger mr-auto btn-sm" style="margin-left:10px;">Delete</button>
                <button type="submit" name="submit" class="btn btn-primary btn-sm" style="margin-right:10px;">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- Minor data js  -->
<script>
    var addMinorBtn = document.getElementById("addMinorBtn");
    var delMinorBtn = document.getElementById("delMinorBtn");

    var optionMinor = document.getElementById("optionMinor");
    var minorLbl = document.getElementById("minorLbl");
    var minor_id = document.getElementById("minor_id");
    var minor_lastName = document.getElementById("minor_lastName");
    var minor_firstName = document.getElementById("minor_givenName");
    var minor_middleName = document.getElementById("minor_middleName");
    var minor_extension = document.getElementById("minor_extension");
    var minor_gender = document.getElementById('minor_gender');
    var minor_birthdate = document.getElementById('minor_birthDate');

    addMinorBtn.addEventListener("click", function() {
        minorLbl.innerHTML = "Add Minor Children";
        optionMinor.value = "add";
        delMinorBtn.style.display = "none";
        minor_lastName.value = "";
        minor_firstName.value = "";
        minor_middleName.value = "";
        minor_extension.value = "";
        minor_birthdate.value = "";
    });

    delMinorBtn.addEventListener("click", function() {
        optionMinor.value = "delete";
    });

    var editMinorBtns = document.querySelectorAll('tr.editMinorBtn');
    editMinorBtns.forEach(function(btn) {
    btn.addEventListener('click', function() {
        var minor_value = this.getAttribute('minor-value');
        var head_value = this.getAttribute('head-value');
        var tbl_value = this.getAttribute('tbl-value');

        // Create an AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../inc_backend/ajaxTbl.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                minorLbl.innerHTML = "Edit Minor Children";
                optionMinor.value = "edit";
                delMinorBtn.style.display = "block";

                var minorResp = JSON.parse(xhr.responseText);
                minor_id.value = minorResp.id;
                minor_firstName.value = minorResp.firstname;
                minor_lastName.value = minorResp.lastname;
                minor_middleName.value = minorResp.middlename;
                minor_extension.value = minorResp.extension;
                minor_gender.value = minorResp.gender;
                minor_birthdate.value = minorResp.birthdate;
            }
        };
        xhr.send('head_value=' + encodeURIComponent(head_value) + '&minor_value=' + encodeURIComponent(minor_value) + '&tbl_value=' + encodeURIComponent(tbl_value));
    });
});

</script>

<div class="modal fade in" id="headModal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Household Head Detail</h5>
                <button type="button"  id="cancelHeadBtnx" style="margin-right:10px;" data-dismiss="modal">X</button>
            </div>

            <form action="../inc_backend/headEdit_inc.php" method="POST">
                <input style="display: none;" type="text" name="head_id" value = <?php echo $head_id?>>
            <div class="modal-body">   
                <div class="card" style="border: 2px solid maroon;">
                <div class="card-body">
                <div class = "row">

                <!-- memberview  -->

                <div class="col-md-4 mb-3">
                    <label for="barangay-headmodal">Barangay (Bario):</label>
                    <div class="input-group">
                        <input type="text" name="barangay-headmodal" id="barangay-headmodal"
                            class="form-control" onfocus="showAllSuggestionsheadModal()"
                            oninput="showSuggestionsheadModal(this.value)" onkeydown="handleKeyheadModal(event)"
                            onblur="changePlaceholderheadModal()" onkeyup="convertToUppercase(this)"
                            placeholder="Barangay">
                        <div id="suggestionBoxHeadModal" style='display:none'></div>
                    </div>

                </div>
                <div class="col-md-4 mb-3">
                    <label for="comAss">Community Association:</label>
                    <div class="input-group">
                        <input type="text" name="community-headModal" id="community-headModal"
                            class="form-control" onfocus="showAllSuggestionsCommunityheadModal()"
                            oninput="showSuggestionsCommunityheadModal(this.value)"
                            onkeydown="handleCommunityheadModalKeyDown(event)"
                            onblur="changeheadCommunityPlaceholder()" onkeyup="convertToUppercase(this)"
                            placeholder="Community Association">
                        <div id="headcommunitySuggestionBox" style="display:none"></div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="basicHouse">Basic Housing Data:</label>
                    <div class="input-group">
                        <input type="text" name="basicheadModal" id="basicheadModal" class="form-control"
                            onfocus="showAllSuggestionsHouseheadModal()"
                            oninput="showSuggestionsHouseheadModal(this.value)"
                            onkeydown="handleKeyHouseheadModal(event)"
                            onblur="changePlaceholderHouseheadModal()" onkeyup="convertToUppercase(this)"
                            placeholder="Basic Housing Data">
                        <div id="suggestionBoxHouseheadModal" style='display:none'></div>
                    </div>

                </div>


                <div class="col-md-2 mb-3">
                    <input type="checkbox" value="checked" name="structOwner" id="structOwner">
                    <label for="structOwner" style="margin-top:6px;">Structure Owner</label>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="input-group">
                        <select class="input-border form-control" name="tenurStatus" id="tenurStatus" style="display:none" required>
                            <option value="OWNER">OWNER</option>
                            <option value="NEW OWNER">NEW OWNER</option>
                            <option value="SHARER">SHARER</option>
                            <option value="RENTER">RENTER</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                    <input type="text" class="input-border form-control" name="origOwner" id="origOwner"
                        placeholder="Name in Original Masterlist" style="display:none">
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="head_gender">Gender:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="head_gender" id="head_gender" required>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                <label for="head_birthDate">Birthdate:</label>
                <div class="input-group">
                    <input type="date" class="input-border form-control" name="head_birthDate" id="head_birthDate" required>
                </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="head_civilStatus">Civil Status:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="head_civilStatus" id="head_civilStatus" required>
                            <option value="SINGLE">SINGLE</option>
                            <option value="MARRIED">MARRIED</option>
                            <option value="DIVORCED">DIVORCED</option>
                            <option value="WIDOWED">WIDOWED</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                <label for="head_lastName">Last Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="head_lastName" id="head_lastName"
                     placeholder="Last Name" required>
                </div>
                </div>

                <div class="col-md-3 mb-3">
                <label for="head_givenName">Given Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="head_givenName" id="head_givenName"
                     placeholder="Given Name" required>
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="head_middleName">Middle Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="head_middleName" id="head_middleName"
                    placeholder="Middle Name" required>
                </div>
                </div>
                <div class="col-md-3 mb-3" id="headMaidenNameCont">
                    <label for="head_maidenName">Maiden Name:</label>
                    <div class="input-group">
                        <input type="text" class="input-border form-control" name="head_maidenName" id="head_maidenName" placeholder="Maiden Name">
                    </div>
                </div>
                <div class="col-md-3 mb-3" id="headextensionCont">
                    <label for="head_extension">Extension:</label>
                    <div class="input-group">
                        <input type="text" class="input-border form-control" name="head_extension" id="head_extension" placeholder="Extension">
                    </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="head_occupation">Occupation:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="head_occupation" id="head_occupation"
                    placeholder="Occupation" required>
                </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="head_monthSalary">Monthly Salary:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="head_monthSalary" id="head_monthSalary"
                    placeholder="Monthly Salary" required>
                </div>
                </div>
                
                <div class="col-md-11" style="margin-left:20px;">
                    <label>Membership in (Kasapi ng):</label>
                </div>
                
                <div class="col-md-1 mb-3">
                </div>

                <div class="col-md-2 mb-3">
                    <input type="checkbox" value="checked" name="head_pag-ibigBox"
                        id="head_pag-ibigBox">
                    <label for="head_pag-ibigBox" style="margin-top:6px;">Pag-IBIG/HDMF</label>
                </div>

                <div class="col-md-2 mb-3">
                    <input type="checkbox" value="checked" name="head_sssBox" id="head_sssBox">
                    <label for="head_sssBox" style="margin-top:6px;">SSS/GSIS</label>
                </div>

                <div class="col-md-2 mb-3">
                    <input type="checkbox" value="checked" name="head_otherCheck"
                        id="head_otherCheck">
                    <label for="head_otherCheck" style="margin-top:6px;">Others</label>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="other-textbox-container">
                        <input type="text" class="input-border form-control" name="head_other"
                            id="head_other" placeholder="Other" style="display: none;">
                    </div>
                </div>

                

                <div class="col-md-12">
                <div class="card" style="border: 1px solid maroon;">
                </div>
                </div>
                
                <div class="col-md-4 mb-3">
                    <label for="type_structure">Type of Structure:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="type_structure" id="type_structure" required>
                            <option value="CONCRETE">CONCRETE</option>
                            <option value="SEMI-CONCRETE">SEMI-CONCRETE</option>
                            <option value="LIGHT MATERIALS">LIGHT MATERIALS</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                <label for="year_stay">Year of Stay:</label>
                <div class="input-group">
                    <input type="date" class="input-border form-control" name="year_stay" id="year_stay" required>
                </div>
                </div>
                <div class="col-md-4 mb-3">
                <label for="length_stay">Length of Stay:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="length_stay" id="length_stay"
                    placeholder="Length of Stay" required>
                </div>
                </div>
                <div class="col-md-4 mb-3">
                    <label for="relocUnavailable">If Relocation is Unavailable:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="relocUnavailable" id="relocUnavailable" required>
                            <option value="FINANCIAL ASSISTANCE">FINANCIAL ASSISTANCE</option>
                            <option value="BALIK PROBISNYA PROGRAM">BALIK PROBINSYA PROGRAM</option>
                            <option value="UNDECIDED">UNDECIDED</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-8 mb-3">
                <label for="relocated">Relocated:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="relocated" id="relocated"
                    placeholder="Relocated" required>
                </div>
                </div>
                
                </div>
                </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"  data-dismiss="modal" class="btn btn-warning mr-auto btn-sm" style="margin-left:10px;">Close</button>
                <button type="submit" name="submit" class="btn btn-primary btn-sm" style="margin-right:10px;">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- head data js  -->
<script>
    var editHeadBtn = document.getElementById("editHeadBtn");

    var head_gender = document.getElementById("head_gender");
    var head_lastName = document.getElementById("head_lastName");
    var head_givenName = document.getElementById("head_givenName");
    var head_middleName = document.getElementById("head_middleName");
    var head_maidenName = document.getElementById("head_maidenName");
    var head_extension = document.getElementById("head_extension");
    var head_occupation = document.getElementById("head_occupation"); 
    var head_monthSalary = document.getElementById("head_monthSalary"); 
    var head_birthDate = document.getElementById("head_birthDate");
    var head_yearstay = document.getElementById("year_stay");
    var head_lengthstay = document.getElementById("length_stay");
    var head_relocated = document.getElementById("relocated");
    var head_structure = document.getElementById("type_structure");
    var head_civilStatus = document.getElementById("head_civilStatus");
    var head_relocUnavailable = document.getElementById("relocUnavailable");
    var head_pagIbigBox = document.getElementById("head_pag-ibigBox");
    var head_sssBox = document.getElementById("head_sssBox");
    var head_otherCheck = document.getElementById("head_otherCheck");
    var head_other = document.getElementById("head_other");

    var structcheckbox = document.getElementById("structOwner");
    var tenurStatusInput = document.getElementById("tenurStatus");
    var origOwnerInput = document.getElementById("origOwner");

    structcheckbox.addEventListener("change", function () {
        if (this.checked) {
            tenurStatusInput.style.display = "none";
            origOwnerInput.style.display = "none";
        } else {
            tenurStatusInput.style.display = "block";
            origOwnerInput.style.display = "block";
        }
    });

    head_otherCheck.addEventListener("click", function() {  
        if (head_otherCheck.checked) {
        head_other.style.display = "block";
        } else {
            head_other.style.display = "none";
        }
    });

    editHeadBtn.addEventListener("click", function() {
      head_gender.value = "<?php echo $head_gender; ?>";
      $("#head_gender").trigger("change")
      head_lastName.value = "<?php echo $head_lastname; ?>";     
      head_givenName.value = "<?php echo $head_firstname; ?>";
      head_middleName.value = "<?php echo $head_middlename; ?>";
      head_maidenName.value = "<?php echo $head_maidenname; ?>";
      head_extension.value = "<?php echo $head_extension; ?>";
      head_occupation.value = "<?php echo $head_occupation; ?>";
      head_monthSalary.value = "<?php echo $head_monthIncome; ?>";
      head_birthDate.value = "<?php echo $head_birthdate; ?>";
      head_yearstay.value = "<?php echo $head_yearStay; ?>";
      head_lengthstay.value = "<?php echo $head_lengthStay; ?>";
      head_relocated.value = "<?php echo $head_relocated; ?>";
      head_structure.value = "<?php echo $head_structure; ?>";
      head_civilStatus.value = "<?php echo $head_civilStatus; ?>";
      head_relocUnavailable.value = "<?php echo $head_relocUnavailable; ?>";
      head_pagIbigBox.checked = "<?php echo $head_pagIbig; ?>";
      head_sssBox.checked = "<?php echo $head_sss; ?>";
      
      head_other.value = "<?php echo $head_otherName; ?>";
      head_otherCheck.checked = "<?php echo $head_otherCheck; ?>";
      head_otherCheck.dispatchEvent(new Event("click")); // to trigger it
      
      tenurStatusInput.value = "<?php echo $head_tenurStatus; ?>";
      origOwnerInput.value = "<?php echo $head_origOwner; ?>";
      structcheckbox.checked = "<?php echo $head_tenurCheck; ?>";
      structcheckbox.dispatchEvent(new Event("change")); // to trigger it
    });
</script>

<div class="modal fade" id="interviewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Interview Detail</h5>
            </div>

            <form action="../inc_backend/interviewEdit_inc.php" method="POST">
                <input style="display: none;" type="text" name="head_id" value = <?php echo $head_id?>>
                <input style="display: none;" type="text" name="res_id" value = <?php echo $respondent_id?>>
            <div class="modal-body">   
                <div class="card" style="border: 2px solid maroon;">
                <div class="card-body">
                <div class = "row">

                <div class="col-md-12">
                <label>Respondent:</label>
                </div>

                <div class="col-md-4 mb-3">
                <label for="res_lastName">LastName:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="res_lastName" id="res_lastName"
                    placeholder="Last Name" required>
                </div>
                </div>
                <div class="col-md-4 mb-3">
                <label for="res_givenName">Given Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="res_givenName" id="res_givenName"
                     placeholder="Given Name" required>
                </div>
                </div>
                <div class="col-md-4 mb-3">
                <label for="res_middleName">Middle Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="res_middleName" id="res_middleName"
                    placeholder="Middle Name">
                </div>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="res_relationship">Relationsip to Household Head:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="res_relationship" id="res_relationship" required>
                            <option value="PERSON LISTED IN MASTERLIST">PERSON LISTED IN MASTERLIST</option>
                            <option value="SPOUSE">SPOUSE</option>
                            <option value="CHILD">CHILD</option>
                            <option value="SIBLING">SIBLING</option>
                            <option value="OTHERS">OTHERS</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                <div class="card" style="border: 1px solid maroon;">
                </div>
                </div>
                
                <div class="col-md-12">
                <label>Interviewer:</label>
                </div>
                <div class="col-md-4 mb-3">
                <label for="int_lastName">LastName:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="int_lastName" id="int_lastName"
                    placeholder="Last Name" required>
                </div>
                </div>
                <div class="col-md-4 mb-3">
                <label for="int_givenName">Given Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="int_givenName" id="int_givenName"
                     placeholder="Given Name" required>
                </div>
                </div>
                <div class="col-md-4 mb-3">
                <label for="int_middleName">Middle Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="int_middleName" id="int_middleName"
                    placeholder="Middle Name">
                </div>
                </div>
                <div class="col-md-4 mb-3">
                <label for="int_date">Date:</label>
                <div class="input-group">
                    <input type="date" class="input-border form-control" name="int_date" id="int_date" required>
                </div>
                </div>
                <div class="col-md-8 mb-3">
                <label for="int_remark">Remarks:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="int_remark" id="int_remark"
                    placeholder="Remark">
                </div>
                </div>
              
                </div>
                </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning mr-auto btn-sm" style="margin-left:10px;">Close</button>
                <button type="submit" name="submit" class="btn btn-primary btn-sm" style="margin-right:10px;">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- interview js -->
<script>
    var interviewModal = document.getElementById("interviewModal");
    var editInterviewBtn = document.getElementById("editInterviewBtn");

    var res_lastName = document.getElementById("res_lastName");
    var res_givenName = document.getElementById("res_givenName");
    var res_middleName = document.getElementById("res_middleName"); 
    var res_relationship = document.getElementById("res_relationship");

    var int_lastname = document.getElementById("int_lastName");
    var int_givenname = document.getElementById("int_givenName");
    var int_middlename = document.getElementById("int_middleName");
    var int_date = document.getElementById("int_date");
    var int_remark = document.getElementById("int_remark");

    
    editInterviewBtn.addEventListener("click", function() {
      res_lastName.value = "<?php echo $respondent_lastname; ?>";
      res_givenName.value = "<?php echo $respondent_firstname; ?>";
      res_middleName.value = "<?php echo $respondent_middlename; ?>";
      res_relationship.value = "<?php echo $respondent_relationship; ?>"; 
      
      int_lastname.value = "<?php echo $interviewer_lastname; ?>";
      int_givenname.value = "<?php echo $interviewer_firstname; ?>";
      int_middlename.value = "<?php echo $interviewer_middlename; ?>";
      int_date.value = "<?php echo $interviewer_date; ?>";
      int_remark.value = "<?php echo $interviewer_remarks; ?>";                              
    });

</script>

<div class="modal fade" id="spouseModal" data-keyboard="false" data-backdrop="static">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Spouse Detail</h5>
            </div>

            <form action="../inc_backend/spouseEdit_inc.php" method="POST">
                <input style="display: none;" type="text" name="head_id" value = <?php echo $head_id?>>
                <input style="display: none;" type="text" name="spouse_id" value = <?php echo $spouse_id?>>
            <div class="modal-body">   
                <div class="card" style="border: 2px solid maroon;">
                <div class="card-body">
                <div class = "row">

                <div class="col-md-4 mb-3">
                    <label for="spouse_gender">Gender:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="spouse_gender" id="spouse_gender" required>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                        </select>
                    </div>
                </div>
                
                <div class="col-md-4 mb-3">
                <label for="spouse_birthDate">Birthdate:</label>
                <div class="input-group">
                    <input type="date" class="input-border form-control" name="spouse_birthDate" id="spouse_birthDate" required>
                </div>
                </div>
            
                <div class="col-md-4 mb-3">
                    <label for="spouse_civilStatus">Civil Status:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="spouse_civilStatus" id="spouse_civilStatus" required>
                            <option value="SINGLE">SINGLE</option>
                            <option value="MARRIED">MARRIED</option>
                            <option value="DIVORCED">DIVORCED</option>
                            <option value="WIDOWED">WIDOWED</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3 mb-3">
                <label for="spouse_lastName">LastName:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="spouse_lastName" id="spouse_lastName"
                    placeholder="Last Name" required>
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="spouse_givenName">Given Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="spouse_givenName" id="spouse_givenName"
                     placeholder="Given Name" required>
                </div>
                </div>
                <div class="col-md-3 mb-3">
                <label for="spouse_middleName">Middle Name:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="spouse_middleName" id="spouse_middleName"
                    placeholder="Middle Name">
                </div>
                </div>

                <div class="col-md-3 mb-3" id="spouseMaidenNameCont">
                    <label for="spouse_maidenName">Maiden Name:</label>
                    <div class="input-group">
                        <input type="text" class="input-border form-control" name="spouse_maidenName" id="spouse_maidenName" placeholder="Maiden Name">
                    </div>
                </div>

                <div class="col-md-3 mb-3" id="spouseextensionCont">
                    <label for="spouse_extension">Extension:</label>
                    <div class="input-group">
                        <input type="text" class="input-border form-control" name="spouse_extension" id="spouse_extension" placeholder="Extension">
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                <label for="spouse_occupation">Occupation:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="spouse_occupation" id="spouse_occupation"
                    placeholder="Occupation" required>
                </div>
                </div>
                <div class="col-md-6 mb-3">
                <label for="spouse_monthSalary">Monthly Salary:</label>
                <div class="input-group">
                    <input type="text" class="input-border form-control" name="spouse_monthSalary" id="spouse_monthSalary"
                    placeholder="Monthly Salary">
                </div>
                </div>
                
                <div class="col-md-11" style="margin-left:20px;">
                    <label>Membership in (Kasapi ng):</label>
                </div>

                <div class="col-md-1 mb-3">
                </div>

                <div class="col-md-2 mb-3">
                    <input type="checkbox" value="checked" name="spouse_pag-ibigBox"
                        id="spouse_pag-ibigBox">
                    <label for="spouse_pag-ibigBox" style="margin-top:6px;">Pag-IBIG/HDMF</label>
                </div>

                <div class="col-md-2 mb-3">
                    <input type="checkbox" value="checked" name="spouse_sssBox" id="spouse_sssBox">
                    <label for="spouse_sssBox" style="margin-top:6px;">SSS/GSIS</label>
                </div>

                <div class="col-md-2 mb-3">
                    <input type="checkbox" value="checked" name="spouse_otherCheck"
                        id="spouse_otherCheck">
                    <label for="spouse_otherCheck" style="margin-top:6px;">Others</label>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="other-textbox-container">
                        <input type="text" class="input-border form-control" name="spouse_other"
                            id="spouse_other" placeholder="Other" style="display: none;">
                    </div>
                </div>

                </div>
                </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button"  data-dismiss="modal" class="btn btn-warning mr-auto btn-sm" style="margin-left:10px;">Close</button>
                <button type="submit" name="submit" id="saveSpouseBtn" class="btn btn-primary btn-sm" style="margin-right:10px;">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- spouse data js -->
<script>
    var spouseModal = document.getElementById("spouseModal");
    var editSpouseBtn = document.getElementById("editSpouseBtn");

    // var spouse_lastName = document.getElementById("spouse_gender");
    var spouse_lastName = document.getElementById("spouse_lastName");
    var spouse_givenName = document.getElementById("spouse_givenName");
    var spouse_middleName = document.getElementById("spouse_middleName");
    var spouse_occupation = document.getElementById("spouse_occupation");
    var spouse_civilStatus = document.getElementById("spouse_civilStatus");
    var spouse_monthSalary = document.getElementById("spouse_monthSalary"); 
    var spouse_maidenName = document.getElementById("spouse_maidenName");
    var spouse_extension = document.getElementById("spouse_extension");
    var spouse_birthDate = document.getElementById("spouse_birthDate");
    var spouse_pagIbigBox = document.getElementById("spouse_pag-ibigBox");
    var spouse_sssBox = document.getElementById("spouse_sssBox");
    var spouse_otherCheck = document.getElementById("spouse_otherCheck");
    var spouse_other = document.getElementById("spouse_other");
    
    spouse_otherCheck.addEventListener("click", function() {  
        if (spouse_otherCheck.checked) {
        spouse_other.style.display = "block";
        } else {
            spouse_other.style.display = "none";
        }
    });

    editSpouseBtn.addEventListener("click", function() {  
      spouse_gender.value = "<?php echo $spouse_gender; ?>";
      $("#spouse_gender").trigger("change")    
      spouse_lastName.value = "<?php echo $spouse_lastname; ?>";
      spouse_givenName.value = "<?php echo $spouse_firstname; ?>";
      spouse_middleName.value = "<?php echo $spouse_middlename; ?>";
      spouse_occupation.value = "<?php echo $spouse_occupation; ?>";
      spouse_civilStatus.value = "<?php echo $spouse_civilStatus; ?>";
      spouse_monthSalary.value = "<?php echo $spouse_monthIncome; ?>";
      spouse_maidenName.value = "<?php echo $spouse_maidenname; ?>";
      spouse_extension.value = "<?php echo $spouse_extension; ?>";
      spouse_birthDate.value = "<?php echo $spouse_birthdate; ?>";
      spouse_civilStatus.value = "<?php echo $spouse_civilStatus; ?>";
      spouse_pagIbigBox.checked = "<?php echo $spouse_pagIbig; ?>";
      spouse_sssBox.checked = "<?php echo $spouse_sss; ?>";
      
      spouse_other.value = "<?php echo $spouse_otherName; ?>";
      spouse_otherCheck.checked = "<?php echo $spouse_otherCheck; ?>";
      spouse_otherCheck.dispatchEvent(new Event("click")); // to trigger it
    });

    
</script>

<div class="modal fade" id="facilityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Facility Detail</h5>
            </div>

            <form action="../inc_backend/facilityEdit_inc.php" method="POST">
                <input style="display: none;" type="text" name="head_id" value = <?php echo $head_id?>>
                <input style="display: none;" type="text" name="facility_id" value = <?php echo $facility_id?>>
            <div class="modal-body">   
                <div class="card" style="border: 2px solid maroon;">
                <div class="card-body">
                <div class = "row">

                <div class="col-md-3 mb-3">
                    <label for="electricity">Electricity:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="electricity" id="electricity" required>
                            <option value="OWN">OWN</option>
                            <option value="SUB-METER">SUB-METER</option>
                            <option value="NONE">NONE</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="water">Water Services:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="water" id="water" required>
                            <option value="LAGUNA WATERS">LAGUNA WATERS</option>
                            <option value="DEEPWELL">DEEPWELL</option>
                            <option value="NONE">NONE</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="toilet">Toilet:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="toilet" id="toilet" required>
                            <option value="OWN">OWN</option>
                            <option value="SHARED">SHARED</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="kitchen">Kitchen:</label>
                    <div class="input-group">
                        <select class="input-border form-control" name="kitchen" id="kitchen" required>
                            <option value="OWN">OWN</option>
                            <option value="SHARED">SHARED</option>
                        </select>
                    </div>
                </div>
              
                </div>
                </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button"  data-dismiss="modal" class="btn btn-warning mr-auto btn-sm" style="margin-left:10px;">Close</button>
                <button type="submit" name="submit" class="btn btn-primary btn-sm" style="margin-right:10px;">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- facility data -->
<script>
    var editFacilityBtn = document.getElementById("editFacilityBtn");
    var electricity = document.getElementById("electricity");
    var water = document.getElementById("water");
    var toilet = document.getElementById("toilet");
    var kitchen = document.getElementById("kitchen");

    editFacilityBtn.addEventListener("click", function() {
        electricity.value = "<?php echo $electricity; ?>";
        water.value = "<?php echo $water; ?>";
        toilet.value = "<?php echo $toilet; ?>";
        kitchen.value = "<?php echo $kitchen; ?>";
    });
</script>

<!-- for gender change -->
<script> 
    $(document).ready(function() {
        function handleGenderChange(gender, maidenNameCont, extensionCont) {
        if (gender === "FEMALE") {
            $(maidenNameCont).show();
            $(extensionCont).hide();
        } else if (gender === "MALE") {
            $(maidenNameCont).hide();
            $(extensionCont).show();
        } else {
            $(maidenNameCont).hide();
            $(extensionCont).hide();
        }
    }

    $("#head_gender").change(function() {
        var selectedGender = $(this).val();
        handleGenderChange(selectedGender, "#headMaidenNameCont", "#headextensionCont");
    });

    $("#spouse_gender").change(function() {
        var selectedGender = $(this).val();
        handleGenderChange(selectedGender, "#spouseMaidenNameCont", "#spouseextensionCont");
    });

    $("#res_gender").change(function() {
        var selectedGender = $(this).val();
        handleGenderChange(selectedGender, "#resMaidenNameCont", "#resextensionCont");
    });

    $("#work_gender").change(function() {
        var selectedGender = $(this).val();
        handleGenderChange(selectedGender, "#workMaidenNameCont", "#workextensionCont");
    });

    $("#senior_gender").change(function() {
        var selectedGender = $(this).val();
        handleGenderChange(selectedGender, "#seniorMaidenNameCont", "#seniorextensionCont");
    });

    $("#head_gender").trigger("change");  // immediately change whether maiden or extension box
    $("#spouse_gender").trigger("change");  // immediately change whether maiden or extension box
    $("#res_gender").trigger("change");  // immediately change whether maiden or extension box
    $("#work_gender").trigger("change");  // immediately change whether maiden or extension box
    $("#senior_gender").trigger("change");  // immediately change whether maiden or extension box
});

</script>



<?php include ('footer.php'); ?>
