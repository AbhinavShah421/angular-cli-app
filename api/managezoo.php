<?php
if($_SERVER['REQUEST_METHOD']!="OPTIONS"){
include('db.class.php'); 
 $con = new Db();
     
 $data = json_decode(file_get_contents("php://input"));
  
if($data->id=='userzoomap'){
    if($data->userRole!='admin'){
        $sql = "select user_master.fname, user_master.lname, user_master.phone_no, zoo_master.zoo_name, zoo_master.address, user_zoo_map.id from user_zoo_map inner join user_master on user_master.id=user_zoo_map.user_id inner join zoo_master on zoo_master.id= user_zoo_map.zoo_id where user_zoo_map.user_id = '$data->logedUser' ";
    }else{
    $sql = "select user_master.fname, user_master.lname, user_master.phone_no, zoo_master.zoo_name, zoo_master.address, user_zoo_map.id from user_zoo_map inner join user_master on user_master.id=user_zoo_map.user_id inner join zoo_master on zoo_master.id= user_zoo_map.zoo_id";
    }
    $stmt = $con->conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo $json = json_encode($res);
    }else{
        $zoo=$data->zoo;
        $manager=$data->manager;
              $sql = "insert into user_zoo_map set 
                    `zoo_id`= '$zoo',
                    `user_id`= '$manager'               
                ";
        $stmt = $con->conn->prepare($sql);
      if($stmt->execute()){
      }
}


$con->conn = null;
}