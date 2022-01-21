<?php
require_once "connect.php";
require_once "is_logged_in.php";

$query = "SELECT * FROM records";
$result = $conn->query($query);

if(isset($_GET['delete'])) {
  $query = "DELETE FROM records WHERE record_id=" . $_GET['id'];
  $result = $conn->query($query);

  $query = "SELECT * FROM records";
  $result = $conn->query($query);
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>About WebApp</title>
</head>
<style>
body{
  background-color: green;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}
.button {
  display: inline-block;
  padding: 15px 25px;
  font-size: 60px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  font-family: Times New Roman;
  outline: none;
  color: black;
  background-color: limegreen;
  border: black;
  box-shadow: 0 10px black;
  margin: 50px 50px 50px 100px;
}
.button:hover {background-color: lightgreen;}
.button:active {
  background-color: springgreen;
  box-shadow: 0 6px darkgray;
  transform: translateY(4px);
}
div.transbox {
  margin: 100px;
  border: 5px solid black;
  background-color: limegreen;
  opacity: 0.6;
}
div.transbox h1 {
  margin: 45px;
  font-weight: bold;
  color: black;
  font-size: 100px;
  font-family: Times New Roman;
  text-align: center;
  height: 300px;
}
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
<body>
  <a href="index.php"><button class="button">Back</button></a>
  <a href="add_record.php"><button class="button">Add Record</button></a>
<div class="transbox" style="">
  <h1>Records</h1>
  <table>
  <tr>
    <th>ID</th>
    <th>Temperature</th>
    <th>Visits</th>
    <th>Dose</th>
    <th>Student ID</th>
    <th>Vaccine ID</th>
    <th>Action</th>
  </tr>
    <?php
      if($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()){ 
          $record_id = $row['record_id']; 	
          $temperature = $row['temperature']; 	
          $visits = $row['visits']; 	
          $dose = $row['dose']; 	
          $student_id = $row['student_id']; 	
          $vaccine_id = $row['vaccine_id']; 	
    ?>
          <tr>
            <td><?php echo $record_id ?></td>
            <td><?php echo $temperature ?></td>
            <td><?php echo $visits ?></td>
            <td><?php echo $dose ?></td>
            <td><?php echo $student_id ?></td>
            <td><?php echo $vaccine_id ?></td>
            <td>
              <a href="add_record.php?edit=edit&id=<?php echo $record_id ?>">EDIT</a>
              <a href="?delete=delete&id=<?php echo $record_id ?>">DELETE</a>
            </td>
          </tr>
        <?php
        }
      }
    ?>
 
</table>
</div>
</body>
</html>