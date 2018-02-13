<?php
include('db.class.php');
   $obj = new Db();
$data = json_decode(file_get_contents("php://input"));


if($data->id=='search'){
       $res=$data->keyword;
      
       $sql = "SELECT * FROM `zoo_master` WHERE zoo_name LIKE '$res%' ORDER BY zoo_name";
       $stmt = $obj->conn->prepare($sql); 
 
       if($stmt->execute()){
    
           $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
           echo json_encode($result);
       }
}
if($data->id=='single'){
  
    $sql = "select * from zoo_master where id = '$data->key'";
    $stmt = $obj->conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo $json = json_encode($res);
}
if($data->id=='all'){
//    $sql = "select animal_master.*, zoo_master.zoo_name, animal_type.type from animal_master inner join zoo_master on zoo_master.id=animal_master.zoo_id inner join animal_type on animal_type.id=animal_master.type_id  ";
    $sql = "select * from zoo_master ";
    $stmt = $obj->conn->prepare($sql);
    $stmt->execute();
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo $json = json_encode($res);
}
if($data->id=='delete'){
    $sql = "delete from zoo_master where id = '$data->key'";
    $stmt = $obj->conn->prepare($sql);
    if($stmt->execute()){
        echo"Deleted";
    }
    
}

if($data->id=='zoo'){
    $sql = "select * from zoo_master ";
    $stmt = $obj->conn->prepare($sql);
    if($stmt->execute()){
         $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
         echo $json = json_encode($res);
    }
    
}
if($data->id=='manager'){
    $sql = "select id, fname, lname from user_master ";
    $stmt = $obj->conn->prepare($sql);
    if($stmt->execute()){
         $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
         echo $json = json_encode($res);
    }
    
}

 if(isset($_POST['name'])){
      print_r($_POST);
             if($_POST['id']==""){
                   $sql = "insert into zoo_master set 
                `zoo_name`= '$_POST[name]',
                `address`= '$_POST[address]'               
            ";
               
     }
else{
           $sql = "UPDATE `zoo_master` SET 
                `zoo_name`= '$_POST[name]',
                `address`= '$_POST[address]' 
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

