<?php
require_once __DIR__ . '/../service/product_service.php';
require_once __DIR__ . '/../service/product_image_service.php';
require_once __DIR__ . '/../service/category_service.php';

$success = false;
$error = '';

$id = $_POST['id'] ?? $_GET['id'] ?? null;
if (!$id) {
    echo "Thiếu ID sản phẩm.";
    exit;
}

$product = getProductById($id);
if (!$product) {
    echo "Sản phẩm không tồn tại.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $price = (float)$_POST['price'];
    $description = trim($_POST['description']);
    $category_id = (int)$_POST['category_id'];

    $updated = updateProduct($id, $name, $price, $old_price, $description, $category_id);

    if ($updated) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageDir = __DIR__ . '/../public/images/'; // Đường dẫn mới
            if (!is_dir($imageDir)) {
                mkdir($imageDir, 0755, true);
            }

            $tmpName = $_FILES['image']['tmp_name'];
            $filename = basename($_FILES['image']['name']);
            $targetPath = $imageDir . $filename;

            if (move_uploaded_file($tmpName, $targetPath)) {
                // Thêm ảnh vào CSDL
                addProductImage($id, 'images/' . $filename, true);
            } else {
                $error = "Không thể upload ảnh.";
            }
        }

        if (!$error) {
            $success = true;
            $product = getProductById($id); // load lại
        }
    } else {
        $error = "Cập nhật sản phẩm thất bại.";
    }
}

$categories = getAllCategory();
$image = getProductPrimaryImageByProductId($id);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm</title>
    <link rel="stylesheet" href="../admin/css/ad_app.css">
    <link rel="stylesheet" href="../admin/css/ad_update_products.css">
    <link rel="stylesheet" href="../admin/css/ad_header.css">
    <link rel="stylesheet" href="../admin/css/ad_footer.css">
</head>

<body>
    <?php include 'ad_header.php'?>

    <section>
        <form class="edit-form" action="" method="post" enctype="multipart/form-data">
            <h2>Sửa sản phẩm</h2>

            <?php if ($success): ?>
                <div style="color: green; font-weight: bold; margin-bottom: 10px;">
                    Cập nhật sản phẩm thành công!
                </div>
            <?php endif; ?>

            <?php if ($error): ?>
                <div style="color: red; font-weight: bold; margin-bottom: 10px;">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>

            <input type="hidden" name="id" value="<?= $product['id'] ?>">

            <label for="name">Tên sản phẩm</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>

            <label for="price">Giá (VND)</label>
            <input type="number" id="price" name="price" value="<?= $product['price'] ?>" required>

            <label for="description">Mô tả</label>
            <textarea id="description" name="description" rows="4"><?= htmlspecialchars($product['description']) ?></textarea>

            <label for="category">Danh mục</label>
            <select id="category" name="category_id" required>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?= $cat['id'] ?>" <?= $cat['id'] == $product['category_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($cat['name']) ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <label>Ảnh hiện tại</label><br>
            <?php if ($image): ?>
                <img src="../public/<?= htmlspecialchars($image['image_url']) ?>" alt="Ảnh hiện tại" style="max-width: 150px; max-height: 150px;">
            <?php else: ?>
                <p>Chưa có ảnh</p>
            <?php endif; ?>

            <label for="image">Thay ảnh mới (lưu vào thư mục images/)</label>
            <input type="file" name="image" id="image" accept="image/*">

            <button type="submit">Cập nhật sản phẩm</button>
        </form>
    </section>

    <?php include 'ad_footer.php' ?>
</body>
</html>
