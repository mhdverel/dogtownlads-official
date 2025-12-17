<?php
$page_title = 'Size Guide';
include 'includes/header.php';
?>

<section class="py-20 bg-zinc-900 min-h-screen flex items-center">
    <div class="container mx-auto px-6 grid md:grid-cols-2 gap-12 items-center">
       <div>
          <h2 class="text-4xl brand-font mb-6 text-white" data-aos="fade-right">Size Guide</h2>
          <p class="text-gray-400 mb-6">
             Our products utilize oversized cuts. We recommend taking your True to Size (TTS) for a relaxed fit, 
             or size down for a standard fit.
          </p>
          <ul class="text-sm text-gray-500 space-y-2 mb-8 list-disc list-inside">
             <li>Measurements in centimeters (cm)</li>
             <li>Tolerance 1-2cm</li>
             <li>Pre-shrunk cotton material</li>
          </ul>
       </div>
       <div data-aos="zoom-in">
          <img src="assets/size_chart.png" alt="Size Chart" class="w-full rounded-lg shadow-2xl border border-gray-700">
       </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
