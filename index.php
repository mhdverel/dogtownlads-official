<?php
$page_title = 'Home';
include 'includes/header.php';

// Read Data
$json_data = file_get_contents('data/products.json');
$products = json_decode($json_data, true);
?>

  <!-- HERO SECTION -->
  <section id="home" class="relative h-screen flex items-center justify-center bg-black overflow-hidden -mt-20">
    <div class="absolute inset-0 z-0">
       <img src="assets/bg_pyro.png" alt="Ultras Background" class="w-full h-full object-cover opacity-60">
       <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-transparent to-black"></div>
    </div>

    <div class="relative z-10 text-center px-4 flex flex-col items-center" data-aos="zoom-in">
      <img src="assets/logo_icon_custom.png" alt="Dogtown Mascot" class="h-40 md:h-56 mb-6 animate-breathing">
      
      <h2 class="text-red-600 font-aero text-3xl md:text-5xl mb-4 tracking-wider">STAND YOUR GROUND</h2>
      <h1 class="text-6xl md:text-9xl brand-font text-white mb-6 tracking-wide leading-tight drop-shadow-xl uppercase">
        ACTION. HISTORY. <br> PRIDE.
      </h1>
      
      <p class="max-w-xl mx-auto text-gray-300 mb-10 text-lg leading-relaxed font-light tracking-wide">
        From the streets to the stands. Wear your passion using <br> our premium heavy-weight cotton.
      </p>
      
      <a href="catalog.php" class="inline-block bg-red-700 text-white font-bold px-12 py-4 uppercase tracking-widest hover:bg-white hover:text-black transition transform hover:-translate-y-1 hover:rotate-1 clip-path-polygon border border-red-900">
        EXPLORE THE DROP
      </a>
    </div>
  </section>

  <!-- LATEST DROP (Swiper) -->
  <section class="py-20 bg-black">
    <div class="container mx-auto px-4">
      <div class="flex justify-between items-end mb-12 px-2" data-aos="fade-right">
         <div>
            <h3 class="text-red-600 font-bold tracking-widest uppercase mb-1">Latest Drop</h3>
            <h2 class="text-5xl brand-font text-white">FEATURED</h2>
         </div>
         <div class="flex gap-4">
            <button class="swiper-button-prev-custom w-12 h-12 border border-gray-700 hover:bg-white hover:text-black hover:border-white text-gray-400 flex items-center justify-center transition">←</button>
            <button class="swiper-button-next-custom w-12 h-12 border border-white bg-white text-black flex items-center justify-center hover:bg-transparent hover:text-white transition">→</button>
         </div>
      </div>

      <div class="swiper mySwiper" data-aos="fade-up">
        <div class="swiper-wrapper">
          <?php foreach ($products as $product): ?>
          <div class="swiper-slide">
             <div class="group relative bg-zinc-900 border border-zinc-800 p-4 hover:border-red-600 transition duration-500">
                <span class="absolute top-4 left-4 text-white text-xs font-bold px-2 py-1 z-10 uppercase" style="background-color: <?php echo $product['status_color']; ?>">
                    <?php echo $product['stock_status']; ?>
                </span>
                
                <div class="overflow-hidden mb-4 relative h-96">
                   <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                </div>
                
                <div class="flex justify-between items-start mb-2">
                   <div>
                      <h4 class="text-xl font-bold text-white mb-1"><?php echo $product['name']; ?></h4>
                      <p class="text-gray-500 text-xs"><?php echo $product['description']; ?></p>
                   </div>
                   <div class="text-right">
                       <p class="text-xl text-red-500 font-bold">IDR <?php echo number_format($product['price']); ?></p>
                   </div>
                </div>
                
                <?php 
                $btn_text = 'BUY NOW';
                $btn_class = 'bg-white text-black hover:bg-red-600 hover:text-white';
                $disabled = '';
                
                if ($product['stock_status'] === 'SOLD OUT') {
                    $btn_text = 'SOLD OUT';
                    $btn_class = 'bg-zinc-800 text-gray-500 cursor-not-allowed';
                    $disabled = 'disabled';
                } elseif ($product['stock_status'] === 'PREORDER') {
                    $btn_text = 'PREORDER NOW';
                    $btn_class = 'bg-orange-500 text-black hover:bg-orange-600';
                }
                ?>

                <button <?php echo $disabled; ?> onclick="checkout('<?php echo $product['name']; ?>', '<?php echo number_format($product['price']); ?>', '<?php echo $product['stock_status']; ?>')" class="w-full mt-4 font-bold py-3 uppercase transition tracking-widest <?php echo $btn_class; ?>">
                   <?php echo $btn_text; ?>
                </button>
             </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      
      <div class="text-center mt-12">
          <a href="catalog.php" class="text-gray-500 hover:text-white border-b border-gray-600 pb-1">View All Products -></a>
      </div>
    </div>
  </section>

  <!-- ABOUT SECTION -->
  <section class="py-20 bg-zinc-900 border-t border-gray-800">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-4xl brand-font mb-8 text-white" data-aos="fade-up">Who We Are</h2>
      <div class="max-w-3xl mx-auto" data-aos="fade-up" data-aos-delay="100">
        <p class="text-gray-400 leading-loose mb-6">
          A streetwear label built on football culture, brotherhood, and the streets. <br>
          Born from terrace noise and raw youth energy, Dogtownlads stands for action and pride. <br>
          This ain’t just clothing — it’s a culture for lads who move with purpose and live by their own rules. 
        </p>
      </div>
    </div>
  </section>

  <!-- JS for Home Swiper -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper(".mySwiper", {
          slidesPerView: 1,
          spaceBetween: 30,
          loop: true,
          breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
          },
          navigation: {
            nextEl: ".swiper-button-next-custom",
            prevEl: ".swiper-button-prev-custom",
          },
        });
    });
  </script>

<?php include 'includes/footer.php'; ?>
