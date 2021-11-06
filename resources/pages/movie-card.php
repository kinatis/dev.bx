<?php
/** @var array $movies */
?>


<div class="movie-list--item">
        <div class="movie-list--item-overlay">
            <a href="film-card.php?<?= $movies['id'] ?>" class="movie-list--item-more">Подробнее</a>
        </div>
        <div class="movie-list--item-img" style="background-image: url(resources/image/<?=$movies['id']?>.jpg)"> </div>

        <div class="movie-list--item-head">
            <div class="movie-list--item--title"><?= $movies['title']   ?></div>
            <div class="movie-list--item--subtitle"><?= $movies['original-title']   ?></div>
            <div class="movie-list--item-wrapper"></div>
        </div>
        <div class="movie-list--item-description"><?= $movies['description']   ?></div>
        <div class="movie-list--item-bottom">

            <div class="movie-list--item-time">
                <div class="icon-clock"><svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.58334 18.1667C14.3238 18.1667 18.1667 14.3238 18.1667 9.58334C18.1667 4.84289 14.3238 1 9.58334 1C4.84289 1 1 4.84289 1 9.58334C1 14.3238 4.84289 18.1667 9.58334 18.1667Z" stroke="#CCCCCC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M9.58337 4.90152V9.58334L12.7046 12.7046" stroke="#CCCCCC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg></div>
                <p><?= $movies['duration']   ?>м</p>
            </div>
            <div class="movie-list--item-info"><?= $movies['genres'][0].", ".$movies['genres'][1].", ".$movies['genres'][2]   ?></div>
        </div>

</div>


