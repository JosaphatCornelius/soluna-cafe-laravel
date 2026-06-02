<script>
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
      initCarousel(targetId);
    });
  });

  const carousels = {};

  function initCarousel(tabName) {
    const track = document.getElementById(`${tabName}-track`);
    const items = track.querySelectorAll('.carousel-item');
    const indicatorsContainer = document.getElementById(`${tabName}-indicators`);
    const prevBtn = document.querySelector(`.carousel-btn.prev[data-carousel="${tabName}"]`);
    const nextBtn = document.querySelector(`.carousel-btn.next[data-carousel="${tabName}"]`);

    if (!track || !items.length) return;

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
      const maxIndex = getMaxIndex();

      if (currentIndex > maxIndex) {
        currentIndex = maxIndex;
      }

      // Align to the actual rendered position of the first item on this page,
      // clamped so the final page never scrolls past the last item (no blank gap).
      const targetItem = items[currentIndex * getItemsPerView()];
      const maxScroll = Math.max(0, track.scrollWidth - track.clientWidth);
      const offset = targetItem ? Math.min(targetItem.offsetLeft, maxScroll) : 0;
      track.style.transform = `translateX(-${offset}px)`;

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

    prevBtn.addEventListener('click', prevSlide);
    nextBtn.addEventListener('click', nextSlide);

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

    let autoPlayInterval = setInterval(nextSlide, 4000);

    track.addEventListener('mouseenter', () => clearInterval(autoPlayInterval));
    track.addEventListener('mouseleave', () => {
      autoPlayInterval = setInterval(nextSlide, 4000);
    });

    window.addEventListener('resize', () => {
      currentIndex = 0;
      updateCarousel();
    });

    carousels[tabName] = {
      updateCarousel,
      goToSlide,
      nextSlide,
      prevSlide
    };

    updateCarousel();
  }

  tabs.forEach(tab => initCarousel(tab.getAttribute('data-tab')));
</script>
