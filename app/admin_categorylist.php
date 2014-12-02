<?php

$manager = new CategoryManager($db);

$list = $manager->getListCategory();
$i=0;
while($i<count($list))
{
	$category = $list[$i];
	require("views/admin_categorylist.phtml");
	$i++;
}

?>