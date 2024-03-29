// googleMapsAPIを持ってくるときに,callback=initMapと記述しているため、initMap関数を作成
function initMap() {
    map = document.getElementById("map");
    // 緯度は35.6585769,経度は139.7454506
    let tokyoTower = {
        lat: 35.6585769, lng: 139.7454506
    };
    // オプションを設定
    opt = {
        zoom: 13, //地図の縮尺を指定
        center: tokyoTower, //センターを東京タワーに指定
    };

    // 地図のインスタンスを作成します。第一引数にはマップを描画する領域、第二引数にはオプションを指定
    mapObj = new google.maps.Map(map, opt);

    marker = new google.maps.Marker({
        // ピンを差す位置を決めます。
        position: tokyoTower,
        // ピンを差すマップを決めます。
        map: mapObj,
        // ホバーしたときに「tokyotower」と表示されるようにします。
        title: 'tokyotower',
    });
}