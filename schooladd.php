<?php
	$con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
	if (isset($_POST['school'])) {
		$school = $_POST['school'];

		$check = mysqli_query($con,"SELECT * FROM tblschool WHERE `school`='$school'");
		$checkrows = mysqli_num_rows($check);
		if ($checkrows>0) {
			$exist = "School type already exists!";
			echo "<script type='text/javascript'> alert('$exist'); window.location.href='schools.php';</script>";
		}
		else{
			$insert = "INSERT INTO `tblschool`(`school`) VALUES ('$school')";
			$query = mysqli_query($con,$insert);
			$msg = "School already addded!";
			echo "<script type='text/javascript'> alert('$msg'); window.location.href='schools.php';</script>";
		}
	}