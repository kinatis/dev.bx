<?php
declare(strict_types=1);
require "lib/movie-list-function.php";
require "lib/template-function.php";
require "resources/movies.php";
require "config/config.php";

$templateContent = "";


$movie= findMovieById($movies,(int)$_GET['id']);

$templateContent = renderTemplate("./resources/pages/more-film.php",['movie' => $movie]);



renderLayout($templateContent, $genres, $sideBarMenu, 'index');