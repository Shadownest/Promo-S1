<?php
$feedManager = new FeedManager($db);
if (isset($_GET['ajax'], $_GET['last']))
{
	$last = $feedManager->getLastFeed($_GET['last']);
	echo json_encode($last);
}
else
{
	$user = new UserManager($db);
	$user = $user->getUser(16);
	$subject = new SubjectManager($db);
	$subject = $subject->getSubject(22);
	//$feedManager->createSubject($user, $subject);
	$feedManager->displayLastFeed();
}
?>