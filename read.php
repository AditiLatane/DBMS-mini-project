<?php
    include('dbconnection.php');
    include('inner_navbar.html');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <style>
        table {
            margin-top: 10% ;
            margin-left: auto;
            margin-right: auto; 
            border-collapse: collapse;
            width: 50%; 
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
        a{
            text-decoration: none;
            color: white;
            padding: 20px
        }
        button{
            background-color: #04AA6D;
            border: none;
            padding: 5px;            
        }
        button:hover{
            background-color: #575757;
            color: white;
        }
    </style>
</head>
<body>
    <button href="login.php">Insert Data</button>
        <table>
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Phone Number</th>  
                <th>Update Action</th>
                <th>Delete Action</th>            
            </thead>
            <tbody>
                <?php
                    $fetch = mysqli_query($connection , 'select * from user_details');
                    $row = mysqli_num_rows($fetch);
                    if($row > 0){
                        while($r = mysqli_fetch_assoc($fetch)){
                ?>
                    <tr>
                        <td><?php echo $r['fname']?></td>
                        <td><?php echo $r['lname']?></td>
                        <td><?php echo $r['gender']?></td>
                        <td><?php echo $r['email']?></td>
                        <td><?php echo $r['phone']?></td> 
                        <td><button><a href="update.php?id=<?php echo $r['id']?> ">Update</a></button></td> 
                        <td><button><a href="delete.php?deleteid=<?php echo $r['id']?> ">Delete</a></button></td>                    
                    </tr>
                    
                <?php
                        }

                    }else{
                        echo "No Record Found";
                    }
                ?>
            </tbody>
        </table>
    
</body>
</html>