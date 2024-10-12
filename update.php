<?php
    include('dbconnection.php');
    include('inner_navbar.html');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
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
        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input[type="text"], input[type="email"], input[type="tel"], select {
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
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Update Data</h2>
        <?php
        
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            echo "<script>alert('ID is missing!');</script>";
            exit;
        }
        
        $query = mysqli_query($connection,"select * from user_details where id= '$id'");
        while($row = mysqli_fetch_array($query)){
        ?>
        <form method="post">
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="fname" value="<?php echo $row['fname']?>" required>

            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="lname" value="<?php echo $row['lname']?>" required>

            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="<?php echo $row['gender']?>" disabled selected>Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo $row['email']?>" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $row['phone']?>" required>

            <input type="submit" name="Save" value="Save">
        </form>
        <?php
        }
        // Update logic after the form is submitted
        if (isset($_POST['Save'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $gender = $_POST['gender'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];

            // Update the user details in the database
            $updateQuery = "UPDATE user_details 
                            SET fname='$fname', lname='$lname', gender='$gender', email='$email', phone='$phone'
                            WHERE id='$id'";

            if (mysqli_query($connection, $updateQuery)) {
                echo "<script>
                        alert('Data updated Successfully');
                        window.location.href = 'read.php';
                     </script>";
                exit();
            } else {
                echo "Error updating record: " . mysqli_error($connection);
            }
        }

        ?>
        
    </div>

</body>
</html>
