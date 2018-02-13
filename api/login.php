<?php

include ("db.class.php");

$conn = new Db();
$data = json_decode(file_get_contents("php://input"));

$sql = "select * from `user_master` 
         WHERE `email` = '$data->email' AND `password`='$data->password'
";

$stmt = $conn->conn->prepare($sql);

if($stmt->execute()){
    
    $result = $stmt->fetch(PDO::FETCH_BOTH);
    echo json_encode($result);
//   $dataResult	=	['status' => true]; 
//    echo json_encode($dataResult);
}
$conn->conn = null;
