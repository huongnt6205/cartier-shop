<?php

const CART_SESSION = 'cart';

function getAllCart()
{
    if (isset($_SESSION[CART_SESSION])) {
        return $_SESSION[CART_SESSION];
    }
}

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

function removeFromCart($productId)
{
    if (!isset($_SESSION[CART_SESSION])) {
        return;
    }

    if (isset($_SESSION[CART_SESSION][$productId])) {
        unset($_SESSION[CART_SESSION][$productId]);
    }
}

function decreaseQuantity($productId, $quantity)
{
    if (!isset($_SESSION[CART_SESSION])) {
        return;
    }

    $cart = $_SESSION[CART_SESSION];

    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] -= $quantity;

        if ($cart[$productId]['quantity'] <= 0) {
            unset($cart[$productId]);
        }

        $_SESSION[CART_SESSION] = $cart;
    }
}

function increaseQuantity($productId, $quantity)
{
    if (!isset($_SESSION[CART_SESSION])) {
        return;
    }

    $cart = $_SESSION[CART_SESSION];

    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] += $quantity;

        $_SESSION[CART_SESSION] = $cart;
    }
}