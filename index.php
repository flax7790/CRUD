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

if (isset($_POST['name']) && isset($_POST['description']) && isset($_POST['created_at'])) {
    $pdo_conn = new PDO("mysql:host=127.0.0.1; dbname=CRUD", 'root', 'ryabus');
    $sql = 'INSERT INTO article (name, description, created_at) VALUE (:name, :description, :created_at)';
    $statement = $pdo_conn->prepare($sql);
    $statement->bindValue(':name', $_POST['name']);
    $statement->bindValue(':description', $_POST['description']);
    $statement->bindValue(':created_at', $_POST['created_at']);

    var_dump($statement->execute());
    var_dump($statement->errorInfo());
}