// Mobile menu toggle

const header = document.querySelector('.header');
let lastScroll = 0;

// Mobile Menu Toggle
const mobileMenuButton = document.querySelector('.mobile-menu-button');
const mobileMenu = document.querySelector('.mobile-menu');
const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
const body = document.body;

function toggleMenu() {
    mobileMenuButton.classList.toggle('active');
    mobileMenu.classList.toggle('active');
    mobileMenuOverlay.classList.toggle('active');
    body.classList.toggle('menu-open');
}

mobileMenuButton.addEventListener('click', toggleMenu);
mobileMenuOverlay.addEventListener('click', toggleMenu);

// Close menu when clicking menu items
const mobileMenuItems = document.querySelectorAll('.mobile-menu-item');
mobileMenuItems.forEach(item => {
    item.addEventListener('click', () => {
        if (mobileMenu.classList.contains('active')) {
            toggleMenu();
        }
    });
});

// Close menu on window resize if open
window.addEventListener('resize', () => {
    if (window.innerWidth > 768 && mobileMenu.classList.contains('active')) {
        toggleMenu();
    }
});

// 스크롤에 따른 헤더 숨김/표시 기능
// - 스크롤 다운시 헤더 숨김
// - 스크롤 업시 헤더 표시
window.addEventListener('scroll', function() {
    const currentScroll = window.pageYOffset;
    
    if (currentScroll <= 0) {
        header.classList.remove('scroll-up');
        return;
    }
    
    if (currentScroll > lastScroll && !header.classList.contains('scroll-down')) {
        header.classList.remove('scroll-up');
        header.classList.add('scroll-down');
    } else if (currentScroll < lastScroll && header.classList.contains('scroll-down')) {
        header.classList.remove('scroll-down');
        header.classList.add('scroll-up');
    }
    
    lastScroll = currentScroll;
});

// 앵커 링크 부드러운 스크롤 기능
// - href가 #으로 시작하는 링크 클릭시 부드럽게 스크롤
// - 스크롤 후 모바일 메뉴 닫기
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
            mobileMenu.classList.remove('active');
            mobileMenuButton.classList.remove('active');
            document.body.classList.remove('menu-open');
        }
    });
});

// 현재 연도 표시 기능
document.getElementById('current-year').textContent = new Date().getFullYear();

// 소셜 공유 기능
// - 페이스북 공유
function shareFacebook() {
    const url = encodeURIComponent(window.location.href);
    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, 'facebook-share', 'width=580,height=296');
}

function copyUrl() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        const notification = document.createElement('div');
        notification.className = 'copy-notification';
        notification.textContent = 'URL이 클립보드에 복사되었습니다.';
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, 2000);
    }).catch(err => {
        console.error('URL 복사 실패:', err);
        alert('URL 복사에 실패했습니다.');
    });
}

// 갤러리 이미지 팝업 기능
// - 갤러리 이미지 클릭시 팝업으로 크게 보기
// - 팝업 닫기 버튼이나 외부 클릭시 닫기
document.querySelectorAll('.gallery-item').forEach(item => {
    item.addEventListener('click', function() {
        const img = this.querySelector('img');
        const popup = document.createElement('div');
        popup.className = 'image-popup';
        popup.innerHTML = `
            <div class="popup-content">
                <img src="${img.src}" alt="${img.alt}">
                <button class="popup-close">&times;</button>
            </div>
        `;
        document.body.appendChild(popup);
        document.body.style.overflow = 'hidden';

        popup.querySelector('.popup-close').addEventListener('click', () => {
            popup.remove();
            document.body.style.overflow = '';
        });

        popup.addEventListener('click', (e) => {
            if (e.target === popup) {
                popup.remove();
                document.body.style.overflow = '';
            }
        });
    });
});

// 공지사항 팝업 기능
// - 공지사항 카드 클릭시 상세 내용 팝업
// - 팝업 닫기 버튼이나 외부 클릭시 닫기
const noticeCards = document.querySelectorAll('.notice-card');
const noticePopup = document.querySelector('.notice-popup');
const noticeDetail = noticePopup?.querySelector('.notice-detail');

if (noticeCards.length > 0 && noticePopup && noticeDetail) {
    noticeCards.forEach(card => {
        card.addEventListener('click', () => {
            const id = card.dataset.id;
            const title = card.querySelector('.notice-title').textContent;
            const date = card.querySelector('.notice-date').textContent;
            const image = card.querySelector('img').src;
            const content = card.querySelector('.notice-excerpt').textContent;

            noticeDetail.querySelector('.notice-detail-image img').src = image;
            noticeDetail.querySelector('.notice-detail-image img').alt = title;
            noticeDetail.querySelector('.notice-detail-title').textContent = title;
            noticeDetail.querySelector('.notice-detail-date').textContent = date;
            noticeDetail.querySelector('.notice-detail-text').textContent = content;

            noticePopup.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
    });

    noticePopup.querySelector('.popup-close').addEventListener('click', () => {
        noticePopup.classList.remove('active');
        document.body.style.overflow = '';
    });

    noticePopup.addEventListener('click', (e) => {
        if (e.target === noticePopup) {
            noticePopup.classList.remove('active');
            document.body.style.overflow = '';
        }
    });
}

// 갤러리 팝업 기능
// - 갤러리 아이템 클릭시 상세 정보 팝업
// - 팝업 닫기 버튼이나 외부 클릭시 닫기
const galleryItems = document.querySelectorAll('.gallery-item');
const galleryPopup = document.querySelector('.gallery-popup');
const galleryDetail = galleryPopup.querySelector('.gallery-detail');

galleryItems.forEach(item => {
    item.addEventListener('click', () => {
        const id = item.dataset.id;
        const image = item.querySelector('img').src;
        const title = item.querySelector('h3').textContent;
        const description = item.querySelector('p').textContent;

        galleryDetail.querySelector('img').src = image;
        galleryDetail.querySelector('img').alt = title;
        galleryDetail.querySelector('h2').textContent = title;
        galleryDetail.querySelector('p').textContent = description;

        galleryPopup.classList.add('active');
        document.body.style.overflow = 'hidden';
    });
});

galleryPopup.querySelector('.popup-close').addEventListener('click', () => {
    galleryPopup.classList.remove('active');
    document.body.style.overflow = '';
});

galleryPopup.addEventListener('click', (e) => {
    if (e.target === galleryPopup) {
        galleryPopup.classList.remove('active');
        document.body.style.overflow = '';
    }
});

document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const mobileMenuButton = document.querySelector('.mobile-menu-button');
    const mobileMenu = document.querySelector('.mobile-menu');
    const mobileMenuOverlay = document.querySelector('.mobile-menu-overlay');
    const body = document.body;

    function toggleMenu() {
        mobileMenuButton.classList.toggle('active');
        mobileMenu.classList.toggle('active');
        mobileMenuOverlay.classList.toggle('active');
        body.classList.toggle('menu-open');
    }

    mobileMenuButton.addEventListener('click', toggleMenu);
    mobileMenuOverlay.addEventListener('click', toggleMenu);

    // Close menu when clicking menu items
    const mobileMenuItems = document.querySelectorAll('.mobile-menu-item');
    mobileMenuItems.forEach(item => {
        item.addEventListener('click', () => {
            if (mobileMenu.classList.contains('active')) {
                toggleMenu();
            }
        });
    });

    // Close menu on window resize if open
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768 && mobileMenu.classList.contains('active')) {
            toggleMenu();
        }
    });

    // Scroll Top Button
    const scrollTop = document.querySelector('.scroll-top');
    
    window.addEventListener('scroll', function() {
        if (window.pageYOffset > 300) {
            scrollTop.classList.add('visible');
        } else {
            scrollTop.classList.remove('visible');
        }
    });

    scrollTop.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Header Scroll Effect
    let lastScroll = 0;
    const header = document.querySelector('.header');

    window.addEventListener('scroll', function() {
        const currentScroll = window.pageYOffset;

        if (currentScroll <= 0) {
            header.classList.remove('scroll-up');
            return;
        }

        if (currentScroll > lastScroll && !header.classList.contains('scroll-down')) {
            header.classList.remove('scroll-up');
            header.classList.add('scroll-down');
        } else if (currentScroll < lastScroll && header.classList.contains('scroll-down')) {
            header.classList.remove('scroll-down');
            header.classList.add('scroll-up');
        }
        lastScroll = currentScroll;
    });

    // Share Buttons
    const shareButtons = document.querySelectorAll('.share-button');
    
    shareButtons.forEach(button => {
        button.addEventListener('click', function() {
            const type = this.classList[1]; // kakao, facebook, twitter, url
            const url = encodeURIComponent(window.location.href);
            const title = encodeURIComponent(document.title);
            
            switch(type) {
                case 'kakao':
                    if (typeof Kakao !== 'undefined') {
                        Kakao.Link.sendDefault({
                            objectType: 'feed',
                            content: {
                                title: document.title,
                                description: document.querySelector('meta[name="description"]').content,
                                imageUrl: document.querySelector('meta[property="og:image"]').content,
                                link: {
                                    mobileWebUrl: window.location.href,
                                    webUrl: window.location.href
                                }
                            },
                            buttons: [
                                {
                                    title: '웹으로 보기',
                                    link: {
                                        mobileWebUrl: window.location.href,
                                        webUrl: window.location.href
                                    }
                                }
                            ]
                        });
                    }
                    break;
                    
                case 'facebook':
                    window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, 'facebook-share', 'width=580,height=296');
                    break;
                    
                case 'twitter':
                    window.open(`https://twitter.com/intent/tweet?text=${title}&url=${url}`, 'twitter-share', 'width=580,height=296');
                    break;
                    
                case 'url':
                    copyUrl();
                    break;
                    navigator.clipboard.writeText(window.location.href).then(() => {
                        alert('URL이 클립보드에 복사되었습니다.');
                    }).catch(err => {
                        console.error('URL 복사 실패:', err);
                    });
                    break;
            }
        });
    });

    // Gallery Image Popup
    document.querySelectorAll('.gallery-item').forEach(item => {
        item.addEventListener('click', function() {
            const img = this.querySelector('img');
            const popup = document.createElement('div');
            popup.className = 'image-popup';
            popup.innerHTML = `
                <div class="popup-content">
                    <img src="${img.src}" alt="${img.alt}">
                    <button class="popup-close">&times;</button>
                </div>
            `;
            document.body.appendChild(popup);
            document.body.style.overflow = 'hidden';

            popup.querySelector('.popup-close').addEventListener('click', () => {
                popup.remove();
                document.body.style.overflow = '';
            });

            popup.addEventListener('click', (e) => {
                if (e.target === popup) {
                    popup.remove();
                    document.body.style.overflow = '';
                }
            });
        });
    });

    // Notice Popup
    const noticeCards = document.querySelectorAll('.notice-card');
    const noticePopup = document.querySelector('.notice-popup');
    const noticeDetail = noticePopup?.querySelector('.notice-detail');

    if (noticeCards.length > 0 && noticePopup && noticeDetail) {
        noticeCards.forEach(card => {
            card.addEventListener('click', () => {
                const id = card.dataset.id;
                const title = card.querySelector('.notice-title').textContent;
                const date = card.querySelector('.notice-date').textContent;
                const image = card.querySelector('img').src;
                const content = card.querySelector('.notice-excerpt').textContent;

                noticeDetail.querySelector('.notice-detail-image img').src = image;
                noticeDetail.querySelector('.notice-detail-image img').alt = title;
                noticeDetail.querySelector('.notice-detail-title').textContent = title;
                noticeDetail.querySelector('.notice-detail-date').textContent = date;
                noticeDetail.querySelector('.notice-detail-text').textContent = content;

                noticePopup.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });

        noticePopup.querySelector('.popup-close').addEventListener('click', () => {
            noticePopup.classList.remove('active');
            document.body.style.overflow = '';
        });

        noticePopup.addEventListener('click', (e) => {
            if (e.target === noticePopup) {
                noticePopup.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }

    // Gallery Popup
    const galleryItems = document.querySelectorAll('.gallery-item');
    const galleryPopup = document.querySelector('.gallery-popup');
    const galleryDetail = galleryPopup?.querySelector('.gallery-detail');

    if (galleryItems.length > 0 && galleryPopup && galleryDetail) {
        galleryItems.forEach(item => {
            item.addEventListener('click', () => {
                const id = item.dataset.id;
                const image = item.querySelector('img').src;
                const title = item.querySelector('h3').textContent;
                const description = item.querySelector('p').textContent;

                galleryDetail.querySelector('img').src = image;
                galleryDetail.querySelector('img').alt = title;
                galleryDetail.querySelector('h2').textContent = title;
                galleryDetail.querySelector('p').textContent = description;

                galleryPopup.classList.add('active');
                document.body.style.overflow = 'hidden';
            });
        });

        galleryPopup.querySelector('.popup-close').addEventListener('click', () => {
            galleryPopup.classList.remove('active');
            document.body.style.overflow = '';
        });

        galleryPopup.addEventListener('click', (e) => {
            if (e.target === galleryPopup) {
                galleryPopup.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    }

    // URL Copy Button
    const urlCopyButton = document.querySelector('.url-copy-button');
    if (urlCopyButton) {
        urlCopyButton.addEventListener('click', function() {
            const currentUrl = window.location.href;
            navigator.clipboard.writeText(currentUrl).then(() => {
                // 복사 성공 시 알림 표시
                const notification = document.createElement('div');
                notification.className = 'copy-notification';
                notification.textContent = 'URL이 클립보드에 복사되었습니다.';
                document.body.appendChild(notification);

                // 2초 후 알림 제거
                setTimeout(() => {
                    notification.remove();
                }, 2000);
            }).catch(err => {
                console.error('URL 복사 실패:', err);
                alert('URL 복사에 실패했습니다.');
            });
        });
    }
}); 