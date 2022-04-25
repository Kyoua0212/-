<?php
$dsn = "mysql:host=localhost; dbname=imagedb; charset=utf8";
$username = "user";
$password = "Ouaia0212";
$id = rand(1, 5);
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}
    $sql = "SELECT * FROM name WHERE id = :id";
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id', $id);
    $stmt->execute();
    $image = $stmt->fetch();
?>

<h1>画像表示</h1>
<img src="images/<?php echo $image['name']; ?>">
<a href="photo.php">画像アップロード</a>