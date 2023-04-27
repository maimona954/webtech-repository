<?php
// session_start();

require_once 'db_connect.php';



function showAlldonors()
{
    $conn = db_conn();
    $selectQuery = 'SELECT * FROM `donor` ';
    try {
        $stmt = $conn->query($selectQuery);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}




function show_single_donor_data($colName, $id)
{

    $conn = db_conn();
    $selectQuery = "SELECT * FROM `donor` where $colName = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}



function update_donor_data($colName, $id, $data)
{
    $conn = db_conn();
    $selectQuery = "UPDATE donor SET 
                        `donor_mail` = :donor_mail, 
                        `password` = :password, 
                        `donor_name` = :donor_name, 
                        `donor_phone` = :donor_phone, 
                        `donor_image` = :donor_image 
                    WHERE $colName = $id";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':donor_mail' => $data['donor_mail'],
            ':password' => $data['password'],
            ':donor_name' => $data['donor_name'],
            ':donor_phone' => $data['donor_phone'],

            ':donor_image' => $data['donor_image']

        ]);
        $conn = null;
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        $conn = null;
        return false;
    }
}








function delete_donor($colName, $id)
{
    $conn = db_conn();
    $selectQuery = "DELETE FROM 'donor' WHERE `$colName` = ?";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $conn = null;

    return true;
}


function search_specific_data($colNames, $tableName, $colName, $id)
{

    $conn = db_conn();
    $selectQuery = "SELECT $colNames FROM `$tableName` where $colName = ?";

    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([$id]);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    return $row;
}


function add_donor($data)
{

    $conn = db_conn();
    $selectQuery = "INSERT into donor (donor_mail, password, donor_name, donor_phone, donor_image)
    VALUES (:donor_mail, :password, :donor_name, :donor_phone,  :donor_image)";
    try {
        $stmt = $conn->prepare($selectQuery);
        $stmt->execute([
            ':donor_mail' => $data['donor_mail'],
            ':password' => $data['password'],
            ':donor_name' => $data['donor_name'],
            ':donor_phone' => $data['donor_phone'],
            ':donor_image' => $data['donor_image']
        ]);
        $conn = null;
        return true;
    } catch (PDOException $e) {
        echo $e->getMessage();
        $conn = null;
        return false;
    }
}

















