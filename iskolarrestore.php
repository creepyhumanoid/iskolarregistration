<?php
	$con = mysqli_connect("localhost","root","","dbiskolar") or die('Error connecting to MySQL server.');
	if (isset($_POST['id'])) {
		$id = $_POST['id'];
		$update = "UPDATE `tbliskolars` SET `status_id`=2 WHERE `ID`='$id'";
		$query = mysqli_query($con,$update);
		$msg = "Iskolar already restore!";
		echo "<script>alert('$msg'); window.location.href='archived.php'</script>";
	}