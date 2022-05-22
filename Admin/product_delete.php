<?php
include_once 'include/connect.php';

if (isset($_POST['delete_product'])) {

    $id = $_POST['id'] ?? null;
    echo "$id";
    if (!$id) {
        header('Location: product_index.php');
        exit;
    }

    $statement = $conn->prepare('DELETE FROM `product` WHERE `product`.`product_id` = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    header("Location:product_index.php");
}
