<?php
require_once("config.php");  //getting DB related parameters

class MySQLDatabase {
	
	private $connection;
	
	//constructor opens database connection
	function __construct(){
		$this->openConnection();	
	}
	
	//no need to call this function by itself.  It should be called from constructor
	public function openConnection(){
		$dbo = @mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		/* check connection */
		if($dbo->connect_error){
			echo "Connection failed: " . $dbh->connect_error;
			exit();	
		}
		if (mysqli_connect_errno()) {
			printf("Connect failed: %s\n", mysqli_connect_error());
			exit();
		}
		
		$this->connection = $dbo;
	}
	
	public function sanitizeInput($input) {
		//add slashes to control characters (', ", \, NUL)
		addslashes($input);
		//strip all html tags
		strip_tags($input);
		//convert any script tags to harmless character (eg: < will be &lt)
		htmlspecialchars($input);
		//return sanitized input
		return $input;	
	}
	
	public function query($sql) {
		$sql = $this->sanitizeInput($sql); //sanitizing sql query input
		$result = mysqli_query($this->connection, $sql);
		if(!$result){
			die ("Database query failed: " . mysql_error());	
		}
		return $result;
	}
	
	public function mysqlPrep($value) {
		$magic_quotes_active = get_magic_quotes_gpc();
		$new_enough_php = function_exists("mysql_real_escape_string");  //PHP >== v4.3
		if($new_enough_php) {  //higher than PHP v4.3.0
			//undo any magic quote effects so mysql_real_escape_string can do the work
			if($magic_quotes_active) {$value = stripcslashes($value);}
			//$value = mysql_real_escape_string($value);
			$value = mysqli_real_escape_string($this->connection, $value);			
		} else {  //before PHP v4.3
			//	if magic quotes aren't already on then add slashes manually
			if(!$magic_quotes_active) { $value = addslashes($value); }
			// if magic quotes are active, then the slashes already exist
		}
		return $value;
	}
	
	public function getAccountInformation(){
		//get account information only for logged in user
		$username = $_SESSION['valid_user'];  //$_SESSION is set when user logs in
		//echo "the valid user is : " . $_SESSION['valid_user'] .  "first name is: " . $_SESSION['fname'] . "<br />";
		$query_string = "SELECT fname, lname, email, phone_number, street, city, state, zip FROM `member` WHERE username='$username'";
		$query_result = $this->query($query_string) or die ("failed to run query" . $query_string . "<br />");
		//setting  user information as session variables
		$obj = $query_result->fetch_object();
		$_SESSION['fname'] =  $obj->fname;
		$_SESSION['lname'] =  $obj->lname;
		$_SESSION['email'] =  $obj->email;
		$_SESSION['phone_number'] =  $obj->phone_number;
		$_SESSION['street'] =  $obj->street;
		$_SESSION['city'] =  $obj->city;
		$_SESSION['state'] =  $obj->state;
		$_SESSION['zip'] =  $obj->zip;
	}
	
	public function displayPressTeamList($query_result){
		//$type = gettype($query_result);
		$obj = $query_result->fetch_object();
		echo "<div id='content_right_with_left_menu'>";
			echo "<div id='member_list' name='member_list'>";
			echo "<table border='1' cellpadding='5' width='830' height='300'>";
			echo "<th style='background:#DFDFDF; align=center'><b>Name</b></th>";
			echo "<th style='background:#DFDFDF; align=center'><b>Email</b></th>";
			echo "<th style='background:#DFDFDF; align=center'><b>Phone Number</b></th>";
			do {
				//while condition returns from 1 not 0, hence using do...while
				echo "<tr>";
				echo "<td id='member_name' width='30%'>" . $obj->fname . $obj->lname . "</td>";
				echo "<td id='member_email' width='50%'>" . $obj->email . "</td>";
				echo "<td id='phone_number' width='20%'>" . $obj->phone_number . "</td>";
				echo "</tr>";
			} while ($obj = $query_result->fetch_object());
			echo"</table>";
			echo "</div>";
		echo "</div><!--content_right_with_left_menu-->";
		/* free result set */
		$query_result->close();
	}
	
		
	public function setTeamMembership($username){
		//when user logs in, team association is set here.  When user belongs to a particular team, the session variable for the team is set to '1'
		//declare team array and query string
		$this->openConnection();
		$teams = array("computer_team", "design_team", "photography_team", "edit_report_team", "display_team", "public_relation_team", "admin_team");
		foreach($teams as $team){
				$query_string = "select $team from member where username = '$username'";
				$result = $this->query($query_string);
				$obj = $result->fetch_object();
				if($obj->$team){
					$_SESSION["$team"] = true;	
				}
				
		}//foreach
		
	}
	
	public function closeConnection(){
		if(isset($this->connection)) {
			$this->connection->close();
			unset($this->connection);	
		}
	}
	

}

class OracleDatabase {
 //implement as needed	
}


?>
