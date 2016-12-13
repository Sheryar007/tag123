<?php 
$servername = "localhost";
$user_name = "root";
$password="";


//$con= mysqli_connect($servername,$user_name,$password);
$con = pg_connect("host=ec2-54-235-168-152.compute-1.amazonaws.com user=zeagzynnmsyqqs password=wp_7Mj4TISB_AcF4wX2107o9Nb")
    or die("Can't connect to database".pg_last_error());
		//mysqli_select_db( $con ,"Webservice");
		mysqli_select_db( $con ,"df2ujmjcsek4ru");
		//if($con->connect_error)
		//{
		//	die("connection:failed:".$con->connect_error);
		//}
		$result = mysqli_query($con,"SELECT * FROM tag");
	
		$response = array();
		
		while($row = mysqli_fetch_array($result))
		{
			$response[] = $row;
		}
		
		//echo "<pre>"; print_r($response);  
		echo json_encode($response);
		
?>