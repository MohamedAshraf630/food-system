<?php

define('__ROOT__', "../app/");
require_once(__ROOT__ . "model/User.php");
require_once(__ROOT__ . "controller/MoviesController.php");
require_once(__ROOT__ . "view/ViewMovies.php");

$model = new FoodItem($_SESSION["id"]);
$controller = new FoodItemController($model);
$view = new ViewFoodItem($controller, $model);
echo $view->output();
?>