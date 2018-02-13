<?php

include ("db.class.php");

$conn = new Db();
$data = file_get_contents("php://input");

$sql = "SELECT * FROM `user_master` WHERE fname LIKE '$data%' ORDER BY fname";


$stmt = $conn->conn->prepare($sql);

    
if($stmt->execute()){
    
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
    echo json_encode($result);
//   $dataResult	=	['status' => true]; 
//    echo json_encode($dataResult);
}
$conn->conn = null;
//$stmt = $db->prepare("SELECT * FROM tbl_name WHERE title LIKE :needle");
//$needle = '%somestring%';
//$stmt->bindValue(':needle', $needle, PDO::PARAM_STR);
//$stmt->execute();
//$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);