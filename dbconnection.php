<?php
$connection = mysqli_connect('localhost', 'root', '', 'login_data');
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
