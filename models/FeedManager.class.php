<?php
class FeedManager
{
	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}
	public function getLastFeed($last = 0)
	{
		$feedList = array();
		$feedId = intval($last);
		$resFeed = mysqli_query($this->db, "SELECT history.id,history.date,history.content,history.author AS author_id, user.name AS author FROM history LEFT JOIN user ON user.id=history.author WHERE history.id>'".$feedId."' ORDER BY history.date ASC LIMIT 10");
		while ($dataFeed = mysqli_fetch_assoc($resFeed))
		{
			$feedTmp = array('id'=>$dataFeed['id']);
			ob_start();
			require('views/feed.phtml');
			$feedTmp['html'] = ob_get_clean();
			$feedList[] = $feedTmp;
		}
		return $feedList;
	}
	public function displayLastFeed()
	{
		$feedId = 0;
		$resFeed = mysqli_query($this->db, "SELECT history.id,history.date,history.content,history.author AS author_id, user.name AS author FROM history LEFT JOIN user ON user.id=history.author WHERE history.id>'".$feedId."' ORDER BY history.date DESC LIMIT 10");
		while ($dataFeed = mysqli_fetch_assoc($resFeed))
		{
			require('views/feed.phtml');
		}
	}
	public function addToFeed(User $author, $content)
	{
		$content = mysqli_real_escape_string($this->db, $content);
		mysqli_query($this->db, "INSERT INTO history (author, content) VALUES('".$author->getId()."', '".$content."')");
	}

	/*
			CATEGORY
	*/

	public function createCategory(User $author, Category $category)
	{
		$this->addToFeed($author, '<b>+</b> <a href="index.php?page=category&id='.$category->getId().'">'.$this->shorten($category->getTitle(), 32).'</a>');
	}
	public function editCategory(User $author, Category $category)
	{
		$this->addToFeed($author, '<b>~</b> <a href="index.php?page=category&id='.$category->getId().'">'.$this->shorten($category->getTitle(), 32).'</a>');
	}
	public function deleteCategory(User $author, Category $category)
	{
		$this->addToFeed($author, '<b>-</b> <a href="index.php?page=category&id='.$category->getId().'">'.$this->shorten($category->getTitle(), 32).'</a>');
	}

	/*
			SUBJECT
	*/

	public function createSubject(User $author, Subject $subject)
	{
		$this->addToFeed($author, '<a href="index.php?page=category&id='.$subject->getCategory()->getId().'">'.$this->shorten($subject->getCategory()->getTitle(), 32).'</a> > <b>+</b> <a href="index.php?page=subject&id='.$subject->getId().'">'.$this->shorten($subject->getTitle(), 32).'</a>');
	}
	public function editSubject(User $author, Subject $subject)
	{
		$this->addToFeed($author, '<a href="index.php?page=category&id='.$subject->getCategory()->getId().'">'.$this->shorten($subject->getCategory()->getTitle(), 32).'</a> > <b>~</b> <a href="index.php?page=subject&id='.$subject->getId().'">'.$this->shorten($subject->getTitle(), 32).'</a>');
	}
	public function deleteSubject(User $author, Subject $subject)
	{
		$this->addToFeed($author, '<a href="index.php?page=category&id='.$subject->getCategory()->getId().'">'.$this->shorten($subject->getCategory()->getTitle(), 32).'</a> > <b>-</b> '.$this->shorten($subject->getTitle(), 32).'');
	}
	public function lockSubject(User $author, Subject $subject)
	{
		$this->addToFeed($author, '<a href="index.php?page=category&id='.$subject->getCategory()->getId().'">'.$this->shorten($subject->getCategory()->getTitle(), 32).'</a> > <b>#</b> '.$this->shorten($subject->getTitle(), 32).'');
	}

	/*
			MESSAGE
	*/

	public function createMessage(User $author, Message $message)
	{
		$this->addToFeed($author, '<a href="index.php?page=category&id='.$message->getSubject()->getCategory()->getId().'">'.$this->shorten($message->getSubject()->getCategory()->getTitle(), 32).'</a> > <a href="index.php?page=subject&id='.$message->getSubject()->getId().'">'.$this->shorten($message->getSubject()->getTitle(), 32).'</a> > <b>+</b> <a href="index.php?page=message&id='.$message->getId().'">'.$this->shorten($message->getText(), 32).'</a>');
	}
	public function editMessage(User $author, Message $message)
	{
		$this->addToFeed($author, '<a href="index.php?page=category&id='.$message->getSubject()->getCategory()->getId().'">'.$this->shorten($message->getSubject()->getCategory()->getTitle(), 32).'</a> > <a href="index.php?page=subject&id='.$message->getSubject()->getId().'">'.$this->shorten($message->getSubject()->getTitle(), 32).'</a> > <b>~</b> <a href="index.php?page=message&id='.$message->getId().'">'.$this->shorten($message->getText(), 32).'</a>');
	}
	public function deleteMessage(User $author, Message $message)
	{
		$this->addToFeed($author, '<a href="index.php?page=category&id='.$message->getSubject()->getCategory()->getId().'">'.$this->shorten($message->getSubject()->getCategory()->getTitle(), 32).'</a> > <a href="index.php?page=subject&id='.$message->getSubject()->getId().'">'.$this->shorten($message->getSubject()->getTitle(), 32).'</a> > <b>-</b> '.$this->shorten($message->getText(), 32).'');
	}

	/*
			USER
	*/

	public function createUser(User $author)
	{
		$this->addToFeed($author, 'Welcome <a href="index.php?page=user&id='.$author->getId().'">'.$this->shorten($author->getName(), 32).'</a> !');
	}

	/*
			TOOLS
	*/

	private function shorten($str, $max)
	{
		if (strlen($str) < $max)
			return $str;
		else
		{
			$tab = explode(' ', $str);
			$res = array();
			$count = 0;
			$i = 0;
			while (isset($tab[$i]) && $count < $max)
			{
				$count += strlen($tab[$i]);
				if ($count < $max)
					$res[] = $tab[$i];
				$i++;
			}
			if (empty($res))
				$res = substr($str, 0, $max).'...';
			else
				$res = implode(' ', $res).' ...';
		}
		return $res;
	}
}
?>