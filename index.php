<?php

require_once('model/model.php');

$rows = findAll();

require_once ('view/indexTemplate.php');