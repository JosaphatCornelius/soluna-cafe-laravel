@props(['title', 'description'])

<section class="bg-[#f0f0e6] px-6 py-16 text-center md:px-15 md:py-18">
    <div class="mx-auto max-w-[840px]">
        <h2 class="font-['Host_Grotesk'] text-[clamp(2rem,4vw,3.2rem)] font-bold leading-[1.05] text-[#1f1710]">
            {{ $title }}
        </h2>
        <p class="mx-auto mt-4 max-w-[800px] font-['Host_Grotesk'] text-[clamp(1rem,2vw,1.25rem)] leading-relaxed text-[#1f1710]">
            {{ $description }}
        </p>
    </div>
</section>