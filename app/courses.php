<?php
include 'translate.html';
?>

<h1>コース一覧</h1>
<button class="back"><a href="top.php"><i class="fas fa-arrow-left"></i></a></button>


<?php
$dsn = "mysql:host=localhost; dbname=imagedb; charset=utf8";
$username = "user";
$password = "Ouaia0212";

try {
    $dbh = new PDO($dsn, $username, $password);
    $sql = "SELECT * FROM IsekiData";
    $stmt = $dbh->prepare($sql);
    //$stmt->bindParam(':id', $id,PDO::PARAM_STR);
    $stmt->execute();
    //$image = $stmt->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
<?php while($Iseki = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
<p><a href="<?php echo $Iseki['url']; ?>" class="Itiran"><?php echo $Iseki['IsekiName']; ?></a></p><br>
<?php
}
?>

</body>