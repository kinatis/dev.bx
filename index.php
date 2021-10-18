<?php
require 'movies.php';



echo "Введите свой возвраст: ";

$age = fgets(STDIN);
$age = rtrim($age);

if(is_numeric($age)and $age >=0 and $age < 150) {
    showFilms($age,$movies);
}else{
    echo "Неверные данные";
}



function showFilms($age,$movies)
{
    $counter = 1;
    foreach ($movies as $film){
        if ($film["age_restriction"] <= $age) {
            echo $counter.". ".$film["title"] . " (".$film["release_year"].") ,".$film["age_restriction"]."+. Rating - ".$film["rating"]."\n";
            $counter++;
        }
    }
}














