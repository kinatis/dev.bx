<?php
declare(strict_types=1);


function filterMovieByGenre(array $movies, string $genre): array
{

   $result = [];
   foreach ($movies as $movie)
   {

       foreach ($movie['genres'] as $genres)
       {
           if ($genres === $genre)
           {
                $result[]= $movie;
           }
       }
   }

   return $result;
}


function findMovieById( array $movies, int $id):array
{


    foreach ($movies as $movie){
        if ($movie['id'] === $id)
        {
            return $movie;
        }
    }

    return [];
}
function findMovieByTitle(array $movies, string $title):array
{
    $result = [];
    $title = mb_strtolower($title,"UTF-8");

    foreach ($movies as $movie){
        $movieTitle = mb_strtolower($movie['title']);

        if (stripos($movieTitle, $title) !==false)
        {
           $result[] = $movie;
        }

    }

    return $result;

}

function cutGenresList(array $genresList,int $count)
{
    $genreList = [];
    foreach($genresList as $genre)
    {
        if(count($genreList) < $count)
        {
            $genreList[] = $genre;
        }

    }
    return $genreList;
}

