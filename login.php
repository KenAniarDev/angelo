<?php
require_once "connect.php";
session_start();

if($_SESSION['isLoggedIn']) {
  header("Location: index.php");
}

$error = "";

if(isset($_POST['submit'])) {
  $error = "";
  $query = "SELECT * FROM users WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";
  $result = $conn->query($query);

  if($result->num_rows > 0) {
    $_SESSION['isLoggedIn'] = true;
  }else {
    $error = "email or password is incorrect";
  }
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

button,
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover,
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

<h2 style="text-align: center; color: white;">PSU CS STUDENT LOGIN</h2>

<form action="" method="POST">
  <img src = "received_232328495553597.jpeg" width="150px" height="150px">
  <div class="imgcontainer">
    <img src="student-login.png" alt="Avatar" class="avatar">
  </div>
  <div class="container">
    <p style="color: red"><?php echo $error; ?></p>
    <label for="uname"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="username" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>
        
    <input type="submit" name="submit" value="Login">
    <a href="signup.php"><button type="button" class="regbtn"> Register</button>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <a href="index.php"><button type="button" class="cancelbtn">Cancel</button>
  </div>
</

</body>
</html>
