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

if(!empty($_POST))
{
    $fc=$_POST['fc'];
    $department=$_POST['department'];

    // Check if an image is uploaded
    if(isset($_FILES['teacher_image'])) {
        $teacher_image = $_FILES['teacher_image'];
        $image_name = $teacher_image['name'];
        $image_tmp_name = $teacher_image['tmp_name'];
        $image_destination = 'teacher_images/' . $image_name; // Specify the destination directory for storing teacher images

        // Move the uploaded image file to the destination directory
        if (move_uploaded_file($image_tmp_name, $image_destination)) {
            // Image file moved successfully, proceed with inserting teacher details into the database
            $u = mysqli_query($al, "INSERT INTO add_teacher(t_name, t_department, t_image) 
                                    VALUES ('$fc', '$department', '$image_name')");

            if ($u) {
                echo "<script type='application/javascript'>alert('Successfully added');</script>";
            } else {
                echo "<script type='application/javascript'>alert('Failed to add teacher');</script>";
            }
        } else {
            // Failed to move the image file, handle the error as desired
            echo "<script type='application/javascript'>alert('Failed to upload teacher image.');</script>";
        }
    } else {
        // No image uploaded, handle the error as desired
        echo "<script type='application/javascript'>alert('No image uploaded.');</script>";
    }
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
    <!-- Navbar Code -->
    <br />
    <span class="tag">STUDENT FEEDBACK SYSTEM</span>
</div>
<br>
<br>
<br>
<br>

<div id="content" align="center">
<br>
<br>
<span class="SubHead">Add Faculty</span>
<br>
<br>
<form method="post" action="" enctype="multipart/form-data">
    <div id="table">
        <div class="tr">
            <div class="td">
                <label>Faculty:</label>
            </div>
            <div class="td">
                <input type="text" name="fc" size="25" required placeholder="Enter Faculty Name" />
            </div>
        </div>
        <div class="tr">
            <div class="td">
                <label>Department:</label>
            </div>
            <div class="td">
                <input type="text" name="department" size="25" required placeholder="Enter Department" value="<?php echo $department; ?>" readonly />
            </div>
        </div>
        <div class="tr">
            <div class="td">
                <label>Image:</label>
            </div>
            <div class="td">
                <input type="file" name="teacher_image" accept="image/*" required />
            </div>
        </div>
    </div>
    <div class="tdd">
        <input type="submit" value="ADD FACULTY" />
    </div>
    <br>
    <br>
    <span class="SubHead">Add Faculty</span>
    <br>
    <br>
    <table border="0" cellpadding="3" cellspacing="3">
        <tr style="font-weight:bold;">
            <td>Sr. No.</td>
            <td>Teacher ID</td>
            <td>Teacher Name</td>
            <td>Teacher Department</td>
            <td>Teacher Image</td>
            <td>Delete</td>
        </tr>
        <?php
        $sr=1;
        $h=mysqli_query($al,"SELECT * FROM add_teacher WHERE t_department='$department' ORDER BY CAST(t_id AS UNSIGNED) ASC");
        while($j=mysqli_fetch_array($h))
        {
            ?>
            <tr>
                <td><?php echo $sr;$sr++;?></td>
                <td><?php echo $j['t_id'];?></td>
                <td><?php echo $j['t_name'];?></td>
                <td><?php echo $j['t_department'];?></td>
                <td>
                    <?php
                    $teacher_image = $j['t_image'];
                    if (!empty($teacher_image) && file_exists('teacher_images/' . $teacher_image)) {
                        echo '<img src="teacher_images/' . $teacher_image . '" alt="Teacher Image" width="50" height="50" />';
                    } else {
                        echo 'No Image';
                    }
                    ?>
                </td>        
                <td align="center"><a href="delete.php?del=<?php echo $j['t_id'];?>" onClick="return confirm('Are you sure?')" style="text-decoration:none;font-size:18px;color:rgba(255,0,4,1.00);">[x]</a></td> 
            </tr>
        <?php } ?>
    </table>
    <br>
    <input type="button" onClick="window.location='home.php'" value="BACK">
    <br>
    <br>
</form>
<br>
<br>
<br>
<br>
<br>
</div>
</body>
</html>
