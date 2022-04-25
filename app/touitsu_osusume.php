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
<img src="/app01/images/nakijinjyo.jpeg" width="90vw" height="50vh" alt="">
<img src="/app01/images/nanzanjyo.jpeg" width="90vw" height="50vh" alt="">

</div>
<table><h1>おすすめ関連スポット</h1>
    <button class="back"><a href="#" onclick="history.back(); return false;"><i class="fas fa-arrow-left"></i></a></button>
</table>
<div id="map" style="width:100wh; height: 60vh;"></div>
<script>
    var map;
    var marker = [];
    var infoWindow = [];
  // マーカーに設定するタイトル・緯度・経度・内容
    var markerData = [ {
      title: '首里城',
      lat: 26.217266261174963,
      lng: 127.71959058569529,
      content: '首里城<br><img src="/images/shurijo.png" width="200" hight="150"><br><a href="https://oki-park.jp/shurijo/" target="_blank">公式サイトはコチラ！</a>'
    }, {
      title: '識名園',
      lat: 26.204143469657087,
      lng: 127.71536008384997,
      content: ' 識名園<br><img src="/images/shikinaen.png" width="200" hight="150"><br><a href="https://www.city.naha.okinawa.jp/kankou/bunkazai/shikinaen.html" target="_blank">公式サイトはコチラ！</a>'
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaWVDymGiP3nTtkqwxbWpvp0pAgrFX2Pg&callback=initMap" async defer></script>



<table>
<h3>:今帰仁城跡</h3>
<a href="javascript:void(0)" id="category_折りたたみB" class="Gaiyou" onclick="show('折りたたみB');">スポット概要</a>
<div id="layer_折りたたみB" style="display: none;position:relative;" class="close">
    1579年　尚永王を戴冠する時にきた冊封使が「守礼の邦を称するに相応しい」
    と勅したので「守礼之邦」の額を掲げるようになった。
<br>
<a href="shurijyo_shureimon.html" class="kangei">今帰仁城跡詳細</a>
</div>
</table>

<table>
<h3>:南山城跡</h3>
<a href="javascript:void(0)" id="category_折りたたみC" class="Gaiyou" onclick="show('折りたたみC');">スポット概要</a>
<div id="layer_折りたたみC" style="display: none;position:relative;" class="close">
    国王や聞得大君が行幸のおりに、往路帰路の祈願をしたことから、一般の門中も拝所巡礼の一聖地として参拝した。
    門扉以外は石積みで棟の中央には火炎宝珠、両端に鬼瓦をのせ、その上にシビを飾ってあり、沖縄の石造建築の代表的なもの
    伊是名島のタノカミ御嶽・神名ソノヒヤブに因むものとされている。
<br>
<a href="shurijyo_sonohyan.html" class="kangei">南山城跡詳細</a>
</div>
</table>

 <a href="shurijyo_benzai.html" class="osusume">関連スポット</a>
</body>
</html>