<!-- thêm sp -->

<?php
require_once __DIR__ . '/../service/product_service.php';
require_once __DIR__ . '/../service/product_image_service.php';
require_once __DIR__ . '/../service/category_service.php';

$errors = [];
$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $price = floatval($_POST['price'] ?? 0);

    $old_price = isset($_POST['old_price']) && $_POST['old_price'] !== '' ? floatval($_POST['old_price']) : 0;


    $description = trim($_POST['description'] ?? '');
    $category_id = intval($_POST['category_id'] ?? 0);

    if ($name === '') $errors[] = "Tên sản phẩm không được để trống";
    if ($price <= 0) $errors[] = "Giá sản phẩm phải lớn hơn 0";
    if ($category_id <= 0) $errors[] = "Bạn phải chọn danh mục";

    $mainImageName = '';
    if (isset($_FILES['main_image']) && $_FILES['main_image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../upload/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $mainImageTmp = $_FILES['main_image']['tmp_name'];
        $mainImageName = time() . '_' . uniqid() . '_main_' . basename($_FILES['main_image']['name']);
        $mainImagePath = $uploadDir . $mainImageName;

        if (!move_uploaded_file($mainImageTmp, $mainImagePath)) {
            $errors[] = "Lỗi khi upload ảnh chính";
        }
    }

    if (empty($errors)) {
        $productId = addProduct($name, $price, $old_price, $description, $category_id);

        if ($productId) {
            addProductImage($productId, '/cartier-shop/upload/' . $mainImageName, true);
            if (isset($_FILES['other_images'])) {
                $otherImages = $_FILES['other_images'];
                for ($i = 0; $i < count($otherImages['name']); $i++) {
                    if ($otherImages['error'][$i] === UPLOAD_ERR_OK) {
                        $tmpName = $otherImages['tmp_name'][$i];
                        $fileName = time() . '_' . uniqid() . '_other_' . basename($otherImages['name'][$i]);
                        $filePath = $uploadDir . $fileName;

                        if (move_uploaded_file($tmpName, $filePath)) {
                            addProductImage($productId, '/cartier-shop/upload/' . $fileName, false);
                        }
                    }
                }
            }
            $success = true;
            // Redirect để tránh submit lại form khi reload trang
            header('Location: ad_products.php?success=1');
            exit;
        } else {
            $errors[] = "Không thể thêm sản phẩm vào CSDL";
        }
    }
}


// Lấy danh sách danh mục để hiển thị trong select
$categories = getAllCategory();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý đơn hàng</title>
    <link rel="stylesheet" href="../admin/css/ad_app.css" />
    <link rel="stylesheet" href="../admin/css/ad_products.css">
    <link rel="stylesheet" href="../admin/css/ad_footer.css" />
    <link rel="stylesheet" href="../admin/css/ad_header.css" />
    <title>Thêm sản phẩm mới</title>
</head>

<body>

    <?php include 'ad_header.php' ?>
    <section>
        <?php if (!empty($errors)): ?>
            <div style="color: red;">
                <ul>
                    <?php foreach ($errors as $e): ?>
                        <li><?= htmlspecialchars($e) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <p style="color: green;">Thêm sản phẩm thànhs công!</p>
        <?php endif; ?>

        <form action="ad_products.php" method="post" enctype="multipart/form-data">
            <div>
                <label for="name">Tên sản phẩm:</label>
                <input type="text" name="name" id="name" value="<?= htmlspecialchars($_POST['name'] ?? '') ?>" required />
            </div>
            <div>
                <label for="price">Giá:</label>
                <input type="number" step="0.01" name="price" id="price" value="<?= htmlspecialchars($_POST['price'] ?? '') ?>" required />
            </div>
            <div>
                <label for="old_price">Giá cũ (nếu có):</label>
                <input type="number" step="0.01" name="old_price" id="old_price" value="<?= htmlspecialchars($_POST['old_price'] ?? '') ?>" />
            </div>
            <div>
                <label for="description">Mô tả:</label>
                <textarea name="description" id="description" rows="4"><?= htmlspecialchars($_POST['description'] ?? '') ?></textarea>
            </div>
            <div>
                <label for="category_id">Danh mục:</label>
                <select name="category_id" id="category_id" required>
                    <option value="">-- Chọn danh mục --</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= (($_POST['category_id'] ?? '') == $category['id']) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($category['name']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="main_image">Ảnh chính:</label>
                <input type="file" name="main_image" id="main_image" accept="image/*" required />
            </div>
            <div>
                <label for="other_images">Ảnh phụ:</label>
                <input type="file" name="other_images[]" id="other_images" accept="image/*" multiple />
            </div>
            <div>
                <button type="submit">Thêm sản phẩm</button>
            </div>
        </form>
    </section>

    <?php include 'ad_footer.php' ?>
</body>

</html>