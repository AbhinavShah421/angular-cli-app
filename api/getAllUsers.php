<?php
include('db.class.php');
$sql = "select * from user_master where 1";

$obj = new Db();
$stmt = $obj->conn->prepare($sql);
$stmt->execute();

$res = $stmt->fetchAll(PDO::FETCH_BOTH);

echo $json = json_encode($res);
//echo "<hr>";
//$data = json_decode($json);
//print_r($data);