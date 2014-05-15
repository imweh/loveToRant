<?php
class comment {
	public $id;
	public $rantId;
	public $title;
	public $body;
	public $name;
	public $commentDate;
	public $status;
	public $likes;
	public $dislikes;
	public $creator;
	
	function addToDB(){
		mysql_query("INSERT INTO comments (rantId, commentTitle, commentBody, name, userId) VALUES ('$this->rantId', '".addslashes($this->title)."', '".addslashes($this->body)."', '$this->name', '$this->creator')");
		
		mysql_query("UPDATE users SET commentCount=commentCount+1 WHERE userId='$this->creator'");
			
		}
		
	function removeFromDB(){
		mysql_query("DELETE FROM comments WHERE commentId='$this->id'" );
		}
	
	function changeStatus(){
		mysql_query("UPDATE comments SET commentStatus='$this->status' WHERE commentId='$this->id'");
		}
			
	function updateDB(){
		mysql_query("UPDATE comments SET rantId='$this->rantId', commentTitle='".addslashes($this->title)."', commentBody='".addslashes($this->body)."' WHERE commentId='$this->id'");
		}
		
	function incrementLikes(){
	
		mysql_query("UPDATE comments SET commentLikes=commentLikes + 1 WHERE commentId='$this->id'");
		
		}
		
	function incrementDislikes(){
	
		mysql_query("UPDATE comments SET commentDislikes=commentDislikes + 1 WHERE commentId='$this->id'");
	
		}
		
		
}

?>