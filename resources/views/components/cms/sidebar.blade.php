@php
    $routeContent = request()->route('content');
    $editingAbout = $routeContent instanceof \App\Models\Content && $routeContent->isAboutSection();

    $navItems = [
        [
            'label' => 'Overview',
            'route' => 'cms.dashboard',
            'active' => request()->routeIs('cms.dashboard'),
        ],
        [
            'label' => 'Homepage',
            'route' => 'cms.content.index',
            'active' => request()->routeIs('cms.content.*') && ! $editingAbout,
        ],
        [
            'label' => 'About Us',
            'route' => 'cms.about.index',
            'active' => request()->routeIs('cms.about.*') || $editingAbout,
        ],
        [
            'label' => 'Products',
            'route' => 'cms.products.index',
            'active' => request()->routeIs('cms.products.*'),
        ],
        [
            'label' => 'Promotions',
            'route' => 'cms.promotions.index',
            'active' => request()->routeIs('cms.promotions.*'),
        ],
        [
            'label' => 'Recommendations',
            'route' => 'cms.recommendations.index',
            'active' => request()->routeIs('cms.recommendations.*'),
        ],
        [
            'label' => 'Messages',
            'route' => 'cms.contacts.index',
            'active' => request()->routeIs('cms.contacts.*'),
        ],
    ];
@endphp

<aside class="border-b border-[#d8c9b7] bg-[#3f2719] px-6 py-6 text-white lg:fixed lg:inset-y-0 lg:left-0 lg:w-[290px] lg:border-b-0 lg:border-r">
    <div class="flex items-center justify-between gap-4 lg:block">
        <div>
            <p class="font-['MedievalSharp'] text-[28px] leading-none text-white">Soluna Cafe</p>
            <p class="mt-2 font-['Host_Grotesk'] text-[13px] uppercase tracking-[0.3em] text-white/55">Content dashboard</p>
        </div>

        <div class="rounded-full bg-white/10 px-3 py-1 font-['Host_Grotesk'] text-[12px] uppercase tracking-[0.28em] text-white/70 lg:mt-6 lg:inline-flex">
            Simple CMS
        </div>
    </div>

    <nav class="mt-8">
        <p class="font-['Host_Grotesk'] text-[12px] font-bold uppercase tracking-[0.3em] text-white/45">Navigation</p>
        <ul class="mt-4 space-y-2">
            @foreach ($navItems as $item)
                <li>
                    <a href="{{ route($item['route']) }}" class="flex items-center justify-between rounded-[16px] px-4 py-3 font-['Host_Grotesk'] text-[15px] transition-colors duration-200 {{ $item['active'] ? 'bg-white text-[#3f2719] font-bold' : 'text-white/75 hover:bg-white/10 hover:text-white' }}">
                        <span>{{ $item['label'] }}</span>
                        <span class="text-[12px] {{ $item['active'] ? 'text-[#3f2719]/70' : 'text-white/35' }}">0{{ $loop->iteration }}</span>
                    </a>
                </li>
            @endforeach
        </ul>
    </nav>

    <div class="mt-8 rounded-[22px] bg-white/10 p-4 backdrop-blur-sm">
        <p class="font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.28em] text-white/55">Status</p>
        <p class="mt-2 font-['Host_Grotesk'] text-[15px] leading-relaxed text-white/80">Signed in as {{ auth()->user()->name }}. Changes you make here update the live site.</p>
    </div>
</aside>