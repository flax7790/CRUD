<?php

echo "Hello, World!";

?>

<form method="post" action="index.php">
    <input type="text" placeholder="name" name="name">
    <br>
    <input type="text" placeholder="description" name="description">
    <br>
    <input type="text" placeholder="created_at" name="created_at">
    <br>
    <input type="submit">
</form>

<?php
$pdo_conn = new PDO("mysql:host=127.0.0.1; dbname=CRUD", 'root', 'ryabus');

if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['created_at'])) {
    $sql = 'INSERT INTO article (name, description, created_at) VALUE (:name, :description, :created_at)';
    $statement = $pdo_conn->prepare($sql);
    $statement->bindValue(':name', $_POST['name']);
    $statement->bindValue(':description', $_POST['description']);
    $statement->bindValue(':created_at', $_POST['created_at']);

    var_dump($statement->execute());
    //var_dump($statement->errorInfo());
}

$sql = 'SELECT * FROM article ORDER BY created_at';

$statement = $pdo_conn->prepare($sql);
$statement->execute();
$articles = $statement->fetchAll();
foreach ($articles as $row) {
    echo '<br>';
    print $row['name'] . "\t";
    print $row['description'] . "\t";
    print $row['created_at'] . "\n";
}