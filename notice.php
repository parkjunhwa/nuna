<?php
// 공지사항 데이터
$notices = [
    [
        'id' => 1,
        'title' => '2024년 봄 시즌 메이크업 프로모션 안내',
        'date' => '2024-03-15',
        'content' => '봄 시즌을 맞이하여 웨딩 메이크업 20% 할인 프로모션을 진행합니다. 자세한 내용은 전화로 문의해 주세요.',
        'image' => '/images/notice/notice1.png'
    ],
    [
        'id' => 2,
        'title' => '새로운 드레스 컬렉션 입고 안내',
        'date' => '2024-03-10',
        'content' => '2024년 봄 시즌 새로운 드레스 컬렉션이 입고되었습니다. 예약은 전화로 문의해 주세요.',
        'image' => '/images/notice/notice2.png'
    ],
];

include 'includes/header.php';
?>

<section class="rental">
    <div class="container">
        <h1 class="page-title">공지사항</h1>
        
        <div class="rental-content">
            <div class="rental-intro">
                <h2>브러쉬메이크업 소식</h2>
                <p>브러쉬메이크업의 최신 소식과 이벤트를 확인하세요.</p>
            </div>

            <div class="thumbnail-grid notice-grid">
                <?php foreach ($notices as $notice): ?>
                <div class="thumbnail-item" data-id="<?php echo $notice['id']; ?>">
                    <img src="<?php echo $notice['image']; ?>" alt="<?php echo $notice['title']; ?>">
                    <div class="thumbnail-overlay">
                        <h3><?php echo $notice['title']; ?></h3>
                        <p class="notice-date"><?php echo $notice['date']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="rental-message">
                <p>더 자세한 내용은 전화로 문의해 주세요.</p>
            </div>
        </div>
    </div>
</section>

<!-- 공지사항 상세 팝업 -->
<div class="popup notice-popup">
    <button class="popup-close">&times;</button>
    <div class="popup-content">
        <div class="notice-detail">
            <div class="notice-detail-image">
                <img src="" alt="">
            </div>
            <h2 class="notice-detail-title"></h2>
            <p class="notice-detail-date"></p>
            <div class="notice-detail-content"></div>
        </div>
    </div>
</div>

<!-- 팝업 스크립트 -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const thumbnails = document.querySelectorAll('.thumbnail-item');
    const popup = document.querySelector('.notice-popup');
    const popupClose = popup.querySelector('.popup-close');
    const popupImage = popup.querySelector('.notice-detail-image img');
    const popupTitle = popup.querySelector('.notice-detail-title');
    const popupDate = popup.querySelector('.notice-detail-date');
    const popupContent = popup.querySelector('.notice-detail-content');

    // PHP 배열을 JavaScript 객체로 변환
    const noticeData = <?php echo json_encode($notices); ?>;

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            const id = this.dataset.id;
            const data = noticeData.find(notice => notice.id == id);
            
            popupImage.src = data.image;
            popupTitle.textContent = data.title;
            popupDate.textContent = data.date;
            popupContent.textContent = data.content;
            
            popup.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });

    popupClose.addEventListener('click', function() {
        popup.classList.remove('active');
        document.body.style.overflow = '';
    });

    popup.addEventListener('click', function(e) {
        if (e.target === popup) {
            popup.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>