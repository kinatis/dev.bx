<?php



function filterMovieByGenre(array $movies, string $genre): array
{

   $result = [];
   foreach ($movies as $movie)
   {
       foreach ($movie['genres'] as $genres)
       {
           if ($genres === $genre)
           {
            array_push($result,$movie);
           }
       }
   }

   return $result;
}


function findMovieById( array $movies, string $id):array
{

    foreach ($movies as $movie){
        if ($movie['id'] === str($id))
        {
            return $movie;
        }
    }
    return [];
}
function findMovieByTitle(array $movies, string $title):array
{
    $result = [];
    

    foreach ($movies as $movie){
        if (stripos($movie['title'],$title)!==false)
        {
           $result[] =$movie;
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

