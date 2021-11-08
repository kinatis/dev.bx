<?php

require "lib/template-function.php";
require "resources/movies.php";
require "config/config.php";

$templateContent = "";





renderLayout($templateContent, $genres, $sideBarMenu,"favorite");