<?php
require_once "connect.php";
require_once "is_logged_in.php";

$type = 'add';
$temperature = ''; 	
$visits = 0; 	
$dose = '';	
$student_id = '';	
$vaccine_id = '';	

if(isset($_POST['add'])) {
  $query = "INSERT INTO records VALUES(null, '".$_POST['temperature']."', '".$_POST['visits']."', '".$_POST['dose']."', '".$_POST['student_id']."', '".$_POST['vaccine_id']."')";
  $conn->query($query);

  header("Location: record.php");
}

if(isset($_POST['update'])) {
  $query = "UPDATE records SET temperature='".$_POST['temperature']."', visits='".$_POST['visits']."', dose='".$_POST['dose']."', student_id='".$_POST['student_id']."', vaccine_id='".$_POST['vaccine_id']."' WHERE record_id=" . $_GET['id'];
  $conn->query($query);

//   echo $conn->error;
  header("Location: record.php");
}

if(isset($_GET['edit'])) {
  $type = 'update';

  $query = "SELECT * FROM records WHERE record_id=" . $_GET['id'];
  $result = $conn->query($query);

  if($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $temperature = $row['temperature']; 	
        $visits = $row['visits']; 	
        $dose = $row['dose']; 	
        $student_id = $row['student_id'];	
        $vaccine_id = $row['vaccine_id'];	
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

input,
select {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input:focus,
select:focus {
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
  text-transform: uppercase
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
    <h1 style="color: white; text-transform: uppercase"><?php echo $type; ?> Record</h1>
    <hr>
    <label for="temperature" style="color: white;"><b>Temperature</b></label>
    <input type="text" placeholder="Enter Temperature" name="temperature" value="<?php echo $temperature; ?>" required>

    <label for="visits" style="color: white;"><b>Visits</b></label>
    <input type="number" name="visits" value="<?php echo $visits ?>" required>

    <label for="dose" style="color: white;"><b>Dose</b></label>
    <input type="text" placeholder="Enter dose" name="dose" value="<?php echo $dose; ?>" required>

    <label style="color: white;" for="uname"><b>Student</b></label>
      <?php
        $query = "SELECT * FROM students ORDER BY lastname ASC";
        $result = $conn->query($query);
      ?>
      <select name="student_id">
        <?php 
            if($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { 
                  if($student_id === $row['student_id']) {
                    echo "<option value=".$row['student_id']." selected>".$row['lastname'] .', '. $row['firstname']."</option>";
                  }else {
                    echo "<option value=".$row['student_id'].">".$row['lastname'] .', '. $row['firstname']."</option>";
                  }
                }
            }
        
        ?>
      </select>

      <label style="color: white;" for="uname"><b>Vaccine</b></label>
      <?php
        $query = "SELECT * FROM vaccines ORDER BY name ASC";
        $result = $conn->query($query);
      ?>
      <select name="vaccine_id">
        <?php 
            if($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) { 
                  if($vaccine_id === $row['vaccine_id']) {
                    echo "<option value=".$row['vaccine_id']." selected>".$row['name']."</option>";
                  }else {
                    echo "<option value=".$row['vaccine_id'].">".$row['name']."</option>";
                  }
                }
            }
        
        ?>
      </select>

    <div class="clearfix flex">
      <a href="vaccine.php"><button type="button" class="cancelbtn">Cancel</button>
      <input type="submit" name="<?php echo $type; ?>" value="<?php echo $type; ?>" class="signupbtn"></input>
    </div>
  </div>
</form>

</body>
</html>
