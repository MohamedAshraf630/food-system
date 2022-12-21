
<?php

require_once(__ROOT__ . "view/View.php");

class ViewUser extends View
{
	public function output()
	{
		$str = "";
		$str .= "<div class='topnav'>";
		$str .= "<img class='holderimg' src='../assets/tw.jpg'>";
		$str .="<a href='profile.php?action=edit'>Edit Profile </a>";
		$str .= "<a href='profile.php?action=movie'>My Movies </a>";
		$str .= "<a href='profile.php?action=signOut'>SignOut </a>";
		//$str .= "<a href='profile.php?action=delete'>Delete Account </a>";
		$str .= "</div>";
		$str .= "<div class='container mt-5 p-5'>";
		$str .= "<div class='card'>";
		$str .= "<div class='card-body'>";
		$str .= "<h1>Welcome " . $this->model->getName() . "</h1></div></div></div>";
		// $str .= "<h1>Welcome " . $this->model->getName() . "</h1>";
		//$str .= "<h5>Phone: " . $this->model->getPhoneNumber() . "</h5>";
		$str .= "<h3>Most Popular Restaurants </h3>";
		$str .= "<div><img class='' src='../assets/download 1 (1).svg'><br><label><b>Burger King</b></label</div>";
		$str .= "<div><img class='' src='../assets/download (1) 1 (1).svg'><br><label><b>Mc donalds</b></label><div>";
		// $str .= "<img class='' src='../assets/pizza.svg'>";
		// $str .= "<label><b>Pizza Hut</b></label>";
		 $str .= "<a href='FoodItem.php'><img class='' src='../assets/starbucks.svg'><br><label><b>Starbucks</b></label></a>";
		
		// $str .= "<img class='' src='../assets/caribou.svg'>";
		// $str .= "<label><b>Caribou</b></label>";
		// $str .= "<img class='' src='../assets/cilantro.svg'>";
		// $str .= "<label><b>Cilantro</b></label>";
		// $str .= "<br><br>";
		return $str;
	}

	function loginForm()
	{
		// $str = '<form action="index.php" method="post">
		// <div><input type="email" name="email" placeholder="Enter email"/></div><br>
		// <div><input type="password" name="password" placeholder="Enter password"/></div><br>
		// <div><input type="submit" name="login"/></div>
		// </form>';
		$str = '<form action="index.php" method="post">
  <div class="container">
    <label for="email"><b>Email</b></label>
    <input type="email" placeholder="Enter email" name="email" required>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter password" name="password" required>
    <button type="submit">Login</button>
  </div>
</form>';
return $str;
	}

	function signupForm()
	{
		// $str = '<form action="index.php?action=insert" method="post">
		// <div><input type="text" name="name" placeholder="Enter name"/></div><br>
		// <div><input type="email" name="email" placeholder="Enter email"/></div><br>
		// <div><input type="password" name="password" placeholder="Enter password"/></div><br>
		// <div><input type="text" name="phonenumber" placeholder="Enter phone number"/></div><br>
		// <div><input type="submit" /></div>
		// </form>';
		$str = '<form action="index.php?action=insert" method="post">
		<div class="container">
		  <label for="name"><b>Username</b></label>
		  <input type="text" placeholder="Enter name" name="name" required>
		  <label for="email"><b>Email</b></label>
		  <input type="email" placeholder="Enter email" name="email" required>
		  <label for="password"><b>Password</b></label>
		  <input type="password" placeholder="Enter password" name="password" required>
		  <label for="phonenumber"><b>PhoneNumber</b></label>
		  <input type="text" name="phonenumber" placeholder="Enter phone number"/>
		  <button type="submit">Signup</button>
		</div>
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
<style>
    .holderimg {
      max-height: 50px;
      max-width: 50px;
      object-fit: cover;
	  margin-top:0.3px;
	 margin-bottom:0.3px;
    }
	/* Bordered form */
form {
  border: 3px solid #f1f1f1;
}

/* Full-width inputs */
input[type=email], input[type=password],input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

/* Add a hover effect for buttons */
button:hover {
  opacity: 0.8;
}
label{
	margin-right:700px;
}
label b{
	
}
/* Add padding to containers */
.container {
  padding: 16px;
}
img{
	width:130px;
	height:130px;
}
 </style>