<?php

//to get date for datecommited
$sql = "SELECT CONCAT(CURDATE(), ' ', CURTIME()) AS currentDateTime";
$res = $con->query($sql);
$row = $res->fetch_assoc();
$serverDateTime = $row['currentDateTime'];

?>