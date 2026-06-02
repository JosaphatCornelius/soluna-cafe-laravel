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
    font-family: 'Host Grotesk', sans-serif;
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

  /* ===== HERO SECTION ===== */
  .hero {
    position: relative;
    min-height: 609px;
    background:
      linear-gradient(rgba(20, 15, 10, 0.65), rgba(20, 15, 10, 0.5)),
      url('https://images.unsplash.com/photo-1554118811-1e0d58224f24?w=1400&q=80') center/cover no-repeat;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
  }

  .hero-content h1 {
    font-family: 'MedievalSharp', cursive;
    font-size: 2.4rem;
    color: #fff;
    font-weight: 400;
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
    font-family: 'Host Grotesk', sans-serif;
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

  .menu-content {
    flex: 1;
    min-width: 0;
    position: relative;
    max-width: 100%;
  }

  .menu-title {
    font-family: 'Host Grotesk', sans-serif;
    font-size: 1.8rem;
    font-weight: 700;
    text-align: center;
    margin-bottom: 30px;
    color: #2c2c2c;
  }

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

  .carousel-container {
    position: relative;
    overflow: hidden;
    padding: 0 60px;
  }

  .carousel-track {
    display: flex;
    transition: transform 0.5s ease;
    gap: 50px;
  }

  .carousel-item {
    flex: 0 0 calc(33.333% - 33.333px);
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

  /* ===== RESPONSIVE ===== */
  @media (max-width: 992px) {
    .carousel-item {
      flex: 0 0 calc(50% - 25px);
    }
  }

  @media (max-width: 768px) {
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
  }
</style>
