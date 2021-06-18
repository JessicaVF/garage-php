<?php

require_once "core/database.php";
require_once "core/utils.php";
require_once "core/model/Garage.php";
$model = new Garage();
$garages =$model->findAll();
$titreDeLaPage = "Garages";
render("garages/garages", compact('garages', 'titreDeLaPage'));

