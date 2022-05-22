<?php
include 'db.php';
function ViewwSubCategory(){
	$q = "
	SELECT * FROM `subcategory`
	"; 
	$data = $GLOBALS['db']->query($q);
	foreach ($data as $value) {
	if($_GET['cat_id'] == $value['category_id'] ){
echo ' 
<div class="col-md-6 col-xl-4 p-b-30 m-lr-auto">
					<!-- Block1 -->
					<div class="block1 wrap-pic-w">
						<img src="admin/'.$value['subcategory_img'].'" alt="IMG-BANNER">

						<a href="?activesvp=true&sub_id='.$value['subcategory_id'].'" class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
							<div class="block1-txt-child1 flex-col-l">
								<span class="block1-name ltext-102 trans-04 p-b-8">
									'.$value['subcategory_name'].'
								</span>

								<span class="block1-info stext-102 trans-04">
									'.$value['subcategory_des'].'
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
}
?>