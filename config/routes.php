<?php

use Library\Route;

return  array(
    // site routes
    // Каталог:
    'product_list' => new Route('/catalog', 'Catalog', 'index'),
    'product_page' => new Route('/product/{id}', 'Product', 'show', array('id' => '[0-9]+') ),
    'product' => new Route('/product', 'Site', 'index'),
    // Категория товаров:
    'category_page' => new Route('/category/{id}/page-{st}', 'Catalog', 'category', array('id' => '[0-9]+', 'st' => '[0-9]+')),
    'category' => new Route('/category/{id}', 'Catalog', 'category', array('id' => '[0-9]+')),
    // Корзина:
    'cart_add' => new Route('/cart/checkout/{id}', 'Cart', 'add', array('id' => '[0-9]+')),
    'cart_addAjax' => new Route('/cart/addAjax/{id}', 'Cart', 'addAjax', array('id' => '[0-9]+')),
    'cart_delete' => new Route('/cart/delete/{id}', 'Cart', 'delete', array('id' => '[0-9]+')),
    'cart' => new Route('/cart', 'Cart', 'index'),
    'cart_checkout' => new Route('/cart/checkout', 'Cart', 'checkout'),
    // Пользователь:
    'user_reg' => new Route('/user/register', 'User', 'register'),
    'user_login' => new Route('/user/login', 'User', 'login'),
    'user_logout' => new Route('/user/logout', 'User', 'logout'),
    'cabinet_edit' => new Route('/cabinet/edit', 'Cabinet', 'edit'),
    'cabinet' => new Route('/cabinet', 'Cabinet', 'index'),
    // О магазине
    'contacts' => new Route('/contacts', 'Site', 'contact'),
    'about' => new Route('/about', 'Site', 'about'),
    // Главная страница
    'default' => new Route('/', 'Site', 'index'),
    'index' => new Route('/index.php', 'Site', 'index'),
    // Админпанель:
    'admin' => new Route('/admin/index', 'Admin', 'index'),
    'default_admin' => new Route('/admin', 'Admin', 'index'),
    // Управление товарами:
    'admin_product' => new Route('/admin/product', 'AdminProduct', 'index'),
    'admin_product_delete' => new Route('/admin/product/delete/{id}', 'AdminProduct', 'delete', array('id' => '[0-9]+')),
    'admin_product_update' => new Route('/admin/product/update/{id}', 'AdminProduct', 'update', array('id' => '[0-9]+')),
    'admin_product_create' => new Route('/admin/product/create', 'AdminProduct', 'create'),
    // Управление категориями:
    'admin_category' => new Route('/admin/category', 'AdminCategory', 'index'),
    'admin_category_delete' => new Route('/admin/category/delete/{id}', 'AdminCategory', 'delete', array('id' => '[0-9]+')),
    'admin_category_update' => new Route('/admin/category/update/{id}', 'AdminCategory', 'update', array('id' => '[0-9]+')),
    'admin_category_create' => new Route('/admin/category/create', 'AdminCategory', 'create'),
    // Управление заказами:
    'admin_order' => new Route('/admin/order', 'AdminOrder', 'index'),
    'admin_order_delete' => new Route('/admin/order/delete/{id}', 'AdminOrder', 'delete', array('id' => '[0-9]+')),
    'admin_order_update' => new Route('/admin/order/update/{id}', 'AdminOrder', 'update', array('id' => '[0-9]+')),
    'admin_order_view' => new Route('/admin/order/view/{id}', 'AdminOrder', 'view', array('id' => '[0-9]+'))
);


