<?php



function filtratedMoveByGenres(array $movies, string $genres): array
{

   $result = [];
   foreach ($movies as $movie)
   {
       foreach ($movie['genres'] as $genre)
       {
           if ($genre == $genres)
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
        if ($movie['id'] == $id)
        {
            return $movie;
        }
    }
    return 0;
}
function findMovieByTitle(array $movies, string $title):array
{
    $result = [];
    

    foreach ($movies as $movie){
        if (strpos($movie['title'],$title)!==false)
        {

            array_push($result,$movie);
        }

    }

    return $result;

}

