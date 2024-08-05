<?php
include("configASL.php");
session_start();
if (!isset($_SESSION['aid'])) {
    header("location:index.php");
}

$aid = $_SESSION['aid'];
$x = mysqli_query($al, "SELECT * FROM admin WHERE aid='$aid'");
$y = mysqli_fetch_array($x);
$name = $y['name'];

if (!empty($_POST)) {
    $faculty_id = $_POST['faculty_id'];

    // Fetch Name
    $name = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM faculty WHERE faculty_id='" . $faculty_id . "'"));

    $result = mysqli_query($al, "SELECT t_image FROM add_teacher WHERE t_id='$faculty_id'");
    $row = mysqli_fetch_array($result);
    $faculty_image = $row['t_image'];

    $questionCounts = array();
    $questionPercentages = array();
    $sql = mysqli_query($al, "SELECT * FROM feeds WHERE faculty_id='$faculty_id'");
    $totalRows = mysqli_num_rows($sql);
    $s = 0;

    $ratingCounts = array();

// Initialize the ratingCounts array for each question
for ($i = 1; $i <= 10; $i++) {
    $ratingCounts[$i] = array(
        '1' => 0,
        '2' => 0,
        '3' => 0,
        '4' => 0,
        '5' => 0
    );
}

    while ($z = mysqli_fetch_array($sql)) {
        for ($i = 1; $i <= 10; $i++) {
            $questionCounts[$i] = round($questionCounts[$i] + $z['q' . $i]);
        }
        $total = array_sum($questionCounts);
        $s++;
        for ($j = 1; $j <= 10; $j++) {
        $rating = $z['q' . $j];
        $ratingCounts[$j][$rating]++;
    }
       
    }


    $ratingPercentages = array();

foreach ($ratingCounts as $questionNumber => $ratings) {
    $ratingPercentages[$questionNumber] = array();
    
    foreach ($ratings as $rating => $count) {
        $percentage = ($count / $s) * 100;
        $ratingPercentages[$questionNumber][$rating] = round($percentage);
    }
}
}


?>

<!doctype html>
<html>
<!-- Designed & Developed by Ashish Labade (Tech Vegan) www.ashishvegan.com | Not for Commercial Use -->
<head>
    <meta charset="utf-8">
    <title>Student Feedback System</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
</head>

<body>
    <div id="topHeader">
        Navbar Code<br/>
        <span class="tag">STUDENT FEEDBACK SYSTEM</span>
    </div>
    <br>
    <br>
    <br>
    <br>

    <div id="content" align="center" style="width:600px;">
        <br>
        <br>
        <span class="SubHead">Student Feedback</span>
        <br>
        <br>

        <table border="0" cellpadding="6" cellspacing="6">
            <tr>
                <td style="font-weight:bold;">Faculty Name :</td>
                <td><?php echo $name['name']; ?></td>
                
            </tr>

            <tr>
                <td style="font-weight:bold;">Faculty Image :</td>
                <td>
                    <?php
                    if (!empty($faculty_image) && file_exists('teacher_images/' . $faculty_image)) {
                        echo '<img src="teacher_images/' . $faculty_image . '" alt="Faculty Image" width="50" height="50" />';
                    } else {
                        echo 'No Image';
                    }
                    ?>
                </td>
                
            </tr>

            <tr>
                <td style="font-weight:bold;">Delete :</td>
                <td align="center">
                    <a href="deleteFeedback.php?faculty_id=<?php echo $faculty_id; ?>"
                       onClick="return confirm('Are you sure?')"
                       style="text-decoration:none;font-size:18px;color:rgba(255,0,4,1.00);">Delete</a>
                </td>
                
            </tr>

            <?php 
            $q = mysqli_fetch_array(mysqli_query($al, "SELECT * FROM questions WHERE id = '1'"));
            for ($i = 1; $i <= 10; $i++):
            $roundedValue = round($questionCounts[$i] / $s); // Calculate rounded value
    $totalSum += $roundedValue; ?>
                <tr>
                    <td style="font-weight:bold;"><?php echo $i; ?>.  <?php echo  $q['q'.$i];?> : </td>
                    <td><?php 
                    echo round($questionCounts[$i] / $s); ?>/5</td>
                    <?php for ($j = 1; $j <= 5; $j++): ?>
                    	<td><?php echo $ratingCounts[$i][$j]; ?></td>
                       <td><?php echo $ratingPercentages[$i][$j]; ?>%</td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>

            <tr>
                <td style="font-weight:bold;">Total Students :</td>
                <td><?php echo $s; ?></td>
            </tr>

            <tr>
                <td style="font-weight:bold;">Total :</td>
                <td><?php echo $totalSum; ?>/50</td>
            </tr>
        </table>
        <br>
        <br>
        <input type="button" onClick="window.print();" value="PRINT">&nbsp;
        <input type="button" onClick="window.location='feeds.php'" value="BACK">

        <br>
        <br>
    </div>
</body>
</html>
