<?php
require_once("database.php");

class Security {
	
	//Attributes
	private $login_status = false;
	private $user;
	private $connection;
	
	
	//constructor
	function __construct(){
		//a new instance of Security class must be declared before other statements like 'echo'
		session_start();	//must sent with header info.
	}
	
	
	//methods
	/* validate supplied credential and return true or false
	 *
	 */
	public function validateLogin($username, $password){
		$this->connection = new MySQLDatabase;
		$query_string = "select username from member where username = '$username' AND password = '$password'";
		$result = $this->connection->query($query_string);	
		$this->connection->closeConnection();
		
		if($result->num_rows == 0){
			echo "Credential mistmatch...try again";  //this should go into log file
			$this->login_status = false;
			$this->removeSession();
		}elseif ($result->num_rows > 1){
			echo "Too many matches, contact Administrator and check database)";  //this should go into log file
			$this->login_status = false;
			$this->removeSession();
		} else {
			//authenticated
			//echo "setting session...<br/>";  //this should go into log file
			$this->setSession($username);
			$this->connection->setTeamMembership($username);
			$this->user = $username;  //not sure where to use this but for now...
			$this->login_status = true;
			//echo "login status is: " . $this->login_status . "<br/>";
		}
		return $this->login_status;
	}
	
	public function getLoginStatus(){
		return $this->login_status;	
	}
		
	public function logout(){
		session_destroy();
		unset($_SESSION['valid_user']);
		$this->login_status = false;
	}
	
	public function setSession($username){
		//set session variable when user logs in
		$_SESSION['valid_user'] = $username;
	}
	
	public function validateSession(){
		//validate session on each restricted web pages
		if(isset($_SESSION['valid_user'])){
			//verify team access privileage
			return true;
		} else {
			//not logged in yet
			return false;
		}
	}
	
	public function displayWelcomeMessage(){
		//after successful login, display Welcome message
			
	}
	
	public function removeSession(){
		//remove session variable when user logs out.  Same as logout()
		$this->logout();		
	}
	
	public function diplayCapcha(){
		
	}
	
	public function validateCapcha(){
		
	}
	
	//check to see if team membership is set, it not return error message
	public function verify_team_membership($team){
		//check $_SESSION['$team'] see if the variable is set
		//echo "parameter is $team <br />";
		//echo "the session variable is: " . $_SESSION["$team"];
		if(isset($_SESSION["$team"])){
			//echo "Welcome to $team Home Page <br />";	
		} else {
			//display error page
			$team = conver_team_member_for_print($team);
			display_message("You must be a $team member to access this page <br />");
		}
		
		//return true if set, false if not	
	}
	
	
}



?>