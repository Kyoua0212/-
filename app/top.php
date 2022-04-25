<!DOCTYPE html>
<html lang="ja">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="utf-8">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>琉球遺跡ツアー</title>
<img src="../images/topimage.png">
</head>

<body>
<h1>
    琉球王国にタイムスリップ<br>
    時空を超える旅にお連れします
</h1>
<nav class="menu">
    <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
    <label class="menu-open-button" for="menu-open">
     <span class="lines line-1"></span>
     <span class="lines line-2"></span>
     <span class="lines line-3"></span>
   </label>
 
    <a href="recomend.php" class="menu-item blue"> <i class="far fa-star"></i> </a>
    <a href="courses.php" class="menu-item green"> <i class="fas fa-book"></i> </a>
    <a href="setting.php" class="menu-item red"> <i class="fas fa-cogs"></i> </a>
    <a href="photo.php" class="menu-item purple"> <i class="far fa-images"></i> </a>
 </nav>
 <a href ="map.php"><img src="../images/shurijo.png" class="shurijo-button" ontouchstart=""></a><br>
 <a href ="map01.php"><img src="../images/shikinaen.png" class="shurijo-button" ontouchstart=""></a><br>
 <?php
$dsn = "mysql:host=localhost; dbname=imagedb; charset=utf8";
$username = "user";
$password = "Ouaia0212";
//$id = rand(1, 5);
try {
    $dbh = new PDO($dsn, $username, $password);
    $sql = "SELECT * FROM `name`JOIN IsekiData ON name.IsekiName = IsekiData.IsekiName ORDER BY RAND()";
    $stmt = $dbh->prepare($sql);
    //$stmt->bindParam(':id', $id,PDO::PARAM_STR);
    $stmt->execute();
    //$image = $stmt->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<?php while($image = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
<a href="<?php echo $image['url']?>"><img src="../images/<?php echo $image['name']; ?>"></a>

<?php
}
?>

</main>
</body>
</html>