@props(['label', 'value', 'note' => null])

<article class="rounded-[24px] border border-[#dbcdbd] bg-white p-6 shadow-[0px_18px_44px_rgba(0,0,0,0.06)]">
    <p class="font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.3em] text-[#8f5a3a]">{{ $label }}</p>
    <div class="mt-4 flex items-end justify-between gap-4">
        <h3 class="font-['Host_Grotesk'] text-[clamp(2rem,4vw,3rem)] font-bold leading-none text-[#241810]">{{ $value }}</h3>
        <div class="h-12 w-12 rounded-full bg-[#f0f0e6]"></div>
    </div>
    @if($note)
        <p class="mt-4 font-['Host_Grotesk'] text-[15px] leading-relaxed text-[#5d4a3d]">{{ $note }}</p>
    @endif
</article>