<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['aid']))
{
	header("location:index.php");
}
$aid=$_SESSION['aid'];
$x=mysqli_query($al,"select * from admin where aid='$aid'");
$y=mysqli_fetch_array($x);
$department=$y['department'];
?>
<!doctype html>
<html><!-- Designed & Developed by Ashish Labade (Tech Vegan) www.ashishvegan.com | Not for Commercial Use-->
<head>
  <meta charset="utf-8">
  <title>Student Feedback System</title>
  <link href="home.css" rel="stylesheet" type="text/css">
</head>


<body>
<div id="topHeader">
	Navbar Code<br />
    <span class="tag">STUDENT FEEDBACK SYSTEM</span>
</div>
<br>
<br>
<br>
<br>

<div id="content" align="center">
<br>
<br>
<span class="SubHead">Welcome Admin <?php echo $department;?></span>
<br>
<br>


<a href="feeds.php" class="button">Feedback</a>
<a href="manageFaculty.php" class="button">Manage Faculty</a>
<br>
<br>
<a href="add_teacher.php" class="button">Add Faculty</a>
<br>

<br>
<a href="changePass.php" class="button">Change Password</a>
<a href="logout.php" class="button">Logout</a>
<br>
<br>

</div>
</body>
</html>