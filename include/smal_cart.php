<?php  
function RemoveFromCart(){

    foreach($_SESSION['Cart'] as $key => $value){
        if($value['cart_id'] == $_GET['pro_id'] ){
            unset($_SESSION['Cart'][$key]);
        }
    }
}
if(isset($_GET['actiond'])){
RemoveFromCart();
}    
function ViewSmalCartData(){
	
	if(isset($_SESSION['Cart'])){
		$op = false ;
		foreach ($_SESSION['Cart'] as $value) {
			$op = true ;

					echo '
                    <a href="?actiond=true&pro_id='.$value['pro_id'].'">
					<li class="header-cart-item flex-w flex-t m-b-12">
					<div class="header-cart-item-img">
						<img src="admin/'.$value['pro_img'].'" alt="IMG">
					</div>
</a>
					<div class="header-cart-item-txt p-t-8">
						<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
							'.$value['pro_name'].'
						</a>

						<span class="header-cart-item-info">
							'.$value['quantity'].' x $'.$value['pro_price'].'
						</span>
					</div>
				</li>
					';
				}
		
		}
	
	
	}
    ?>

<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<?php
					ViewSmalCartData();
					?>

				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $90.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>