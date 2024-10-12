<?php
include('dbconnection.php');
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $query = "DELETE FROM user_details WHERE id='$id'";


    if(mysqli_query($connection,$query)){
        echo "<script>
                alert('Data deleted Successfully');
                window.location.href = 'read.php';
             </script>";
    }else{
        // echo "error : " . mysqli_error($connection);
        echo "<script>
        alert('Error');
        window.location.href = 'read.php';
        </script>";
    }
}
?>

