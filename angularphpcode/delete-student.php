<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once("config.php");
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$response = array();

	if ($contentType === "application/json") {
				// $data = json_decode(file_get_contents("php://input"));
				$id = $_GET['id'];
				if(!empty($id)){		
					$query = mysqli_query($connection,"delete  from student where id ='$id'");

						if($query==true){
							$response = array(
							"status" => 0,
							"msg" => "Record delete successfully",
								);
						 }else{
						    $response = array(
						   	"status" => 1,
							"msg" => "error in inserting ",
							   );
							  }

					}else{
						$response = array(
			 			"status" => 2,
						"msg" => "Id not found",
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