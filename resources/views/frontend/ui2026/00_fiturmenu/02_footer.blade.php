    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>Penyelenggaraan Bangunan Gedung</h3>
                    <p>Kabupaten Blora berkomitmen untuk menyediakan layanan perizinan bangunan gedung yang cepat, transparan, dan berkualitas demi pembangunan yang berkelanjutan.</p>
                    <div class="footer-social">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-column">
                    <h4>Layanan</h4>
                    <ul class="footer-links">
                        <li><a href="#">Pengajuan PBG</a></li>
                        <li><a href="#">Sertifikat SLF</a></li>
                        <li><a href="#">Perpanjangan SLF</a></li>
                        <li><a href="#">Perubahan Data</a></li>
                        <li><a href="#">Cek Status</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Informasi</h4>
                    <ul class="footer-links">
                        <li><a href="#">Tentang Kami</a></li>
                        <li><a href="#">Regulasi</a></li>
                        <li><a href="#">Statistik</a></li>
                        <li><a href="#">Berita</a></li>
                        <li><a href="#">Pengumuman</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h4>Kontak</h4>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-phone"></i> (0296) 531333</a></li>
                        <li><a href="#"><i class="fas fa-envelope"></i> diskominfo@blorakab.go.id</a></li>
                        <li><a href="#"><i class="fas fa-map-marker-alt"></i> Jl. Nusantara No. 8 Blora</a></li>
                        <li><a href="#"><i class="fas fa-clock"></i> Senin-Jumat: 08.00-16.00</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 Penyelenggaraan Bangunan Gedung Kabupaten Blora. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTop" onclick="scrollToTop()">
        <i class="fas fa-chevron-up"></i>
    </button>

    <script>
        // Mobile Navigation Toggle
        function toggleMobileNav() {
            const mobileNav = document.getElementById('mobileNav');
            mobileNav.classList.toggle('active');
            document.body.style.overflow = mobileNav.classList.contains('active') ? 'hidden' : '';
        }

        // Mobile Dropdown Toggle
        function toggleMobileDropdown(element) {
            const dropdown = element.nextElementSibling;
            const icon = element.querySelector('i');
            dropdown.classList.toggle('active');
            icon.style.transform = dropdown.classList.contains('active') ? 'rotate(180deg)' : '';
        }

        // Animated Counter
        function animateCounter(element) {
            const target = parseInt(element.getAttribute('data-target'));
            const duration = 2000;
            const step = target / (duration / 16);
            let current = 0;

            const updateCounter = () => {
                current += step;
                if (current < target) {
                    element.textContent = Math.floor(current).toLocaleString('id-ID');
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = target.toLocaleString('id-ID');
                }
            };

            updateCounter();
        }

        // Intersection Observer for counters
        const observerOptions = {
            threshold: 0.5,
            rootMargin: '0px'
        };

        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    counterObserver.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('.stat-number').forEach(counter => {
            counterObserver.observe(counter);
        });

        // Scroll to Top Button
        const scrollTopBtn = document.getElementById('scrollTop');

        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });

        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Table Search
        const tableSearch = document.getElementById('tableSearch');
        const tableBody = document.getElementById('tableBody');
        const tableRows = tableBody.querySelectorAll('tr');

        tableSearch.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();

            tableRows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
        });

        // Pagination
        const paginationBtns = document.querySelectorAll('.pagination-btn');

        paginationBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                if (!btn.disabled && !btn.querySelector('i')) {
                    paginationBtns.forEach(b => b.classList.remove('active'));
                    btn.classList.add('active');
                }
            });
        });

        // Favorite Button Toggle
        const favoriteBtns = document.querySelectorAll('.marketplace-favorite');

        favoriteBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.stopPropagation();
                const icon = btn.querySelector('i');
                icon.classList.toggle('far');
                icon.classList.toggle('fas');
                btn.style.background = icon.classList.contains('fas') ? 'var(--accent-red)' : 'var(--white)';
                btn.style.color = icon.classList.contains('fas') ? 'var(--white)' : '';
            });
        });

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add animation on scroll
        const animateOnScroll = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fade-in-up');
                    animateOnScroll.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.service-card, .info-card, .marketplace-card').forEach(card => {
            animateOnScroll.observe(card);
        });
    </script>
</body>
</html>
