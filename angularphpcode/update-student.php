<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: PUT, GET, POST, DELETE");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
require_once("config.php");

$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';
$response = array();

	if ($contentType === "application/json") {
    		$content = trim(file_get_contents("php://input"));
			$decoded = json_decode($content);

			 $id = $decoded->data->student_id;
			 $name = $decoded->data->student_name;
			 $email = $decoded->data->student_email;
			 $branch = $decoded->data->student_branch;

			// $id = $_GET['id'];
			if(!empty($name) && !empty($email)){
			$query = mysqli_query($connection,"update student set name='$name',branch='$branch',email='$email' where id ='$id'");

					if($query==true){

						$response = array(
								"status" => 0,
								"msg" => "Data successfully Updated",
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