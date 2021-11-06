<?php


require "lib/template-function.php";
require "resources/movies.php";
require "config/config.php";
require "lib/movie-list-function.php";

$templateContent = "";



renderLayout($templateContent, $genres, $side_bar_menu, "array_key_first($_GET)");