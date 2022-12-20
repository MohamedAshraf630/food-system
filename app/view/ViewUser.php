<?php

require_once(__ROOT__ . "view/View.php");

class ViewUser extends View
{
	public function output()
	{
		$str = "";
		$str .= "<h1>Welcome " . $this->model->getName() . "</h1>";
		$str .= "<h5>Phone: " . $this->model->getPhoneNumber() . "</h5>";
		$str .= "<br><br>";
		$str .= "<div class='topnav'>";
		$str .="<a href='profile.php?action=edit'>Edit Profile </a><br><br>";
		$str .= "<a href='profile.php?action=movie'>My Movies </a><br><br>";
		$str .= "<a href='profile.php?action=signOut'>SignOut </a><br><br>";
		$str .= "<a href='profile.php?action=delete'>Delete Account </a>";
		$str .= "</div>";
		return $str;
	}

	function loginForm()
	{
		$str = '<form action="index.php" method="post">
		<div><input type="email" name="email" placeholder="Enter email"/></div><br>
		<div><input type="password" name="password" placeholder="Enter password"/></div><br>
		<div><input type="submit" name="login"/></div>
		</form>';
		return $str;
	}

	function signupForm()
	{
		$str = '<form action="index.php?action=insert" method="post">
		<div><input type="text" name="name" placeholder="Enter name"/></div><br>
		<div><input type="email" name="email" placeholder="Enter email"/></div><br>
		<div><input type="password" name="password" placeholder="Enter password"/></div><br>
		<div><input type="text" name="phonenumber" placeholder="Enter phone number"/></div><br>
		<div><input type="submit" /></div>
		</form>';
		return $str;
	}

	public function editForm()
	{
		$str = '<form action="profile.php?action=editaction" method="post">
		<div>Name:</div><div> <input type="text" name="name" value="' . $this->model->getName() . '"/></div><br>
		<div>Password:</div><div> <input type="password" name="password" value="' . $this->model->getPassword() . '"/></div><br>
		<div>Phone: </div><div><input type="text" name="phone" value="' . $this->model->getPhoneNumber() . '"/></div><br>
		<div><input type="submit" /></div>';
		return $str;
	}
}
?>