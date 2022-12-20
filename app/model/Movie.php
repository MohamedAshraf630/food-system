<?php
require_once(__ROOT__ . "model/Model.php");

class Movie extends Model {
	private $id;
	private $name;
	private $year;

	function __construct($id) {
		$this->id = $id;
		$this->db = $this->connect();
		$this->readMovie($id);
	}
	
	function readMovie($id){
		$sql = "SELECT * FROM movie where ID=".$id;
		$result = $this->db->query($sql);
		if ($result->num_rows == 1){
			$row = $this->db->fetchRow();
			$this->name = $row["Name"];
			$this->year=$row["Year"];
		}
		else {
			$this->name = "";
			$this->year="";
		}
	}

	function getName() {
		return $this->name;
	}	
	function setName($name) {
		return $this->name = $name;
	}

	function getYear() {
		return $this->year;
	}
	function setYear($year) {
		return $this->year = $year;
	}

	function getID() {
		return $this->id;
	}
	
	function editMovie($name, $year){
		$sql = "update movie set name='$name',year='$year' where id=$this->id;";
		if($this->db->query($sql) === true){
			echo "updated successfully.";
			$this->readMovie($this->id);
		} else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}

	function deleteMovie(){
		$sql="delete from movie where id=$this->id;";
		if($this->db->query($sql) === true){
			echo "deleted successfully.";
		} else{
			echo "ERROR: Could not able to execute $sql. " . $conn->error;
		}
	}
}