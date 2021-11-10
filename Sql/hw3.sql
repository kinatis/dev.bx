#Вывести список фильмов, в которых снимались
# одновременно Арнольд Шварценеггер* и Линда Хэмилтон*.
SELECT m.ID,
       mt.TITLE,
       d.NAME
FROM movie m
         JOIN movie_title mt on m.ID = mt.MOVIE_ID
         JOIN movie_actor ma on m.ID = ma.MOVIE_ID
         JOIN director d on d.ID = m.DIRECTOR_ID
WHERE  (ma.ACTOR_ID = 1 or ma.ACTOR_ID =3) and LANGUAGE_ID = "ru"
GROUP BY 1,2
HAVING count(ma.ACTOR_ID = 1 or ma.ACTOR_ID =3) = 2;

#Вывести список названий фильмов на англйском языке
# с "откатом" на русский, в случае если название на английском не задано.
SELECT
    m.ID,
    IFNULL(mt.TITLE,mt2.TITLE) as TITLE
FROM movie m
         left join movie_title mt on m.ID = mt.MOVIE_ID and mt.LANGUAGE_ID = 'en'
         left join movie_title mt2 on m.ID = mt2.MOVIE_ID and mt2.LANGUAGE_ID = 'ru'
GROUP BY 1;


#3. Вывести самый длительный фильм Джеймса Кэмерона*.

SELECT
    ID,
    mt.TITLE,
    m.LENGTH
FROM movie m
JOIN movie_title mt on m.ID = mt.MOVIE_ID AND LANGUAGE_ID = 'ru'
WHERE DIRECTOR_ID = 1
GROUP BY 1
ORDER BY m.LENGTH DESC
LIMIT 1;



#4. ** Вывести список фильмов с названием,
# сокращённым до 10 символов. Если название короче 10 символов
# – оставляем как есть. Если длиннее – сокращаем до 10 символов
# и добавляем многоточие.

SELECT
    m.ID,
    IF(CHAR_LENGTH(mt.TITLE)>10,CONCAT(LEFT(mt.TITLE,10),'...'), mt.TITLE)
FROM movie m
JOIN movie_title mt on m.ID = mt.MOVIE_ID and LANGUAGE_ID = 'ru';

#5. Вывести количество фильмов, в которых снимался каждый актёр.
#   Формат: Имя актёра, Количество фильмов актёра.

SELECT
    a.ID,
    a.NAME,
    count(MOVIE_ID)
FROM movie_actor
LEFT JOIN actor a on a.ID = movie_actor.ACTOR_ID
GROUP BY a.NAME,a.ID;

#    6. Вывести жанры, в которых никогда не снимался Арнольд Шварценеггер*.
#    Формат: ID жанра, название

SELECT
    ID, NAME
FROM genre g
WHERE ID NOT IN(
    SELECT
        m.GENRE_ID
    FROM movie_genre m
    left join movie_actor ma on m.MOVIE_ID = ma.MOVIE_ID
    where ACTOR_ID =1
    );


#7. Вывести список фильмов, у которых больше 3-х жанров.
#   Формат: ID фильма, название на русском языке

SELECT
    m.MOVIE_ID,
    mt.TITLE
FROM movie_genre m
left join movie_title mt on m.MOVIE_ID = mt.MOVIE_ID and LANGUAGE_ID = 'ru'
GROUP BY m.MOVIE_ID, mt.TITLE
having count(m.GENRE_ID) > 3;



#   8. Вывести самый популярный жанр для каждого актёра.
# Формат вывода: Имя актёра, Жанр, в котором у актёра больше всего фильмов.

SELECT
    a_name,
    genre
FROM (SELECT distinct
             a.NAME as a_name,
             g.NAME as genre,
             COUNT(GENRE_ID) as count_genre,
             g.id as genre_id
      FROM movie_genre as mg, actor as a, genre as g,movie_actor as ma
      WHERE  a.ID = ma.ACTOR_ID and ma.MOVIE_ID = mg.MOVIE_ID and mg.GENRE_ID = g.ID
      group by a.NAME, g.NAME, g.ID
      order by count_genre desc
     ) s
group by a_name





