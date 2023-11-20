<?php

$sql = "SELECT CURDATE()";
$res = $con->query($sql);
$row = $res->fetch_assoc();
$serverdate = $row['CURDATE()'];

?>