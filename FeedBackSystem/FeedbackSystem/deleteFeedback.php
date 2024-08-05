<?php
include("configASL.php");
$faculty_id=$_GET['faculty_id'];
mysqli_query($al,"delete from feeds where faculty_id='$faculty_id'");
?>
<script type="text/javascript">
alert("Successfully deleted");
window.location='feeds.php';
</script>