<?php
include('db.class.php');
$data = json_decode(file_get_contents("php://input"));
$sql = "select * from user_master where id = '$data'";

$obj = new Db();
$stmt = $obj->conn->prepare($sql);
$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_BOTH);

echo $json = json_encode($res);