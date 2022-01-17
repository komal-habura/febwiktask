<?php

if(isset($_POST['signup_btn']))
{
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

  $name= $_POST['name'];
  $email= $_POST['email'];
  $psw=  $_POST['psw'];
  $number= $_POST['number'];
  $confirm_psw=$_POST['psw-repeat'];
  move_uploaded_file( $_FILES['user-img']['tmp_name'],"images/".$_FILES['user-img']['name']);
  $filename=$_FILES['user-img']['name'];
  echo $filename;
  if(!mysqli_query($conn,"INSERT INTO users(Name,Email,Password,Number,Image,confirm_password) VALUES ('$name','$email','$psw','$number','$filename','$confirm_psw');")){
      echo "error";
  }else{
      echo "Successfull inserted data";
      header("location: login.php");
  }
  mysqli_close($conn);
}

if(isset($_POST['login_btn'])){
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
 
  
  $email=mysqli_real_escape_string($conn, $_POST['email']);
  $psw= mysqli_real_escape_string($conn, $_POST['psw']);
  $result=mysqli_query($conn,"select * from Users where Email='$email' AND Password='$psw'");
  if(mysqli_num_rows($result)==1){
    session_start();
    foreach($result as $row){
      $_SESSION['email']=$row['Email'];
    }
    
      header("location: listuser.php");
  }else{
      $_SESSION["message"]="login failed";
      echo $_SESSION["message"];
      header("location: login.php");
  }
  mysqli_close($conn);
  
}
if(isset($_POST['logout_btn'])){
  session_start();
  unset($_SESSION['email']);
  session_destroy();
  header("location: login.php");
}
if(isset($_POST['save_btn'])){
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

  $name= $_POST['name'];
  $email= $_POST['email'];
  $psw=  $_POST['psw'];
  $number= $_POST['number'];
  $confirm_psw=$_POST['psw-repeat'];
  $id= $_POST['id'];
 /*
  move_uploaded_file( $_FILES['user-img']['tmp_name'],"images/".$_FILES['user-img']['name']);
  $filename=$_FILES['user-img']['name'];
  echo $filename;*/
  if(!mysqli_query($conn,"UPDATE Users SET Name='$name',Email='$email',Password='$psw',Number='$number',confirm_password='$confirm_psw' where Id='$id'")){
      echo "error";
  }else{
      echo "Successfull inserted data";
      header("location: listuser.php");
  }
  echo "$name $email $psw $confirm_psw $number $filename ";
  mysqli_close($conn);
}

?><?php
if(isset($_GET['id']))
{
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
  $id= $_GET['id'];
    if(mysqli_query($conn,"delete from Users where Id='$id'")){
      header("location: listuser.php");
    }else{
      echo "error";
    }

}
?>



    


