<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body{
            overflow-x:hidden;
            background-color: #F0F0E6;
        }

        /* Hero Section */
        .hero{
            width:100%;
            height:100vh;
            background:
                linear-gradient(
                    rgba(0,0,0,0.55),
                    rgba(0,0,0,0.55)
                ),
                url('{{ asset("mainpic.jpg") }}');
            background-size:cover;
            background-position:center;
            background-repeat:no-repeat;
            position:relative;
        }

        /* Hero Content */
        .hero-content{
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            text-align:center;
            color:white;
        }

        .hero-content h1{
            font-size:55px;
            font-weight:300;
            line-height:1.2;
            text-shadow:2px 2px 8px rgba(0,0,0,0.5);
        }

        .hero-content h2{
            font-size:55px;
            font-weight:300;
            text-shadow:2px 2px 8px rgba(0,0,0,0.5);
        }

        /* our story */
        .our-story h1{
            font-weight: 600;
            text-align:center;
            margin-bottom:40px;
            padding-top:40px;
            font-size:38px;
            line-height:1.1;
            letter-spacing:1px;
            color:#2f1e10;
        }
        .card-story{
            width: 50%;
            margin: auto;
            border-radius: 10px;
            box-shadow: 2px 5px 20px rgba(0, 0, 0, 0.3);
        }
        .card-story img, p{
            margin: 30px;
        }
        .card-story img{
            width: 90%;
            border-radius: 10px;
        }
        .card-story p{
            padding: 0 40px 40px 40px;
            text-align: justify;
        }

        .recommendation{
            padding: 80px 20px 100px;
            background:#f5f1e7;
        }
        .recommendation .title{
            text-align:center;
            margin-bottom:40px;
        }
        .recommendation .title h1{
            font-weight: 600;
            text-align:center;
            margin-bottom:40px;
            padding-top:40px;
            font-size:38px;
            line-height:1.1;
            letter-spacing:1px;
            color:#2f1e10;
        }
        .menu-container{
            display:grid;
            grid-template-columns:1.4fr 1fr;
            gap:30px;
            align-items:center;
            max-width:1120px;
            margin:0 auto;
        }
        .menu-image{
            width:100%;
            min-height:320px;
            background:#e9e1d5;
        }
        .menu-image img{
            width:100%;
            object-fit:cover;
            display:block;
            border-radius: 20px;
        }
        .menu-footer{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:16px;
            padding:22px 28px;
            background:#f8f3ea;
        }
        .arrow{
            width:44px;
            height:44px;
            display:flex;
            align-items:center;
            justify-content:center;
            border-radius:50%;
            background:#2f1e10;
            color:#fff;
            font-size:24px;
            cursor:pointer;
            user-select:none;
            transition:transform .2s, background .2s;
        }
        .arrow:hover{
            transform:scale(1.05);
            background:#433224;
        }
        .menu-name{
            flex:1;
            text-align:center;
            font-size:18px;
            font-weight:700;
            color:#3f2920;
            background:rgba(255,255,255,0.9);
            padding:12px 24px;
            border-radius:999px;
        }
        .see-more{
            background:#4f2d1f;
            border-radius:20px;
            display:flex;
            align-items:center;
            justify-content:center;
            min-height:400px;
            padding:30px;
        }
        .see-more a{
            color:#f4e9dc;
            text-decoration:none;
            font-size:24px;
            line-height:1.4;
            font-weight:600;
            text-align:center;
            font-size: 210%;
        }

        /* location */
        .location h1{
            font-weight: 600;
            text-align:center;
            margin-bottom:40px;
            padding-top:40px;
            font-size:38px;
            line-height:1.1;
            letter-spacing:1px;
            color:#2f1e10;
        }
        iframe{
            width: 70%;
            margin-left: 15%;
            padding-bottom: 50px;
        }

    </style>
</head>
<body>

    <section class="hero">
        @include('components.navbar')

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

    @include('components.footer')

<script>
    const slides = [
        { src: '{{ asset("images/avocado.jpg") }}', name: 'Avocado Coffe' },
        { src: '{{ asset("images/moctail.jpg") }}', name: 'Coffee Mocktail' },
        { src: '{{ asset("images/soffle.jpg") }}', name: 'Souffle Pancake' },
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