<?php
session_start();
if(!isset($_SESSION['Cart'])){
$_SESSION['Cart'] =  array();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php include 'include/style.php' ?> 

</head>
<body class="animsition">

	<!-- Header -->
	<?php include 'include/header.php' ?> 

	<!-- Cart -->
	<?php include 'include/smal_cart.php'; ?> 

		

	<!-- Slider -->
	<section class="section-slide">
		<div class="wrap-slick1">
			<div class="slick1">
				
				<div class="item-slick1" style="background-image: url(https://img.freepik.com/free-photo/modern-kitchen-white-room-interior-3drender_33739-476.jpg?w=1060);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rollIn" data-delay="0">
								<span class="ltext-101 cl2 respon2">
								Essential Restaurant Kitchen Equipment
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="lightSpeedIn" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									Kitchen Equipment
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="slideInUp" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="item-slick1" style="background-image: url(https://media.istockphoto.com/photos/wooden-tabletop-over-defocused-kitchen-background-picture-id1071414426?k=20&m=1071414426&s=170667a&w=0&h=tHYU5YqhgADdEOVuQPuwGfNFcN1sTqE3uRPKqP5vzQo=);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
								<span class="ltext-101 cl2 respon2">
								Everything you need for a stylish kitchen

								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									2022 
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="zoomIn" data-delay="1600">
								<a href="product.php" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>


				<div class="item-slick1" style="background-image: url(https://images.pexels.com/photos/271647/pexels-photo-271647.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1);">
					<div class="container h-full">
						<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
							<div class="layer-slick1 animated visible-false" data-appear="rotateInDownLeft" data-delay="0">
								<span class="ltext-101 cl2 respon2">
								Cooking Equipment
								</span>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateInUpRight" data-delay="800">
								<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
									New arrivals
								</h2>
							</div>
								
							<div class="layer-slick1 animated visible-false" data-appear="rotateIn" data-delay="1600">
								<a href="product.html" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04">
									Shop Now
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Banner -->
	<div class="sec-banner bg0 p-t-80 p-b-50" style="text-align=center;">
		<div class="container">	<h1 style="    width: 100%;
    text-align: center;
    margin-bottom: 50px;
    margin-top: 50px;
    font-weight: 700;"> Categories </h1>
			<div class="row">
			
			<?php
include 'include/db.php';
function ViewwSubCategory(){
	$q = "
	SELECT * FROM `category`
	"; 
	$data = $GLOBALS['db']->query($q);
	foreach ($data as $value) {
	
echo ' 
<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="admin/'.$value['category_img'].'" alt="IMG-BANNER">

						<a href="product.php?actionvs=true&cat_id='.$value['category_id'].'" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									'.$value['category_name'].'
								</span>

								<span class="block1-info stext-102 trans-04">
									'.$value['category_des'].'
								</span>
							</div>

							<div class="block1-txt-child2 p-b-4 trans-05">
								
                            <div class="block1-link stext-101 cl0 trans-09">
									Shop Now
								</div>
                            
                                </div>
						</a>
					</div>
				</div>

';			
    }
}
ViewwSubCategory();
?>
	</div>
	</div>


	<!-- Product -->

	<!-- Footer -->
	<?php include 'include/footer.php';?>

	<!-- Back to top -->
	<!-- <div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div> -->
<?php include 'include/js.php'; ?>

</body>
</html>