<?php
include 'translate.html';
?>

<script type="text/javascript">
        $(document).ready(function(){
            $('.slider').bxSlider({
                auto: true,
                pause: 5000,
            });
        });
</script>
    </head>
<body>
<div class="slider">
<img src="../images/sougenji.jpeg" width="90vw" height="50vh" alt="">
<img src="../images/shikinaen01.jpeg" width="90vw" height="50vh" alt="">

</div>
<table><h1>中国からの使者・冊封使の軌跡を辿る</h1>
    <button class="back"><a href="#" onclick="history.back(); return false;"><i class="fas fa-arrow-left"></i></a></button>
</table>
<div id="map" style="width:100wh; height: 60vh;"></div>
<script>
    var map;
    var marker = [];
    var infoWindow = [];
  // マーカーに設定するタイトル・緯度・経度・内容
    var markerData = [ {
      title: '旧祟元寺石門',
      lat: 26.220501956152898, 
      lng: 127.69062015460537,
      content: '旧祟元寺石門<br><img src="/images/sougenji.jpeg" width="200" hight="150"><br><a href="https://oki-park.jp/shurijo/" target="_blank">公式サイトはコチラ！</a>'
    }, {
      title: '識名園',
      lat: 26.204143469657087,
      lng: 127.71536008384997,
      content: ' 識名園<br><img src="/images/shikinaen01.jpeg" width="200" hight="150"><br><a href="https://www.city.naha.okinawa.jp/kankou/bunkazai/shikinaen.html" target="_blank">公式サイトはコチラ！</a>'
    } ];

    function markerEvent(i) {
        marker[i].addListener('click', function() {
          // 吹き出しの表示
          infoWindow[i].open(map, marker[i]);
      });
    }
</script>
<script>
function initMap() {
    // ルート検索の条件
    var request = {
        origin: new google.maps.LatLng(26.220501956152898,127.69062015460537), // 出発地
        destination: new google.maps.LatLng(26.204143469657087,127.71536008384997), // 目的地
        travelMode: google.maps.DirectionsTravelMode.DRIVING, // 交通手段(歩行。DRIVINGの場合は車
    };

    // マップの生成
    var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(26.204143469657087,127.71536008384997), // マップの中心
        zoom: 15 // ズームレベル
    });

    var d = new google.maps.DirectionsService(); // ルート検索オブジェクト
    var r = new google.maps.DirectionsRenderer({ // ルート描画オブジェクト
        map: map, // 描画先の地図
        preserveViewport: true, // 描画後に中心点をずらさない
    });
    // ルート検索
    d.route(request, function(result, status){
        // OKの場合ルート描画
        if (status == google.maps.DirectionsStatus.OK) {
            r.setDirections(result);
        }
    });

    for (var i = 0; i < markerData.length; i++) {
      // 緯度経度のデータを作成
      markerLatLng = new google.maps.LatLng({lat: markerData[i]['lat'], lng: markerData[i]['lng']});
      marker[i] = new google.maps.Marker({
        position: markerLatLng, // マーカーを立てる位置を指定
        map: map, // マーカーを立てる地図を指定
        title: markerData[i]['title'] // ツールヒント
      });
      
      // 吹き出しの設定
      infoWindow[i] = new google.maps.InfoWindow({
        // 吹き出しに表示する内容を設定する
        content: markerData[i]['content']
      });
      
      // マーカーにクリックイベントを追加
      markerEvent(i);
    }

}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCb9JAh36zaAehzX1Zo7_xZAH3MVRJoCEY&callback=initMap" async defer></script>


<teble>
<h3>:旧祟元寺石門</h3>
<a href="javascript:void(0)" id="category_折りたたみA" class="Gaiyou" onclick="show('折りたたみA');">スポット概要</a>
<div id="layer_折りたたみA" style="display: none;position:relative;" class="close">
    祟元寺は歴代の国王を祭る国廟（廟とは死者、先祖の霊を祭るところ）であった。
    冊封使は琉球に来たときは、国王に会う前に歴代の王を祭る儀式を行っていたと言われている。
<br>
<a href="shurijyo_kankaimon.php" class="kangei">詳細</a>
</div>
</teble>

<table>
<h3>:御茶屋御殿</h3>
<a href="javascript:void(0)" id="category_折りたたみB" class="Gaiyou" onclick="show('折りたたみB');">スポット概要</a>
<div id="layer_折りたたみB" style="display: none;position:relative;" class="close">
    1579年　尚永王を戴冠する時にきた冊封使が「守礼の邦を称するに相応しい」
    と勅したので「守礼之邦」の額を掲げるようになった。
<br>
<a href="shurijyo_shureimon.php" class="kangei">詳細</a>
</div>
</table>

<table>
<h3>:識名園</h3>
<a href="javascript:void(0)" id="category_折りたたみC" class="Gaiyou" onclick="show('折りたたみC');">スポット概要</a>
<div id="layer_折りたたみC" style="display: none;position:relative;" class="close">
    1799年に作られた琉球王家最大の別邸である。首里城の南側にあるので「南苑」とも呼ばれ、中国から訪れた冊封使のおもてなしをするために使われていた。
<br>
<a href="shurijyo_sonohyan.html" class="kangei">詳細</a>
</div>
</table>

<a href="01osusume.php" class="osusume">関連スポット</a>
</body>
</html>