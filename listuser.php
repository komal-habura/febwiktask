<?php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname= "mydatabase";
   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
 
   // Check connection
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
   $result = mysqli_query($conn,"SELECT * FROM Users");
   session_start();
   if(!isset($_SESSION['email'])){
    header("location: login.php");
   }else{
  
  
?>
<!DOCTYPE html>
<html>
    <head>
        <style>
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
        </style>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
    <form action="code.php" method="post">
        <h2> User List  <button type="submit" name="logout_btn" style="font-size:40px;position:relative; left:85%; top:2px;"><i  class="fa fa-sign-out" aria-hidden="true"  ></i></button></h2>
    </form>

    <table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Confirm Password</th>
        <th>Number</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php  foreach($result as $row){ ?>
    <tr>
        <td><?php echo $row['Id'];?></td>
        <td><?php echo $row['Name']; ?> </td>
        <td><?php echo $row['Email']; ?></td>
        <td><?php echo $row['Password']; ?></td>
        <td><?php echo $row['confirm_password']; ?></td>
        <td><?php echo $row['Number']; ?></td>
        <?php $img="images/".$row['Image']; ?>
        <td><img width="80px" height="80px" src="<?php echo $img; ?>" alt=""></td>
        <td><form action="edit.php" method="post">
            <input hidden type="text" name="id" value="<?php echo $row['Id']; ?>">
            <button type="submit" name="edit_btn" style="background:green;" class="btn btn-success">Edit</button>
            </form>
        </td>
        <td>
            <button  class="btn btn-success" style="background:red;color: black;"><?php echo "<a style='color: black;text-decoration:none;' onClick=\"javascript: return confirm('Please confirm deletion');\" href='code.php?id=".$row['Id']."'>Delete</a>"; ?></button>   
        </td>
    </tr>
    <?php } ?>
    
    </table>

    </body>
</html>
<?php } ?>