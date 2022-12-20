<?php

require_once(__ROOT__ . "controller/Controller.php");

class MoviesController extends Controller{
	public function insert() {
		$name = $_REQUEST['name'];
		$year = $_REQUEST['year'];

		$this->model->insertMovie($name,$year);
	}

	public function edit($movie_id) {
		$name = $_REQUEST['name'];
		$year = $_REQUEST['year'];

		$this->model->getMovie($movie_id)->editMovie($name,$year);
	}

	public function delete($movie_id){
		$this->model->getMovie($movie_id)->deleteMovie();
	}
}
?>
