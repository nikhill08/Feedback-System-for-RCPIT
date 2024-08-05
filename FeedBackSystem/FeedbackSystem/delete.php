<?php
include("configASL.php");
$t_id=$_GET['del'];
mysqli_query($al,"delete from add_teacher where t_id='$t_id'");
mysqli_query($al,"delete from faculty where faculty_id='$t_id'");
mysqli_query($al,"delete from feeds where faculty_id='$t_id'");
?>
<script type="text/javascript">
alert("Successfully deleted");
window.location='add_teacher.php';
</script>
