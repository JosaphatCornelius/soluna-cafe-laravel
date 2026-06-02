@props(['eyebrow', 'title', 'description' => null])

<div class="mb-6 flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
    <div>
        <p class="font-['Host_Grotesk'] text-[12px] font-bold uppercase tracking-[0.35em] text-[#8f5a3a]">{{ $eyebrow }}</p>
        <h2 class="mt-2 font-['Host_Grotesk'] text-[clamp(1.4rem,3vw,2.2rem)] font-bold leading-tight text-[#241810]">{{ $title }}</h2>
    </div>

    @if($description)
        <p class="max-w-[560px] font-['Host_Grotesk'] text-[15px] leading-relaxed text-[#5d4a3d]">{{ $description }}</p>
    @endif
</div>