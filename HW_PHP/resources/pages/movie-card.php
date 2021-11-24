<?php
/** @var array $movies */
/** @var array $genres */

?>
<?php  foreach ($movies as $movie) :?>
<div class="movie-list--item">
        <div class="movie-list--item-overlay">
            <a href="movie-card.php?id=<?= $movie['ID'] ?>" class="movie-list--item-more">Подробнее</a>
        </div>
        <div class="movie-list--item-img" style="background-image: url(resources/image/<?=$movie['ID']?>.jpg)"> </div>

        <div class="movie-list--item-head">
            <div class="movie-list--item--title"><?= $movie['TITLE']   ?>  (<?= $movie['RELEASE_DATE']?>)</div>
            <div class="movie-list--item--subtitle"><?= $movie['ORIGINAL_TITLE']   ?></div>
            <div class="movie-list--item-wrapper"></div>
        </div>
        <div class="movie-list--item-description"><?= $movie['DESCRIPTION']   ?></div>
        <div class="movie-list--item-bottom">

            <div class="movie-list--item-time">
                <div class="icon-clock"><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.58334 18.1667C14.3238 18.1667 18.1667 14.3238 18.1667 9.58334C18.1667 4.84289 14.3238 1 9.58334 1C4.84289 1 1 4.84289 1 9.58334C1 14.3238 4.84289 18.1667 9.58334 18.1667Z" stroke="#CCCCCC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.58337 4.90152V9.58334L12.7046 12.7046" stroke="#CCCCCC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg></div>
                <p> <?= $movie['DURATION']?>мин./ <?= str_pad(floor($movie['DURATION']/60,),2,"0",STR_PAD_LEFT) ?>:<?= round($movie['DURATION']%60) ?></p>
            </div>
            <div class="movie-list--item-info"><?= implode(',',cutGenresList($movie['genre'],$genres,3)); ?></div>
        </div>

</div>
<?php endforeach;?>

