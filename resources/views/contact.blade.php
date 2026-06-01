@extends('layouts.app')

@section('content')
    @include('components.contact.hero')

    <section class="bg-[#f6efe4] px-6 py-24 md:px-15">
        <div class="mx-auto grid max-w-270 gap-8 lg:grid-cols-[1.05fr_0.95fr]">
            <article class="overflow-hidden rounded-[28px] bg-white shadow-[0px_24px_60px_rgba(0,0,0,0.12)]">
                <img src="{{ asset('images/contact-us/image6.jpg') }}" alt="The Conf Lounge" class="aspect-[4/3] w-full object-cover">
                <div class="p-8 md:p-10">
                    <p class="font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.35em] text-[#8f5a3a]">Signature space</p>
                    <h2 class="mt-4 font-['Host_Grotesk'] text-[clamp(2rem,4vw,3.5rem)] font-bold leading-[1.02] text-[#2a1a13]">The Conf Lounge</h2>
                    <p class="mt-4 max-w-[520px] font-['Host_Grotesk'] text-[18px] leading-relaxed text-[#5d4a3d]">
                        A quiet, polished place for conversations that need a little more room to breathe. Ideal for meetups, private discussions, and unhurried coffee moments.
                    </p>

                    <div class="mt-8 grid gap-3 sm:grid-cols-2">
                        <div class="rounded-[18px] bg-[#f0f0e6] p-4">
                            <p class="text-[12px] uppercase tracking-[0.28em] text-[#8f5a3a]">Best for</p>
                            <p class="mt-2 font-['Host_Grotesk'] text-[18px] font-bold text-[#2a1a13]">Private meetings</p>
                        </div>
                        <div class="rounded-[18px] bg-[#f0f0e6] p-4">
                            <p class="text-[12px] uppercase tracking-[0.28em] text-[#8f5a3a]">Mood</p>
                            <p class="mt-2 font-['Host_Grotesk'] text-[18px] font-bold text-[#2a1a13]">Quiet and warm</p>
                        </div>
                    </div>
                </div>
            </article>

            <div class="grid gap-6">
                <article class="rounded-[28px] bg-[#3f2719] p-8 text-white shadow-[0px_24px_60px_rgba(0,0,0,0.14)]">
                    <p class="font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.35em] text-white/55">Quick help</p>
                    <h3 class="mt-4 max-w-[420px] font-['Host_Grotesk'] text-[clamp(1.7rem,3vw,2.8rem)] font-bold leading-[1.02] text-white">Need a booking or a catering quote?</h3>
                    <p class="mt-4 max-w-[460px] font-['Host_Grotesk'] text-[18px] leading-relaxed text-white/80">
                        We can usually help with a venue fit, timing, and capacity pretty quickly. Start with the date and we’ll take it from there.
                    </p>

                    <ul class="mt-8 space-y-4 font-['Host_Grotesk'] text-[16px] text-white/80">
                        <li class="flex items-start gap-3"><span class="mt-2 h-2.5 w-2.5 rounded-full bg-[#d9b08c]"></span><span>Lounge reservations for intimate groups.</span></li>
                        <li class="flex items-start gap-3"><span class="mt-2 h-2.5 w-2.5 rounded-full bg-[#d9b08c]"></span><span>Private event planning with food and drinks.</span></li>
                        <li class="flex items-start gap-3"><span class="mt-2 h-2.5 w-2.5 rounded-full bg-[#d9b08c]"></span><span>Fast responses for catering and partnership inquiries.</span></li>
                    </ul>
                </article>

                <div class="grid gap-6 sm:grid-cols-2">
                    <article class="overflow-hidden rounded-[24px] bg-white shadow-[0px_18px_44px_rgba(0,0,0,0.12)]">
                        <img src="{{ asset('images/contact-us/image7.jpg') }}" alt="Gatokaca Lounge" class="aspect-[4/3] w-full object-cover">
                        <div class="p-6">
                            <p class="font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.3em] text-[#8f5a3a]">Gatokaca Lounge</p>
                            <p class="mt-3 font-['Host_Grotesk'] text-[16px] leading-relaxed text-[#5d4a3d]">A setting for focused meetings or long, private conversations.</p>
                        </div>
                    </article>

                    <article class="overflow-hidden rounded-[24px] bg-white shadow-[0px_18px_44px_rgba(0,0,0,0.12)]">
                        <img src="{{ asset('images/contact-us/image8.jpg') }}" alt="Senopati Lounge" class="aspect-[4/3] w-full object-cover">
                        <div class="p-6">
                            <p class="font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.3em] text-[#8f5a3a]">Senopati Lounge</p>
                            <p class="mt-3 font-['Host_Grotesk'] text-[16px] leading-relaxed text-[#5d4a3d]">An alternate room for a quieter, more relaxed pace.</p>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section id="experiences" class="bg-[#3f2719] px-6 py-24 md:px-15">
        <div class="mx-auto max-w-270">
            <div class="mb-12 flex flex-col gap-4 md:flex-row md:items-end md:justify-between">
                <div>
                    <p class="font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.35em] text-white/55">Tailored spaces</p>
                    <h2 class="mt-4 font-['Host_Grotesk'] text-[clamp(2rem,4vw,3.4rem)] font-bold leading-[1.02] text-white">More than a contact page.</h2>
                </div>
                <p class="max-w-[520px] font-['Host_Grotesk'] text-[18px] leading-relaxed text-white/72">
                    A small tour of the experiences we can build around your visit, from private tables to full-service catering.
                </p>
            </div>

            <div class="grid gap-6 lg:grid-cols-3">
                <article class="overflow-hidden rounded-[24px] bg-[#f0f0e6] shadow-[0px_18px_44px_rgba(0,0,0,0.18)]">
                    <img src="{{ asset('images/contact-us/image9.jpg') }}" alt="Caterings" class="aspect-[4/3] w-full object-cover">
                    <div class="p-6">
                        <p class="font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.3em] text-[#8f5a3a]">Caterings</p>
                        <h3 class="mt-3 font-['Host_Grotesk'] text-[30px] font-bold leading-tight text-[#2a1a13]">For private events and celebrations</h3>
                        <p class="mt-3 font-['Host_Grotesk'] text-[16px] leading-relaxed text-[#5d4a3d]">We bring the same warmth and pacing from the cafe into your event space.</p>
                    </div>
                </article>

                <article class="rounded-[24px] bg-white p-6 shadow-[0px_18px_44px_rgba(0,0,0,0.18)]">
                    <div class="flex h-full flex-col justify-between">
                        <div>
                            <p class="font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.3em] text-[#8f5a3a]">Service style</p>
                            <h3 class="mt-3 font-['Host_Grotesk'] text-[30px] font-bold leading-tight text-[#2a1a13]">A little slower, in the best way.</h3>
                            <p class="mt-3 font-['Host_Grotesk'] text-[16px] leading-relaxed text-[#5d4a3d]">Our team aims for calm, attentive service so the space feels cared for from the first message to the last cup.</p>
                        </div>

                        <div class="mt-8 space-y-3 rounded-[20px] bg-[#f6efe4] p-5">
                            <div class="flex items-center justify-between gap-4 border-b border-[#3f2719]/10 pb-3">
                                <span class="font-['Host_Grotesk'] text-[15px] font-semibold text-[#2a1a13]">Hosting</span>
                                <span class="font-['Host_Grotesk'] text-[15px] text-[#5d4a3d]">Lounge & private rooms</span>
                            </div>
                            <div class="flex items-center justify-between gap-4 border-b border-[#3f2719]/10 pb-3">
                                <span class="font-['Host_Grotesk'] text-[15px] font-semibold text-[#2a1a13]">Catering</span>
                                <span class="font-['Host_Grotesk'] text-[15px] text-[#5d4a3d]">Events and off-site</span>
                            </div>
                            <div class="flex items-center justify-between gap-4">
                                <span class="font-['Host_Grotesk'] text-[15px] font-semibold text-[#2a1a13]">Reply speed</span>
                                <span class="font-['Host_Grotesk'] text-[15px] text-[#5d4a3d]">Usually same day</span>
                            </div>
                        </div>
                    </div>
                </article>

                <article class="overflow-hidden rounded-[24px] bg-[#f0f0e6] shadow-[0px_18px_44px_rgba(0,0,0,0.18)]">
                    <img src="{{ asset('images/contact-us/image6.jpg') }}" alt="The Conf Lounge" class="aspect-[4/3] w-full object-cover">
                    <div class="p-6">
                        <p class="font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.3em] text-[#8f5a3a]">The Conf Lounge</p>
                        <h3 class="mt-3 font-['Host_Grotesk'] text-[30px] font-bold leading-tight text-[#2a1a13]">Best for the conversations that matter.</h3>
                        <p class="mt-3 font-['Host_Grotesk'] text-[16px] leading-relaxed text-[#5d4a3d]">A polished room where you can step away from the noise and settle in properly.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    @include('components.contact.form')

    @include('components.footer')
@endsection
