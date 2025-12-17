<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: index.php');
    exit;
}

$index = $_GET['index'] ?? null;
$json_file = '../data/products.json';
$products = json_decode(file_get_contents($json_file), true);

if ($index === null || !isset($products[$index])) {
    echo "Product not found.";
    exit;
}

$product = $products[$index];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product - Admin</title>
    <link rel="icon" type="image/png" href="../assets/favicon.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
</head>
<body class="bg-black text-white font-sans min-h-screen">
    
    <nav class="bg-zinc-900 border-b border-zinc-800 p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-[Anton] tracking-widest text-red-600">EDIT PRODUCT</h1>
            <a href="index.php" class="text-gray-400 hover:text-white">Back to Dashboard</a>
        </div>
    </nav>

    <div class="container mx-auto p-6 max-w-lg">
        <div class="bg-zinc-900 p-8 rounded-xl border border-zinc-800">
            <h2 class="text-xl font-bold mb-6 text-white border-b border-gray-700 pb-2">Edit Details</h2>
            <form action="actions.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="edit">
                <input type="hidden" name="index" value="<?php echo $index; ?>">
                <input type="hidden" name="current_image" value="<?php echo $product['image']; ?>">
                
                <div class="mb-4">
                    <label class="block text-gray-500 text-xs mb-1">Product Name</label>
                    <input type="text" name="name" value="<?php echo $product['name']; ?>" required class="w-full bg-black border border-gray-700 text-white p-2 rounded focus:border-red-600 outline-none">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-500 text-xs mb-1">Description</label>
                    <input type="text" name="description" value="<?php echo $product['description']; ?>" required class="w-full bg-black border border-gray-700 text-white p-2 rounded focus:border-red-600 outline-none">
                </div>

                <div class="mb-4">
                     <label class="block text-gray-500 text-xs mb-1">Price (IDR)</label>
                    <input type="number" name="price" value="<?php echo $product['price']; ?>" required class="w-full bg-black border border-gray-700 text-white p-2 rounded focus:border-red-600 outline-none">
                </div>

                <div class="mb-4">
                    <label class="block text-gray-500 text-xs mb-1">Current Image</label>
                    <img src="../<?php echo $product['image']; ?>" class="w-20 h-20 object-cover mb-2 rounded border border-gray-700">
                    <label class="block text-gray-500 text-xs mb-1">Change Image (Optional)</label>
                    <input type="file" name="image" class="w-full text-gray-400 text-sm">
                </div>

                <div class="mb-6">
                    <label class="block text-gray-500 text-xs mb-1">Stock Status</label>
                    <select name="stock_status" class="w-full bg-black border border-gray-700 text-white p-2 rounded">
                        <option value="READY STOCK" <?php if($product['stock_status'] == 'READY STOCK') echo 'selected'; ?>>Ready Stock</option>
                        <option value="LOW STOCK" <?php if($product['stock_status'] == 'LOW STOCK') echo 'selected'; ?>>Low Stock</option>
                        <option value="PREORDER" <?php if($product['stock_status'] == 'PREORDER') echo 'selected'; ?>>Preorder</option>
                        <option value="SOLD OUT" <?php if($product['stock_status'] == 'SOLD OUT') echo 'selected'; ?>>Sold Out</option>
                    </select>
                </div>

                <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 rounded transition">
                    Update Product
                </button>
            </form>
        </div>
    </div>
</body>
</html>
