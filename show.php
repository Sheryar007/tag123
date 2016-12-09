<?php 
$servername = "localhost";
$user_name = "root";
$password="";


$con= mysqli_connect($servername,$user_name,$password);
		mysqli_select_db( $con ,"Webservice");
		if($con->connect_error)
		{
			
			die("connection:failed:".$con->connect_error);
		}
		$result = mysqli_query($con,"SELECT * FROM tag");
	
		$response = array();
		
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		
		//echo "<pre>"; print_r($response);  
		echo json_encode($response);
		
?>