    </main>
    <footer class="footer">
        <div class="footer-content">
            <div class="company-info">
                <h3 class="company-name">브러쉬메이크업</h3>
                <p class="info-item">대표: 박진희</p>
                <p class="info-item">주소: 원주시 구곡길34</p>
                <p class="info-item">사업자등록번호: 224-14-63307</p>
                <p class="info-item">전화번호: 033-766-3187</p>
            </div>
            <div class="social-share">
                <button onclick="shareKakao()" class="share-button kakao">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="#FFFFFF">
                        <path d="M12 2C6.477 2 2 5.977 2 10.837c0 3.027 2.016 5.678 5.032 7.15l-1.016 3.72c-0.094 0.34 0.31 0.61 0.62 0.42l4.45-2.99c0.3 0.044 0.606 0.067 0.914 0.067 5.523 0 10-3.977 10-8.837S17.523 2 12 2zm1.5 10.837h-3c-0.276 0-0.5-0.224-0.5-0.5V8.5c0-0.276 0.224-0.5 0.5-0.5h3c0.276 0 0.5 0.224 0.5 0.5v3.837c0 0.276-0.224 0.5-0.5 0.5z"/>
                    </svg>
                    <span style="color: white;">카카오톡 공유</span>
                </button>
                <button onclick="shareFacebook()" class="share-button facebook">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                        <path d="M12 2C6.477 2 2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.879V14.89h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.989C18.343 21.129 22 16.99 22 12c0-5.523-4.477-10-10-10z"/>
                    </svg>
                    <span style="color: white;">페이스북 공유</span>
                </button>
                <button onclick="copyUrl()" class="share-button url">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="white">
                        <path d="M16 1H4C2.9 1 2 1.9 2 3v14h2V3h12V1zm3 4H8C6.9 5 6 5.9 6 7v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
                    </svg>
                    <span style="color: white;">사이트 주소 복사</span>
                </button>
            </div>
            <p class="copyright">
                © <span id="current-year"></span> 브러쉬메이크업. All rights reserved.
            </p>
        </div>
    </footer>
    <script src="/js/main.js"></script>
</body>
</html> 