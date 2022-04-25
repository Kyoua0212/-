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
<table><h1>三山統一の軌跡を追え！</h1>
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
      content: '浦添城跡<br><img src="/app01/images/urasoejyouseki.jpeg" width="200" hight="150"><br><a href="https://oki-park.jp/shurijo/" target="_blank">公式サイトはコチラ！</a>'
    }, {
      title: '南山城跡',
      lat: 26.128591470936062, 
      lng: 127.68899998384697,
      content: '南山城跡<br><img src="/app01/images/nanzanjyo.jpeg" width="200" hight="150"><br><a href="https://www.city.naha.okinawa.jp/kankou/bunkazai/shikinaen.html" target="_blank">公式サイトはコチラ！</a>'
    },{
      title: '今帰仁城跡',
      lat: 26.691490165537548, 
      lng: 127.92903332621945,
      content: '今帰仁城跡<br><img src="/app01/images/nakijinjyo.jpeg" width="200" hight="150"><br><a href="https://www.city.naha.okinawa.jp/kankou/bunkazai/shikinaen.html" target="_blank">公式サイトはコチラ！</a>'
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
        origin: new google.maps.LatLng(26.69141348110486, 127.92908697039759), // 出発地
        destination: new google.maps.LatLng(26.128591470936062, 127.68899998384697), // 目的地
        waypoints: [ // 経由地点(指定なしでも可)
            { location: new google.maps.LatLng(26.247535127514027, 127.7317508658255) },
        ],
        travelMode: google.maps.DirectionsTravelMode.DRIVING, // 交通手段(歩行。DRIVINGの場合は車
    };

    // マップの生成
    var map = new google.maps.Map(document.getElementById("map"), {
        center: new google.maps.LatLng(26.247535127514027, 127.7317508658255), // マップの中心
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
<h3>:なぜ三山時代が始まったのか</h3>
<a href="javascript:void(0)" id="category_折りたたみA" class="Gaiyou" onclick="show('折りたたみA');">詳細</a>
<div id="layer_折りたたみA" style="display: none;position:relative;" class="close">
    ：14世紀初頭までは英祖という王が沖縄を治めていた。しかし、王の統制力が弱まり、沖縄は三つの勢力に分かれてしまう。
    三つの勢力がそれぞれ「北山」、「中山」、「南山」であり、そこから三山時代が始まる。かの有名な「尚巴志」はどのように三山を統一して行ったのか追って見てみよう。

</div>
</teble>

<teble>
<h3>:浦添城跡</h3>
<a href="javascript:void(0)" id="category_折りたたみB" class="Gaiyou" onclick="show('折りたたみB');">スポット概要</a>
<div id="layer_折りたたみB" style="display: none;position:relative;" class="close">
    ：もともと英祖王が王政をしていた場所が浦添城である。三山時代に入ると英祖王から察度が王位引き継いだ。
    尚巴志はまず、三山統一の野望を叶えるため財力を蓄えなければいけなかった。
    そのため南部の与那原、馬天などを拠点に海外と貿易し、軍資金を蓄えた。
    三山統一の足掛かりとしてまず、中山である浦添城を父の思紹（ししょう）と攻め落とした。
    その後、思紹を中山王に即位させ、尚巴志は次なる城を攻め落とすための準備を始めた
    
<br>
<a href="urasoejyouseki.php" class="kangei">浦添城跡詳細</a>
</div>
</teble>

<table>
<h3>:今帰仁城跡</h3>
<a href="javascript:void(0)" id="category_折りたたみC" class="Gaiyou" onclick="show('折りたたみC');">スポット概要</a>
<div id="layer_折りたたみC" style="display: none;position:relative;" class="close">
    1579年　尚永王を戴冠する時にきた冊封使が「守礼の邦を称するに相応しい」
    と勅したので「守礼之邦」の額を掲げるようになった。
<br>
<a href="nakijinnjyouseki.php" class="kangei">今帰仁城跡詳細</a>
</div>
</table>

<table>
<h3>:南山城跡</h3>
<a href="javascript:void(0)" id="category_折りたたみD" class="Gaiyou" onclick="show('折りたたみD');">スポット概要</a>
<div id="layer_折りたたみD" style="display: none;position:relative;" class="close">
    国王や聞得大君が行幸のおりに、往路帰路の祈願をしたことから、一般の門中も拝所巡礼の一聖地として参拝した。
    門扉以外は石積みで棟の中央には火炎宝珠、両端に鬼瓦をのせ、その上にシビを飾ってあり、沖縄の石造建築の代表的なもの
    伊是名島のタノカミ御嶽・神名ソノヒヤブに因むものとされている。
<br>
<a href="nanzanjyouseki.php" class="kangei">南山城跡詳細</a>
</div>
</table>

 <a href="touitsu_osusume.php" class="osusume">関連スポット</a>
</body>
</html>