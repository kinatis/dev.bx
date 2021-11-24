<?php

require "lib/template-function.php";
require "resources/movies.php";
require "config/config.php";
require "lib/movie-list-function.php";
require_once "lib/db-function.php";


$templateContent = "";

$db = dbConnection($sqlConnect);


renderLayout($templateContent, getGenresList($db), $sideBarMenu,"favorite");