<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Soluna Cafe - Story</title>
  
  @vite('resources/css/input.css')
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Host+Grotesk:ital,wght@0,300..800;1,300..800&display=swap');
    
    html {
      scroll-behavior: smooth;
    }
    .no-scrollbar::-webkit-scrollbar {
      display: none;
    }
    .no-scrollbar {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }    .menu-link.active {
      color: #2c2623;
      font-weight: 700;
    }  </style>
</head>
<body class="bg-[#F0F0E6] text-[#2c2623] font-['Host_Grotesk'] min-h-screen flex items-center justify-center p-6 md:p-12">

  <div class="max-w-7xl w-full grid grid-cols-1 md:grid-cols-12 gap-8 relative min-h-144 md:px-8">

    <div class="md:col-span-3 flex flex-col pt-4 pr-5"> 
      <h1 class="text-4xl font-bold tracking-wide mb-12">About us.</h1>
      
      <nav class="space-y-4">
        <a href="#story" class="menu-link block text-lg font-medium decoration-2 pb-3">• Story</a>
        <a href="#chef" class="menu-link block text-lg font-medium text-gray-600 hover:text-[#2c2623] transition pb-3">• Chef</a>
        <a href="#awards" class="menu-link block text-lg font-medium text-gray-600 hover:text-[#2c2623] transition pb-3">• Awards</a>
      </nav>
    </div>

    <div id="scroll-container" class="md:col-span-9 h-144 overflow-y-scroll snap-y snap-mandatory no-scrollbar md:pl-8">
        
        <section id="story" class="h-full w-full flex flex-col justify-center snap-start pb-12">
          <div class="max-w-xl">

              <blockquote class="italic text-3xl md:text-2xl font-tulisan mb-8 leading-relaxed tracking-wide">
                  {{ $sections['about-story']?->title ?? '"Didirikan pada 12 Desember 2012, Soluna Cafe lahir dari hasrat sederhana akan kopi yang luar biasa dan komunitas."' }}
              </blockquote>

              <p class="text-base md:text-lg leading-relaxed text-justify">
                  {{ $sections['about-story']?->description ?? 'Kisah kami dimulai pada 12 Desember 2012, lahir dari hasrat yang mendalam akan cita rasa otentik dan seni keramahan. Apa yang dimulai sebagai visi untuk menciptakan tempat peristirahatan komunitas yang sempurna telah berkembang menjadi Soluna Cafe, tempat di mana setiap sudut menceritakan sebuah kisah dan setiap tamu diperlakukan seperti keluarga. Sejak hari pertama kami, kami tetap berkomitmen pada gagasan bahwa sebuah kafe seharusnya lebih dari sekadar tempat makan—itu seharusnya menjadi sebuah pengalaman.' }}
              </p>

          </div>
        </section>
        <section id="chef" class="h-full w-full flex flex-col justify-center snap-start relative pb-12">
            <div class= "max-w-2xl">
                <blockquote class="italic text-3xl md:text-2xl font-tulisan mb-8 leading-relaxed tracking-wide">"Memasak bukan sekadar
                     mencampur bahan makanan, melainkan sebuah seni untuk menciptakan kebahagiaan dan 
                     memori indah bagi setiap tamu yang menikmatinya."<span class="block text-right text-2xl mt-2">-Chef Kevin</span></blockquote>

                <h3 class="font-bold mb:4 text-2xl ">{{ $sections['about-chef']?->title ?? 'Dedikasi, Pengalaman, dan Cita Rasa High-Class.' }}</h3>
                <p class="text-base md:text-lg leading-relaxed text-justify mb:6" >{{ $sections['about-chef']?->description ?? 'Dengan pengalaman lebih dari 67 tahun di industri kuliner skala internasional, Chef Kevin Kristianto membawa keahlian mendalam dan filosofi memasak yang autentik ke dapur kami. Sebelum memimpin tim kuliner kami, beliau telah mengasah bakatnya di Cafe Batavia. Rekam jejak ini membentuk standar kerja beliau yang tanpa kompromi dalam hal rasa, kebersihan, dan estetika presentasi piring.' }}</p>
                <ul class="space-y-2 text-base font-bold max-w-xs">
                    <li class="flex items-center justify-between">
                        <span>• Bahan baku terbaik</span>
                        <span class="text-gray-400 text-sm">✔</span>
                    </li>
                    <li class="flex items-center justify-between">
                        <span>• Teknik Memasak</span>
                        <span class="text-gray-400 text-sm">✔</span>
                    </li>
                    <li class="flex items-center justify-between">
                        <span>• Konsistensi rasa</span>
                        <span class="text-gray-400 text-sm">✔</span>
                    </li>
                </ul>  
                                 
            </div>
        </section>
        <section id= "awards" class="h-full w-full justify-center snap-start relative pb-12">
          <h1 class="text-3xl font-bold mb-15 space-y-2 max-w-xs">{{ $sections['about-awards']->title ?? 'Awards yang berhasil didapatkan:' }}</h1>

          @php
              $awards = isset($sections['about-awards'])
                  ? preg_split('/\r\n|\r|\n/', trim($sections['about-awards']->description))
                  : ['Salon Cullinaire 2019 by ACP - FHI', 'Tea Cocktail - Gold Medal', 'Beef Challange - Silver Medal', 'Pan Fried Noodle - Diploma Award', 'US Potatoes - Diploma Award'];
          @endphp

          <ul>
            @foreach ($awards as $award)
                <li class="flex items-center justify-between">• {{ $award }}</li>
            @endforeach
          </ul>

        </section>
        </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const container = document.getElementById('scroll-container');
        const links = document.querySelectorAll('.menu-link');
        const sections = Array.from(document.querySelectorAll('section[id]'));

        function setActiveMenu() {
          const top = container.getBoundingClientRect().top;
          let activeId = sections[0]?.id;
          let minDistance = Number.POSITIVE_INFINITY;

          sections.forEach(section => {
            const rect = section.getBoundingClientRect();
            const distance = Math.abs(rect.top - top);
            if (distance < minDistance) {
              minDistance = distance;
              activeId = section.id;
            }
          });

          links.forEach(link => {
            if (link.getAttribute('href') === '#' + activeId) {
              link.classList.add('active');
            } else {
              link.classList.remove('active');
            }
          });
        }

        links.forEach(link => {
          link.addEventListener('click', function (event) {
            event.preventDefault();
            const targetId = this.getAttribute('href');
            const target = document.querySelector(targetId);
            if (!target) return;
            container.scrollTo({ top: target.offsetTop, behavior: 'smooth' });
          });
        });

        container.addEventListener('scroll', setActiveMenu, { passive: true });
        setActiveMenu();
      });
    </script>
 </body>
</html>