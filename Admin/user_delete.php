<?php
include_once 'include/connect.php';

$id = $_GET['delete_user'] ?? null;
if (!$id) {
    header('Location:user_index.php');
    exit;
}

$statement = $conn->prepare('DELETE FROM `user` WHERE `user`.`user_id` = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$state = true;
if ($state) {
    echo "MATCH";
    $_SESSION['success'] = "User Profile Deleted";
header('Location:user_index.php');

} else {
    $_SESSION['status'] = "User Profile NOT Deleted";
header('Location:user_index.php');

}
