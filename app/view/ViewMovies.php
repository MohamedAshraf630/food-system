<?php
require_once(__ROOT__ . "view/View.php");

class ViewMovies extends View{

	public function output(){
		$str = "";
		$str.="<table>";
		$str.="<tr><th>Name</th><th>Year</th><th>Action</th></tr>";
		foreach($this->model->getMovies() as $Movie){
			$str.="<tr>";
			$str.="<td>".$Movie->getName() ."  </td> ";
			$str.="<td>" . $Movie->getYear() ."</td> ";
			$str.="<td>
			<a href='Movies.php?action=edit&id=".$Movie->getID()."'>Edit</a>
			/
			<a href='Movies.php?action=delete&id=".$Movie->getID()."'>Delete</a>
			</td>";
			$str.="</tr>";
		}
		$str.="<tr>";
		$str.="<form action='Movies.php?action=insert' method='post'>";
		$str.="<td><input type='text' name='name' placeholder='Enter name'/></td>";
		$str.="<td><input type='text' name='year' placeholder='Enter year'/></td>";
		$str.="<td><input type='submit' value='insert'/></td>";
		$str.="</form>";
		$str.="</tr>";
		$str.="</table>";
		$str.="<a href='profile.php'>Back to Profile </a>";

		return $str;
	}
	
	public function edit($id){
		$str = "";
		$str.="<table>";
		$str.="<tr><th>Name</th><th>Year</th><th>Action</th></tr>";
		foreach($this->model->getMovies() as $Movie){
			if($Movie->getID()===$id) 	{
				$str.="<tr>";
				$str.="<form action='Movies.php?action=editAction&id=".$Movie->getID()."' method='post'>";
				$str.="<td><input type='text' name='name' value='".$Movie->getName() ."'>  </td> ";
				$str.="<td><input type='text' name='year' value='". $Movie->getYear() ."'></td> ";
				$str.="<td><input type='submit' value='Change'/></td>";
				$str.="</form>";
				$str.="</tr>";
			}
			else	{
				$str.="<tr>";
				$str.="<td>".$Movie->getName() ."  </td> ";
				$str.="<td>" . $Movie->getYear() ."</td> ";
				$str.="<td><a href='Movies.php?action=edit&id=".$Movie->getID()."'>Edit</a></td>";
				$str.="</tr>";
			}
		}
		$str.="</table>";
		$str.="<a href='Movies.php'>Back to Movies </a>";
		return $str;
	}
}
?>