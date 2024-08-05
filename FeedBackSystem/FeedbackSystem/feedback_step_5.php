<?php
include "configASL.php";
session_start();

if (!empty($_POST)) {
    $faculty_id = $_POST['faculty_id'];
    $q1 = $_POST['q1'];
    $q2 = $_POST['q2'];
    $q3 = $_POST['q3'];
    $q4 = $_POST['q4'];
    $q5 = $_POST['q5'];
    $q6 = $_POST['q6'];
    $q7 = $_POST['q7'];
    $q8 = $_POST['q8'];
    $q9 = $_POST['q9'];
    $q10 = $_POST['q10'];
    $total = $q1 + $q2 + $q3 + $q4 + $q5 + $q6 + $q7 + $q8 + $q9 + $q10;
    $per = ($total / 50) * 100;

    // Fetch faculty name from add_teacher table
    $facultyQuery = mysqli_query($al, "SELECT t_name,t_department FROM add_teacher WHERE t_id = '$faculty_id'");
    $facultyData = mysqli_fetch_assoc($facultyQuery);
    $faculty_name = $facultyData['t_name'];
    $faculty_department = $facultyData['t_department'];

    $x = mysqli_query($al, "INSERT INTO feeds(faculty_id, name, department, q1, q2, q3, q4, q5, q6, q7, q8, q9, q10, total, percent)
        VALUES ('$faculty_id', '$faculty_name',  '$faculty_department','$q1', '$q2', '$q3', '$q4', '$q5', '$q6', '$q7', '$q8', '$q9', '$q10', '$total', '$per')");

    // if ($x == true) {
    //     ?>
    //     <script type="text/javascript">
    //         alert('Feedback successfully submitted');
    //         window.location = 'feedback_step_2.php';
    //     </script>
    // <?php
    // }
}
?>

<?php
// Accessing department, year, semester, and division from the session
$department = $_SESSION['department'];
$year = $_SESSION['year'];
$semester = $_SESSION['semester'];
$division = $_SESSION['division'];
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
<span class="SubHead">Student Feedback Step V</span>
<form method="POST" action="feedback_step_4.php">
    <div id="table">
        <!-- Displaying the department, year, semester, and division values -->
        <div class="tr">
            <div class="td">
                <label>FacultyID : </label>
            </div>
            <div class="td">
                <?php echo $faculty_id; ?>
            </div>
        </div>

        <div class="tr">
            <div class="td">
                <label>Department : </label>
            </div>
            <div class="td">
                <?php echo $department; ?>
            </div>
        </div>

        <div class="tr">
            <div class="td">
                <label>Year : </label>
            </div>
            <div class="td">
                <?php echo $year; ?>
            </div>
        </div>

        <div class="tr">
            <div class="td">
                <label>Semester : </label>
            </div>
            <div class="td">
                <?php echo $semester; ?>
            </div>
        </div>

        <div class="tr">
            <div class="td">
                <label>Division : </label>
            </div>
            <div class="td">
                <?php echo $division; ?>
            </div>
        </div>

        <!-- Rest of the form code -->
        <div class="tr">
            <div class="td">
                <label>Faculty : </label>
                <?php echo $faculty_id; ?>
            </div>
            <div class="td">
                <select name="name" required>
                    <option value=""> - - Select Faculty - -</option>
                    <?php
                    $faculty_query = mysqli_query($al, "SELECT faculty_id, name, subject FROM faculty WHERE department='$department' AND year='$year' AND semester='$semester' AND division='$division' AND CAST(faculty_id AS UNSIGNED) > '$faculty_id' ORDER BY CAST(faculty_id AS UNSIGNED) ASC LIMIT 1");

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
        <input type="button" onClick="window.location='feedback_step_4.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="button" onClick="window.location='exit.php'" value="EXIT">&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="NEXT" />
    </div>
</form>
<br>
</div>
</body>
</html>
