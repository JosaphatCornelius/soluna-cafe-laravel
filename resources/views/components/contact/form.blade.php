<section class="relative min-h-[600px] bg-cover bg-center" style="background-image:url('{{ asset('images/contact-us/image10.jpg') }}');">
    <div class="min-h-[600px] bg-black/60 px-6 py-[88px] md:px-[60px]">
        <div class="mx-auto max-w-[1080px]">
            <h2 class="text-center font-['Host_Grotesk'] text-[40px] font-bold leading-none text-white">Contact Us Now, or Later!</h2>

            @if(session('status'))
                <div class="mx-auto mt-6 max-w-[427px] rounded-[10px] bg-green-100 px-4 py-3 text-green-800">{{ session('status') }}</div>
            @endif

            <form action="{{ url('/contact') }}" method="POST" class="mx-auto mt-[54px] max-w-[427px]">
                @csrf
                <label class="mb-3 block font-['Host_Grotesk'] text-[20px] font-bold text-white">Name</label>
                <input name="name" class="mb-6 w-full rounded-[10px] bg-[#f0f0e6] px-4 py-3 outline-none ring-0" />

                <label class="mb-3 block font-['Host_Grotesk'] text-[20px] font-bold text-white">Email</label>
                <input name="email" class="mb-6 w-full rounded-[10px] bg-[#f0f0e6] px-4 py-3 outline-none ring-0" />

                <label class="mb-3 block font-['Host_Grotesk'] text-[20px] font-bold text-white">Message</label>
                <textarea name="message" class="mb-6 w-full rounded-[10px] bg-[#f0f0e6] px-4 py-3 outline-none ring-0" rows="4"></textarea>

                <div class="text-right">
                    <button type="submit" class="rounded-[10px] bg-[#279d2b] px-6 py-2 font-['Inter'] text-[20px] text-white">Submit</button>
                </div>
            </form>
        </div>
    </div>
</section>
