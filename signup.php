<?php
require_once "connect.php";

if(isset($_POST['submit'])){
    $query = "INSERT INTO users VALUES(null, '".$_POST['username']."', '".$_POST['password']."')";
    $conn->query($query);

    header("Location: login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  background-color: green;
  font-family: sans-serif;, Helvetica, sans-serif;}
form {border: 3px solid #f1f1f1;}

input {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

input[type=submit]:hover {
  opacity: 0.8;
}

.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}

.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
}

img.avatar {
  width: 25%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
  .regbtn{
        width: 100%
      }
    }

</style>  
</head>  
<!-- username 	password 	 -->
<form action="" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="username"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="username" required>

    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

    <label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px"> Remember me
    </label>

    <div class="clearfix">
     <a href="index.php"> <button type="button" class="cancelbtn">Cancel</button></a>
      <input type="submit" name="submit" class="signupbtn" value="Sign Up">
    </div>
  </div>
</form>
</body>
</html>
