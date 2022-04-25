<?php
include 'translate.html';
?>

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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaWVDymGiP3nTtkqwxbWpvp0pAgrFX2Pg&callback=initMap" async defer></script>


<teble>
<h3>:瑞泉酒造株式会社</h3>
<a href="javascript:void(0)" id="category_折りたたみA" class="Gaiyou" onclick="show('折りたたみA');">スポット概要</a>
<div id="layer_折りたたみA" style="display: none;position:relative;" class="close">
世界遺産として知られる首里城に隣接した酒蔵。見学も可能
泡盛は、米と黒麹菌を原料にした日本国内最古の蒸留酒といわれ、15世紀の琉球王府時代から続く酒造り

<a href="https://www.jalan.net/kankou/spt_guide000000197359/?screenId=OUW1701&influxKbn=0" class="kangei">詳細</a>
</div>
</teble>

<table>
<h3>:首里金城町石畳道</h3>
<a href="javascript:void(0)" id="category_折りたたみB" class="Gaiyou" onclick="show('折りたたみB');">スポット概要</a>
<div id="layer_折りたたみB" style="display: none;position:relative;" class="close">
    1522年から作り始められ、首里城から国場川の真玉橋までの長い道のりとして使われていた。
    現在は沖縄戦で破壊され、200メートルほどしか残っていないが、当時の雰囲気を感じることができる。
    ぜひ、歩いてみて欲しい。
<br>
<a href="https://www.tripadvisor.jp/Attraction_Review-g298224-d1373596-Reviews-Shrikinjocho_Stone_Path_Road-Naha_Okinawa_Prefecture.html" class="kangei">詳細</a>
</div>
</table>

<table>
<h3>:スタジオｄｅ-ｊｉｎ（デージン）石獅子専門店</h3>
<a href="javascript:void(0)" id="category_折りたたみC" class="Gaiyou" onclick="show('折りたたみC');">スポット概要</a>
<div id="layer_折りたたみC" style="display: none;position:relative;" class="close">
    手作りシーサーのギャラリーショップ。暖かい表情をした石獅子を見ることができる。
<a href="http://www.de-jin.com/" class="kangei">詳細</a>
</div>
</table>

</body>
</html>