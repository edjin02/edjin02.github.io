<?php
include "../include/connect1.php";

function showVerifData($con)
{


    $sql = "SELECT * FROM tbl_headinfo";
    $result = $con->query($sql);

        while ($r = $result->fetch_assoc()) {
            echo "<tr style='vertical-align: middle;' id='engrlink' onclick='openMemberview(event);' value='" . $r['id'] . "'>";
            echo "<td><span>" . $r['tag'] . "</span></td>";
            echo "<td><span>" . $r['firstname'] . " " . $r['middlename'] . " " . $r['lastname'] . " " . $r['extension'] . "</span></td>";
            echo "<td><span>" . $r['community'] . "</span></td>";
            echo "<td><span>" . $r['barangay'] . "</span></td>";
            echo "<td><span>" . $r['monthIncome'] . "</span></td>";
            
            echo "</tr>";
        }
    } 

function showUserData($con)
{
    
    
    $sql = "SELECT * FROM tbl_user";
    $result = $con->query($sql);

    

        while ($r = $result->fetch_assoc()) {
            echo "<tr style='vertical-align: middle;' data-toggle='modal' data-target='#myModal' id='engrlink' onclick='viewUserData(" . $r['id'] . ");' value='" . $r['id'] . "'>";
            echo "<td><span>" . $r['isactive'] . "</span></td>";
            echo "<td><span>" . $r['username'] . "</span></td>";
            echo "<td><span>" . $r['firstname'] . " " . $r['middlename'] . " " . $r['lastname'] . "</span></td>";
            echo "<td><span>" . $r['contactno'] . "</span></td>";
            echo "<td><span>" . $r['memberof'] . "</span></td>";
            // Add more table cells for other columns as needed
            echo "</tr>";
        }
    } 

?>