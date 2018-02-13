<?php

include ("db.class.php");

$conn = new Db();
//$data = json_decode(file_get_contents("php://input"));


//print_r($_POST);die;
if ($_POST['id']=='') {
    
    $sql = "insert into user_master set 
        `fname`= '$_POST[fname]',
        `lname`= '$_POST[lname]',
        `address`= '$_POST[address]',
        `zip_code`= '$_POST[zipcode]',
        `role`= '$_POST[role]',
        `phone_no`= '$_POST[phoneno]',
        `email`= '$_POST[email]',
        `password`= '$_POST[password]',
        `status`= 1
";

}else{
    $sql = "UPDATE `user_master` SET 
        `fname`= '$_POST[fname]',
        `lname`= '$_POST[lname]',
        `address`= '$_POST[address]',
        `zip_code`= '$_POST[zipcode]',
        `role`= '$_POST[role]',
        `phone_no`= '$_POST[phoneno]',
        `email`= '$_POST[email]',
        `password`= '$_POST[password]',
        `status`= 1 where `id`= '$_POST[id]' 
        ";
}
    $stmt = $conn->conn->prepare($sql);
    
  
    if ($stmt->execute()){
        
    }else{
        echo "error when interacting with db";
    }

$conn->conn = null;
