<footer class="bg-[#3f2719] py-16 text-[#f0f0e6]">
    <div class="contact-shell mx-auto px-6 md:px-[60px]">
        <div class="grid grid-cols-1 gap-12 border-b border-[#f0f0e6]/20 pb-12 md:grid-cols-3">
            <!-- Brand -->
            <div class="space-y-4">
                <h2 class="font-['MedievalSharp'] text-[32px] leading-none mb-4 tracking-wide text-white">Soluna Cafe</h2>
                <p class="font-['Host_Grotesk'] text-[16px] leading-relaxed text-[#f0f0e6]/80 max-w-sm">
                    Just the two of us. We're in it together. Come enjoy our premium lounges and finest caterings.
                </p>
            </div>

            <!-- Quick Links -->
            <div class="md:justify-self-center">
                <h3 class="font-['Host_Grotesk'] text-[24px] font-bold mb-4 text-white">Explore</h3>
                <ul class="space-y-3 font-['Host_Grotesk'] text-[16px] text-[#f0f0e6]/80">
                    <li><a href="{{ url('/') }}" class="hover:text-white transition-colors duration-200">Home</a></li>
                    <li><a href="{{ url('/#about') }}" class="hover:text-white transition-colors duration-200">About Us</a></li>
                    <li><a href="{{ url('/#products') }}" class="hover:text-white transition-colors duration-200">Products</a></li>
                    <li><a href="{{ url('/contact') }}" class="hover:text-white transition-colors duration-200">Contact</a></li>
                </ul>
            </div>

            <!-- Connect -->
            <div class="md:justify-self-end">
                <h3 class="font-['Host_Grotesk'] text-[24px] font-bold mb-4 text-white">Connect</h3>
                <ul class="space-y-3 font-['Host_Grotesk'] text-[16px] text-[#f0f0e6]/80">
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Instagram</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Twitter</a></li>
                    <li><a href="#" class="hover:text-white transition-colors duration-200">Facebook</a></li>
                </ul>
            </div>
        </div>

        <!-- Copyright -->
        <div class="pt-8 text-center font-['Host_Grotesk'] text-[14px] text-[#f0f0e6]/60">
            &copy; {{ date('Y') }} Soluna Cafe. All rights reserved.
        </div>
    </div>
</footer>
