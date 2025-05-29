<?php

session_start();

const CART_SESSION = 'cart';

/**
 * Lấy toàn bộ giỏ hàng
 */
function getAllCart()
{
    return $_SESSION[CART_SESSION] ?? [];
}

/**
 * Thêm sản phẩm vào giỏ hàng
 */
function addToCart($productId, $quantity)
{
    $cart = $_SESSION[CART_SESSION] ?? [];

    if (isset($cart[$productId])) {
        $cart[$productId] += $quantity;
    } else {
        $cart[$productId] = $quantity;
    }

    $_SESSION[CART_SESSION] = $cart;
}

/**
 * Cập nhật số lượng sản phẩm
 */
function updateCartQuantity($productId, $quantity)
{
    if ($quantity > 0) {
        $_SESSION[CART_SESSION][$productId] = $quantity;
    } else {
        removeFromCart($productId);
    }
}

/**
 * Xóa sản phẩm khỏi giỏ hàng
 */
function removeFromCart($productId)
{
    if (isset($_SESSION[CART_SESSION][$productId])) {
        unset($_SESSION[CART_SESSION][$productId]);
    }
}

/**
 * Tăng số lượng sản phẩm
 */
function increaseQuantity($productId, $quantity = 1)
{
    if (isset($_SESSION[CART_SESSION][$productId])) {
        $_SESSION[CART_SESSION][$productId] += $quantity;
    }
}

/**
 * Giảm số lượng sản phẩm
 */
function decreaseQuantity($productId, $quantity = 1)
{
    if (isset($_SESSION[CART_SESSION][$productId])) {
        $_SESSION[CART_SESSION][$productId] -= $quantity;

        if ($_SESSION[CART_SESSION][$productId] <= 0) {
            unset($_SESSION[CART_SESSION][$productId]);
        }
    }
}

