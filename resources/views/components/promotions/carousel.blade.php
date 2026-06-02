<section class="bg-[#f4ede3] px-6 py-16 md:px-15">
    @if (empty($slides))
        <div class="mx-auto max-w-6xl rounded-3xl bg-[#23160f] px-10 py-16 text-center text-white shadow-[0_30px_80px_rgba(0,0,0,0.18)]">
            <p class="text-lg text-[#e8dcc8]">No promotions available at the moment.</p>
        </div>
    @else
    <div class="mx-auto max-w-6xl overflow-hidden rounded-3xl bg-[#23160f] px-5 py-8 shadow-[0_30px_80px_rgba(0,0,0,0.18)] md:px-10 md:py-12">
        <div class="relative">
            <div class="carousel-track flex transition-transform duration-500 ease-in-out" data-carousel-track>
                @foreach ($slides as $slide)
                    <article class="min-w-full shrink-0 px-4 md:px-6">
                        <div class="grid gap-8 md:grid-cols-[0.95fr_1.05fr] items-center">
                            <div class="overflow-hidden rounded-3xl bg-[#f6f1e7] shadow-xl">
                                <img src="{{ $slide['image'] }}" alt="{{ $slide['subtitle'] }}" class="h-80 w-full object-cover">
                            </div>
                            <div class="space-y-5 text-white">
                                <span class="inline-flex rounded-full bg-[#d7b16f] px-4 py-2 text-xs uppercase tracking-[0.32em]">{{ $slide['tag'] }}</span>
                                <p class="text-sm uppercase tracking-[0.32em] text-[#e6d8c3]">{{ $slide['title'] }}</p>
                                <h2 class="text-4xl font-bold leading-tight text-white md:text-5xl">{{ $slide['subtitle'] }}</h2>
                                <p class="max-w-xl text-base leading-relaxed text-[#e8dcc8]">{{ $slide['description'] }}</p>
                                <a href="#contact" class="inline-flex rounded-full bg-[#dcb36f] px-6 py-3 text-sm font-semibold uppercase tracking-[0.25em] text-[#24180f] transition hover:bg-[#b58a46]">{{ $slide['cta'] }}</a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <button type="button" class="promo-prev absolute left-4 top-1/2 z-10 -translate-y-1/2 rounded-full bg-white/90 p-3 text-2xl font-bold text-[#23160f] shadow-lg transition hover:bg-white md:left-6" aria-label="Previous promotion">‹</button>
            <button type="button" class="promo-next absolute right-4 top-1/2 z-10 -translate-y-1/2 rounded-full bg-white/90 p-3 text-2xl font-bold text-[#23160f] shadow-lg transition hover:bg-white md:right-6" aria-label="Next promotion">›</button>
        </div>

        <div class="mt-6 flex justify-center gap-3">
            @foreach ($slides as $index => $slide)
                <button type="button" class="promo-dot h-3.5 w-3.5 rounded-full bg-white opacity-40 transition" data-slide="{{ $index }}" aria-label="Show slide {{ $index + 1 }}"></button>
            @endforeach
        </div>
    </div>
    @endif
</section>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const track = document.querySelector('[data-carousel-track]');
        if (!track) return;

        const slides = Array.from(track.children);
        const prev = document.querySelector('.promo-prev');
        const next = document.querySelector('.promo-next');
        const dots = Array.from(document.querySelectorAll('.promo-dot'));
        let currentIndex = 0;

        const updateCarousel = function () {
            track.style.transform = `translateX(-${currentIndex * 100}%)`;
            dots.forEach((dot, index) => {
                dot.classList.toggle('opacity-100', index === currentIndex);
                dot.classList.toggle('opacity-40', index !== currentIndex);
            });
        };

        const showPrevious = function () {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            updateCarousel();
        };

        const showNext = function () {
            currentIndex = (currentIndex + 1) % slides.length;
            updateCarousel();
        };

        if (prev) prev.addEventListener('click', showPrevious);
        if (next) next.addEventListener('click', showNext);

        dots.forEach(dot => {
            dot.addEventListener('click', function () {
                currentIndex = Number(this.dataset.slide);
                updateCarousel();
            });
        });

        updateCarousel();
    });
</script>
@endpush
