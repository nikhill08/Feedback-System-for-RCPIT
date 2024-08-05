
<?php
include("configASL.php");
session_start();
if(!isset($_SESSION['aid'])) {
    header("location:index.php");
}
$aid=$_SESSION['aid'];
$x=mysqli_query($al,"select * from admin where aid='$aid'");
$y=mysqli_fetch_array($x);
$department=$y['department'];

if(!empty($_POST)) {
    $fc=$_POST['fc'];
    $department=$_POST['department'];
    $year=$_POST['year'];
    $sem=$_POST['sem'];
    $sub=$_POST['sub'];

    $divisions = array();
    if ($department == 'Computer') {
        if (isset($_POST['divA'])) {
            $divisions[] = 'A';
        }

        if (isset($_POST['divB'])) {
            $divisions[] = 'B';
        }

        if (isset($_POST['divC'])) {
            $divisions[] = 'C';
        }
    } elseif ($department == 'ENTC') {
        if (isset($_POST['divA'])) {
            $divisions[] = 'A';
        }

        if (isset($_POST['divB'])) {
            $divisions[] = 'B';
        }
    } else {
        if (isset($_POST['div'])) {
            $divisions[] = 'A';
        }
    }

    // Insert each division separately into the database
    foreach ($divisions as $division) {
        $query = mysqli_query($al, "SELECT t_id FROM add_teacher WHERE t_name='$fc'");
        $row = mysqli_fetch_array($query);
        $faculty_id = $row['t_id'];

        $existingRecord = mysqli_query($al, "SELECT * FROM faculty WHERE faculty_id='$faculty_id' 
                                      AND name='$fc' AND department='$department' 
                                      AND year='$year' AND semester='$sem' 
                                      AND subject='$sub' AND division='$division'");

if(mysqli_num_rows($existingRecord) == 0) {
    $u = mysqli_query($al, "INSERT INTO faculty(faculty_id, name, department, year, semester, subject, division) 
                            VALUES ('$faculty_id', '$fc', '$department', '$year', '$sem', '$sub', '$division')");
}

    }

    if ($u) {
        echo "<script type='application/javascript'>alert('Successfully added');</script>";
    }else{
        echo "<script type='application/javascript'>alert('Record Already Present');</script>";
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
<span class="SubHead">Add Faculty</span>
<br>
<br>
<form method="post" action="" >
<div id="table">
    <div class="tr">
            <div class="td">
                <label>Faculty : </label>
            </div>
            <div class="td">
                <select name="fc" required>
                    <option value="" disabled selected> - - Select Faculty - -</option>
                    <?php
                    $query = mysqli_query($al, "SELECT t_name, t_id FROM add_teacher WHERE t_department='$department'");
                    while ($row = mysqli_fetch_array($query)) {
                        $facultyName = $row['t_name'];
                        $faculty_id = $row['t_id'];
                        ?>
                        <option value="<?php echo $facultyName; ?>"><?php echo $facultyName; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
<div class="tr">
    <div class="td">
        <label>Department : </label>
    </div>
    <div class="td">
        <input type="text" name="department" size="25" required placeholder="Enter Department" value="<?php echo $department; ?>" readonly />
    </div>
</div>
    <!-- <div class="tr">
        <div class="td">
            <label>Department : </label>
        </div>
        <div class="td">
            <input type="text" name="department" size="25" required placeholder="Enter Department" />
        </div>
    </div> -->
<div class="tr">
    <div class="td">
        <label>Year : </label>
    </div>
    <div class="td">
        <select name="year" required onchange="updateSemesterOptions(this.value)">
            <option value="">Select Year</option>
            <option value="FY">FY</option>
            <option value="SY">SY</option>
            <option value="TY">TY</option>
            <option value="B.Tech">B.Tech</option>
        </select>
    </div>
</div>
<div class="tr">
    <div class="td">
        <label>Semester : </label>
    </div>
    <div class="td">
        <select name="sem" required>
            <option value="">Select Semester</option>
        </select>
    </div>
</div>

<script>
function updateSemesterOptions(selectedYear) {
    const semesterSelect = document.getElementsByName("sem")[0];
    semesterSelect.innerHTML = "<option value=''>Select Semester</option>";
    
    if (selectedYear === "FY") {
        for (let i = 1; i <= 2; i++) {
            semesterSelect.innerHTML += `<option value="${i}">${i}</option>`;
        }
    } else if (selectedYear === "SY") {
        for (let i = 3; i <= 4; i++) {
            semesterSelect.innerHTML += `<option value="${i}">${i}</option>`;
        }
    } else if (selectedYear === "TY") {
        for (let i = 5; i <= 6; i++) {
            semesterSelect.innerHTML += `<option value="${i}">${i}</option>`;
        }
    } else if (selectedYear === "B.Tech") {
        for (let i = 7; i <= 8; i++) {
            semesterSelect.innerHTML += `<option value="${i}">${i}</option>`;
        }
    }
}
</script>

    <!-- <div class="tr">
        <div class="td">
            <label>Year : </label>
        </div>
        <div class="td">
            <input type="text" name="year" size="25" required placeholder="Enter Year" />
        </div>
    </div> -->

<!-- <div class="tr">
        <div class="td">
            <label>Semester : </label>
        </div>
        <div class="td">
            <input type="text" name="sem" size="25" required placeholder="Enter Semester" />
        </div>
    </div> -->

    <div class="tr">
        <div class="td">
            <label>Subject : </label>
        </div>
        <div class="td">
            <input type="text" name="sub" size="25" required placeholder="Enter Subject" />
        </div>
    </div>
    
    <!-- <div class="tr">
        <div class="td">
            <label>Division : </label>
        </div>
        <div class="td">
            <input type="text" name="div" size="25" required placeholder="Enter Division" />
        </div>
    </div> -->
<div class="tr">
    <div class="td">
        <label>Division : </label>
    </div>
    <div class="td">
        <?php if ($department == 'Computer') { ?>
            <input type="checkbox" name="divA" value="A" /> A
            <input type="checkbox" name="divB" value="B" /> B
            <input type="checkbox" name="divC" value="C" /> C
        <?php } elseif ($department == 'ENTC') { ?>
            <input type="checkbox" name="divA" value="A" /> A
            <input type="checkbox" name="divB" value="B" /> B
        <?php } else { ?>
            <input type="checkbox" name="div" value="A" /> A
        <?php } ?>
    </div>
</div>


    
</div>
        
        <div class="tdd">
            <input type="submit" value="ADD FACULTY" />
        </div>
    
<br>
<br>

    
    
    
    <span class="SubHead">Manage Faculty</span>
    <br>
<br>

    <table border="0" cellpadding="3" cellspacing="3">
    <tr style="font-weight:bold;">
    <td>Sr. No.</td>
    <td>Faculty ID</td>
    <td>Faculty Image</td>
    <td>Name</td>
    <td>Department</td>
    <td>Year</td>
    <td>Semester</td>
    <td>Subject</td>
    
    <td>Division</td>
    
    <td>Delete</td>
    
    </tr>
    <?php
    $sr=1;
    $h=mysqli_query($al,"SELECT * FROM faculty WHERE department='$department' ORDER BY CAST(faculty_id AS UNSIGNED) ASC");
    while($j=mysqli_fetch_array($h))
    {
        ?>
        <tr>
            <?php
                $facultyId = $j['faculty_id']; // Store faculty ID in a variable

                $result = mysqli_query($al, "SELECT t_image FROM add_teacher WHERE t_id='$facultyId'");
    $row = mysqli_fetch_array($result);
    $faculty_image = $row['t_image'];

            ?>
        <td><?php echo $sr;$sr++;?></td>
        <td><?php echo $j['faculty_id'];?></td>
        <td>
        <?php
        if (!empty($faculty_image) && file_exists('teacher_images/' . $faculty_image)) {
            echo '<img src="teacher_images/' . $faculty_image . '" alt="Faculty Image" width="50" height="50" />';
        } else {
            echo 'No Image';
        }
        ?>
        </td>
        <td><?php echo $j['name'];?></td>
        <td><?php echo $j['department'];?></td>
        <td><?php echo $j['year'];?></td>
        <td><?php echo $j['semester'];?></td>
        <td><?php echo $j['subject'];?></td>
        
        <td><?php echo $j['division'];?></td>
                
        <td align="center"><a href="deleteFaculty.php?faculty_id=<?php echo $j['faculty_id'];?>&department=<?php echo $j['department'];?>&year=<?php echo $j['year'];?>&semester=<?php echo $j['semester'];?>&division=<?php echo $j['division'];?>" onClick="return confirm('Are you sure?')" style="text-decoration:none;font-size:18px;color:rgba(255,0,4,1.00);">[x]</a></td> 
        </tr>
     <?php } ?>
     </table>
     <br>

<input type="button" onClick="window.location='home.php'" value="BACK">
<br>
<br>
</div>
</form>


<br>
<br>
<br>

<br>
<br>

</div>
</body>
</html>