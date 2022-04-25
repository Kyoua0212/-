<!DOCTYPE html>
<html lang="ja">
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="utf-8">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">  
<body>
    <h1>写真共有</h1>
    <button class="back"><a href="#" onclick="history.back(); return false;"><i class="fas fa-arrow-left"></i></a></button>
    <?php
$dsn = "mysql:host=localhost; dbname=imagedb; charset=utf8";
$username = "user";
$password = "Ouaia0212";
try {
    $dbh = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo $e->getMessage();
}  
    if (isset($_POST['upload'])) {//送信ボタンが押された場合
        $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
        $file = "../images/$image";
        $sql = "INSERT INTO name(name) VALUES (:image)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
            move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $image);//imagesディレクトリにファイル保存
            if (exif_imagetype($file)) {//画像ファイルかのチェック
                $message = '画像をアップロードしました';
                $stmt->execute();
            } else {
                $message = '画像ファイルではありません';
            }
        }
    }
?>


<!--送信ボタンが押された場合-->
<?php if (isset($_POST['upload'])): ?>
    <p><?php echo $message; ?></p>
<?php else: ?>
    <div class="form">
    <div class="flex">
    <span>遺跡：</span>
    <form method="post" enctype="multipart/form-data">
    <select name="isekiname" class="select">
        <option value="首里城">首里城</option>
        <option value="識名園">識名園</option>
        <option value="浦添城跡">浦添城跡</option>
        <option value="今帰仁城跡">今帰仁城跡</option>
        <option value="南山城跡">南山城跡</option>
        <option value="中城城跡">中城城跡</option>
        <option value="勝連城跡">勝連城跡</option>
        <option value="斎場御嶽">斎場御嶽</option>
    </select>
    </div>
        <a>アップロード画像</a>
        <input type="file" name="image">
        <button><input type="submit" name="upload" value="送信"></button>
    </form>
</div>
<?php endif;?>

<?php
$dsn = "mysql:host=localhost; dbname=imagedb; charset=utf8";
$username = "user";
$password = "Ouaia0212";
//$id = rand(1, 5);
try {
    $dbh = new PDO($dsn, $username, $password);
    $sql = "SELECT * FROM name";
    $stmt = $dbh->prepare($sql);
    //$stmt->bindParam(':id', $id,PDO::PARAM_STR);
    $stmt->execute();
    //$image = $stmt->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>
<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<div class="line-it-button" data-lang="ja" data-type="share-a" data-env="REAL" data-url="http://localhost/photo.php" data-color="default" data-size="large" data-count="true" data-ver="3" style="display: none;"></div>
<script src="https://www.line-website.com/social-plugins/js/thirdparty/loader.min.js" async="async" defer="defer"></script>
<h1>画像表示</h1>
<?php while($image = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
<img src="../images/<?php echo $image['name']; ?>">
<?php
}
?>
</body>
</html>