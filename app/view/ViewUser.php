
<head>
<script src="food-system/assets/js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="food-system/assets/css/bootstrap.min.css">
    <script src="food-system/assets/js/bootstrap.bundle.min.js"></script>
</head>

<?php

require_once(__ROOT__ . "view/View.php");

class ViewUser extends View
{
	public function output()
	{
		$str = "";
		$str .= "<div class='topnav'>";
		$str .="<a href='profile.php?action=edit'>Edit Profile </a>";
		$str .= "<a href='profile.php?action=movie'>My Movies </a>";
		$str .= "<a href='profile.php?action=signOut'>SignOut </a>";
		$str .= "<a href='profile.php?action=delete'>Delete Account </a>";
		$str .= "</div>";
		$str .= "<div class='container mt-5 p-5'>";
		$str .= "<div class='card'>";
		$str .= "<div class='card-body'>";
		$str .= "<h1>Welcome " . $this->model->getName() . "</h1></div></div></div>";

		// $str .= "<h1>Welcome " . $this->model->getName() . "</h1>";
		$str .= "<h5>Phone: " . $this->model->getPhoneNumber() . "</h5>";
		$str .= "<br><br>";
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
<style>

/* Add a black background color to the top navigation */
.topnav {
  background-color: #333;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #04AA6D;
  color: white;
}

</style>	