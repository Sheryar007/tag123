<?php 
$servername="localhost";
$username="root";
$password="";
//for postgre Sql
//$servername="ec2-54-235-168-152.compute-1.amazonaws.com";
//$username="zeagzynnmsyqqs";
//$password="wp_7Mj4TISB_AcF4wX2107o9Nb";
//$dbname = "df2ujmjcsek4ru";
if(isset($_POST["tgname"]) && isset($_POST["tgloc"])&& isset($_POST["encoded_string"]))
{
	
	$encoded_string = $_POST["encoded_string"];
	$image_name = $_POST["image_name"];
	$name = $_POST["tgname"];
	$loc = $_POST["tgloc"];
	$decoded_string = base64_decode($encoded_string);
	$path = 'images/'.$image_name;
	$file = fopen($path, 'wb');

	$is_written = fwrite($file,$decoded_string);
	fclose($file);

	$con= mysqli_connect($servername,$username,$password);
	//$con = pg_connect($servername,$dbname,$username,$password);
	//or die("Can't connect to database".pg_last_error());
	mysqli_select_db( $con ,"Webservice");
	if($con->connect_error)
	{
		die("connection:failed:".$con->connect_error);
	}
	$var = mysqli_query($con,"INSERT INTO tag(tgname, tgloc,name,path) VALUES
								(
								'".$name."',
								'".$loc."',
								'".$image_name."',
								'".$path."')");
								
	//echo $var;
	if($var)
	{		
			$var1 = mysqli_query($con, "SELECT * FROM tag ORDER by id DESC LIMIT 1");
			$arr = array();
			$row = mysqli_fetch_array($var1);
			$arr[] = $row;
			// echo"<pre>";
			echo json_encode($arr[0]);
			// print_r($arr);
			//exit;
	}
	else{
		echo "ERROR";
	}


}
else{
	echo "PARAMETERS MISSING";
}
?>