<?php
include('navbar.html');
include('dbconnection.php');

?>
<!-- ------------------------------------------------------------------------------------------------------ -->

<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

// if (isset($_POST['submit'])) {

$name=$_POST['username'];
$pass=$_POST['password'];


  // Query to check if the user exists with the given username and password
    $query = "SELECT * FROM admin_details WHERE username='$name' AND password='$pass'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        // User exists, redirect to read.php
        echo "<script>
                alert('Login successful');
                window.location.href = 'read.php';
              </script>";
    } else {
        // User not found, show an error message
        echo "<script>
                alert('Username or password is incorrect');
                window.location.href = 'admin.php';
            </script>";

    }

mysqli_close($conn);
// }
}
?> 
<!-- -------------------------------------------------------------------------------------------------------- -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <h2>Login</h2>
        <form action="read.php" method="post">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>

            <input type="submit" name="submit" value="Login">
        </form>
    </div>

</body>
</html>

<!-- --------------------------------------------------------------------------------------------------- -->

<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "login_data";

$conn = mysqli_connect("localhost", "root", "", "login_data");

if(!$conn){
    echo "<script>alert('Connection Failed')</script>";
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

if (isset($_POST['submit'])) {

$name=$_POST['username'];
$pass=$_POST['password'];


  // Query to check if the user exists with the given username and password
    $query = "SELECT * FROM admin_details WHERE username='$name' AND password='$pass'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // User exists, redirect to read.php
        echo "<script>
                alert('Login successful');
                window.location.href = 'read.php';
              </script>";
    } else {
        // User not found, show an error message
        echo "<script>
                alert('Username or password is incorrect');
                window.location.href = 'admin.php';
            </script>";

    }

mysqli_close($conn);
}
}
?> 
