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
		$id = $_POST['id'];

		$update = "UPDATE `tbliskolars` SET `firstname`='$firstname',`mi`='$mi',`lastname`='$lastname',`school_id`='$school_id',`school_name_id`='$school',`year_id`='$year', `course_id`='$course'  WHERE `ID`='$id'";
		$query = mysqli_query($con, $update);
		$msg = "Iskolar already updated!";
		echo "<script>alert('$msg'); window.location.href='registered.php'</script>";
	}