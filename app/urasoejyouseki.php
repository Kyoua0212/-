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
<img src="/app01/images/urasoejyouseki.jpeg" width="90vw" height="50vh" alt="">

</div>
<table><h1>浦添大公園</h1>
    <button class="back"><a href="#" onclick="history.back(); return false;"><i class="fas fa-arrow-left"></i></a></button>
</table>
<div id="map" style="width:100wh; height: 60vh;"></div>
<script>
    var map;
    var marker = [];
    var infoWindow = [];
  // マーカーに設定するタイトル・緯度・経度・内容
    var markerData = [ {
        title: '浦添城跡',
      lat: 26.24741875193904, 
      lng: 127.73172727414455,
      content: '浦添城跡<br><img src="/app01/images/urasoejyouseki.jpeg" width="200" hight="150"><br><a href="https://www.urasoedaipark-osi.jp/history.php" target="_blank">公式サイトはコチラ！</a>'
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
        origin: new google.maps.LatLng(26.217266261174963,127.71959058569529), // 出発地
        destination: new google.maps.LatLng(26.204143469657087,127.71536008384997), // 目的地
        travelMode: google.maps.DirectionsTravelMode.DRIVING, // 交通手段(歩行。DRIVINGの場合は車
    };

    // マップの生成
    var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(26.24741875193904, 127.73172727414455), // マップの中心
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaWVDymGiP3nTtkqwxbWpvp0pAgrFX2Pg&callback=initMap" async defer></script>


<teble>
<h3>:浦添城跡</h3>
<a href="javascript:void(0)" id="category_折りたたみA" class="Gaiyou" onclick="show('折りたたみA');">詳細</a>
<div id="layer_折りたたみA" style="display: none;position:relative;" class="close">
    :浦添城は、12世紀初頭、浦添一帯を統治していた舜天王の居城となったのがその始まりで、
    その後、舜天王統、英祖王統、察度王統と受け継がれ、200年余りにわたり琉球王国の歴史の舞台となった。

</div>
</teble>

<h3>:浦添ようどれ</h3>
<a href="javascript:void(0)" id="category_折りたたみB" class="Gaiyou" onclick="show('折りたたみB');">詳細</a>
<div id="layer_折りたたみB" style="display: none;position:relative;" class="close">
    :英祖王と尚寧王が眠る、浦添城跡北側中腹に岩陰を利用して作られた墓を浦添ようどれと呼ばれている。
墓室内の石厨子は、英祖王の在位中に伝来した仏教文化の影響を色濃く残っている。<br>
    <a href="https://www.city.urasoe.lg.jp/article?articleId=609e78e23d59ae2434bfe4c6">浦添ようどれ館</a>
</div>
</teble>

<h3>:伊波普猷の墓</h3>
<a href="javascript:void(0)" id="category_折りたたみC" class="Gaiyou" onclick="show('折りたたみC');"> 詳細</a>
<div id="layer_折りたたみC" style="display: none;position:relative;" class="close">
    :昭和49年日本復帰記念事業として復元された。首里城の西側にあり、正門である。
    あまえ御門（ウジョウ）とも呼ばれ、あまえは喜びという意味の古語
    通用門の北側の久慶門、東南側の継世門
</div>
</teble>

</body>
</html>