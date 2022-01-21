<?php
require_once "connect.php";
require_once "is_logged_in.php";

$query = "SELECT * FROM students INNER JOIN users ON students.user_id = users.user_id ORDER BY students.lastname";
$result = $conn->query($query);

if(isset($_GET['delete'])) {
    $query = "DELETE FROM users WHERE user_id=" . $_GET['id'];
    $conn->query($query);
    echo $conn->error;
  
    $query = "SELECT * FROM students INNER JOIN users ON students.user_id = users.user_id ORDER BY students.lastname";
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
  background-color: blue;
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
  background-color: lightblue;
  border: black;
  box-shadow: 0 10px black;
  margin: 50px 50px 50px 100px;
}
.button:hover {background-color: lightgreen;}
.button:active {
  background-color: lightcyan;
  box-shadow: 0 6px skyblue;
  transform: translateY(4px);
}
div.transbox {
  margin: 100px;
  border: 5px solid black;
  background-color: lightblue;
  opacity: 0.6;
}
div.transbox h1 {
  margin: 45px;
  font-weight: bold;
  color: black;
  font-size: 100px;
  font-family: Times New Roman;
  text-align: center;
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
  <a href="add_student.php"><button class="button">Add</button></a>
<div class="transbox" style="">
  <h1>Student</h1>
  <!-- firstname 	middlename 	lastname 	age 	year_level 	course 	 	 -->
<table>
  <tr>
    <th>ID</th>
    <th>Firstname</th>
    <th>Middlename</th>
    <th>Lastname</th>
    <th>Age</th>
    <th>Year Level</th>
    <th>Course</th>
    <th>Email</th>
  </tr>
  <?php
    if($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()){ 
          $student_id = $row['student_id']; 	
          $firstname = $row['firstname']; 	
          $middlename = $row['middlename']; 	
          $lastname = $row['lastname']; 	
          $age = $row['age']; 	
          $year_level = $row['year_level']; 	
          $course = $row['course']; 	
          $user_id = $row['user_id']; 	
          $username = $row['username']; 	
    ?>
          <tr>
            <td><?php echo $student_id ?></td>
            <td><?php echo $firstname ?></td>
            <td><?php echo $middlename ?></td>
            <td><?php echo $lastname ?></td>
            <td><?php echo $age ?></td>
            <td><?php echo $year_level ?></td>
            <td><?php echo $course ?></td>
            <td><?php echo $username ?></td>
            <td>
              <a href="add_student.php?edit=edit&id=<?php echo $student_id ?>&user_id=<?php echo $user_id ?>">EDIT</a>
              <a href="?delete=delete&id=<?php echo $user_id ?>">DELETE</a>
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