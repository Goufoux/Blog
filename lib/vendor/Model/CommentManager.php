<?php

	namespace Model;
	
	use \Core\Manager;
	use \Entity\Comment;
	
	abstract class CommentManager extends Manager
	{
		abstract public function addComment(Comment $comment);
		
		abstract public function getComment($id, $module);
	}