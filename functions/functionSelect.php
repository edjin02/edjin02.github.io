<?php 
    $con = new mysqli("localhost", "root", "", "cudhonew"); //incase of error in fetching
    if ($con->connect_error) {
        die("Failed to connect: " . $con->connect_error);
    }
    
    if(isset($_POST['action']) && !empty($_POST['action']))
    {
       $action = $_POST['action'];
       
       switch ($action) {
        
        case 'showVerifData':
            showVerifData($con);
            break;
        
        default:
            break;
        }
    }

    function showVerifData($con)
{
    // Start a session
    session_start();

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
    
?>

<script>
function openMemberview(event) {
  var row = event.currentTarget;
  var id = row.getAttribute('value');
  
  var form = document.createElement('form');
  form.method = 'POST';
  form.action = 'memberview.php';

  var hiddenInput = document.createElement('input');
  hiddenInput.type = 'hidden';
  hiddenInput.name = 'id';
  hiddenInput.value = id;
  form.appendChild(hiddenInput);

  document.body.appendChild(form);
  form.submit();
}   
</script>