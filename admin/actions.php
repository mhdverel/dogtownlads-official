<?php
session_start();
$json_file = '../data/products.json';
$data = json_decode(file_get_contents($json_file), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // ADD PRODUCT
    if ($_POST['action'] === 'add') {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $desc = $_POST['description'];
        $status = $_POST['stock_status'];
        
        // Determine Color based on status
        $color = 'green';
        if ($status === 'LOW STOCK') $color = 'red';
        if ($status === 'SOLD OUT') $color = 'gray';

        // File Upload Logic
        $target_dir = "../assets/";
        // Generate unique name to avoid overwrites
        $filename = time() . '_' . basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $filename;
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            $image_path = "assets/" . $filename; // Relative path for frontend
        } else {
            $image_path = "assets/logo.png"; // Fallback
        }

        $new_product = [
            "id" => uniqid(),
            "name" => $name,
            "description" => $desc,
            "price" => (int)$price,
            "image" => $image_path,
            "stock_status" => $status,
            "status_color" => $color
        ];

        // Append to array
        $data[] = $new_product;
        
        // Save back to JSON
        file_put_contents($json_file, json_encode($data, JSON_PRETTY_PRINT));
    }

    // EDIT PRODUCT
    if ($_POST['action'] === 'edit') {
        $index = $_POST['index'];
        $current_image = $_POST['current_image'];
        
        $name = $_POST['name'];
        $price = $_POST['price'];
        $desc = $_POST['description'];
        $status = $_POST['stock_status'];
        
        $color = 'green';
        if ($status === 'LOW STOCK') $color = 'red';
        if ($status === 'SOLD OUT') $color = 'gray';
        if ($status === 'PREORDER') $color = 'orange';

        $image_path = $current_image;
        if (!empty($_FILES["image"]["name"])) {
             $target_dir = "../assets/";
             $filename = time() . '_' . basename($_FILES["image"]["name"]);
             $target_file = $target_dir . $filename;
             if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                 $image_path = "assets/" . $filename;
             }
        }

        if (isset($data[$index])) {
            $data[$index]['name'] = $name;
            $data[$index]['description'] = $desc;
            $data[$index]['price'] = (int)$price;
            $data[$index]['stock_status'] = $status;
            $data[$index]['status_color'] = $color;
            $data[$index]['image'] = $image_path;
            
            file_put_contents($json_file, json_encode($data, JSON_PRETTY_PRINT));
        }
    }

    // DELETE PRODUCT
    if ($_POST['action'] === 'delete') {
        $index = $_POST['index'];
        if (isset($data[$index])) {
            array_splice($data, $index, 1);
            file_put_contents($json_file, json_encode($data, JSON_PRETTY_PRINT));
        }
    }
}

// Redirect back to dashboard
header('Location: index.php');
exit;
?>
