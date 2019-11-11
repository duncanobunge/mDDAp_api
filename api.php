<?php
     define('DB_HOST','localhost');
	 define('DB_USER','root');
	 define('DB_PASS','');
	 define('DB_NAME','healthdiagnostic_db');
	 
	 $conn = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME );
	 if(mysqli_connect_errno()){
		 die('Unable to connect to database'.mysqli_connect_error());
	 }
	 
	 $stmt = $conn->prepare("SELECT id,diagnosis_id,profname,status FROM diagnos");
	 $stmt->execute();
	 $stmt -> bind_result($id,$diagnosis_id,$profname,$status);
	 $diagnosis = array();
	 while($stmt ->fetch()){
		 $temp = array();
		 $temp['id'] = $id;
		 $temp['diagnosis_id'] =$diagnosis_id;
		 $temp['profname']=$profname;
		 $temp['status']=$status;
		 
		 array_push($diagnosis,$temp);
		 
	 }
	 echo json_encode($diagnosis);
?>