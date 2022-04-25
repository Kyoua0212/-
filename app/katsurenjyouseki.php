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
<img src="/images/116339024261b590b4838bd5.12608644.jpeg" width="90vw" height="50vh" alt="">
<img src="/images/127018493061b5875dc88cd6.32739996.jpeg" width="90vw" height="50vh" alt="">
<img src="/images/72899726361b590336d0842.20584919.jpeg" width="90vw" height="50vh" alt="">
<img src="/images/185842935661b6aced8456b9.22249105.jpeg" width="90vw" height="50vh" alt="">
</div>
<table><h1>浦添城跡</h1>
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


<teble>
<h3>:歓会門</h3>
<a href="javascript:void(0)" id="category_折りたたみA" class="Gaiyou" onclick="show('折りたたみA');">スポット概要</a>
<div id="layer_折りたたみA" style="display: none;position:relative;" class="close">
    :昭和49年日本復帰記念事業として復元された。首里城の西側にあり、正門である。
    あまえ御門（ウジョウ）とも呼ばれ、あまえは喜びという意味の古語
    通用門の北側の久慶門、東南側の継世門
<br>
<a href="shurijyo_kankaimon.html" class="kangei">詳細</a>
</div>
</teble>

<table>
<h3>:守礼の門</h3>
<a href="javascript:void(0)" id="category_折りたたみB" class="Gaiyou" onclick="show('折りたたみB');">スポット概要</a>
<div id="layer_折りたたみB" style="display: none;position:relative;" class="close">
    1579年　尚永王を戴冠する時にきた冊封使が「守礼の邦を称するに相応しい」
    と勅したので「守礼之邦」の額を掲げるようになった。
<br>
<a href="shurijyo_shureimon.html" class="kangei">詳細</a>
</div>
</table>

<table>
<h3>:園比屋武御嶽石門</h3>
<a href="javascript:void(0)" id="category_折りたたみC" class="Gaiyou" onclick="show('折りたたみC');">スポット概要</a>
<div id="layer_折りたたみC" style="display: none;position:relative;" class="close">
    国王や聞得大君が行幸のおりに、往路帰路の祈願をしたことから、一般の門中も拝所巡礼の一聖地として参拝した。
    門扉以外は石積みで棟の中央には火炎宝珠、両端に鬼瓦をのせ、その上にシビを飾ってあり、沖縄の石造建築の代表的なもの
    伊是名島のタノカミ御嶽・神名ソノヒヤブに因むものとされている。
<br>
<a href="shurijyo_sonohyan.html" class="kangei">詳細</a>
</div>
</table>

<table>
<h3>:旧円覚寺総門、放生橋</h3>
<a href="javascript:void(0)" id="category_折りたたみD" class="Gaiyou" onclick="show('折りたたみD');">スポット概要</a>
<div id="layer_折りたたみD" style="display: none;position:relative;" class="close">
    尚真王が尚円の霊を祭るために1495年に創建した
    以後、尚円王朝の菩提寺となった
    沖縄臨済宗の総本山であり、戦前は門の左右に仁王像があった。
    昭和8年には国宝に指定された。
    総門と山門の間にある放生池にかかる橋
<br>
<a href="shurijyo_enkakuji.html" class="kangei">詳細</a>
</div>
</table>

<table>
<h3>:弁財天堂</h3>
<a href="javascript:void(0)" id="category_折りたたみE" class="Gaiyou" onclick="show('折りたたみE');">スポット概要</a>
<div id="layer_折りたたみE" style="display: none;position:relative;" class="close">
    1467年　李朝鮮王は尚徳王からオウムと孔雀をもらい、その返礼に大蔵経を贈った。
    尚真王は円覚寺の向かいに円鑑池をつくらせ、その池の中に経堂をたててその経典を納めた1502年
    その架け橋として観蓮橋を立てた。その後薩摩軍の侵攻により、堂は破壊され、経典も散失した
    尚豊王のときに堂は修復し、円覚寺にあった弁財天の木造を移し、架け橋は天女橋と呼ばれた
    その後　像は破損、薩摩より新しい像を勧請したが1869年に火災で消失、その後再建されたが沖縄戦でまたも破壊
    昭和44年に堂と橋は復旧したが、弁財天女像は今はなくなってしまった。トラブル続きの弁財天堂
<br>
<a href="shurijyo_benzai.html" class="kangei">詳細</a>
</div>
</table>

 <a href="shurijyo_benzai.html" class="osusume">関連スポット</a>
</body>
</html>