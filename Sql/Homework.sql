CREATE TABLE language
(
    ID varchar(512) not null,
    NAME varchar(512),
    PRIMARY KEY (ID)
);


CREATE TABLE movie_title
(
    MOVIE_ID int not null,
    LANGUAGE_ID varchar(512) not null,
    TITLE varchar(512),
    FOREIGN KEY FK_MT_ID(LANGUAGE_ID)
        REFERENCES language(ID)
        ON UPDATE RESTRICT
        ON DELETE RESTRICT,

    FOREIGN KEY FK_MT_MOVIE(MOVIE_ID)
        REFERENCES movie(ID)
        ON UPDATE RESTRICT
        ON DELETE RESTRICT

);

INSERT INTO language(ID, NAME)
VALUES
    ('ru','Русский'),
    ('en','English');

INSERT INTO movie_title(movie_id, language_id, title)
SELECT ID, 'ru', TITLE FROM movie;

select * from movie_title;


ALTER TABLE movie
DROP COLUMN TITLE;