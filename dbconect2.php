<?php 


		//Create Database Connection

		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "test";

		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

		if (mysqli_connect_errno()) {
			# code...
			die("Database connection failed: ".
				mysqli_connect_error() .
				" (" .mysqli_connect_errno(). ") ");
		}else{
			//echo "Database connect successfull";
		}


		/*------------OR----------


		if (!$conn) {
			# code...
			echo "failed";
		}else{
			echo "Success";
		}*/
	 ?>