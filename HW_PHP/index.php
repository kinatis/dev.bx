<?php
declare(strict_types=1);

/** @var array $sqlConnect */
/** @var array $sideBarMenu */

require "lib/template-function.php";
require "resources/movies.php";
require "config/config.php";
require "lib/movie-list-function.php";
require_once "lib/db-function.php";


$templateContent = "";

$db = dbConnection($sqlConnect);

$moviesList = getMoviesList($db,getGenresList($db));

// Рендер шаблона
if(!$moviesList)
{
    $templateContent.=renderTemplate("./resources/pages/empty-movie-list.php");
}
else
{
    $templateContent = $templateContent.renderTemplate("./resources/pages/movie-card.php", ['movies' => $moviesList,'genres' => getGenresList($db)]);
}


if(isset($_GET['genre']))
{

    renderLayout($templateContent,getGenresList($db),$sideBarMenu,$_GET['genre']);
}
else
{
    renderLayout($templateContent,getGenresList($db),$sideBarMenu,"index");
}
