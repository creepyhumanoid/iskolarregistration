<?php
$con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
if (isset($_POST['firstname'])) {
	$firstname = $_POST['firstname'];
	$mi = $_POST['mi'];
	$lastname = $_POST['lastname'];
	$school_id = $_POST['school_id'];
	$school = $_POST['school'];
	$year = $_POST['year'];
	$course = $_POST['course'];

	$check = mysqli_query($con,"SELECT * FROM tbliskolars WHERE `firstname`='$firstname' AND `mi`='$mi' AND `lastname`='$lastname'");
	$checkrows = mysqli_num_rows($check);
	if ($checkrows>0) {
		$exist = "Iskolar already exists!";
		echo "<script type='text/javascript'> alert('$exist'); window.location.href='newiskolar.php';</script>";
	}
	else{
		$insert = "INSERT INTO `tbliskolars`(`firstname`, `mi`, `lastname`, `school_id`, `school_name_id`,`year_id`, `course_id`,`status_id`) VALUES ('$firstname','$mi','$lastname','$school_id','$school','$year','$course',2)";
		$query = mysqli_query($con, $insert);
		$msg = "Iskolar already added!";
		echo "<script>alert('$msg'); window.location.href='newiskolar.php'</script>";
	}
}