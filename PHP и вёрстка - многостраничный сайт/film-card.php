<?php
require "lib/movie-list-function.php";
require "lib/template-function.php";
require "resources/movies.php";
require "config/config.php";

$templateContent = "";

$get = array_key_first($_GET);
$movie= findMovieById($movies,$get);

$templateContent = renderTemplate("./resources/pages/more-film.php",['movie' => $movie]);



renderLayout($templateContent, $genres, $side_bar_menu, 'index');