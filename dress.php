<?php
// 이미지 폴더 경로
$imageDir = 'images/dress/';

// 이미지 파일 목록 가져오기
$images = glob($imageDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

// 이미지 정렬 (파일명 기준)
sort($images);

include 'includes/header.php';
?>

<section class="gallery-page">
    <div class="container">
        <h1 class="page-title">Dress & Hanbok</h1>
        
        <div class="thumbnail-grid">
            <?php foreach ($images as $image): ?>
                <div class="thumbnail-item" data-image="<?php echo $image; ?>">
                    <img src="<?php echo $image; ?>" alt="<?php echo basename($image); ?>">
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- 이미지 팝업 -->
<div class="popup image-popup">
    <button class="popup-close">&times;</button>
    <div class="popup-content">
        <img src="" alt="">
    </div>
</div>

<!-- 팝업 스크립트 -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const thumbnails = document.querySelectorAll('.thumbnail-item');
    const popup = document.querySelector('.image-popup');
    const popupClose = popup.querySelector('.popup-close');
    const popupImage = popup.querySelector('img');

    thumbnails.forEach(thumbnail => {
        thumbnail.addEventListener('click', function() {
            const imageSrc = this.dataset.image;
            popupImage.src = imageSrc;
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