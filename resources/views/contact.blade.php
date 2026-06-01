@extends('layouts.app')

@section('content')
    @include('components.contact.hero')

    <section class="bg-[#f0f0e6] px-6 py-[96px] md:px-[60px]">
        <div class="mx-auto max-w-[1080px]">
            <article class="mx-auto max-w-[796px] rounded-[10px] bg-[#f0f0e6] p-0 shadow-[0px_8px_24px_rgba(0,0,0,0.14)]">
                <img src="{{ asset('images/contact-us/image6.jpg') }}" alt="The Conf Lounge" class="mx-auto block w-full rounded-[10px] object-cover">
                <p class="px-6 py-8 text-center font-['Host_Grotesk'] text-[40px] font-bold leading-none text-black md:px-10 md:py-10">The Conf Lounge</p>
            </article>
        </div>
    </section>

    <section class="bg-[#3f2719] px-6 py-[120px] text-white md:px-[60px]">
        <div class="mx-auto max-w-[1080px] space-y-[96px]">
            <div class="rounded-[10px] bg-[#f0f0e6] p-4 shadow-[0px_8px_24px_rgba(0,0,0,0.14)] md:p-6">
                <div class="grid items-center gap-10 md:grid-cols-[481px_minmax(0,1fr)]">
                    <div>
                        <img src="{{ asset('images/contact-us/image7.jpg') }}" alt="Gatokaca Lounge" class="mx-auto block h-auto w-full rounded-[10px] object-cover">
                    </div>
                    <div class="max-w-[436px] text-right text-black md:justify-self-end">
                        <h3 class="font-['Host_Grotesk'] text-[40px] font-bold leading-none">Gatokaca Lounge</h3>
                        <p class="mt-2 font-['Host_Grotesk'] text-[20px] leading-normal">The best rooms for relaxing, or just chatting privately with some of your best friends!</p>
                    </div>
                </div>
            </div>

            <div class="rounded-[10px] bg-[#f0f0e6] p-4 shadow-[0px_8px_24px_rgba(0,0,0,0.14)] md:p-6">
                <div class="grid items-center gap-10 md:grid-cols-[1fr_483px]">
                    <div class="max-w-[436px] text-black">
                        <h3 class="font-['Host_Grotesk'] text-[40px] font-bold leading-none">Senopati Lounge</h3>
                        <p class="mt-2 font-['Host_Grotesk'] text-[20px] leading-normal">An alternative to your common busy lounge in Senopati!</p>
                    </div>
                    <div>
                        <img src="{{ asset('images/contact-us/image8.jpg') }}" alt="Senopati Lounge" class="mx-auto block h-auto w-full rounded-[10px] object-cover">
                    </div>
                </div>
            </div>

            <div class="rounded-[10px] bg-[#f0f0e6] p-4 shadow-[0px_8px_24px_rgba(0,0,0,0.14)] md:p-6">
                <div class="grid items-center gap-10 md:grid-cols-[476px_minmax(0,1fr)]">
                    <div>
                        <img src="{{ asset('images/contact-us/image9.jpg') }}" alt="Caterings" class="mx-auto block h-auto w-full rounded-[10px] object-cover">
                    </div>
                    <div class="max-w-[436px] text-black">
                        <h3 class="font-['Host_Grotesk'] text-[40px] font-bold leading-none">Caterings</h3>
                        <p class="mt-2 font-['Host_Grotesk'] text-[20px] leading-normal">Surprise, surprise! We are also doing caterings for your finest of events. Everybody can enjoy!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('components.contact.form')

    @include('components.footer')
@endsection
