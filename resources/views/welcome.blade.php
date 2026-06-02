<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            overflow-x: hidden;
            background-color: #F0F0E6;
        }

        /* Hero Section */
        .hero {
            width: 100%;
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.55),
                rgba(0, 0, 0, 0.55)),
            url('{{ asset("mainpic.jpg") }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }

        /* Navbar */
        .navbar {
            position: absolute;
            top: 40px;
            left: 50%;
            transform: translateX(-50%);
            width: 75%;
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            border-radius: 50px;
            padding: 15px 20px;
        }

        .navbar ul {
            display: flex;
            justify-content: space-around;
            align-items: center;
            list-style: none;
        }

        .navbar ul li a {
            text-decoration: none;
            color: #000;
            font-weight: 500;
            padding: 10px 20px;
            transition: 0.3s;
        }

        .navbar ul li a:hover {
            background: rgba(255, 255, 255, 0.5);
            border-radius: 25px;
        }

        .active {
            background: rgba(255, 255, 255, 0.6);
            border-radius: 25px;
        }

        /* Hero Content */
        .hero-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }

        .hero-content h1 {
            font-size: 55px;
            font-weight: 300;
            line-height: 1.2;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        .hero-content h2 {
            font-size: 55px;
            font-weight: 300;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
        }

        /* our story */
        .our-story h1 {
            color: black;
            text-align: center;
            margin-bottom: 40px;
            padding-top: 40px;
            font-size: 38px;
            font-weight: 600;
        }

        .card-story {
            width: 50%;
            margin-left: 25%;
            border-radius: 10px;
            box-shadow: 2px 5px 20px rgba(0, 0, 0, 0.3);
        }

        .card-story img,
        p {
            margin: 30px;
        }

        .card-story img {
            width: 90%;
            border-radius: 10px;
        }

        .card-story p {
            padding: 0 40px 40px 40px;
            text-align: justify;
        }

        .recommendation {
            padding: 80px 20px 100px;
            background: #f5f1e7;
        }

        .recommendation .title {
            text-align: center;
            margin-bottom: 40px;
        }

        .recommendation .title h1 {
            color: black;
            text-align: center;
            margin-bottom: 40px;
            padding-top: 40px;
            font-size: 38px;
            font-weight: 600;
        }

        .menu-container {
            display: grid;
            grid-template-columns: 1.4fr 1fr;
            gap: 30px;
            align-items: center;
            max-width: 1120px;
            margin: 0 auto;
        }

        .menu-image {
            width: 100%;
            min-height: 320px;
            background: #e9e1d5;
        }

        .menu-image img {
            width: 100%;
            object-fit: cover;
            display: block;
            border-radius: 20px;
        }

        .menu-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 16px;
            padding: 22px 28px;
            background: #f8f3ea;
        }

        .arrow {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #2f1e10;
            color: #fff;
            font-size: 24px;
            cursor: pointer;
            user-select: none;
            transition: transform .2s, background .2s;
        }

        .arrow:hover {
            transform: scale(1.05);
            background: #433224;
        }

        .menu-name {
            flex: 1;
            text-align: center;
            font-size: 18px;
            font-weight: 700;
            color: #3f2920;
            background: rgba(255, 255, 255, 0.9);
            padding: 12px 24px;
            border-radius: 999px;
        }

        .see-more {
            background: #4f2d1f;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 400px;
            padding: 30px;
        }

        .see-more a {
            color: #f4e9dc;
            text-decoration: none;
            font-size: 24px;
            line-height: 1.4;
            font-weight: 600;
            text-align: center;
            font-size: 210%;
        }

        /* location */
        .location h1 {
            color: black;
            text-align: center;
            margin-bottom: 40px;
            padding-top: 40px;
            font-size: 38px;
            font-weight: 600;
        }

        iframe {
            width: 70%;
            margin-left: 15%;
            padding-bottom: 50px;
        }

        /* Footer */
        footer {
            background: #e8dcc8;
            padding: 50px 40px;
            font-family: Arial, sans-serif;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr 1fr;
            gap: 50px;
        }

        .footer-brand {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .footer-brand img {
            width: 120px;
            margin-bottom: 20px;
        }

        .footer-logo {
            width: 40px;
            height: 40px;
            margin-bottom: 20px;
            background: #2f1e10;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #f4e9dc;
            font-weight: bold;
            font-size: 20px;
        }

        .footer-socials {
            display: flex;
            gap: 12px;
            margin-top: 15px;
        }

        .footer-socials a {
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
            background: transparent;
            color: #2f1e10;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            transition: all 0.3s;
        }

        .footer-socials a:hover {
            background: #2f1e10;
            color: #f4e9dc;
        }

        .footer-column h3 {
            font-size: 14px;
            font-weight: 600;
            color: #2f1e10;
            margin-bottom: 18px;
        }

        .footer-column ul {
            list-style: none;
            padding: 0;
        }

        .footer-column li {
            margin-bottom: 12px;
        }

        .footer-column a {
            color: #2f1e10;
            text-decoration: none;
            font-size: 13px;
            transition: color 0.3s;
        }

        .footer-column a:hover {
            color: #5d3d2c;
        }
    </style>
</head>

<body>

    <section class="hero">
        <x-navbar />

        <div class="hero-content">
            <h1>Inhale the coffee,</h1>
            <h2>exhale the negativity</h2>
        </div>
    </section>

    <div class="our-story">
        <h1>Our Story</h1>

        <div class="card-story">
            <img src="{{ asset('about.jpg') }}" alt="Our Story">
            <p>The Heritage of Soluna Cafe Our story began on October 24th, 2022, born from a deep-rooted passion for authentic flavors and the art of hospitality. What started as a vision to create the perfect community getaway has evolved into Soluna Cafe, a place where every corner tells a story and every guest is treated like family. Since our first day, we have remained committed to the idea that a cafe should be more than just a place to eat—it should be an experience.</p>
        </div>
    </div>

    <section class="recommendation">
        <div class="title">
            <h1>Recommendation<br>Menu</h1>
        </div>

        <div class="menu-container">
            <div class="menu-card">
                <div class="menu-image">
                    <img src="{{ asset('images/avocado.jpg') }}" alt="Cappuccino">
                </div>

                <div class="menu-footer">
                    <span class="arrow">&#10094;</span>

                    <div class="menu-name">Avocado coffee</div>

                    <span class="arrow">&#10095;</span>
                </div>
            </div>

            <div class="see-more">
                <a href="#">
                    See More<br>
                    Recommendation
                </a>
            </div>

        </div>
    </section>

    <section>
        <div class="location">
            <h1>Our Location</h1>

            <iframe
                src="https://www.google.com/maps/embed?pb=..."
                width="100%"
                height="100%"
                style="border:0;"
                allowfullscreen=""
                loading="lazy">
            </iframe>
        </div>
    </section>

    <x-footer />

    <script>
        const slides = [{
                src: '{{ asset("images/avocado.jpg") }}',
                name: 'Avocado Coffe'
            },
            {
                src: '{{ asset("images/moctail.jpg") }}',
                name: 'Coffee Mocktail'
            },
            {
                src: '{{ asset("images/soffle.jpg") }}',
                name: 'Souffle Pancake'
            },
        ];

        let currentSlide = 0;
        const menuImage = document.querySelector('.menu-image img');
        const menuName = document.querySelector('.menu-name');
        const arrows = document.querySelectorAll('.menu-footer .arrow');

        function updateSlide(index) {
            currentSlide = (index + slides.length) % slides.length;
            menuImage.src = slides[currentSlide].src;
            menuName.textContent = slides[currentSlide].name;
        }

        arrows[0].addEventListener('click', () => updateSlide(currentSlide - 1));
        arrows[1].addEventListener('click', () => updateSlide(currentSlide + 1));
    </script>

</body>

</html>