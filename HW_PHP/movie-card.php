<?php
declare(strict_types=1);

require "lib/template-function.php";
require "resources/movies.php";
require "config/config.php";
require "lib/movie-list-function.php";
require_once "lib/db-function.php";


$templateContent = "";

$db = dbConnection($sqlConnect);

$movie= findMovieById($db);

$templateContent = renderTemplate("./resources/pages/more-film.php",['movie' => $movie]);



renderLayout($templateContent, getGenresList($db), $sideBarMenu, 'index');