<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Café Menu</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600;700&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <style>
    *,
    *::before,
    *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html {
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #f5f0e8;
      color: #333;
      line-height: 1.6;
    }

    a {
      text-decoration: none;
      color: inherit;
      transition: color 0.3s;
    }

    ul {
      list-style: none;
    }

    img {
      max-width: 100%;
      display: block;
    }

    /* ===== NAVBAR ===== */

    .floating-nav {
      position: fixed;
      top: 25px;
      left: 50%;
      transform: translateX(-50%);

      width: 90%;
      max-width: 850px;

      background: rgba(255, 255, 255, 0.6);
      backdrop-filter: blur(15px);
      -webkit-backdrop-filter: blur(15px);

      padding: 10px 20px;
      border-radius: 50px;
      box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
      border: 1px solid rgba(255, 255, 255, 0.3);
      z-index: 1000;
      transition: all 0.3s ease;
    }

    .floating-nav ul {
      display: flex;
      justify-content: space-between;
      /* Sebar link secara merata */
      align-items: center;
      list-style: none;
      margin: 0;
      padding: 0;
      gap: 5px;
      /* Jarak antar item */
    }

    /* Gaya Link */
    .floating-nav a {
      text-decoration: none;
      color: #333;
      font-size: 16px;
      font-weight: 600;
      padding: 10px 18px;
      border-radius: 25px;
      transition: all 0.3s ease;
      white-space: nowrap;
      /* Mencegah teks turun baris */
    }

    /* Efek Hover */
    .floating-nav a:hover {
      background: rgba(0, 0, 0, 0.08);
      color: #000;
    }

    /* Gaya untuk Item yang Aktif (Contoh: Products) */
    .floating-nav .active a {
      background: #dcdcdc;
      color: #000;
      box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
    }

    /* Responsive untuk layar HP */
    @media (max-width: 768px) {
      .floating-nav {
        top: 15px;
        width: 95%;
        padding: 8px;
      }

      .floating-nav ul {
        gap: 0;
        /* Kurangi jarak di HP */
      }

      .floating-nav a {
        padding: 8px 10px;
        font-size: 13px;
        /* Perkecil font di HP */
      }
    }


    /* ===== HERO SECTION ===== */
    .hero {
      position: relative;
      height: 950px;
      background:
        linear-gradient(rgba(20, 15, 10, 0.65), rgba(20, 15, 10, 0.5)),
        url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=1400&q=80') center/cover no-repeat;
      display: flex;
      align-items: center;
      justify-content: center;
      text-align: center;
    }

    .hero-content h1 {
      font-family: 'Playfair Display', serif;
      font-size: 2.4rem;
      color: #fff;
      font-weight: 600;
      line-height: 1.4;
      max-width: 500px;
    }

    .hero-content p {
      color: rgba(255, 255, 255, 0.7);
      margin-top: 10px;
      font-size: 0.95rem;
    }

    /* ===== MENU SECTION ===== */
    .menu-section {
      padding: 60px 40px 80px;
      max-width: 1200px;
      margin: 0 auto;
    }

    .menu-container {
      display: flex;
      gap: 50px;
      align-items: flex-start;
    }

    /* --- Sidebar Tabs --- */
    .menu-sidebar {
      display: flex;
      flex-direction: column;
      gap: 0;
      min-width: 130px;
      padding-top: 50px;
      position: sticky;
      top: 100px;
    }

    .menu-sidebar a {
      display: block;
      font-size: 1rem;
      font-weight: 500;
      color: #888;
      padding: 12px 20px;
      border-left: 3px solid transparent;
      cursor: pointer;
      transition: all 0.3s;
      background: none;
      border-bottom: none;
      font-family: 'Poppins', sans-serif;
    }

    .menu-sidebar a:hover {
      color: #c0392b;
    }

    .menu-sidebar a.active {
      color: #c0392b;
      border-left-color: #c0392b;
      font-weight: 600;
      background: rgba(192, 57, 43, 0.05);
      border-radius: 0 8px 8px 0;
    }

    /* --- Menu Content --- */
    .menu-content {
      flex: 1;
      position: relative;
    }

    .menu-title {
      font-family: 'Playfair Display', serif;
      font-size: 1.8rem;
      font-weight: 700;
      text-align: center;
      margin-bottom: 30px;
      color: #2c2c2c;
    }

    /* --- Tab Panels --- */
    .tab-panel {
      display: none;
      animation: fadeSlideIn 0.4s ease;
    }

    .tab-panel.active {
      display: block;
    }

    @keyframes fadeSlideIn {
      from {
        opacity: 0;
        transform: translateY(15px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* ===== CAROUSEL/SLIDER ===== */
    .carousel-container {
      position: relative;
      overflow: hidden;
      padding: 0 150px;
    }

    .carousel-track {
      display: flex;
      transition: transform 0.5s ease;
      gap: 50px;
    }

    .carousel-item {
      flex: 0 0 calc(33.333% - 20px);
      text-align: center;
    }

    .menu-item {
      background: #fff;
      border-radius: 16px;
      padding: 20px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s, box-shadow 0.3s;
      height: 100%;
    }

    .menu-item:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
    }

    .menu-item .img-wrapper {
      width: 100%;
      height: 150px;
      margin: 0 auto 16px;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }

    .menu-item img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      transition: transform 0.4s;
    }

    .menu-item:hover img {
      transform: scale(1.08);
    }

    .menu-item .item-name {
      font-size: 0.9rem;
      font-weight: 600;
      color: #2c2c2c;
      margin-bottom: 6px;
    }

    .menu-item .item-desc {
      font-size: 0.78rem;
      color: #888;
      line-height: 1.5;
    }

    .menu-item .item-price {
      font-size: 0.95rem;
      font-weight: 700;
      color: #c0392b;
      margin-top: 10px;
    }

    /* Carousel Navigation Buttons */
    .carousel-btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background: rgba(192, 57, 43, 0.9);
      color: #fff;
      border: none;
      width: 45px;
      height: 45px;
      border-radius: 50%;
      cursor: pointer;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 1rem;
      z-index: 10;
      transition: all 0.3s;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .carousel-btn:hover {
      background: #c0392b;
      transform: translateY(-50%) scale(1.1);
    }

    .carousel-btn.prev {
      left: 0;
    }

    .carousel-btn.next {
      right: 0;
    }

    .carousel-btn:disabled {
      background: rgba(0, 0, 0, 0.2);
      cursor: not-allowed;
      transform: translateY(-50%);
    }

    /* Carousel Indicators/Dots */
    .carousel-indicators {
      display: flex;
      justify-content: center;
      gap: 8px;
      margin-top: 25px;
    }

    .carousel-indicator {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      background: #d4c4b0;
      cursor: pointer;
      transition: all 0.3s;
      border: none;
    }

    .carousel-indicator.active {
      background: #c0392b;
      width: 30px;
      border-radius: 5px;
    }

    .carousel-indicator:hover {
      background: #c0392b;
    }

    /* ===== FOOTER ===== */
    .footer {
      background: #1e1914;
      color: #ccc;
      padding: 50px 40px 30px;
    }

    .footer-top {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
      max-width: 1000px;
      margin: 0 auto 40px;
      flex-wrap: wrap;
      gap: 30px;
    }

    .footer-social {
      display: flex;
      flex-direction: column;
      gap: 14px;
    }

    .footer-social .social-icons {
      display: flex;
      gap: 12px;
      margin-top: 10px;
    }

    .footer-social .social-icons a {
      width: 34px;
      height: 34px;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      display: flex;
      align-items: center;
      justify-content: center;
      color: #ccc;
      font-size: 0.9rem;
      transition: background 0.3s;
    }

    .footer-social .social-icons a:hover {
      background: #c0392b;
      color: #fff;
    }

    .footer-columns {
      display: flex;
      gap: 80px;
    }

    .footer-col h4 {
      color: #fff;
      font-size: 0.9rem;
      font-weight: 600;
      margin-bottom: 14px;
    }

    .footer-col ul li {
      margin-bottom: 8px;
    }

    .footer-col ul li a {
      font-size: 0.82rem;
      color: #999;
      transition: color 0.3s;
    }

    .footer-col ul li a:hover {
      color: #e74c3c;
    }

    .footer-bottom {
      max-width: 1000px;
      margin: 0 auto;
      border-top: 1px solid rgba(255, 255, 255, 0.08);
      padding-top: 20px;
      text-align: center;
      font-size: 0.78rem;
      color: #666;
    }

    /* ===== RESPONSIVE ===== */
    @media (max-width: 992px) {
      .carousel-item {
        flex: 0 0 calc(50% - 15px);
      }
    }

    @media (max-width: 768px) {
      .navbar {
        padding: 0 20px;
      }

      .nav-links a {
        padding: 6px 12px;
        font-size: 0.78rem;
      }

      .hero {
        height: 350px;
      }

      .hero-content h1 {
        font-size: 1.6rem;
        padding: 0 20px;
      }

      .menu-section {
        padding: 40px 20px 60px;
      }

      .menu-container {
        flex-direction: column;
        gap: 20px;
      }

      .menu-sidebar {
        flex-direction: row;
        padding-top: 0;
        min-width: unset;
        position: static;
        gap: 6px;
        border-bottom: 2px solid #e0d8cc;
        padding-bottom: 4px;
      }

      .menu-sidebar a {
        border-left: none;
        border-bottom: 3px solid transparent;
        padding: 10px 18px;
        white-space: nowrap;
        font-size: 0.92rem;
        border-radius: 0;
        background: none;
      }

      .menu-sidebar a.active {
        border-left: none;
        border-bottom-color: #c0392b;
        border-radius: 0;
        background: none;
      }

      .carousel-container {
        padding: 0 35px;
      }

      .carousel-item {
        flex: 0 0 100%;
      }

      .carousel-btn {
        width: 35px;
        height: 35px;
        font-size: 1rem;
      }

      .menu-item .img-wrapper {
        height: 220px;
      }

      .footer-top {
        flex-direction: column;
        align-items: center;
        text-align: center;
      }

      .footer-social .social-icons {
        justify-content: center;
      }

      .footer-columns {
        gap: 40px;
        justify-content: center;
      }
    }
  </style>
</head>

<body>

  <!-- NAVBAR -->
  <nav class="floating-nav">
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="#">About Us</a></li>
      <li class="active"><a href="#">Products</a></li>
      <li><a href="#">Promotions</a></li>
      <li><a href="#">Contact Us</a></li>
    </ul>
  </nav>

  <!-- HERO -->
  <section class="hero">
    <div class="hero-content">
      <h1>Our lineup of products,<br />made from love</h1>
    </div>
  </section>

  <!-- MENU SECTION -->
  <main class="menu-section">
    <div class="menu-container">

      <!-- Sidebar Tabs -->
      <nav class="menu-sidebar">
        <a href="#" class="active" data-tab="drink">Drink</a>
        <a href="#" data-tab="food">Food</a>
        <a href="#" data-tab="dessert">Dessert</a>
      </nav>

      <!-- Content -->
      <div class="menu-content">
        <h2 class="menu-title">Menu</h2>

        <!-- TAB: DRINK -->
        <div class="tab-panel active" id="drink">
          <div class="carousel-container">
            <div class="carousel-track" id="drink-track">
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="{{ asset ('images/cappucino.webp') }}" alt="Cappucino" />
                  </div>
                  <p class="item-name">Cappucino</p>
                  <p class="item-desc">Espresso dengan steamed milk dan foam</p>
                  <p class="item-price">Rp 35.000</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="{{ asset ('images/americano.jpg') }}" alt="Americano" />
                  </div>
                  <p class="item-name">Americano</p>
                  <p class="item-desc">Espresso dengan hot water</p>
                  <p class="item-price">Rp 30.000</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="{{ asset ('images/latte.webp') }}" alt="Latte" />
                  </div>
                  <p class="item-name">Caffe Latte</p>
                  <p class="item-desc">Espresso dengan steamed milk</p>
                  <p class="item-price">Rp 38.000</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="{{ asset ('images/mocha.jpg') }}" alt="Mocha" />
                  </div>
                  <p class="item-name">Mocha</p>
                  <p class="item-desc">Espresso dengan coklat, susu, dan whipped cream</p>
                  <p class="item-price">Rp 42.000</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="{{ asset ('images/espresso.jpg') }}" alt="Espresso" />
                  </div>
                  <p class="item-name">Espresso</p>
                  <p class="item-desc">Pure coffee shot yang kuat</p>
                  <p class="item-price">Rp 25.000</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="{{ asset ('images/Matcha-Latte.jpg') }}" alt="Matcha latte" />
                  </div>
                  <p class="item-name">Matcha latte</p>
                  <p class="item-desc">Matcha dengan susu</p>
                  <p class="item-price">Rp 42.000</p>
                </div>
              </div>
            </div>
            <button class="carousel-btn prev" data-carousel="drink">‹</button>
            <button class="carousel-btn next" data-carousel="drink">›</button>
          </div>
          <div class="carousel-indicators" id="drink-indicators"></div>
        </div>

        <!-- TAB: FOOD -->
        <div class="tab-panel" id="food">
          <div class="carousel-container">
            <div class="carousel-track" id="food-track">
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="https://images.unsplash.com/photo-1512058564366-18510be2db19?w=500&q=80" alt="Nasi Goreng" />
                  </div>
                  <p class="item-name">Nasi Goreng</p>
                  <p class="item-desc">Nasi goreng spesial dengan telur</p>
                  <p class="item-price">Rp 45.000</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="https://images.unsplash.com/photo-1585032226651-759b368d7246?w=500&q=80" alt="Ayam Geprek" />
                  </div>
                  <p class="item-name">Ayam Geprek</p>
                  <p class="item-desc">Ayam crispy dengan sambal</p>
                  <p class="item-price">Rp 48.000</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="https://images.unsplash.com/photo-1565557623262-b51c2513a641?w=500&q=80" alt="Mie Goreng" />
                  </div>
                  <p class="item-name">Mie Goreng</p>
                  <p class="item-desc">Mie goreng dengan sayuran</p>
                  <p class="item-price">Rp 42.000</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=500&q=80" alt="Salad" />
                  </div>
                  <p class="item-name">Caesar Salad</p>
                  <p class="item-desc">Sayur segar dengan dressing</p>
                  <p class="item-price">Rp 40.000</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="https://images.unsplash.com/photo-1568901346375-23c9450c58cd?w=500&q=80" alt="Burger" />
                  </div>
                  <p class="item-name">Beef Burger</p>
                  <p class="item-desc">Burger daging sapi premium</p>
                  <p class="item-price">Rp 65.000</p>
                </div>
              </div>
            </div>
            <button class="carousel-btn prev" data-carousel="food">‹</button>
            <button class="carousel-btn next" data-carousel="food">›</button>
          </div>
          <div class="carousel-indicators" id="food-indicators"></div>
        </div>

        <!-- TAB: DESSERT -->
        <div class="tab-panel" id="dessert">
          <div class="carousel-container">
            <div class="carousel-track" id="dessert-track">
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="https://images.unsplash.com/photo-1571877227200-a0d98ea607e9?w=500&q=80" alt="Tiramisu" />
                  </div>
                  <p class="item-name">Tiramisu</p>
                  <p class="item-desc">Dessert Italia dengan kopi</p>
                  <p class="item-price">Rp 45.000</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="https://images.unsplash.com/photo-1497034825429-c343d7c6a68f?w=500&q=80" alt="Es Krim" />
                  </div>
                  <p class="item-name">Es Krim</p>
                  <p class="item-desc">Ice cream vanilla & coklat</p>
                  <p class="item-price">Rp 35.000</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="https://images.unsplash.com/photo-1551024601-bec78aea704b?w=500&q=80" alt="Donut" />
                  </div>
                  <p class="item-name">Chocolate Donut</p>
                  <p class="item-desc">Donat coklat dengan topping</p>
                  <p class="item-price">Rp 28.000</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=500&q=80" alt="Cheesecake" />
                  </div>
                  <p class="item-name">Cheesecake</p>
                  <p class="item-desc">New York style cheesecake</p>
                  <p class="item-price">Rp 50.000</p>
                </div>
              </div>
              <div class="carousel-item">
                <div class="menu-item">
                  <div class="img-wrapper">
                    <img src="https://images.unsplash.com/photo-1515037028865-0a2a82603f7c?w=500&q=80" alt="Pancake" />
                  </div>
                  <p class="item-name">Pancake</p>
                  <p class="item-desc">Pancake dengan maple syrup</p>
                  <p class="item-price">Rp 42.000</p>
                </div>
              </div>
            </div>
            <button class="carousel-btn prev" data-carousel="dessert">‹</button>
            <button class="carousel-btn next" data-carousel="dessert">›</button>
          </div>
          <div class="carousel-indicators" id="dessert-indicators"></div>
        </div>

      </div>
    </div>
  </main>

  <!-- FOOTER -->
  <footer class="footer">
    <div class="footer-top">
      <div class="footer-social">
        <div class="logo" style="color:#fff; font-family:'Playfair Display',serif; font-size:1.3rem;">☕ KafeKu</div>
        <div class="social-icons">
          <a href="#">📌</a>
          <a href="#">✖</a>
          <a href="#">📷</a>
          <a href="#">📘</a>
          <a href="#">▶</a>
        </div>
      </div>
      <div class="footer-columns">
        <div class="footer-col">
          <h4>Use cases</h4>
          <ul>
            <li><a href="#">UI design</a></li>
            <li><a href="#">UX design</a></li>
            <li><a href="#">Wireframing</a></li>
            <li><a href="#">Diagramming</a></li>
            <li><a href="#">Brainstorming</a></li>
            <li><a href="#">Online whiteboard</a></li>
            <li><a href="#">Team collaboration</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Explore</h4>
          <ul>
            <li><a href="#">Design</a></li>
            <li><a href="#">Prototyping</a></li>
            <li><a href="#">Development features</a></li>
            <li><a href="#">Design systems</a></li>
            <li><a href="#">Collaboration features</a></li>
            <li><a href="#">Design process</a></li>
            <li><a href="#">FigmaJam</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Resources</h4>
          <ul>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Best practices</a></li>
            <li><a href="#">Colors</a></li>
            <li><a href="#">Color wheel</a></li>
            <li><a href="#">Support</a></li>
            <li><a href="#">Developers</a></li>
            <li><a href="#">Resource library</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <p>&copy; 2026 Soluna Cafe. All rights reserved.</p>
    </div>
  </footer>

  <!-- ===== JAVASCRIPT ===== -->
  <script>
    // Tab Switching
    const tabs = document.querySelectorAll('.menu-sidebar a');
    const panels = document.querySelectorAll('.tab-panel');

    tabs.forEach(tab => {
      tab.addEventListener('click', (e) => {
        e.preventDefault();
        tabs.forEach(t => t.classList.remove('active'));
        panels.forEach(p => p.classList.remove('active'));
        tab.classList.add('active');
        const targetId = tab.getAttribute('data-tab');
        document.getElementById(targetId).classList.add('active');

        // Reset carousel when tab changes
        initCarousel(targetId);
      });
    });

    // Carousel Functionality
    const carousels = {};

    function initCarousel(tabName) {
      const track = document.getElementById(`${tabName}-track`);
      const items = track.querySelectorAll('.carousel-item');
      const indicatorsContainer = document.getElementById(`${tabName}-indicators`);
      const prevBtn = document.querySelector(`.carousel-btn.prev[data-carousel="${tabName}"]`);
      const nextBtn = document.querySelector(`.carousel-btn.next[data-carousel="${tabName}"]`);

      if (!track || !items.length) return;

      // Create indicators
      const numIndicators = Math.ceil(items.length / getItemsPerView());
      indicatorsContainer.innerHTML = '';
      for (let i = 0; i < numIndicators; i++) {
        const dot = document.createElement('button');
        dot.className = 'carousel-indicator' + (i === 0 ? ' active' : '');
        dot.addEventListener('click', () => goToSlide(tabName, i));
        indicatorsContainer.appendChild(dot);
      }

      let currentIndex = 0;

      function getItemsPerView() {
        if (window.innerWidth <= 768) return 1;
        if (window.innerWidth <= 992) return 2;
        return 3;
      }

      function getMaxIndex() {
        return Math.ceil(items.length / getItemsPerView()) - 1;
      }

      function updateCarousel() {
        const itemWidth = items[0].offsetWidth + 30;
        const maxIndex = getMaxIndex();

        if (currentIndex > maxIndex) {
          currentIndex = maxIndex;
        }

        track.style.transform = `translateX(-${currentIndex * itemWidth}px)`;

        // Update indicators
        const indicators = indicatorsContainer.querySelectorAll('.carousel-indicator');
        indicators.forEach((dot, index) => {
          dot.classList.toggle('active', index === currentIndex);
        });
      }

      function goToSlide(tab, index) {
        currentIndex = index;
        updateCarousel();
      }

      function nextSlide() {
        const maxIndex = getMaxIndex();
        currentIndex = currentIndex >= maxIndex ? 0 : currentIndex + 1;
        updateCarousel();
      }

      function prevSlide() {
        const maxIndex = getMaxIndex();
        currentIndex = currentIndex === 0 ? maxIndex : currentIndex - 1;
        updateCarousel();
      }

      // Event listeners
      prevBtn.addEventListener('click', prevSlide);
      nextBtn.addEventListener('click', nextSlide);

      // Touch/Swipe support
      let touchStartX = 0;
      let touchEndX = 0;

      track.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
      });

      track.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        if (touchStartX - touchEndX > 50) {
          nextSlide();
        }
        if (touchEndX - touchStartX > 50) {
          prevSlide();
        }
      });

      // Auto-play
      let autoPlayInterval = setInterval(nextSlide, 4000);

      // Pause on hover
      track.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
      track.addEventListener('mouseleave', () => {
        autoPlayInterval = setInterval(nextSlide, 4000);
      });

      // Handle resize
      window.addEventListener('resize', () => {
        currentIndex = 0;
        updateCarousel();
      });

      // Store carousel instance
      carousels[tabName] = {
        updateCarousel,
        goToSlide,
        nextSlide,
        prevSlide
      };

      // Initial update
      updateCarousel();
    }

    // Initialize all carousels
    ['drink', 'food', 'dessert'].forEach(tab => initCarousel(tab));

    // Navbar background change on scroll
    const navbar = document.querySelector('.navbar');
    window.addEventListener('scroll', () => {
      if (window.scrollY > 100) {
        navbar.style.background = 'rgba(30, 25, 20, 0.95)';
      } else {
        navbar.style.background = 'rgba(30, 25, 20, 0.85)';
      }
    });
  </script>

</body>

</html>