<?php
include_once 'include/connect.php';

$id = $_GET['delete_btn'] ?? null;
if (!$id) {
    header('Location:register.php');
    exit;
}

$statement = $conn->prepare('DELETE FROM `admin` WHERE `admin`.`admin_id` = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$state = true;
if ($state) {
    echo "MATCH";
    $_SESSION['success'] = "Admin Profile Deleted";
    header("Location: register.php");

} else {
    $_SESSION['status'] = "Admin Profile NOT Deleted";
    header("Location: register.php");

}

// header('Location:register.php');
