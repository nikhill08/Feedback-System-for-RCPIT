<?php
include "configASL.php";
session_start();

$department = "";
$year = "";
$semester = "";
$division = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $department = $_POST["department"];
    $year = $_POST["year"];
    $semester = $_POST["semester"];
    $division = $_POST["division"];
}

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
<span class="SubHead">Student Feedback Step I</span>
<form method="POST" action="feedback_step_2.php" >
<div id="table">
        
    <div class="tr">
     <div class="td">
            <label>Department : </label>
        </div>
        <div class="td">
        <div class="td">
            
            <select name="department" required>
            <option value="" > - - Department - -</option>
            <?php
            $x=mysqli_query($al,"select distinct department from faculty");
            while($y=mysqli_fetch_array($x))
            {
             ?>
             <option  value="<?php echo $y['department'];?>"><?php echo $y['department'];?></option>
             <?php } ?>
                </select>
        </div>
      </div>
    </div>

    <div class="tr">
     <div class="td">
            <label>Year : </label>
        </div>
        <div class="td">
        <div class="td">
            <select name="year" required>
            <option value="" > - - Year - -</option>
            <?php
            $x=mysqli_query($al,"select distinct year from faculty");
            while($y=mysqli_fetch_array($x))
            {
             ?>
             <option value="<?php echo $y['year'];?>"><?php echo $y['year'];?></option>
             <?php } ?>
                </select>
        </div>
      </div>
    </div>



    <div class="tr">
     <div class="td">
            <label>Semester : </label>
        </div>
        <div class="td">
        <div class="td">
            <select name="semester" required>
            <option value=""> - - Semester - -</option>
            <?php
            $x=mysqli_query($al,"select distinct semester from faculty");
            while($y=mysqli_fetch_array($x))
            {
             ?>
             <option value="<?php echo $y['semester'];?>"><?php echo $y['semester'];?></option>
             <?php } ?>
                </select>
        </div>
      </div>
    </div>

    <div class="tr">
     <div class="td">
            <label>Division : </label>
        </div>
        <div class="td">
        <div class="td">
            <select name="division" required>
            <option value=""> - - Division - -</option>
            <?php
            $x=mysqli_query($al,"select distinct division from faculty");
            while($y=mysqli_fetch_array($x))
            {
             ?>
             <option value="<?php echo $y['division'];?>"><?php echo $y['division'];?></option>
             
             <?php } ?>
                </select>
                
        </div>
      </div>
    </div>


</div>
        
        <div class="tdd">
            <input type="button" onClick="window.location='index.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="submit" value="NEXT" />

        </div>
    
    <br>
</div>

</form>
<br>

</body>
</html>