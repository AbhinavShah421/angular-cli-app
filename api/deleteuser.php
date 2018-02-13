<?php

include('db.class.php');
$conn = new Db();


$data = json_decode(file_get_contents("php://input"));

if($data->id=='userzoomap'){
    $sql = "delete from user_zoo_map where id = '$data->val'";
    
}else{
$sql = "delete from user_master where id = '$data->id'";

}

$stmt = $conn->conn->prepare($sql);

if ($stmt->execute()) {
    echo "successfully deleted the row";

} else {
    die("an error here");
}
$conn->conn = null;