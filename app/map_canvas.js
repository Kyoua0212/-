
  var map;
  var marker = [];
  var infoWindow = [];
  // マーカーに設定するタイトル・緯度・経度・内容
  var markerData = [ {
      title: '首里城',
      lat: 26.217266261174963,
      lng: 127.71959058569529,
      content: '首里城<br><img src="/images/shurijo.png" width="200"><br><a href="https://oki-park.jp/shurijo/" target="_blank">公式サイトはコチラ！</a>'
    }, {
      title: '識名園',
      lat: 26.204143469657087,
      lng: 127.71536008384997,
      content: ' 識名園<br><img src="/images/shikinaen.png" width="200"><br><a href="https://www.city.naha.okinawa.jp/kankou/bunkazai/shikinaen.html" target="_blank">公式サイトはコチラ！</a>'
    } ];
   
 // 地図の作成
  function initMap() {
    // マップの生成
    var map = new google.maps.Map(document.getElementById('map_canvas'), {
      center: new google.maps.LatLng(26.217266261174963,127.71959058569529), // マップの中心
      zoom: 18, // ズームレベル
      mapTypeId: google.maps.MapTypeId.ROADMAP // マップの表示種別選択 (ROADMAP・SATELLITE・TERRAIN・HYBRIDから選択)
    });

    // マーカー毎の処理
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

    var request = {
      origin: new google.maps.LatLng(26.217266261174963,127.71959058569529), // 出発地
      destination: new google.maps.LatLng(26.204143469657087,127.71536008384997), // 目的地
      travelMode: google.maps.DirectionsTravelMode.WALKING, // 交通手段(歩行。DRIVINGの場合は車)
    };
    
    var d = new google.maps.DirectionsService(); // ルート検索オブジェクト
    var r = new google.maps.DirectionsRenderer({ // ルート描画オブジェクト
        map: map_canvas, // 描画先の地図
        preserveViewport: true, // 描画後に中心点をずらさない
    });
    // ルート検索
    d.route(request, function(result, status){
        // OKの場合ルート描画
        if (status == google.maps.DirectionsStatus.OK) {
            r.setDirections(result);
        }
    });
  }
   
  // マーカーにクリックイベントを追加
  function markerEvent(i) {
      marker[i].addListener('click', function() {
        // 吹き出しの表示
        infoWindow[i].open(map, marker[i]);
    });
  }

