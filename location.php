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
                        <span class="description">010-4365-3188</span>
                    </li>
                    <li>
                        <span class="day">영업시간</span>
                        <span class="description">평일 : 10:00 - 18:00 (수요일 휴무)<br />
                        법정공휴일,토,일 : 06:00~18:00</span>
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
                    <li>남원주 초교 맞은편 연화산(중국집) 골목라인.</li>
                    <li>근처 추차 가능.</li>
                </ul>
            </div>

            <div id="map" style="width:100%;height:400px;margin:2rem 0;border-radius:12px;"></div>

            <div class="rental-message">
                <p>토, 일, 휴일은 통화가 어려울 수 있으니 상담전화는 평일에 주시면 좋아요^^</p>
            </div>
        </div>
    </div>
</section>

<!-- 카카오맵 API -->
<script src="https://dapi.kakao.com/v2/maps/sdk.js?appkey=04bab7e723e1c9796923297659a59518&libraries=services"></script>
<script>
function initMap() {
    try {
        console.log('지도 초기화 시작...');
        
        var mapContainer = document.getElementById('map');
        if (!mapContainer) {
            console.error('지도 컨테이너를 찾을 수 없습니다.');
            return;
        }
        
        var mapOption = {
            center: new kakao.maps.LatLng(37.3512, 127.9397),
            level: 3
        };

        var map = new kakao.maps.Map(mapContainer, mapOption);
        console.log('지도 생성 성공');

        // 마커 생성
        var marker = new kakao.maps.Marker({
            position: new kakao.maps.LatLng(37.3512, 127.9397)
        });
        marker.setMap(map);

        // 인포윈도우 생성
        var infowindow = new kakao.maps.InfoWindow({
            content: '<div style="padding:10px;font-size:14px;text-align:center;width:150px;">' +
                    '<strong>브러쉬메이크업</strong><br>' +
                    '<span style="font-size:12px;color:#666;margin-top:5px;display:block;">원주시 구곡길 34</span>' +
                    '</div>'
        });
        infowindow.open(map, marker);

        // 주소-좌표 변환 객체 생성
        var geocoder = new kakao.maps.services.Geocoder();
        
        // 주소로 좌표 검색
        geocoder.addressSearch('강원도 원주시 구곡길 34', function(result, status) {
            if (status === kakao.maps.services.Status.OK) {
                var coords = new kakao.maps.LatLng(result[0].y, result[0].x);
                
                // 지도 중심 이동
                map.setCenter(coords);
                
                // 마커 위치 이동
                marker.setPosition(coords);
                
                // 인포윈도우 위치 이동
                infowindow.open(map, marker);
            }
        });

    } catch (error) {
        console.error('지도 초기화 중 오류 발생:', error);
    }
}

// DOM이 완전히 로드된 후 지도 초기화
document.addEventListener('DOMContentLoaded', initMap);
</script>

<style>
#map {
    width: 100%;
    height: 400px;
    margin: 2rem 0;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    position: relative;
    z-index: 1;
}
</style>

<?php include 'includes/footer.php'; ?> 