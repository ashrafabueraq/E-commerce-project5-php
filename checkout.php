<?php 
session_start();
$order_id =0 ;
$user_id = $_SESSION['loggeduser'];
function GoToProfilepage(){
    global $order_id ;
    header('location:orderdetail.php?order_id='.$order_id);

}



    try {
        $db = new PDO('mysql:host=localhost;dbname=ecommerce' , 'root' , '');
    $GLOBALS['db'] = $db ;
    } 
    catch (PDOEexception $e) {
    echo 'not connect ' . $e.getMessage(); 
    }
    
    

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
    $total = 0 ;
    global $user_id ;
    foreach ( $_SESSION['Cart'] as $v) {
       
        $total +=$v['total']   ;
        }
        
     $q1 = "
     INSERT INTO `orders` (`order_id`, `order_date`, `user_id`, `invoice`)
      VALUES (NULL,NOW(), '$user_id', '$total');
     ";
     $GLOBALS['db']->exec($q1);
}
function AddToCart(){
    global $user_id ;
    global $order_id ;
 $q1 = "
 SELECT * FROM `orders` 
 ";
 $data = $GLOBALS['db']->query($q1);
 
 foreach($data as $v){
     $order_id = $v['order_id']; 
 }
 foreach ( $_SESSION['Cart'] as $v) {
     

    $pro_id = $v['pro_id'];

           
       
        $total =$v['total'] ;
        $pro_id = $v['pro_id'];
        $quantity = $v['quantity'];
        $q1 = "
        INSERT INTO `cart` (`cart_id`, `product_id`, `product_quntity`, `order_id`, `user_id`, `total`)
         VALUES (NULL, '$pro_id', '$quantity', '$order_id', '$user_id' , '$total');
         
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
  

                    
                    if(isset($_SESSION['loggeduser'])){
                        AddOrder();
                        AddToCart();
                        GoToProfilepage();
                    }
                    else{
                            header('location:shoping-cart.php?E=true');
                    }
                    

