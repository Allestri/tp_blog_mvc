<?php

class Manager
{
	protected function dbConnect()
	{
		$db = new PDO('mysql:host=localhost;dbname=tp_blog_mvc;charset=utf8', 'root', '');
		return $db;
	}	
}