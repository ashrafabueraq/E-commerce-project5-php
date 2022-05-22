<?php
include_once 'include/connect.php';

if (isset($_POST['delete_subcat'])){
    echo "helllo";
$id = $_POST['id'] ?? null;
echo "$id";
if (!$id) {
    header('Location: subcat_index.php');
    exit;
}

$statement = $conn->prepare('DELETE FROM `subcategory` WHERE `subcategory`.`subcategory_id` = :id');
$statement->bindValue(':id', $id);
$statement->execute();
header("Location:subcat_index.php");
}
