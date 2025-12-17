<?php
$page_title = 'FAQ';
include 'includes/header.php';
?>

<section class="py-20 bg-zinc-900 min-h-screen">
  <div class="container mx-auto px-6 max-w-3xl">
    <h2 class="text-5xl brand-font text-white mb-12 text-center text-red-600 tracking-wider" data-aos="fade-down">GAME RULES / FAQ</h2>

    <div class="space-y-4" data-aos="fade-up">
      
      <!-- ITEM 1 -->
      <details class="group bg-black border border-zinc-800 rounded-lg overflow-hidden">
        <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-4 text-xl hover:bg-zinc-800 transition text-white">
          <span>SHIPPING INFO</span>
          <span class="transition group-open:rotate-180">
            <svg fill="none" class="w-6 h-6" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </span>
        </summary>
        <div class="text-gray-400 p-4 border-t border-zinc-800">
          We ship worldwide via JNE/J&T. Orders are processed within 24 hours. NO SHIPPING ON MATCHDAYS.
        </div>
      </details>

      <!-- ITEM 2 -->
      <details class="group bg-black border border-zinc-800 rounded-lg overflow-hidden">
        <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-4 text-xl hover:bg-zinc-800 transition text-white">
          <span>RETURNS & EXCHANGES</span>
          <span class="transition group-open:rotate-180">
            <svg fill="none" class="w-6 h-6" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </span>
        </summary>
        <div class="text-gray-400 p-4 border-t border-zinc-800">
          No refunds. Exchange only for defective items or wrong size (shipping cost covered by buyer).
        </div>
      </details>
      
      <!-- ITEM 3 -->
      <details class="group bg-black border border-zinc-800 rounded-lg overflow-hidden">
        <summary class="flex justify-between items-center font-bold cursor-pointer list-none p-4 text-xl hover:bg-zinc-800 transition text-white">
          <span>PAYMENT METHOD</span>
          <span class="transition group-open:rotate-180">
            <svg fill="none" class="w-6 h-6" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
          </span>
        </summary>
        <div class="text-gray-400 p-4 border-t border-zinc-800">
          Direct Bank Transfer (BCA/Mandiri) or QRIS. Payment details provided on WhatsApp after checkout.
        </div>
      </details>

    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
