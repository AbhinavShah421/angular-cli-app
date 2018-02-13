<?php
include('db.class.php');
   $obj = new Db();
$data = json_decode(file_get_contents("php://input"));

if($data->id=='type'){
  
    $sql="select * from animal_type";
    
    
    $stmt = $obj->conn->prepare($sql);
    $stmt->execute();
    
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo $json = json_encode($res);
}
if($data->id=='zooname'){
 
    if($data->userRole!='admin'){
        $sql=" select zoo_master.* from zoo_master inner join user_zoo_map on user_zoo_map.zoo_id=zoo_master.id where user_zoo_map.user_id='$data->logedUser'";
    }else{
    $sql="select id, zoo_name from zoo_master";
    }

    $stmt = $obj->conn->prepare($sql);
    
    $stmt->execute();
    
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    echo $json = json_encode($res);
}
if($data->datalist=='datalist'){
       $res=$data->key;
    if($data->userRole!=admin){
     $sql="SELECT animal_master.* from animal_master inner join zoo_master on zoo_master.id = animal_master.zoo_id inner join user_zoo_map on user_zoo_map.zoo_id=zoo_master.id where user_zoo_map.user_id='$data->logedUser'";   
    }else{
       $sql = "SELECT * FROM `animal_master` WHERE name LIKE '$res%' ORDER BY name";
    }
        $stmt = $obj->conn->prepare($sql); 
 
       if($stmt->execute()){
    
           $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
           echo json_encode($result);
       }
}
if($data->animal=='single'){
    $sql = "select * from animal_master where id = '$data->id'";
    $stmt = $obj->conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo $json = json_encode($res);
}
if($data->all=='animals'){
    if($data->userRole!='admin'){
        $sql = "select animal_master.*, zoo_master.zoo_name, animal_type.type from animal_master inner join zoo_master on zoo_master.id=animal_master.zoo_id inner join animal_type on animal_type.id=animal_master.type_id inner join user_zoo_map on user_zoo_map.zoo_id= zoo_master.id where user_zoo_map.user_id='$data->logedUser' ";
    }else{
    $sql = "select animal_master.*, zoo_master.zoo_name, animal_type.type from animal_master inner join zoo_master on zoo_master.id=animal_master.zoo_id inner join animal_type on animal_type.id=animal_master.type_id  ";
    }
    $stmt = $obj->conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo $json = json_encode($res);
}
if($data->op==delete){
    $sql = "delete from animal_master where id = '$data->id'";
    $stmt = $obj->conn->prepare($sql);
    if($stmt->execute()){
        echo"Deleted";
    }
}
 if(isset($_POST['animalname'])){

             if($_POST['id']==""){
                   $sql = "insert into animal_master set 
                `name`= '$_POST[animalname]',
                `type_id`= '$_POST[selectedtype]',
                `age`= '$_POST[age]',
                `diet`= '$_POST[diet]',
                `zoo_id`= '$_POST[selectedzoo]'
                
        ";
               
     }else{
           $sql = "UPDATE `animal_master` SET 
               `name`= '$_POST[animalname]',
                `type_id`= '$_POST[selectedtype]',
                `age`= '$_POST[age]',
                `diet`= '$_POST[diet]',
                `zoo_id`= '$_POST[selectedzoo]'
                where `id`= '$_POST[id]' 
        ";
     }
     $conn = new Db();
   $stmt = $conn->conn->prepare($sql);
    

    if ($stmt->execute()){
        
    }else{
        echo "error when interacting with db";
    }

$conn->conn = null;

 }   

	