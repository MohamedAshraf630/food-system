<?php

require_once(__ROOT__ . "controller/Controller.php");

class UsersController extends Controller{
	public function insert() {
		$name = $_REQUEST['name'];
		// $status = $_REQUEST['status'];
		$email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$phonenumber = $_REQUEST['phonenumber'];
		// $role = $_REQUEST['role'];

		$this->model->insertUser($name,$email,$password,$phonenumber);
	}

	public function edit() {
		$name = $_REQUEST['name'];
		// $status = $_REQUEST['status'];
		// $email = $_REQUEST['email'];
		$password = $_REQUEST['password'];
		$phonenumber = $_REQUEST['phonenumber'];
		// $role = $_REQUEST['role'];

		$this->model->editUser($name,$password,$phonenumber);
	}
	
	public function delete(){
		$this->model->deleteUser();
	}
}
?>
