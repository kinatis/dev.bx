<?php
declare(strict_types=1);

require "lib/template-function.php";
require "resources/movies.php";
require "config/config.php";
require "lib/movie-list-function.php";



$templateContent = "";



if ($_GET['genre'] !== null)
{
    $genre = $genres[$_GET['genre']];
    $filteredMovies = filterMovieByGenre($movies,$genre);
}

if (empty($filteredMovies))
{
    $filteredMovies = $movies;
}




if (isset($_GET['search']))
{
    if(!empty($_GET['search']))
    {
        $filteredMovies = findMovieByTitle($filteredMovies,$_GET['search']);
    }
}





if(!$filteredMovies){
    $templateContent.=renderTemplate("./resources/pages/empty-movie-list.php");
}
else
{
    $templateContent = $templateContent.renderTemplate("./resources/pages/movie-card.php", ['movies' => $filteredMovies]);
}


if(isset($_GET['genre']))
{
    renderLayout($templateContent,$genres,$sideBarMenu,$_GET['genre']);
}
else
{
    renderLayout($templateContent,$genres,$sideBarMenu,"index");
}
