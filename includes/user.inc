<?php

class user {
	public $id;
	public $fName;
	public $lName;
	public $penName;
	public $password;
	public $date;
	public $email;
	public $updates;
	public $status;
	public $admin;
	public $question;
	public $answer;
	
	function addToDB(){
		mysql_query("INSERT INTO users (fName, lName, penName, password, email, updates, admin) VALUES ('$this->fName', '$this->lName', '$this->penName','$this->password', '$this->email','$this->updates', '$this->admin')");
			
		}
		
	function removeFromDB(){
		mysql_query("DELETE FROM users WHERE userId='$this->id'" );
		}
	
	function changeStatus(){
		mysql_query("UPDATE users SET status='$this->status' WHERE userId='$this->id'");
		}
			
	function updateDB(){
		mysql_query("UPDATE users SET fName='$this->fName', lName='$this->lName', penName='$this->penName', email='$this->email', updates='$this->updates', question='$this->question', answer='$this->answer' WHERE userId='$this->id'");
		}
		
	function changePass(){
	
		mysql_query("UPDATE users SET password='$this->password' WHERE userId='$this->id'");		
		}
		
		
}

?>