@props(['image','title','description'=>null])
<article class="overflow-hidden rounded-[10px] bg-transparent">
    <div class="overflow-hidden rounded-[10px]">
        <img src="{{ asset($image) }}" alt="{{ $title }}" class="h-full w-full object-cover">
    </div>
    <div class="pt-5 text-white">
        <h3 class="font-['Host_Grotesk'] text-[40px] font-bold leading-none">{{ $title }}</h3>
        @if($description)
            <p class="mt-2 max-w-[436px] font-['Host_Grotesk'] text-[20px] leading-normal text-white/95">{{ $description }}</p>
        @endif
    </div>
</article>
