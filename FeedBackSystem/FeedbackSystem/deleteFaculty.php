<?php
include("configASL.php");
$faculty_id=$_GET['faculty_id'];
$department=$_GET['department'];
$year=$_GET['year'];
$semester=$_GET['semester'];
$division=$_GET['division'];
mysqli_query($al,"delete from faculty where faculty_id='$faculty_id' and department='$department' and year='$year' and semester='$semester' and division='$division'");
?>
<script type="text/javascript">
alert("Successfully deleted");
window.location='manageFaculty.php';
</script>
