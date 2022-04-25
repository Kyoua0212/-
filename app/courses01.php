<?php
include 'translate.html';
?>

<h1>コース一覧</h1>
<button class="back"><a href="top.php"><i class="fas fa-arrow-left"></i></a></button>

<p>遺跡の名前：<form action="" method="post"></p>
<input type="search" name="search" placeholder="キーワードを入力" value="
<?php
    if (!empty($_POST['search'])) {
        echo $_POST['search'];
    }
?>">
<input type="submit" name="submit" value="検索">
</form>

<?php
$dsn = "mysql:host=localhost; dbname=imagedb";
$user= "user";
$password = "Ouaia0212";

try {
    if (!empty($_POST['search'])) { 
?>
<?php
        $dbh = new PDO($db, $user, $password);
        $stm = $dbh->prepare("SELECT * FROM IsekiData WHERE IsekiName LIKE :iseki_name");
        $stm->bindValue(":iseki_name", '%' . addcslashes($_POST['search'], '\_%') . '%');
        $stm->execute();
        if ($stm->rowCount()) {
?>
<table border='1'>
<tr>
<th>id</th>
<th>遺跡名</th>
<th>リンク</th>
</tr>
<?php
           foreach ($stm as $value) {
            echo '<tr>';
            echo '<td>' . $value['id'] . '</td>';
            echo '<td>' . $value['IsekiName'] . '</td>';
            echo '<td>' . $value['url'] . '</td>';
            echo '<tr>';
        }
        }else {
            echo '該当する遺跡コースがありません';
        }
    } else {
        echo '文字を入力してください';
    }
} catch (PDOException $e) {
    echo 'エラーです!';
}
?>



</body>