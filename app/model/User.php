<?php
require_once(__ROOT__ . "model/Model.php");
require_once(__ROOT__ . "model/Movie.php");


class User extends Model {
	private $id;
	private $name;
	private $status;
	private $email;
	private $password;
	private $phonenumber;
	private $role;
	private $movies;

	function __construct($id="") {
		$this->db = $this->connect();
		if($id!=""){
			$this->id = $id;
			$this->readUser($id);
			// $this->readMovies();  
		}
	}
	
	function readUser($id){
		$sql = "SELECT * FROM users where id=".$id;
		$result = $this->db->query($sql);
		if ($result->num_rows == 1){
			$row = $this->db->fetchRow();
			$this->name = $row["name"];
			$_SESSION["name"]=$row["name"];
			$this->email=$row["email"];
			$this->password=$row["password"];
			$this->phonenumber = $row["phonenumber"];
			$this->role=$row["role"];
			$this->status=$row["status"];
		}
		else {
			$this->name = "";
			$this->password="";
			$this->email = "";
			$this->phonenumber = "";
			$this->status = "";
			$this->role = "";
		}
	}
	
	function readMovies(){
		$this->movies = array();
		$sql = "SELECT * FROM movie where User_ID=".$this->id;
		$result = $this->db->query($sql);
		if ($result->num_rows > 0){
			while ($row = $result->fetch_assoc()) {
				array_push($this->movies, new Movie($row["ID"]));
			}
		}
	}
	
	function getMovie($movie_id) {
		$this->readMovies();
		foreach($this->movies as $movie) {
			if ($movie_id == $movie->getID()) {
				return $movie;
			}
		}
	}

	function getMovies() {
		$this->readMovies();  
		return $this->movies;
	}
	
	function getName() {
		return $this->name;
	}
	function setName($name) {
		return $this->name = $name;
	}

	function getEmail() {
		return $this->email;
	}
	function setEmail($email) {
		return $this->email = $email;
	}

	function getPassword() {
		return $this->password;
	}
	function setPassword($password) {
		return $this->password = $password;
	}

	function getRole() {
		return $this->role;
	}
	function setRole($role) {
		return $this->role = $role;
	}

	function getPhoneNumber() {
		return $this->phonenumber;
	}
	function setPhoneNumber($phonenumber) {
		return $this->phonenumber = $phonenumber;
	}

	function getStatus() {
		return $this->status;
	}
	function setStatus($status) {
		return $this->status = $status;
	}

	function getID() {
		return $this->id;
	}
	
	function insertUser($name,$email,$password,$phonenumber){
		$sql = "INSERT INTO users (name,email,password,phonenumber) VALUES ('$name','$email','$password','$phonenumber')";
		if($this->db->query($sql) === true){
			echo "Records inserted successfully.";
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}
	
	function insertMovie($name, $year){
		$sql = "INSERT INTO movie (User_ID, name, year) VALUES ('".$_SESSION['ID']."','$name', '$year')";
		if($this->db->query($sql) === true){
			echo "Records inserted successfully.";
			$this->readMovies();
		} 
		else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}
	

	function editUser($name,$password,$phonenumber){
		$sql = "update users set name='$name',password='$password', phonenumber='$phonenumber' where id=$this->id;";
		if($this->db->query($sql) === true){
			echo "updated successfully.";
			$this->readUser($this->id);
		} else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}

	function deleteUser(){
		$sql="delete from users where id=$this->id;";
		if($this->db->query($sql) === true){
			echo "deletet successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}

	
}