<?php

namespace Allestri\Blog\Model;

require_once("model/Manager.php");

class PostManager extends Manager
{
	public function getPosts()
	{
		$db = $this->dbConnect();
		// Recuperation billets
		$request = $db->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY id DESC LIMIT 0, 10');

		return $request;
	}

	public function getPost($postId)
	{
		$db = $this->dbConnect();
		// Recuperation billet
		$request = $db->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') 
		AS creation_date_fr FROM posts WHERE id = ?');
		$request->execute(array($postId));
		$post = $request->fetch();
		if(empty($post))
		{
			echo "<p>Le billet n'existe pas</p>";
		}
		else 
		{
			echo '<p>Le billet existe</p>';
		
		}

	return $post;
	}
	
}

?>