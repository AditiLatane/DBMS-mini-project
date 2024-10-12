<?php
include('navbar.html');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choice</title>
    <style>a{font-size:xx-large; 
            align-items: center; 
            margin-left: 45%;
            color: blue;
            text-decoration: none;}
            .container{
                align-items: center;
                margin-top: 10%;
            }
    </style>
</head>
<body>
    <div class="container">
        <h1 style="text-align: center;margin-top: 10px;">
            OPERATIONS TO PERFORM</h1>

        <a href="read.php">1. Read</a><br>
        <a href="login.php">2. Insert</a><br>
        <a href="update.php">3. Update</a><br>
        <a href="delete.php">4. Delete</a><br>
    </div>
        
    <!-- <table>
        <tr><td><a href="read.php">Read</a></td></tr>
        <tr><td><a href="insert.php">Insert</a></td></tr>
        <tr><td><a href="update.php">Update</a></td></tr>
        <tr><td><a href="delete.php">Delete</a></td></tr>
        
    </table> -->
</body>
</html>