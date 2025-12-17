  <!-- FOOTER -->
  <!-- FOOTER -->
  <footer class="bg-black pt-16 pb-8 border-t border-zinc-900 mt-auto">
      <div class="container mx-auto px-6">
          <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
              
              <!-- Column 1: Brand -->
              <div class="flex flex-col items-center md:items-start text-center md:text-left">
                  <h2 class="text-4xl brand-font text-white mb-4 tracking-widest leading-none">DOGTOWNLADS</h2>
                  <p class="text-zinc-500 max-w-xs mb-6 font-light">
                      Terrace culture streetwear. Born from the noise, built for the stands.
                  </p>
                  <p class="text-zinc-700 text-xs tracking-wider">
                     &copy; 2025 DOGTOWNLADS. <br> EST. 2024 - INDONESIA.
                  </p>
              </div>

              <!-- Column 2: Quick Links -->
              <div class="flex flex-col items-center md:items-start">
                  <h3 class="text-white font-bold uppercase tracking-widest mb-6 border-b border-red-900 pb-2">Quick Access</h3>
                  <div class="flex flex-col gap-3 text-zinc-400 font-[Oswald] tracking-wide text-lg text-center md:text-left">
                      <a href="<?php echo isset($path_prefix) ? $path_prefix : ''; ?>index.php" class="hover:text-red-500 transition">Home</a>
                      <a href="<?php echo isset($path_prefix) ? $path_prefix : ''; ?>catalog.php" class="hover:text-red-500 transition">Catalog</a>
                      <a href="<?php echo isset($path_prefix) ? $path_prefix : ''; ?>size-guide.php" class="hover:text-red-500 transition">Size Guide</a>
                      <a href="<?php echo isset($path_prefix) ? $path_prefix : ''; ?>faq.php" class="hover:text-red-500 transition">Shipping & Returns</a>
                      <a href="<?php echo isset($path_prefix) ? $path_prefix : ''; ?>contact.php" class="hover:text-red-500 transition">Contact Us</a>
                  </div>
              </div>

              <!-- Column 3: Socials & Newsletter -->
              <div class="flex flex-col items-center md:items-start">
                   <h3 class="text-white font-bold uppercase tracking-widest mb-6 border-b border-red-900 pb-2">Join The Firm</h3>
                   <p class="text-zinc-500 text-sm mb-4 text-center md:text-left">Stay updated with latest drops and terrace news.</p>
                   
                   <!-- Newsletter Fake Input -->
                   <div class="flex w-full max-w-xs mb-8 border border-zinc-800 p-1 bg-zinc-900/50">
                       <input type="email" placeholder="Enter your email" class="bg-transparent text-white w-full px-4 py-2 focus:outline-none placeholder-zinc-600 text-sm">
                       <button class="bg-zinc-800 hover:bg-red-700 text-white px-4 py-2 transition uppercase text-xs font-bold">→</button>
                   </div>

                   <!-- Social Icons -->
                   <div class="flex gap-4">
                       <!-- Instagram -->
                        <a href="#" class="w-10 h-10 flex items-center justify-center border border-zinc-800 text-zinc-400 hover:text-white hover:bg-red-600 hover:border-red-600 transition duration-300">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.072 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.206-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.206 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                        </a>
                        <!-- TikTok -->
                        <a href="#" class="w-10 h-10 flex items-center justify-center border border-zinc-800 text-zinc-400 hover:text-white hover:bg-white hover:text-black hover:border-white transition duration-300">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>
                        </a>
                        <!-- WhatsApp -->
                        <a href="#" class="w-10 h-10 flex items-center justify-center border border-zinc-800 text-zinc-400 hover:text-white hover:bg-green-600 hover:border-green-600 transition duration-300">
                             <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.372s-1.04 1.016-1.04 2.479 1.065 2.876 1.213 3.074c.149.198 2.095 3.2 5.076 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        </a>
                   </div>
              </div>

          </div>
          
          <div class="border-t border-zinc-900 pt-8 flex flex-col md:flex-row justify-between items-center text-zinc-600 text-xs tracking-wider gap-4">
               <p>Powered by STREET PASSION.</p>
               <div class="flex gap-4">
                   <a href="#" class="hover:text-zinc-400">Privacy Policy</a>
                   <a href="#" class="hover:text-zinc-400">Terms of Service</a>
               </div>
          </div>
      </div>
  </footer>

  <!-- SCRIPTS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    // Initialize AOS
    AOS.init({
       duration: 1000,
       once: true
    });

    // Mobile Menu Logic
    const mobileBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = mobileBtn.querySelector('svg');
    
    // Toggle Menu Function
    function toggleMenu() {
        const isHidden = mobileMenu.classList.contains('hidden');
        
        if (isHidden) {
            // Open Menu
            mobileMenu.classList.remove('hidden');
            mobileMenu.classList.add('flex');
            setTimeout(() => {
                mobileMenu.classList.remove('opacity-0', 'pointer-events-none');
                mobileMenu.classList.add('opacity-100', 'pointer-events-auto');
            }, 10);
            // Change to X icon
            menuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>';
        } else {
            // Close Menu
            mobileMenu.classList.remove('opacity-100', 'pointer-events-auto');
            mobileMenu.classList.add('opacity-0', 'pointer-events-none');
            setTimeout(() => {
                mobileMenu.classList.remove('flex');
                mobileMenu.classList.add('hidden');
            }, 300);
            // Change back to Hamburger
            menuIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>';
        }
    }

    mobileBtn.addEventListener('click', toggleMenu);

    // Close menu when clicking a link
    mobileMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', toggleMenu);
    });

    // Close menu on Window Resize (if width > 768px)
    window.addEventListener('resize', () => {
        if (window.innerWidth >= 768 && !mobileMenu.classList.contains('hidden')) {
            toggleMenu();
        }
    });

    // Checkout Logic
    function checkout(productName, price, status) {
      const phoneNumber = "6285856975496"; 
      let message = "";

      if (status === 'PREORDER') {
          message = `Halo Admin, saya mau ikut PREORDER *${productName}* seharga IDR ${price}. Bagaimana mekanismenya?`;
      } else {
          message = `Halo Admin, saya mau order *${productName}* seharga IDR ${price}. Apakah stock ready?`;
      }
      
      const url = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
      window.open(url, '_blank');
    }
  </script>
</body>
</html>
