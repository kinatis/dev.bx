<?php
/** @var array $movie */
?>


<div class="movie-card-wrapper">
    <div class="header-movie-card-wrapper">
        <div class="header-movie--card">
            <div class="movie-title-wrapper">
                <div class="movie-title"><?= $movie["TITLE"]?>(<?= $movie['RELEASE_DATE']?>)</div>
                <div class="movie-subtitle-wrapper">
                    <div class="movie-subtitle"><?= $movie["ORIGINAL_TITLE"]?></div>
                    <div class="age-restriction">+<?= $movie['AGE_RESTRICTION']?></div>

                </div>
            </div>
            <div class="like">
                <a href="#">
                    <svg width="43" height="37" viewBox="0 0 43 37" fill="" xmlns="http://www.w3.org/2000/svg">
                        <path d="M21.5115 34.625L21.4999 34.625L21.4883 34.625C21.4719 34.6251 21.4556 34.622 21.4404 34.6158L20.6841 36.4673L21.4403 34.6158C21.4257 34.6098 21.4123 34.6011 21.4009 34.5901C21.4005 34.5897 21.4 34.5892 21.3996 34.5888L4.90146 18.0694C4.90047 18.0684 4.89948 18.0674 4.8985 18.0664C3.19983 16.3484 2.24707 14.0299 2.24707 11.6138C2.24707 9.19846 3.1992 6.88062 4.89681 5.16279C6.60875 3.45815 8.92634 2.50101 11.3424 2.50101C13.7604 2.50101 16.0797 3.45966 17.792 5.16681C17.7923 5.16703 17.7925 5.16725 17.7927 5.16747L20.0857 7.46047L21.4999 8.87468L22.9141 7.46047L25.2071 5.16747C25.2075 5.1671 25.2079 5.16673 25.2082 5.16635C26.9205 3.45949 29.2397 2.50101 31.6574 2.50101C34.0736 2.50101 36.3912 3.45821 38.1032 5.16294C39.8007 6.88075 40.7528 9.19852 40.7528 11.6138C40.7528 14.0298 39.8001 16.3483 38.1015 18.0663C38.1004 18.0673 38.0994 18.0684 38.0984 18.0694L21.6002 34.5888C21.5998 34.5892 21.5993 34.5897 21.5989 34.5901C21.5875 34.6011 21.5741 34.6098 21.5595 34.6158L21.5595 34.6158C21.5442 34.622 21.5279 34.6251 21.5115 34.625Z"  />
                    </svg>
                </a>
            </div>
        </div>
    </div>
    <div class="info-movie-wrapper">
        <div class="image-wrapper">
            <div class="image" style="background-image: url('resources/image/<?=$movie['ID']?>.jpg')"> </div>
        </div>
        <div class="info-movie">
            <div class="movie-rating">
                <div class="rectangle-wrapper">
                    <?php for ($i = 1; $i <= 10; $i++){  ?>
                    <div class="rectangle <?php if($i < $movie['RATING']){ echo 'rectangle-active';} ?>"></div>
                    <?php } ?>
                </div>

                <div class="circle"><?= $movie['RATING']?></div>
            </div>
            <div class="about-movie-wrapper">
                <div class="about-movie-title">?? ????????????</div>
                <div class="about-movie">
                    <div class="about-movie--item-wrapper">
                        <div class="director left">????????????????</div>
                        <div class="director right"><?= $movie['NAME']  ?></div>
                    </div>

                    <div class="about-movie--item-wrapper">
                        <div class="release-date left">???????? ????????????</div>
                        <div class="release-date right"><?= $movie['RELEASE_DATE']  ?></div>
                    </div>

                    <div class="about-movie--item-wrapper">
                            <div class="cast left">?? ?????????????? ??????????:</div>

                            <div class="cast right"><?=$movie['actor'] ?></div>
                    </div>
                </div>

            </div>
            <div class="description-wrapper">
                <div class="description-title">????????????????</div>
                <div class="description"><?= $movie['DESCRIPTION']  ?></div>
            </div>
        </div>
    </div>

</div>