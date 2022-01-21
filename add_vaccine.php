<?php
require_once "connect.php";
require_once "is_logged_in.php";

$type = 'add';
$name = ''; 	
$expiry = ''; 	
$batch = ''; 	

if(isset($_POST['add'])) {
  $query = "INSERT INTO vaccines VALUES(null, '".$_POST['name']."', '".$_POST['expiry']."', '".$_POST['batch']."')";
  $conn->query($query);

  header("Location: vaccine.php");
}

if(isset($_POST['update'])) {
  $query = "UPDATE vaccines SET name='".$_POST['name']."', expiry='".$_POST['expiry']."', batch='".$_POST['batch']."' WHERE vaccine_id=" . $_GET['id'];
  $conn->query($query);

  header("Location: vaccine.php");
}

if(isset($_GET['edit'])) {
  $type = 'update';

  $query = "SELECT * FROM vaccines WHERE vaccine_id=" . $_GET['id'];
  $result = $conn->query($query);

  if($result && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
        $name = $row['name']; 	
        $expiry = $row['expiry']; 	
        $batch = $row['batch']; 	
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
    <h1 style="color: white; text-transform: uppercase"><?php echo $type; ?> Vaccine</h1>
    <hr>
    <label for="name" style="color: white;"><b>Name</b></label>
    <input type="text" placeholder="Enter Name" name="name" value="<?php echo $name; ?>" required>

    <label for="expiry" style="color: white;"><b>Expiry</b></label>
    <input type="date" name="expiry" value="<?php echo $expiry ?>" required>

    <label for="batch" style="color: white;"><b>Batch</b></label>
    <input type="text" placeholder="Enter Batch" name="batch" value="<?php echo $batch; ?>" required>

    <div class="clearfix flex">
      <a href="vaccine.php"><button type="button" class="cancelbtn">Cancel</button>
      <input type="submit" name="<?php echo $type; ?>" value="<?php echo $type; ?>" class="signupbtn"></input>
    </div>
  </div>
</form>

</body>
</html>
