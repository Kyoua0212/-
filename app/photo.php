<!DOCTYPE html>
<html lang="ja">
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="utf-8">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">  
<body>
    <h1>写真共有</h1>
    <button class="back"><a href="top.php"><i class="fas fa-arrow-left"></i></a></button>
    <?php
$dsn = "mysql:host=localhost; dbname=imagedb; charset=utf8";
$username = "user";
$password = "Ouaia0212";
try {
    $dbh = new PDO($dsn, $username, $password);
    if (isset($_POST['upload'])) {//送信ボタンが押された場合
        $image = uniqid(mt_rand(), true);//ファイル名をユニーク化
        $image .= '.' . substr(strrchr($_FILES['image']['name'], '.'), 1);//アップロードされたファイルの拡張子を取得
        $file_1 = realpath("../");
        //$file_2 = dirname(__FILE__);
        $file = "$file_1/images/$image";
        $isekiname = $_POST['isekiName'];
        $sql = "INSERT INTO name(name,IsekiName) VALUES (:image, :IsekiName)";
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        $stmt->bindValue(':IsekiName', $isekiname, PDO::PARAM_STR); // ②
        if (!empty($_FILES['image']['name'])) {//ファイルが選択されていれば$imageにファイル名を代入
            move_uploaded_file($_FILES['image']['tmp_name'], '/'.$file_1.'/images/'.$image);//imagesディレクトリにファイル保存
            if (exif_imagetype($file)) {//画像ファイルかのチェック
                $message = '画像をアップロードしました';
                $stmt->execute();
            } else {
                $message = '画像ファイルではありません';
            }
        }
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<!--送信ボタンが押された場合-->

    <div class="form">
    <div class="flex">
    <span>遺跡：</span>
    <form method="post" enctype="multipart/form-data">
        <select name="isekiName" class="select">
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

<a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button" data-show-count="false">Tweet</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<div class="line-it-button" data-lang="ja" data-type="share-a" data-env="REAL" data-url="http://localhost/photo.php" data-color="default" data-size="large" data-count="true" data-ver="3" style="display: none;"></div>

<script src="https://www.line-website.com/social-plugins/js/thirdparty/loader.min.js" async="async" defer="defer"></script>

<!-- シェアボタンに変換される -->
<div class="fb-like" data-href="http://syncer.jp" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false"></div>

<!-- [head]内や、[body]の終了直前などに配置 -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.0";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<?php
$dsn = "mysql:host=localhost; dbname=imagedb; charset=utf8";
$username = "user";
$password = "Ouaia0212";
//$id = rand(1, 5);
try {
    $dbh = new PDO($dsn, $username, $password);
    $sql = "SELECT * FROM name ORDER BY id DESC";
    $stmt = $dbh->prepare($sql);
    //$stmt->bindParam(':id', $id,PDO::PARAM_STR);
    $stmt->execute();
    //$image = $stmt->fetch();
} catch (PDOException $e) {
    echo $e->getMessage();
}
?>

<?php while($image = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
<img src="../images/<?php echo $image['name']; ?>">
<?php
}
?>
</body>
</html>