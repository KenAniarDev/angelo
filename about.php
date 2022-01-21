<?php
require_once "is_logged_in.php";

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>About WebApp</title>
</head>
<style>
body{
  background-image: linear-gradient(to right,yellow,white,orange);
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
  background-color: darkorange;
  border: black;
  box-shadow: 0 10px black;
  margin: 50px 50px 50px 100px;
}
.button:hover {background-color: lightgreen;}
.button:active {
  background-color: orange;
  box-shadow: 0 6px darkgray;
  transform: translateY(4px);
}
div.transbox {
  margin: 100px;
  border: 5px solid black;
  background-color: yellow;
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
</style>
<body>
  <a href="index.php"><button class="button">Back</button></a>
<div class="transbox">
  <h1>About</h1>
</div>
</body>
</html>