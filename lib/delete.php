<?php

include "db.php";

if (isset($_GET['id'])) {
	$delete_id = $_GET['id'];
	$deleteSQL = "DELETE FROM students WHERE id = $delete_id";

	if ($conn->query($deleteSQL)) {
		header("location:../index.php");
	}
	else{
		die($conn-> error);
	}

}
else{
	header("location:../index.php");
}


?>