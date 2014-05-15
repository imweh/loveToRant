<?php
class rant {
	public $id;
	public $title;
	public $type;
	public $category;
	public $body;
	public $createdDate;
	public $name;
	public $status;
	public $likes;
	public $dislikes;
	public $creator;
	
	function addToDB(){
		mysql_query("INSERT INTO rants (rantTitle, rantType, rantCategory, rantBody, name, userId) VALUES ('".addslashes($this->title)."', '$this->type', '$this->category', '".addslashes($this->body)."', '$this->name', '$this->creator')");
		
		mysql_query("UPDATE users SET rantCount=rantCount+1 WHERE userId='$this->creator'");
		}
		
	function removeFromDB(){
		mysql_query("DELETE FROM rants WHERE rantId='$this->id'" );
		}
	
	function changeStatus(){
		mysql_query("UPDATE rants SET rantStatus='$this->status' WHERE rantId='$this->id'");
		}
			
	function updateDB(){
		mysql_query("UPDATE rants SET rantTitle='".addslashes($this->title)."', rantType='$this->type', rantCategory='$this->category', rantBody='".addslashes($this->body)."', name='$this->name', rantUpdated= NOW() WHERE rantId='$this->id'");//or die( mysql_error());
		
		//return mysql_error();
		}
		
	function incrementLikes($rantId){
	
		mysql_query("UPDATE rants SET rantLikes=rantLikes + 1 WHERE rantId='$rantId'");
		
		}
		
	function incrementDislikes($rantId){
	
		mysql_query("UPDATE rants SET rantDislikes=rantDislikes + 1 WHERE rantId='$rantId'");
	
		}
		
		
}

?>