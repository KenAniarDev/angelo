<nav>
  <ul>
    <?php if(!$_SESSION['isLoggedIn']) {?>
    <li><a href="login.php"> LOGIN</a></li>
    <?php } ?>
    <li><a href="record.php"> RECORD</a></li>
    <li><a href="vaccine.php"> VACCINE</a></li>
    <li><a href="student.php"> STUDENT</a></li>
    <li><a href="about.php"> ABOUT</a></li>
    <?php if($_SESSION['isLoggedIn']) {?>
        <li><a href="?logout=logout">LOGOUT</a></li>
    <?php } ?>
  </ul>
</nav>