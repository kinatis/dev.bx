<?php


require "lib/template-function.php";
require "resources/movies.php";
require "config/config.php";
require "lib/movie-list-function.php";

$templateContent = "";



renderLayout($templateContent, $genres, $sideBarMenu, "array_key_first($_GET)");