<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
 require_once("config.php");
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$response = array();
	if ($contentType === "application/json") {
					$id = $_GET['id'];
					if(!empty($id)){
					$sql = mysqli_query($connection,"select * from student where id ='$id'");
					if(mysqli_num_rows($sql)>=1){
					while($row = mysqli_fetch_assoc($sql)){
					    $response['data'][] = $row;
					}
							}else{
								$response = array(
								'status' => 2,
								"msg" => "No record found",
								);
				
							}
				}else{
					$response = array(
					"status" => 2,
					"msg" => "required data missing",
					);
				}
				} else {
					$response = array(
						"status" => 99,
						"msg" => "unauthorised access",
					);
				}
				echo json_encode($response);

?>