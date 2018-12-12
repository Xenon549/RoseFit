<?php session_start(); 
include("mysql_connect.inc.php");
$email = $_SESSION['username'];
$key = $_GET['house'];
$air_temperature_upper = $_POST['atemperature'];
$air_temperature_lower = $_POST['atemperature'];
$air_humidity_upper = $_POST['ahumidity'];
$air_humidity_lower = $_POST['ahumidity'];
$soil_humidity_upper = $_POST['shumidity'];
$soil_humidity_lower = $_POST['shumidity'];
$light_status = $_POST['light_status'];

$sql = "SELECT * FROM user where user_email = '$email'";
$result = mysqli_query($link , $sql);
$rowname = mysqli_fetch_array($result);

$greenhouse = "SELECT * FROM greenhouse_user1 where user_id = '$rowname[0]'";
$result = mysqli_query($link , $greenhouse);
$row = mysqli_fetch_array($result);

//API Url
$url = 'http://120.110.113.61:3000/website/control';

//Initiate cURL.
$ch = curl_init($url);

echo $air_temperature_upper.'<br>';
echo $air_temperature_lower.'<br>';
echo $air_humidity_upper.'<br>';
echo $air_humidity_lower.'<br>';
echo $soil_humidity_upper.'<br>';
echo $soil_humidity_lower.'<br>';
echo $light_status.'<br>';

//The JSON data.
if( $air_temperature_upper != null && $air_temperature_lower != null && $air_humidity_upper != null && $air_humidity_lower != null && $soil_humidity_upper  != null && $soil_humidity_lower  != null && $light_status != null){
	if($light_status == 'open')
		$jsonData = array(
		    'air_temperature_upper' => $air_temperature_upper,
		    'air_temperature_lower' => $air_temperature_lower,
		    'air_humidity_upper' => $air_humidity_upper,
		    'air_humidity_lower' => $air_humidity_lower,
		    'soil_humidity_lower' => $soil_humidity_upper,
		    'soil_humidity_upper' => $soil_humidity_lower,
		    'light_status' => 1,
		    'greenhouse_key' => $key
		);
	else{
		$jsonData = array(
		    'air_temperature_upper' => $air_temperature_upper,
		    'air_temperature_lower' => $air_temperature_lower,
		    'air_humidity_upper' => $air_humidity_upper,
		    'air_humidity_lower' => $air_humidity_lower,
		    'soil_humidity_lower' => $soil_humidity_upper,
		    'soil_humidity_upper' => $soil_humidity_lower,
		    'light_status' => 0,
		    'greenhouse_key' => $key
		);
	}
		//Encode the array into JSON.
		$jsonDataEncoded = json_encode($jsonData);

		//Tell cURL that we want to send a POST request.
		curl_setopt($ch, CURLOPT_POST, 1);

		//Attach our encoded JSON string to the POST fields.
		curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

		//Set the content type to application/json
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 

		//Execute the request
		$result = curl_exec($ch);

		//Make sure that it is a POST request.
		//if(strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') != 0){
		    //throw new Exception('Request method must be POST!');
		//}
		 
		//Make sure that the content type of the POST request has been set to application/json
		//$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
		//if(strcasecmp($contentType, 'application/json') != 0){
		    //throw new Exception('Content type must be: application/json');
		//}
		 
		//Receive the RAW post data.
		$content = trim(file_get_contents("php://input"));
		 
		//Attempt to decode the incoming RAW post data from JSON.
		//$decoded = json_decode($content, true);
		 
		//If json_decode failed, the JSON is invalid.
		//if(!is_array($decoded)){
		    //throw new Exception('Received content contained invalid JSON!');
		//}
		 
		//Process the JSON.
}
else {
	echo "錯誤";
}

?>