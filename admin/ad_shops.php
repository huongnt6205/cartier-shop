<!-- trang sản phẩm -->

<?php
require_once __DIR__ . '/../service/product_service.php';
require_once __DIR__ . '/../service/product_image_service.php';

// Xử lý xóa sản phẩm nếu có delete_id
if (isset($_GET['delete_id'])) {
    $productId = intval($_GET['delete_id']);
    $deleted = deleteProductById($productId);
    if ($deleted) {
        header("Location: ad_shops.php?msg=deleted");
        exit();
    } else {
        echo "<script>alert('Không thể xóa sản phẩm');</script>";
    }
}

$products = getAllProduct();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
    <link rel="stylesheet" href="../admin/css/ad_app.css" />
    <link rel="stylesheet" href="../admin/css/ad_shops.css">
    <link rel="stylesheet" href="../admin/css/ad_footer.css" />
    <link rel="stylesheet" href="../admin/css/ad_header.css" />
</head>

<body>

    <?php include 'ad_header.php' ?>

    <section>
        <h1>Quản lý danh sách sản phẩm</h1>

        <?php if (isset($_GET['msg']) && $_GET['msg'] === 'deleted'): ?>
            <div style="color: green; font-weight: bold; margin: 10px 0; text-align: center;">
                ✅ Đã xóa sản phẩm thành công!
            </div>
        <?php endif; ?>

        <div class="menu_products">
            <div class="create-products">
                <a href="ad_products.php">+ Thêm sản phẩm mới</a>
            </div>

            <div class="table-header">
                <div class="image-col">Hình</div>
                <div>Tên sản phẩm</div>
                <div>Giá</div>
                <div>Hành động</div>
            </div>

            <?php foreach ($products as $product): ?>
                <?php
                $image = getProductPrimaryImageByProductId($product['id']);
                $imagePath = $image ? '../public/' . $image['image_url'] : 'https://via.placeholder.com/250x200?text=No+Image';
                ?>
                <div class="product-row">
                    <div class="image-col">
                        <img src="<?= $imagePath ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                    </div>
                    <div><?= htmlspecialchars($product['name']) ?></div>
                    <div><?= number_format($product['price'], 0, ',', '.') ?> VND</div>
                    <div class="actions">
                        <a href="ad_update_products.php?id=<?= $product['id'] ?>" class="edit">Sửa</a>
                        <a href="ad_shops.php?delete_id=<?= $product['id'] ?>" class="delete" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?');"> Xóa</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <?php include 'ad_footer.php' ?>

</body>

</html>