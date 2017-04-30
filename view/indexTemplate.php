<?php

foreach ($rows as $el) {
    echo $el['name'].' <a href="edit.php?id='.$el['id'].'">Edit</a>'.' <a href="delete.php?id='.$el['id'].'">Delete</a><br>';
}