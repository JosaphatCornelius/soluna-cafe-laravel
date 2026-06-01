<section class="relative overflow-hidden bg-[#2d1a11]">
    <img src="{{ asset('images/promotions/contact-bg.png') }}" alt="Soluna Cafe contact background" class="absolute inset-0 h-full w-full object-cover">
    <div class="absolute inset-0 bg-[rgba(0,0,0,0.6)]"></div>

    <div class="relative z-10 mx-auto max-w-[1080px] px-6 py-24 md:px-15">
        <div class="mx-auto max-w-[427px] text-center md:mx-0 md:ml-[326px] md:text-left">
            <h2 class="font-['Host_Grotesk'] text-[clamp(2rem,4vw,3.25rem)] font-bold leading-[1.02] text-white">
                Contact Us Now, or Later!
            </h2>

            <form action="{{ route('contact.submit') }}" method="POST" class="mt-5 grid gap-4">
                @csrf

                <div>
                    <label class="mb-1 block font-['Host_Grotesk'] text-[20px] font-bold leading-none text-white">Name</label>
                    <input type="text" name="name" class="h-[50px] w-full rounded-[10px] border-0 bg-[#f0f0e6] px-4 outline-none ring-0 focus:ring-4 focus:ring-[#f0f0e6]/20">
                </div>

                <div>
                    <label class="mb-1 block font-['Host_Grotesk'] text-[20px] font-bold leading-none text-white">Email</label>
                    <input type="email" name="email" class="h-[50px] w-full rounded-[10px] border-0 bg-[#f0f0e6] px-4 outline-none ring-0 focus:ring-4 focus:ring-[#f0f0e6]/20">
                </div>

                <div>
                    <label class="mb-1 block font-['Host_Grotesk'] text-[20px] font-bold leading-none text-white">Message</label>
                    <textarea name="message" rows="4" class="h-[97px] w-full rounded-[10px] border-0 bg-[#f0f0e6] px-4 py-3 outline-none ring-0 focus:ring-4 focus:ring-[#f0f0e6]/20"></textarea>
                </div>

                <div class="pt-2 text-right">
                    <button type="submit" class="rounded-[10px] bg-[#279d2b] px-5 py-2 font-['Host_Grotesk'] text-[18px] text-white transition-colors duration-200 hover:bg-[#1f8223]">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>