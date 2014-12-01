<?php 
if (isset($_GET['id']))
{
	$manager= new UserManager($db);
	$user = $manager->getUser($_GET['id']);
	$date = strtotime($user->getCreationDate());
	$dateInscription = date("d-m-y", $date);

	require("views/user.phtml"); 
}
?>