<?php
/** @var string $content */
/** @var array $genres */
/** @var string $currentPage */
/** @var array $config */
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="resources/styles/reset.css" rel="stylesheet" type="text/css">
    <link href="resources/styles/style.css" rel="stylesheet" type="text/css">

</head>
<body>
    <div class="wrapper">
        <div class="sidebar">
            <div class="wrapper-logo">
                <a href="index.php">
                    <div class="ellipse-wrapper">
                        <div class="ellipse">

                        </div>
                    </div>
                    <div class="logo">bitflix</div>
                </a>
            </div>


            <div class="menu">
                <ul>
                    <li class="menu-item menu-item <?= $currentPage === 'index' ? " menu-item--active": "" ?> ">
                        <a href="index.php"><?=$config['index'] ?></a>
                    </li>

                    <?php foreach ($genres as $id =>$genre):?>
                    <li class="menu-item <?= $currentPage === $genre['CODE'] ? " menu-item--active": "" ?>">
                        <a href="index.php?genre=<?=$genre['CODE']?>"><?=$genre['NAME'] ?></a>
                    </li>
                    <?php endforeach;  ?>


                    <li class="menu-item <?= $currentPage === 'favorite' ? " menu-item--active": "" ?> ">
                        <a href="favorite.php"><?=$config['favorite'] ?></a>
                    </li>
                </ul>

            </div>


        </div>


        <div class="container">

            <div class="header">
                <div class="wrapper-search--bar">
                    <div class="search-icon">

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11 19C15.4183 19 19 15.4183 19 11C19 6.58172 15.4183 3 11 3C6.58172 3 3 6.58172 3 11C3 15.4183 6.58172 19 11 19Z" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21 21L16.65 16.65" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>


                    </div>
                    <form method="get" action="index.php">
                        <input type="text" class="search-bar" name="search" placeholder="?????????? ???? ????????????????...">


                </div>
                <div class="search-btn--wrapper">

                    <input type="submit" value="????????????">
                </div>
                </form>
                <div class="addFilm-btn--wrapper">
                    <a href="add-film.php"> ???????????????? ?????????? </a>
                </div>

            </div>
            <div class="content"><?=  $content ?></div>

    </div>
</body>
</html>