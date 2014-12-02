<?php
$feedManager = new FeedManager($db);
if (isset($_GET['ajax'], $_GET['last']))
{
	$last = $feedManager->getLastFeed($_GET['last']);
	echo json_encode($last);
}
else
	$feedManager->displayLastFeed();
?>