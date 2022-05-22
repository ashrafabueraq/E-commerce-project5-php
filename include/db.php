<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=ecommerce' , 'root' , '');
$GLOBALS['db']= $db;
} catch (PDOException $e) {
    echo "somthing wrong please ask the developer about it ";
}

?>