<section id="contact-form" class="relative overflow-hidden bg-[#2d1a11]">
    <img src="{{ asset('images/contact-us/image10.jpg') }}" alt="Soluna Cafe contact form background" class="absolute inset-0 h-full w-full object-cover">
    <div class="absolute inset-0 bg-[linear-gradient(135deg,rgba(20,12,7,0.92),rgba(58,35,22,0.76))]"></div>
    <div class="absolute right-[-80px] top-16 h-64 w-64 rounded-full bg-[#f0f0e6]/10 blur-3xl"></div>

    <div class="relative z-10 px-6 py-24 md:px-15">
        <div class="mx-auto grid max-w-[1180px] gap-8 lg:grid-cols-[0.9fr_1.1fr] lg:items-start">
            <aside class="rounded-[28px] border border-white/10 bg-white/10 p-8 text-white backdrop-blur-md">
                <p class="font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.35em] text-white/55">Reach us</p>
                <h2 class="mt-4 max-w-[420px] font-['Host_Grotesk'] text-[clamp(2rem,4vw,3.25rem)] font-bold leading-[1.02] text-white">Contact Us Now, or Later!</h2>
                <p class="mt-5 max-w-[420px] font-['Host_Grotesk'] text-[18px] leading-relaxed text-white/80">
                    Tell us what you're planning and we'll shape the space around it. Lounge reservations, catering questions, or a simple first hello all work.
                </p>

                <div class="mt-8 space-y-4">
                    <div class="rounded-[18px] border border-white/10 bg-black/10 p-4">
                        <p class="text-[12px] uppercase tracking-[0.28em] text-white/55">Email</p>
                        <p class="mt-2 font-['Host_Grotesk'] text-[18px] font-bold text-white">hello@solunacafe.co</p>
                    </div>
                    <div class="rounded-[18px] border border-white/10 bg-black/10 p-4">
                        <p class="text-[12px] uppercase tracking-[0.28em] text-white/55">Visit</p>
                        <p class="mt-2 font-['Host_Grotesk'] text-[18px] font-bold text-white">Open daily for coffee, meetings, and events</p>
                    </div>
                    <div class="rounded-[18px] border border-white/10 bg-black/10 p-4">
                        <p class="text-[12px] uppercase tracking-[0.28em] text-white/55">Fastest reply</p>
                        <p class="mt-2 font-['Host_Grotesk'] text-[18px] font-bold text-white">Same day on WhatsApp or email</p>
                    </div>
                </div>
            </aside>

            <div class="rounded-[28px] bg-[#f0f0e6] p-6 shadow-[0px_24px_60px_rgba(0,0,0,0.28)] md:p-10">
                @if(session('status'))
                    <div class="mb-6 rounded-[14px] bg-green-100 px-4 py-3 text-green-800">{{ session('status') }}</div>
                @endif

                <div class="mb-8 flex flex-col gap-3 border-b border-[#3f2719]/10 pb-6">
                    <p class="font-['Host_Grotesk'] text-[13px] font-bold uppercase tracking-[0.35em] text-[#8f5a3a]">Message form</p>
                    <h3 class="font-['Host_Grotesk'] text-[clamp(1.75rem,3vw,2.7rem)] font-bold leading-[1.05] text-[#2a1a13]">Send a note and we’ll shape the visit.</h3>
                    <p class="max-w-[640px] font-['Host_Grotesk'] text-[17px] leading-relaxed text-[#5d4a3d]">
                        A clear date, guest count, and the mood you want is usually enough to get started.
                    </p>
                </div>

                <form action="{{ url('/contact') }}" method="POST" class="grid gap-5 md:grid-cols-2">
                    @csrf
                    <div class="md:col-span-1">
                        <label class="mb-3 block font-['Host_Grotesk'] text-[16px] font-bold text-[#2a1a13]">Name</label>
                        <input name="name" placeholder="Your name" class="w-full rounded-[14px] border border-[#3f2719]/15 bg-white px-4 py-3 outline-none ring-0 transition focus:border-[#3f2719]/40 focus:ring-4 focus:ring-[#3f2719]/10" />
                    </div>

                    <div class="md:col-span-1">
                        <label class="mb-3 block font-['Host_Grotesk'] text-[16px] font-bold text-[#2a1a13]">Email</label>
                        <input name="email" placeholder="you@example.com" class="w-full rounded-[14px] border border-[#3f2719]/15 bg-white px-4 py-3 outline-none ring-0 transition focus:border-[#3f2719]/40 focus:ring-4 focus:ring-[#3f2719]/10" />
                    </div>

                    <div class="md:col-span-2">
                        <label class="mb-3 block font-['Host_Grotesk'] text-[16px] font-bold text-[#2a1a13]">Message</label>
                        <textarea name="message" placeholder="Tell us what you need..." class="min-h-[180px] w-full rounded-[14px] border border-[#3f2719]/15 bg-white px-4 py-3 outline-none ring-0 transition focus:border-[#3f2719]/40 focus:ring-4 focus:ring-[#3f2719]/10" rows="5"></textarea>
                    </div>

                    <div class="md:col-span-2 flex items-center justify-between gap-4 border-t border-[#3f2719]/10 pt-5">
                        <p class="max-w-[420px] font-['Host_Grotesk'] text-[14px] leading-relaxed text-[#6a5849]">
                            We usually reply within one business day. If it is urgent, mention it in the message.
                        </p>
                        <button type="submit" class="rounded-full bg-[#3f2719] px-7 py-3 font-['Host_Grotesk'] text-[16px] font-bold text-white transition-transform duration-200 hover:-translate-y-0.5 hover:bg-[#2a1a13]">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
