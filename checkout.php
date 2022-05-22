<?php 
session_start();
if(isset($_SESSION['loggeduser'])){
    header('location:shoping-cart.php?E=true');
}
$user_id = $_SESSION['loggeduser'];
function GoToProfilepage(){
    header('Location:/profile.php');
}


function ConnectToDatabase(){
    try {
        $db = new PDO('mysql:host=localhost;dbname=ecommerce' , 'root' , '');
    $GLOBALS['db'] = $db ;
    } 
    catch (PDOEexception $e) {
    echo 'not connect ' . $e.getMessage(); 
    }
    }
    ConnectToDatabase();

    function ViewCartData(){
        echo "<h1> cart </h1>";
        $data = $GLOBALS['db']->query($GLOBALS['q4']); 
        
        foreach ($data as $v) {
            echo $v['cart_id'] .'<br>' . $v['product_id'] .'<br>' .  $v['total'] .'<br>' . 
            $v['quantity']  .
             '<br>'.  $v['product_name'] . '<br>'.  $v['product_img'] .
             '<br>'.  $v['product_price'] . 
             '<br> <a href="index.php?actiond=true&pro_id='.$v['product_id'].'"> remove from cart </a>'
             .'<br><br><br>' ;    
        }
}
function AddOrder(){
    foreach ( $_SESSION['Cart'] as $v) {
       global $user_id ;
        $total +=$v['total']   ;
        }
        
     $q1 = "
     INSERT INTO `order` (`order_id`, `user_id`, `total`)
      VALUES (NULL, '$user_id', '$total');
     ";
     $GLOBALS['db']->exec($q1);
}
function AddToCart(){
    global $user_id ;
 $q1 = "
 SELECT * FROM `order` WHERE 1
 ";
 $data = $GLOBALS['db']->query($q1);
 
 foreach($data as $key => $v){
     $order_id = $v['order_id']; 
 }
 foreach ( $_SESSION['Cart'] as $v) {
     
 /*
  "cart_id" => "$pro_id" ,
        "total" => "$total",
        "quantity"=>"$quantity" ,
        "pro_id" => "$pro_id",
        "pro_name" => "$pro_name",
        "pro_price" => "$pro_price",
        "pro_img" => "$pro_img"
 */
    $pro_id = $_GET['pro_id'];

           
       
        $total =$v['total'] ;
        $pro_id = $v['pro_id'];
        $quantity = $v['quantity'];
        $q1 = "
        INSERT INTO `cart` (`cart_id`, `product_id`, `total`, `quantity`, `order_id`, `user_id`)
         VALUES (NULL, '$pro_id', '$total', '$quantity', '$order_id', '$user_id');
        
        ";
        $GLOBALS['db']->exec($q1);
      
    }
    $_SESSION['Cart'] = array();
}
function RemoveFromCart(){
        $pro_id = $_GET['pro_id'];
        $q2 = "
    DELETE FROM cart WHERE product_id = '$pro_id'
    ";
    $GLOBALS['db']->exec($q2);   

}
$q = "
					SELECT * FROM `product` WHERE product_id = 2
					";
                    $row = $GLOBALS['db']->exec($q2);  
AddOrder();
AddToCart();
GoToProfilepage();

