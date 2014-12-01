<?php 
$res = mysqli_query($db, "SELECT name, level, creation_date FROM `user`");
$i = 1;
while ($member = mysqli_fetch_assoc($res))
{
	$memberNum = $i;
	$date = strtotime($member["creation_date"]);
	$dateInscription = date("d-m-y", $date);

	if ($member["level"] == "admin")
		$addClassTr = "danger";
	else if ($member["level"] == "moderator")
		$addClassTr = "success";
	else
		$addClassTr = "";

	require("views/aff_member.phtml");	
	$i++;
}
?>