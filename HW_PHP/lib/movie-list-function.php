<?php
declare(strict_types=1);


function findMovieById( mysqli $database):array
{
    if(is_numeric($_GET["id"]))
    {
        $id = (int)$_GET["id"];
    }else
    {
        trigger_error("Неверный ID", E_USER_ERROR);
    }

    $query ="WHERE m.ID = {$id}";

    $movie =getMoviesQuery($database,$query);
    $result = mysqli_fetch_assoc($movie);

    $actorNameList = getActorNameList($database,$result['actor']);

    $result['actor'] = toStringActorName($actorNameList);
    if(is_null($result))
    {
        trigger_error("Нет такого фильма",E_USER_ERROR);
    }

    return $result;
}

function toStringActorName(array $actors): string
{
    $arr = [];
    foreach ($actors as $actor)
    {
        $arr[] = $actor["NAME"];
    }

    return implode(',',$arr);
}


function cutGenresList(string $genresIdList,array $genresNameList, $count): array
{
    $genreList = [];
    $genresIdList = explode(',',$genresIdList);
    foreach($genresIdList as $genre)
    {

        if(count($genreList) < $count)
        {
            $genreList[] = $genresNameList[$genre]['NAME'];
        }

    }
    return $genreList;
}

function getActorNameList(mysqli $database,string $actors):array
{
    $actorsList = [];

    $escapeActors = mysqli_real_escape_string($database,$actors);

    $result = $database ->query("
                                        SELECT * From actor
                                        where ID IN({$escapeActors})");

    if(!$result)
    {
        $error = mysqli_error($database) . ':' . mysqli_error($database);
        trigger_error($error,E_USER_ERROR);
    }

    while ($row = mysqli_fetch_assoc($result))
    {
        $actorsList[$row["ID"]] = array('NAME' =>$row["NAME"]);
    }

    return $actorsList;
}




function getGenresList(mysqli $database):array
{
    $genresList = [];
    $result = $database ->query("SELECT * From genre");

    while ($row = mysqli_fetch_assoc($result))
    {
        $genresList[$row["ID"]] = array("CODE" => $row["CODE"],'NAME' =>$row["NAME"]);
    }
    if(!$result)
    {
        $error = mysqli_error($database) . ':' . mysqli_error($database);
        trigger_error($error,E_USER_ERROR);
    }

    return $genresList;
}

function getMoviesQuery(mysqli $database,string $filterQuery){
    $result = $database ->query
    ("SELECT m.ID, TITLE, ORIGINAL_TITLE, DESCRIPTION, DURATION, AGE_RESTRICTION, RELEASE_DATE, RATING,d.NAME,
            (SELECT GROUP_CONCAT(movie_genre.GENRE_ID)
            FROM movie_genre
            WHERE movie_genre.MOVIE_ID = m.ID) as genre,
            (SELECT GROUP_CONCAT(movie_actor.ACTOR_ID)
            FROM movie_actor
            WHERE movie_actor.MOVIE_ID = m.ID) as actor
            FROM movie AS m
            JOIN director d ON d.ID = m.DIRECTOR_ID
            JOIN movie_genre mg on m.ID = mg.MOVIE_ID
            JOIN genre g on g.ID = mg.GENRE_ID
             {$filterQuery}
            GROUP BY m.ID, TITLE, ORIGINAL_TITLE, DESCRIPTION, DURATION, AGE_RESTRICTION, RELEASE_DATE, RATING, d.NAME"
    );
    return $result;
}

function getMoviesList(mysqli $database, array $genres):array
{
    $moviesList = [];
    $filterQuery = '';
    $genreFind = false;

    if(isset($_GET['search'])){
        $escapeGet = mysqli_real_escape_string($database,$_GET['search']);
        $filterQuery = "WHERE UPPER(m.TITLE) LIKE UPPER('%{$escapeGet}%')";
    }

    if(isset($_GET['genre'])){
        $escapeGet = mysqli_real_escape_string($database,$_GET['genre']);
        foreach ($genres as $genre)
        {
            if ($genre['CODE'] === $escapeGet)
            {
                $genreFind = true;
            }
        }

        if(!$genreFind){
            trigger_error("Жанр не найден",E_USER_ERROR);
        }


        $filterQuery = "WHERE g.CODE = '{$escapeGet}'";


    }

    $result = getMoviesQuery($database , $filterQuery);

    if(!$result)
    {
        $error = mysqli_error($database) . ':' . mysqli_error($database);
        trigger_error($error,E_USER_ERROR);
    }

    while ($row = mysqli_fetch_assoc($result))
    {
        $moviesList[] = $row;
    }

    return $moviesList;

}


