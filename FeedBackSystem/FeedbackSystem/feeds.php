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
<link href="style.css" rel="stylesheet" type="text/css" />
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
<span class="SubHead">Student Feedback</span>
<br>
<br>

<form method="post" action="feeds_2.php">
<div id="table"> 
    <div class="tr">
        <div class="td">
            <label>Faculty : </label>
        </div>
        <div class="td">
            <select name="faculty_id" required>
                <option value="NA" disabled selected> - - Select Faculty - -</option>
                <?php
                $x = mysqli_query($al, "SELECT DISTINCT faculty_id,name FROM feeds WHERE department='$department' GROUP BY faculty_id");

                while($y=mysqli_fetch_array($x))
                {
                ?>
                    <option value="<?php echo $y['faculty_id'];?>"><?php echo $y['name'];?></option>
                <?php } ?>
            </select>
        </div>
    </div>
</div>

<div class="tdd">
    <input type="button" onClick="window.location='home.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;
    <input type="submit" value="NEXT" />
</div>

<br>
</div>
</form>

</div>
</body>
</html>
