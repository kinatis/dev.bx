<?php
require "lib/template-function.php";
require "resources/movies.php";
require "config/config.php";
require "lib/movie-list-function.php";

$templateContent = "";


if (isset($_GET['search']))
{
    if(!empty($_GET['search'])){
        $movies = findMovieByTitle($movies,$_GET['search']);
    }
}
if(!$movies){
    $templateContent.=renderTemplate("./resources/pages/empty-movie-list.php");
}


foreach ($movies as $movie)
{
    $templateContent = $templateContent.renderTemplate("./resources/pages/movie-card.php", ['movies' => $movie]);
}


renderLayout($templateContent,$genres,$side_bar_menu,'index');