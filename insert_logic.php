<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "login_data";

$conn = mysqli_connect("localhost", "root", "", "login_data");

if(!$conn){
    echo "<script>alert('Connection Failed')</script>";
    exit();
}

if (isset($_POST['submit'])) {

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$phone=$_POST['phone'];

$query = "INSERT INTO user_details (fname, lname, gender, email, phone) 
          VALUES ('$fname', '$lname', '$gender', '$email', '$phone')";

if(mysqli_query($conn,$query)){
    echo "<script>
            alert('Data inserted Successfully');
            window.location.href = 'read.php';
         </script>";
        exit();
}else{
    echo "error : " . mysqli_error($conn);
    echo "<script> window.location.href = 'read.php';</script>";
}

mysqli_close($conn);
}
?>
