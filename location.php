<?php include 'includes/header.php'; ?>

<section class="rental">
    <div class="container">
        <h1 class="page-title">오시는 길</h1>
        
        <div class="rental-content">
            <div class="rental-intro">
                <h2>위치 안내</h2>
                <p>브러쉬메이크업의 위치와 찾아오시는 방법을 안내해 드립니다.</p>
            </div>

            <div class="rental-process">
                <h2>주소 및 연락처</h2>
                <ul class="schedule-list">
                    <li>
                        <span class="day">주소</span>
                        <span class="description">강원도 원주시 구곡길 34</span>
                    </li>
                    <li>
                        <span class="day">전화</span>
                        <span class="description">033-766-3187</span>
                    </li>
                    <li>
                        <span class="day">영업시간</span>
                        <span class="description">10:00 - 19:00 (월요일 휴무)</span>
                    </li>
                </ul>
            </div>
            <div class="location-map">
                <h2>약도</h2>
                <div class="map-image-container">
                    <img src="/images/map.jpg" alt="브러쉬메이크업 약도" class="map-image" style="width: 100%; max-width: 800px; border-radius: 12px; margin: 2rem auto; display: block; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
                </div>
            </div>

            <div class="rental-notice">
                <h2>찾아오시는 길</h2>
                <ul class="notice-list">
                    <li>원주역에서 도보 5분 거리</li>
                    <li>원주시외버스터미널에서 도보 10분 거리</li>
                    <li>주차 공간이 제한적이오니 가급적 대중교통 이용 부탁드립니다.</li>
                    <li>주차가 필요한 경우 미리 말씀해 주시기 바랍니다.</li>
                </ul>
            </div>

            <div id="map" style="width:100%;height:400px;margin:2rem 0;border-radius:12px;"></div>

            <div class="rental-message">
                <p>편안한 방문을 위해 미리 연락 주시면 더 자세한 안내를 도와드리겠습니다.</p>
            </div>
        </div>
    </div>
</section>

<!-- 카카오맵 API -->
<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=04bab7e723e1c9796923297659a59518"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var container = document.getElementById('map');
    var options = {
        center: new kakao.maps.LatLng(37.3512, 127.9397), // 원주시 구곡길 34 좌표
        level: 3
    };

    var map = new kakao.maps.Map(container, options);

    // 마커 생성
    var markerPosition = new kakao.maps.LatLng(37.3512, 127.9397);
    var marker = new kakao.maps.Marker({
        position: markerPosition
    });
    marker.setMap(map);

    // 인포윈도우 생성
    var iwContent = '<div style="padding:10px;font-size:14px;text-align:center;width:150px;">' +
                   '<strong>브러쉬메이크업</strong><br>' +
                   '<span style="font-size:12px;color:#666;margin-top:5px;display:block;">원주시 구곡길 34</span>' +
                   '</div>';
    var infowindow = new kakao.maps.InfoWindow({
        content: iwContent,
        removable: true
    });
    infowindow.open(map, marker);

    // 지도 컨트롤러 추가
    var zoomControl = new kakao.maps.ZoomControl();
    map.addControl(zoomControl, kakao.maps.ControlPosition.RIGHT);

    // 지도 타입 컨트롤러 추가
    var mapTypeControl = new kakao.maps.MapTypeControl();
    map.addControl(mapTypeControl, kakao.maps.ControlPosition.TOPRIGHT);
});
</script>

<?php include 'includes/footer.php'; ?> 