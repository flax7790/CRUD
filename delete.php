<?php

require_once('model/model.php');

$id = $_GET['id'];
$row = deleteById($id);

header('Location: index.php');
