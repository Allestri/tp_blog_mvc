<?php 

class CommentManager
{
	public function getComments($postId)
	{
		$db = $this->dbConnect();
		//Recupération commentaires
		$comments = $db->prepare('SELECT author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') 
		AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date');
		$comments->execute(array($postId));
		
	return $comments;
	}
	
	public function postComment($postId, $author, $comment)
	{
		$db = $this->dbConnect();
		$comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date ) VALUES(?, ?, ?, NOW())');
		$affectedLines = $comments->execute(array($postId, $author, $comment));
		
		return $affectedLines;
	}
	
	private function dbConnect()
	{
		$db = new PDO('mysql:host=localhost;dbname=tp_blog_mvc;charset=utf8', 'root', '');
		return $db;
	}
}