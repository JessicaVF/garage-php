<?php

require_once "core/database.php";
require_once "core/utils.php";
$garages= findAllGarages();
$titreDeLaPage = "Garages";
render("garages/garages", compact('garages', 'titreDeLaPage'));

