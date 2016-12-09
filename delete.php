<?php 
$servername = "localhost";
$user_name = "root";
$password="";

$con= mysqli_connect($servername,$user_name,$password);
		mysqli_select_db( $con ,"Webservice");
		if($con->connect_error)
		{
			echo "database not connected";
			die("connection:failed:".$con->connect_error);
			
		}
		if(!empty($_GET['id'])){
			$some_id = $_GET['id'];
			//echo $some_id;
			//exit;
			$query = "DELETE FROM tag WHERE id = '".$_GET['id']."'";
			echo $query;
			echo mysqli_query($con,$query);
			echo "Query Executating";
		}
		else{
			echo "Query is not executing";
			
		}


?>