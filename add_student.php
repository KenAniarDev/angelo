<?php
require_once "connect.php";

$type = 'add';
$firstname = ''; 	
$middlename = '';
$lastname = '';
$age = 18; 	
$year_level = '';
$course = '';
$username = '';
$password = '';

if(isset($_POST['add'])) {
  $query = "INSERT INTO users VALUES(null, '".$_POST['username']."', '".$_POST['password']."')";
  $conn->query($query);

  $last_id = mysqli_insert_id($conn);

  $query = "INSERT INTO students VALUES(null, '".$_POST['firstname']."', '".$_POST['middlename']."', '".$_POST['lastname']."', '".$_POST['age']."', '".$_POST['year_level']."', '".$_POST['course']."', '".$last_id."')";
  $conn->query($query);

  header("Location: student.php");

}

if(isset($_POST['update'])) {
  $query = "UPDATE users SET username='".$_POST['username']."', password='".$_POST['password']."' WHERE user_id=" . $_GET['user_id'];
  $conn->query($query);

  echo $conn->error;

  $query = "UPDATE students SET firstname='".$_POST['firstname']."', middlename='".$_POST['middlename']."', lastname='".$_POST['lastname']."', age='".$_POST['age']."', year_level='".$_POST['year_level']."', course='".$_POST['course']."' WHERE student_id=" . $_GET['id'];
  $conn->query($query);

  header("Location: student.php");
}

if(isset($_GET['edit'])) {
  $type = 'update';

  $query = "SELECT * FROM students INNER JOIN users ON students.user_id = users.user_id WHERE students.student_id=" . $_GET['id'];
  $result = $conn->query($query);

  if($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
      $firstname = $row['firstname']; 	
      $middlename = $row['middlename'];
      $lastname = $row['lastname'];
      $age = $row['age']; 	
      $year_level = $row['year_level'];
      $course = $row['course'];
      $username = $row['username'];
      $password = $row['password'];
    }
  }
}

?>
<!DOCTYPE html>
<html>
<style>
body {
  background-color: green;
  font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box}

input {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input:focus {
  background-color: #ddd;
  outline: none;
}

hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
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
  opacity: 0.9;
}

button:hover,
input[type=submit]:hover {
  opacity:1;
}


.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}


.cancelbtn, input[type=submit].signupbtn {
  float: left;
  width: 50%;
}


.container {
  padding: 16px;
}

.clearfix::after {
  content: "";
  clear: both;
  display: table;
}


@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>

<form action="" method="POST" style="border:1px solid #ccc">
  <div class="container">
    <img src = "received_232328495553597.jpeg" width="100px" height="100px"; style="margin-right: 100px;">
    <h1 style="color: white;">PSU CS Student Sign Up</h1>
    <p style="color: white;">Please fill in this form to create an account.</p>
    <hr>


    <label for="firstname" style="color: white;"><b>First Name</b></label>
    <input type="text" placeholder="Enter First Name" name="firstname" value="<?php echo $firstname; ?>" required>

    <label for="middlename" style="color: white;"><b>Middle Name</b></label>
    <input type="text" placeholder="Enter Middle Name" name="middlename" value="<?php echo $middlename; ?>" required>

    <label for="lastname" style="color: white;"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Last Name" name="lastname" value="<?php echo $lastname; ?>" required>

    <label for="age" style="color: white;"><b>Age</b></label>
    <input type="number" placeholder="Enter Age" name="age" value="<?php echo $age; ?>" required>

    <label for="year_level" style="color: white;"><b>Year Level</b></label>
    <input type="text" placeholder="Enter Year Level" name="year_level" value="<?php echo $year_level; ?>" required>

    <label for="course" style="color: white;"><b>Course</b></label>
    <input type="text" placeholder="Course" name="course" value="<?php echo $course; ?>" required>

    <label for="username" style="color: white;"><b>Email</b></label>
    <input type="email" placeholder="Enter Email" name="username" value="<?php echo $username; ?>" required>

    <label for="password" style="color: white;"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" value="<?php echo $password; ?>" required>

    <div class="clearfix flex">
      <a href="login.php"><button type="button" class="cancelbtn">Cancel</button>
      <input type="submit" name="<?php echo $type; ?>" value="Sign Up" class="signupbtn"></input>
    </div>
  </div>
</form>

</body>
</html>
