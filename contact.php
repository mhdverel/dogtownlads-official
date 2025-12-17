<?php
$page_title = 'Contact';
include 'includes/header.php';
?>

<section class="py-20 bg-black min-h-screen flex items-center">
  <div class="container mx-auto px-6 text-center">
    <h2 class="text-5xl brand-font text-red-600 mb-8 tracking-widest" data-aos="fade-down">GET IN TOUCH</h2>
    <p class="text-xl text-gray-400 mb-12 max-w-2xl mx-auto">
      Have questions about the drop? Need help with sizing? <br> Click the button below to chat with us directly.
    </p>

    <div class="flex flex-col items-center gap-6" data-aos="zoom-in">
        <a href="https://wa.me/6285856975496" target="_blank" class="flex items-center gap-3 bg-green-600 hover:bg-green-700 text-white font-bold py-4 px-10 text-xl rounded-full transition transform hover:scale-105">
            <span>WHATSAPP US</span>
        </a>
        
        <div class="text-gray-500 mt-8">
            <p class="uppercase tracking-widest text-sm mb-2">Email Support</p>
            <a href="mailto:support@dogtownlads.com" class="text-white hover:text-red-500 transition text-2xl font-bold">support@dogtownlads.com</a>
        </div>
        
        <div class="text-gray-500 mt-8">
            <p class="uppercase tracking-widest text-sm mb-2">Base Camp</p>
            <p class="text-white font-bold text-lg">Jakarta, Indonesia</p>
        </div>
    </div>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
