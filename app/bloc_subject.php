<?php 
// la liste des sujects de chaque categorie
$manager = new SubjectManager($db);

if(isset($_GET['page']) && $_GET['page']=="category"){
	$id=$titleCategory->getId();
	$homeSubject = $manager-> getSubjectByCategory($titleCategory, 5);
}
else{
<<<<<<< HEAD
	$id=$homeCategory[$i]->getId();
	$homeSubject = $manager-> getSubjectByCategory($titleCategory, 0);
=======
	$homeSubject = $manager->getSubjectByCategory($homeCategory[$i], 5);
>>>>>>> 7d6cbb57ac575b08ef7805d94e9caf5ba9de5bfe
}
$j=0;
while($j<count($homeSubject))
{
	if (isset($_SESSION["admin"]) && $_SESSION["admin"] == true)
		$addSupSubject = "<button class='sup_subject' type='submit'><i class='fa fa-remove'></i></button>";
	else
		$addSupSubject = "";
	
	$Subject=$homeSubject[$j];

	$manager = new MessageManager($db);
	$homeMessage = $manager->getLastMessageOfSubject($Subject);

	$Message= new Message($db);
	$lastAuthor="Aucun message pour ce sujet";
	if ($homeMessage)
	{
		$Message=$homeMessage[0];
		
		$lastAuthor="Dernier message par : ".$Message->getAuthor()->getName();
	}
	
	require('views/bloc_subject.phtml');
	$j++;
}

?>