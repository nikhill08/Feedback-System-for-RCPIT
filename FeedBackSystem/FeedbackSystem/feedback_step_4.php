<?php
include "configASL.php";
session_start();

// $sql=mysqli_query($al,"select * from feeds where roll='".mysqli_real_escape_string($al,$_POST['roll'])."' AND name='".mysqli_real_escape_string($al,$_POST['faculty'])."' AND subject='".mysqli_real_escape_string($al,$_POST['subject'])."'");

// if(mysqli_num_rows($sql)>0)
// {
//    ?>
//     <script type="text/javascript">
//    alert('Feedback already submitted');
//    window.location='feedback_step_3.php';
//    </script>
//     <?php
// }


if (isset($_POST['name'])) {
    $selectedFaculty = explode('-', $_POST['name']);
    $faculty_name = $selectedFaculty[0];
    $subject = $selectedFaculty[1];
    $faculty_id = $selectedFaculty[2];

    $result = mysqli_query($al, "SELECT t_image FROM add_teacher WHERE t_id='$faculty_id'");
    $row = mysqli_fetch_array($result);
    $faculty_image = $row['t_image'];
}



//Fetch Questions
$q = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM questions WHERE id = '1'"));
$parameters = array("Poor","Fair","Good","Very Good","Excellent");
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
   TECH VEGAN PROJECTS<br />
    <span class="tag">STUDENT FEEDBACK SYSTEM</span>
</div>
<br>
<br>
<br>
<br>

<div id="content" align="center">
<br>
<br>
<span class="SubHead">Step IV</span>
<form method="post" action="feedback_step_5.php" >
<div id="table">
        <div class="tr">
            <div class="td">
                <label>Faculty ID : </label>
            </div>
            <div class="td">
                <input type="text" disabled size="25" value="<?php echo $faculty_id; ?>" />
                <input type="hidden" value="<?php echo $faculty_id; ?>" name="faculty_id" />
            </div>
        </div>
        <div class="tr">
            <div class="td">
                <label>Faculty Name : </label>
            </div>
            <div class="td">
                <input type="text" disabled size="25" value="<?php echo $faculty_name; ?>" />
                <input type="hidden" value="<?php echo $faculty_name; ?>" name="faculty_name" />
            </div>
        </div>
        <div class="tr">
            <div class="td">
                <label>Faculty Subject : </label>
            </div>
            <div class="td">
                <input type="text" disabled size="25" value="<?php echo $subject; ?>" />
                <input type="hidden" value="<?php echo $subject; ?>" name="subject" />
            </div>
        </div>
        <div class="tr">
    <div class="td">
        <label>Faculty Image : </label>
    </div>
    <div class="td">
        <?php
        if (!empty($faculty_image) && file_exists('teacher_images/' . $faculty_image)) {
            echo '<img src="teacher_images/' . $faculty_image . '" alt="Faculty Image" width="50" height="50" />';
        } else {
            echo 'No Image';
        }
        ?>
    </div>
</div>
    </div>
<hr style="width:100%;">

   <?php
      for($i=1;$i<=10;$i++)
      {
         ?>
            <div class="tddd">
            <span class="text"><?php echo $i;?>. <?php echo  $q['q'.$i];?> : <br>
                <?php 
                  for($j=1;$j<=5;$j++)
                  {
                     ?>
                        <input type="radio" required value="<?php echo $j;?>" name="q<?php echo $i;?>" /><?php echo $parameters[$j-1];?>&nbsp;&nbsp;
                        <?php } ?> </span>
                                    </div>
                                          <hr style="width:100%;"> <?php } ?>
                                         
         <input type="button" onClick="window.location='feedback_step_2.php'" value="BACK">&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="SUBMIT" onClick="return confirm('Are you sure?')" />
            <br>
<br>

        </div>
   
    <br>
</div>
</form>
<br>
<script type="text/javascript">
    console.log('Faculty ID:', '<?php echo $faculty_id; ?>');
    console.log('Faculty Name:', '<?php echo $faculty_name; ?>');
    console.log('Faculty Subject:', '<?php echo $subject; ?>');
</script>
</body>
</html>