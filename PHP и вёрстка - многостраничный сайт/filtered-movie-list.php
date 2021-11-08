<?php

require "lib/template-function.php";
require "resources/movies.php";
require "config/config.php";
require "lib/movie-list-function.php";

$templateContent = "";

$genre = $genres[array_key_first($_GET)];

$filteredMovies = filtratedMoveByGenres($movies,$genre);


foreach ($filteredMovies as $movie){
    $templateContent = $templateContent.renderTemplate("./resources/pages/movie-card.php", ['movies' => $movie]);
}


renderLayout($templateContent, $genres, $side_bar_menu, array_key_first($_GET));