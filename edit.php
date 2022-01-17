<!DOCTYPE html>
<html lang="en">
<head>
    <title>How To create Sign Up and Registration Form HTML Using Bootstrap 4</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.10.2/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <style>
/*-- Signup form CSS --*/
form.Signup {
    border: 1px solid #ddd;
    padding: 0px 20px;
    margin: 50px 0px;
}
.Signup a {
    color: #9c27b0;
}
.Signup .btn {
    width: 100%;
    margin: 10px 0px;
    font-size: 18px;
    background-color: #9c27b0;
    border: none;
}
label.term-policy {
    font-weight: 500;
    margin: 10px 0px 0px;
}
.Signup .choose-icon {
    float: right;
    margin-top: -38px;
    background-color: #f5f5f5;
    padding: 7px 15px;
    height: 38px;
    border-bottom-right-radius: 4px;
    border-top-right-radius: 4px;
    border: 1px solid #ccc;
    position: relative;
    z-index: 999;
}
.Signup #Profile-pic {
    padding-left: 3px;
    padding-top: 3px;
}
.Signup h3 {
    margin: 20px 0px 30px;
    padding: 0px 0px 25px;
    text-align: center;
    border-bottom: 1px solid #ddd;
     color: #9c27b0;
}
p.not-yet {
    text-align: center;
}
</style>
</head>
<body>
<?php
if(isset($_POST['edit_btn']))
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
  $id= $_POST['id'];
  $result= mysqli_query($conn,"select * from Users where Id='$id'");
  if(mysqli_num_rows($result)==1){
       foreach($result as $row){

     

  
?>

  <div class="container">   
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <!-- Sign Up form -->
        <form action="code.php"  class="Signup" enctype="multipart/form-data" method="post">
          <h3>Edit User Informaiton </h3>
          <div class="form-group">
              <label for="name">Full Name</label>
              <input hidden type="text" name='id' value="<?php echo $row['Id']; ?>">
            <input type="text"  class="form-control" value="<?php echo $row['Name']; ?>" placeholder="Full Name" name="name" required>
          </div>
          <div class="form-group">
              <label for="email">Email</label>
            <input type="text"  class="form-control" value="<?php echo $row['Email']; ?>" placeholder="Enter Email" name="email" required>
          </div>      
          <div class="form-group">
              <label for="psw">Password</label>
            <input type="text" id="password"  value="<?php echo $row['Password']; ?>" class="form-control" placeholder="Enter Password" name="psw" required> 
          </div>   
          <div class="form-group">
            <label for="psw-repeat">Repeat Password</label>
            <input type="text" id="psw-repeat" value="<?php echo $row['confirm_password']; ?>" class="form-control" placeholder="Repeat Password" name="psw-repeat" required>
            <label for="message" id="message"></label> 
        </div>
          
          <div class="form-group">
              <label for="number">Contact Number</label>
            <input type="text" class="form-control" value="<?php echo $row['Number']; ?>" placeholder="Enter Contact Number" name="number" required>
          </div> 
          
          <div class="form-group">
           
          </div>
          <button type="submit" name="save_btn" class="btn btn-success">Save</button>
          <button name="cancle_btn" style="background:red" class="btn btn-success"><a style='color: white;text-decoration:none;' href="listuser.php">Cancle</a></button>
          

            
          <hr>
         
        </form>
      </div>
    </div>
  </div>
  <?php   }
   } } ?>
  <script>
          
          $('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Password Not Matching').css('color', 'red');
});
        </script>
</body>
</html>