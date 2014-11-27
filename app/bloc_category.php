<?php 

$manager = new CategoryManager($db);
$homeCategory = $manager -> displayListCategory();

$i=0;
while($i<count($homeCategory))
{
	$titleCategory=$homeCategory[$i];
	
	require('views/bloc_category.phtml');
	$i++;
}



 ?>