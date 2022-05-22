<?php 
include 'db.php' ; 
function CategoryView(){
$qv = " 
SELECT * FROM `category`
";

$data = $GLOBALS['db']->query($qv);
foreach ($data as $value) {
    echo '
    <li class="p-b-10">
							<a href="?actionvs=true&cat_id='.$value['category_id'].'" class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5">
								'.$value['category_name'].'
							</a>
						</li>
    ';
}
}
?>