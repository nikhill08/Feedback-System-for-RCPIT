<?php
include "configASL.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['department'])) {
        $_SESSION['department'] = $_POST['department'];
        $department = $_SESSION['department'];
    }

    if (isset($_POST['year'])) {
        $_SESSION['year'] = $_POST['year'];
        $year = $_SESSION['year'];
    }

    if (isset($_POST['semester'])) {
        $_SESSION['semester'] = $_POST['semester'];
        $semester = $_SESSION['semester'];
    }

    if (isset($_POST['division'])) {
        $_SESSION['division'] = $_POST['division'];
        $division = $_SESSION['division'];
    }
}

$existingFaculty = mysqli_query($al, "SELECT * FROM faculty WHERE department='$department' 
                                           AND year='$year' AND semester='$semester' 
                                           AND division='$division'");

    if (mysqli_num_rows($existingFaculty) == 0) {
        // No faculty record exists, display alert and navigate back to feedback.php
        echo "<script>alert('No faculty record found with the specified values.');</script>";
        echo "<script>window.location.href = 'feedback.php';</script>";       
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
<span class="SubHead">Student Feedback Step II</span>
<form method="POST" action="feedback_step_4.php">
    <div id="table">
        <div class="tr">
    <div class="td">
        <label>Department : </label>
    </div>
    <div class="td">
        <select name="department" required disabled>
            <option value=""> - - Department - -</option>
            <?php
            $department_query = mysqli_query($al, "SELECT DISTINCT department FROM faculty");
            while ($department_data = mysqli_fetch_array($department_query)) {
                $dept = $department_data['department'];
                ?>
                <option value="<?php echo $dept; ?>" <?php if ($dept === $department) echo 'selected'; ?>><?php echo $dept; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>

<div class="tr">
    <div class="td">
        <label>Year : </label>
    </div>
    <div class="td">
        <select name="year" required disabled>
            <option value=""> - - Year - -</option>
            <?php
            $year_query = mysqli_query($al, "SELECT DISTINCT year FROM faculty");
            while ($year_data = mysqli_fetch_array($year_query)) {
                $yr = $year_data['year'];
                ?>
                <option value="<?php echo $yr; ?>" <?php if ($yr === $year) echo 'selected'; ?>><?php echo $yr; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>

<div class="tr">
    <div class="td">
        <label>Semester : </label>
    </div>
    <div class="td">
        <select name="semester" required disabled>
            <option value=""> - - Semester - -</option>
            <?php
            $semester_query = mysqli_query($al, "SELECT DISTINCT semester FROM faculty");
            while ($semester_data = mysqli_fetch_array($semester_query)) {
                $sem = $semester_data['semester'];
                ?>
                <option value="<?php echo $sem; ?>" <?php if ($sem === $semester) echo 'selected'; ?>><?php echo $sem; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>

<div class="tr">
    <div class="td">
        <label>Division : </label>
    </div>
    <div class="td">
        <select name="division" required disabled>
            <option value=""> - - Division - -</option>
            <?php
            $division_query = mysqli_query($al, "SELECT DISTINCT division FROM faculty");
            while ($division_data = mysqli_fetch_array($division_query)) {
                $div = $division_data['division'];
                ?>
                <option value="<?php echo $div; ?>" <?php if ($div === $division) echo 'selected'; ?>><?php echo $div; ?></option>
                <?php
            }
            ?>
        </select>
    </div>
</div>


        <div class="tr">
    <div class="td">
        <label>Faculty : </label>
    </div>
    <div class="td">
        <select name="name" required>
            <option value=""> - - Select Faculty - -</option>
            <?php
            $faculty_query = mysqli_query($al, "SELECT faculty_id, name, subject FROM faculty WHERE department='$department' AND year='$year' AND semester='$semester' AND division='$division' ORDER BY faculty_id ASC  LIMIT 1");

            while ($faculty_data = mysqli_fetch_array($faculty_query)) {
                $faculty_id = $faculty_data['faculty_id'];
                $name = $faculty_data['name'];
                $subject = $faculty_data['subject'];
                ?>
                <option value="<?php echo $name.'-'.$subject.'-'.$faculty_id; ?>"><?php echo $name.' - '.$subject; ?></option>
            <?php
            }
            ?>
        </select>
        <input type="hidden" name="faculty_id" value="">
    </div>
</div>


    </div>

    <div class="tdd">
        <input type="button" onClick="window.location='feedback.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" onClick="window.location='exit.php'" value="EXIT">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="NEXT" />
    </div>
</form>
<br>
</div>
</body>
</html>
