<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'CMS Dashboard') - {{ config('app.name', 'Soluna Cafe') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Host+Grotesk:wght@400;500;700;800&family=MedievalSharp&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/app.css">
    @stack('styles')
</head>
<body class="bg-[#f3efe5] text-[#241810] antialiased">
    <div class="min-h-screen lg:flex">
        @include('components.cms.sidebar')

        <div class="flex min-h-screen flex-1 flex-col lg:pl-[290px]">
            <header class="border-b border-[#d8c9b7] bg-[rgba(255,255,255,0.72)] px-6 py-5 backdrop-blur md:px-10">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <div>
                        <p class="font-['Host_Grotesk'] text-[12px] font-bold uppercase tracking-[0.35em] text-[#8f5a3a]">Soluna CMS</p>
                        <h1 class="mt-2 font-['Host_Grotesk'] text-[clamp(1.7rem,3vw,2.6rem)] font-bold leading-tight text-[#241810]">@yield('title', 'Dashboard')</h1>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        <div class="rounded-full border border-[#d8c9b7] bg-white px-4 py-2 font-['Host_Grotesk'] text-[14px] text-[#5d4a3d]">Backend not ready</div>
                        <a href="{{ url('/') }}" class="rounded-full bg-[#3f2719] px-5 py-2 font-['Host_Grotesk'] text-[14px] font-bold text-white transition-colors duration-200 hover:bg-[#2a1a13]">Preview site</a>
                    </div>
                </div>
            </header>

            <main class="flex-1 px-6 py-8 md:px-10 md:py-10">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>