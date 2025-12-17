<?php
$page_title = 'Catalog';
include 'includes/header.php';

// Read Data
$json_data = file_get_contents('data/products.json');
$products = json_decode($json_data, true);
?>

<section class="py-20 bg-black min-h-screen">
  <div class="container mx-auto px-4 pt-10">
    <h2 class="text-5xl brand-font text-white mb-12 text-center" data-aos="fade-down">FULL CATALOG</h2>

    <?php if (empty($products)): ?>
        <p class="text-center text-gray-500">No products found.</p>
    <?php else: ?>
        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($products as $product): ?>
             <div class="group relative bg-zinc-900 border border-zinc-800 p-4 hover:border-red-600 transition duration-500" data-aos="fade-up">
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
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
  </div>
</section>

<?php include 'includes/footer.php'; ?>
