<?php
session_start();
// Simple Auth Check
if (!isset($_SESSION['login'])) {
    if (isset($_POST['password']) && $_POST['password'] === 'admin123') {
        $_SESSION['login'] = true;
    } else {
        // Show Login Form
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <title>Admin Login</title>
            <script src="https://cdn.tailwindcss.com"></script>
        </head>
        <body class="bg-black flex items-center justify-center h-screen">
            <form method="POST" class="bg-zinc-900 p-8 rounded-xl border border-zinc-800 text-center">
                <h2 class="text-white text-2xl font-bold mb-4">Dogtown Admin</h2>
                <input type="password" name="password" placeholder="Enter Password" class="block w-full p-2 mb-4 bg-black text-white border border-gray-700 rounded">
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded font-bold hover:bg-red-700 w-full">Login</button>
            </form>
        </body>
        </html>';
        exit;
    }
}

// Read Data
$json_file = '../data/products.json';
$products = json_decode(file_get_contents($json_file), true);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Dogtownlads</title>
    <link rel="icon" type="image/png" href="../assets/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Anton&family=Oswald:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Oswald', sans-serif; }
        h1, h2, .brand-font { font-family: 'Anton', sans-serif; }
    </style>
</head>
<body class="bg-black text-zinc-300 min-h-screen">
    
    <!-- NAVBAR -->
    <nav class="bg-zinc-900 border-b border-zinc-800 p-4 sticky top-0 z-50">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center gap-4">
               <h1 class="text-2xl tracking-widest text-white"><span class="text-red-600">DOGTOWN</span> ADMIN</h1>
               <span class="text-xs bg-zinc-800 text-zinc-500 px-2 py-1 rounded border border-zinc-700">v1.0</span>
            </div>
            <div class="flex items-center gap-6 text-sm font-bold uppercase tracking-wider">
                <a href="../index.php" target="_blank" class="text-zinc-500 hover:text-white transition">View Site</a>
                <a href="logout.php" class="text-red-600 hover:text-red-500 transition">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        
        <!-- STATS GRID -->
        <?php 
        $total_products = count($products);
        $total_value = array_sum(array_column($products, 'price'));
        $ready_stock = count(array_filter($products, function($p) { return $p['stock_status'] === 'READY STOCK'; }));
        ?>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-zinc-900 border border-zinc-800 p-6 rounded-lg flex items-center justify-between">
                <div>
                    <h3 class="text-zinc-500 text-xs uppercase tracking-widest mb-1">Total Products</h3>
                    <p class="text-3xl text-white font-bold"><?php echo $total_products; ?></p>
                </div>
                <div class="text-zinc-700 text-4xl">📦</div>
            </div>
            <div class="bg-zinc-900 border border-zinc-800 p-6 rounded-lg flex items-center justify-between">
                <div>
                    <h3 class="text-zinc-500 text-xs uppercase tracking-widest mb-1">Catalog Value</h3>
                    <p class="text-3xl text-white font-bold text-green-500">IDR <?php echo number_format($total_value); ?></p>
                </div>
                <div class="text-zinc-700 text-4xl">💰</div>
            </div>
            <div class="bg-zinc-900 border border-zinc-800 p-6 rounded-lg flex items-center justify-between">
                <div>
                    <h3 class="text-zinc-500 text-xs uppercase tracking-widest mb-1">Ready Stock</h3>
                    <p class="text-3xl text-white font-bold text-red-600"><?php echo $ready_stock; ?></p>
                </div>
                <div class="text-zinc-700 text-4xl">🔥</div>
            </div>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            
            <!-- ADD PRODUCT FORM -->
            <div class="md:col-span-1">
                <div class="bg-zinc-900 p-6 rounded-xl border border-zinc-800 sticky top-24 shadow-2xl">
                    <h2 class="text-xl mb-6 text-white border-b border-red-900/30 pb-4">ADD NEW ITEM</h2>
                    <form action="actions.php" method="POST" enctype="multipart/form-data" class="space-y-4">
                        <input type="hidden" name="action" value="add">
                        
                        <div>
                            <label class="block text-zinc-500 text-xs uppercase mb-2">Product Name</label>
                            <input type="text" name="name" required class="w-full bg-black border border-zinc-700 text-white px-4 py-3 rounded focus:border-red-600 focus:ring-1 focus:ring-red-600 outline-none transition placeholder-zinc-700">
                        </div>

                        <div>
                            <label class="block text-zinc-500 text-xs uppercase mb-2">Description</label>
                            <input type="text" name="description" required class="w-full bg-black border border-zinc-700 text-white px-4 py-3 rounded focus:border-red-600 focus:ring-1 focus:ring-red-600 outline-none transition placeholder-zinc-700">
                        </div>

                        <div>
                             <label class="block text-zinc-500 text-xs uppercase mb-2">Price (IDR)</label>
                            <input type="number" name="price" required class="w-full bg-black border border-zinc-700 text-white px-4 py-3 rounded focus:border-red-600 focus:ring-1 focus:ring-red-600 outline-none transition placeholder-zinc-700">
                        </div>

                        <div>
                            <label class="block text-zinc-500 text-xs uppercase mb-2">Product Image</label>
                            <input type="file" name="image" required class="w-full text-zinc-400 text-sm file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-xs file:font-semibold file:bg-zinc-800 file:text-white hover:file:bg-red-700 transition">
                        </div>

                        <div>
                            <label class="block text-zinc-500 text-xs uppercase mb-2">Stock Status</label>
                            <div class="relative">
                                <select name="stock_status" class="w-full bg-black border border-zinc-700 text-white px-4 py-3 rounded appearance-none focus:border-red-600 outline-none">
                                    <option value="READY STOCK">Ready Stock</option>
                                    <option value="LOW STOCK">Low Stock</option>
                                    <option value="PREORDER">Preorder</option>
                                    <option value="SOLD OUT">Sold Out</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-zinc-500">
                                    <svg class="fill-current h-4 w-4" viewBox="0 0 20 20"><path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"/></svg>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-gradient-to-r from-red-700 to-red-600 hover:from-red-600 hover:to-red-500 text-white font-bold py-3 rounded transition shadow-lg tracking-wider mt-4">
                            + ADD TO CATALOG
                        </button>
                    </form>
                </div>
            </div>

            <!-- PRODUCT LIST -->
            <div class="md:col-span-2">
                <div class="bg-zinc-900 rounded-xl border border-zinc-800 overflow-hidden shadow-2xl">
                    <div class="p-6 border-b border-zinc-800 flex justify-between items-center">
                        <h2 class="text-lg text-white font-bold">INVENTORY</h2>
                        <span class="text-xs text-zinc-500 uppercase tracking-wider">Syncing from JSON</span>
                    </div>
                    
                    <!-- DESKTOP TABLE VIEW (Hidden on Mobile) -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-black text-zinc-500 text-xs uppercase tracking-wider">
                                <tr>
                                    <th class="p-4">Item</th>
                                    <th class="p-4">Value</th>
                                    <th class="p-4">Status</th>
                                    <th class="p-4 text-right">Controls</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-zinc-800">
                                <?php foreach ($products as $index => $product): ?>
                                <tr class="hover:bg-zinc-800/30 transition group">
                                    <td class="p-4">
                                        <div class="flex items-center gap-4">
                                            <div class="w-12 h-12 rounded bg-zinc-800 border border-zinc-700 overflow-hidden">
                                                <img src="../<?php echo $product['image']; ?>" class="w-full h-full object-cover">
                                            </div>
                                            <div>
                                                <div class="text-white font-bold leading-tight"><?php echo $product['name']; ?></div>
                                                <div class="text-zinc-600 text-xs truncate max-w-[150px]"><?php echo $product['description']; ?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="p-4 font-mono text-zinc-400">IDR <?php echo number_format($product['price']); ?></td>
                                    <td class="p-4">
                                        <?php
                                            $badge_color = 'bg-zinc-800 text-zinc-400 border-zinc-600'; // Default
                                            if($product['stock_status'] === 'READY STOCK') $badge_color = 'bg-green-900/30 text-green-500 border-green-800';
                                            if($product['stock_status'] === 'LOW STOCK') $badge_color = 'bg-yellow-900/30 text-yellow-500 border-yellow-800';
                                            if($product['stock_status'] === 'PREORDER') $badge_color = 'bg-orange-900/30 text-orange-500 border-orange-800';
                                            if($product['stock_status'] === 'SOLD OUT') $badge_color = 'bg-red-900/30 text-red-500 border-red-800';
                                        ?>
                                        <span class="<?php echo $badge_color; ?> text-[10px] px-2 py-1 rounded border font-bold uppercase tracking-wide">
                                            <?php echo $product['stock_status']; ?>
                                        </span>
                                    </td>
                                    <td class="p-4 text-right">
                                        <div class="flex items-center justify-end gap-3 opacity-60 group-hover:opacity-100 transition">
                                            <a href="edit.php?index=<?php echo $index; ?>" class="bg-zinc-800 hover:bg-blue-600 hover:text-white text-zinc-400 p-2 rounded transition" title="Edit">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                            </a>
                                            <form action="actions.php" method="POST" onsubmit="return confirm('Delete this product?');">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                                <button type="submit" class="bg-zinc-800 hover:bg-red-600 hover:text-white text-zinc-400 p-2 rounded transition" title="Delete">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- MOBILE CARD VIEW (Visible on Mobile) -->
                    <div class="md:hidden grid grid-cols-1 divide-y divide-zinc-800">
                        <?php foreach ($products as $index => $product): ?>
                        <div class="p-4 flex gap-4">
                            <!-- Image -->
                            <div class="w-20 h-24 flex-shrink-0 bg-zinc-800 rounded border border-zinc-700 overflow-hidden">
                                <img src="../<?php echo $product['image']; ?>" class="w-full h-full object-cover">
                            </div>
                            
                            <!-- Content -->
                            <div class="flex-1 flex flex-col justify-between">
                                <div>
                                    <div class="flex justify-between items-start">
                                        <h3 class="text-white font-bold text-lg leading-tight"><?php echo $product['name']; ?></h3>
                                        <span class="font-mono text-zinc-400 text-sm">IDR <?php echo number_format($product['price']); ?></span>
                                    </div>
                                    <p class="text-zinc-600 text-xs mt-1 truncate"><?php echo $product['description']; ?></p>
                                </div>
                                
                                <div class="flex justify-between items-end mt-3">
                                    <?php
                                        $badge_color = 'bg-zinc-800 text-zinc-400 border-zinc-600'; 
                                        if($product['stock_status'] === 'READY STOCK') $badge_color = 'bg-green-900/30 text-green-500 border-green-800';
                                        if($product['stock_status'] === 'LOW STOCK') $badge_color = 'bg-yellow-900/30 text-yellow-500 border-yellow-800';
                                        if($product['stock_status'] === 'PREORDER') $badge_color = 'bg-orange-900/30 text-orange-500 border-orange-800';
                                        if($product['stock_status'] === 'SOLD OUT') $badge_color = 'bg-red-900/30 text-red-500 border-red-800';
                                    ?>
                                    <span class="<?php echo $badge_color; ?> text-[10px] px-2 py-1 rounded border font-bold uppercase tracking-wide">
                                        <?php echo $product['stock_status']; ?>
                                    </span>
                                    
                                    <div class="flex gap-2">
                                        <a href="edit.php?index=<?php echo $index; ?>" class="bg-zinc-800 text-blue-500 p-2 rounded border border-zinc-700 hover:bg-zinc-700">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path></svg>
                                        </a>
                                        <form action="actions.php" method="POST" onsubmit="return confirm('Delete this product?');" style="display:inline;">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="index" value="<?php echo $index; ?>">
                                            <button type="submit" class="bg-zinc-800 text-red-500 p-2 rounded border border-zinc-700 hover:bg-zinc-700">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php if(empty($products)) echo '<div class="p-8 text-center text-zinc-600">Inventory is empty.</div>'; ?>
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>
