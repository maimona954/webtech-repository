<?php 

require_once 'db_connect.php';


function showAllfoods(){
	$conn = db_conn();
    $selectQuery = 'SELECT * FROM `food` ';
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

function showfood($id){
	$conn = db_conn();
	$selectQuery = "SELECT * FROM `food` where ID = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}

function searchfood($name){
    $conn = db_conn();
    $selectQuery = "SELECT * FROM `food` WHERE name LIKE '%name%'";

    
    try{
        $stmt = $conn->query($selectQuery);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


function addfood($data){
	$conn = db_conn();
    $selectQuery = "INSERT into food (name, description, date, address, person, phone, image)
VALUES (:name, :description, :date, :address, :person, :phone, :image)";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	':name' => $data['name'],
        	':description' => $data['description'],
        	':date' => $data['date'],
        	':address' => $data['address'],
            ':person' =>$data['person'],
            ':phone' =>$data['phone'],
        	':image' => $data['image']
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}


function updatefood($id, $data){
    $conn = db_conn();
    $selectQuery = "UPDATE food set name = ?, description = ?, date = ?, address=?  person = ?, phone = ? where ID = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
        	$data['name'], $data['description'], $data['date'],$data['address'],$data['person'],$data['phone'], $id
        ]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    
    $conn = null;
    return true;
}

function deletefood($id){
	$conn = db_conn();
    $selectQuery = "DELETE FROM `food` WHERE `ID` = ?";
    try{
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    }catch(PDOException $e){
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}
