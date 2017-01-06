<?php

use IntMag\Library\Route;

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
);

//
//'product/([0-9]+)' => 'product/view/$1', // actionView в ProductController
//    // Каталог:
//    'catalog' => 'catalog/index', // actionIndex в CatalogController
//    // Категория товаров:
//    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2', // actionCategory в CatalogController
//    'category/([0-9]+)' => 'catalog/category/$1', // actionCategory в CatalogController
//    // Корзина:
//    'cart/checkout' => 'cart/checkout', // actionAdd в CartController
//    'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController
//    'cart/add/([0-9]+)' => 'cart/add/$1', // actionAdd в CartController
//    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1', // actionAddAjax в CartController
//    'cart' => 'cart/index', // actionIndex в CartController
//    // Пользователь:
//    'user/register' => 'user/register',
//    'user/login' => 'user/login',
//    'user/logout' => 'user/logout',
//    'cabinet/edit' => 'cabinet/edit',
//    'cabinet' => 'cabinet/index',
//    // Управление товарами:
//    'admin/product/create' => 'adminProduct/create',
//    'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
//    'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
//    'admin/product' => 'adminProduct/index',
//    // Управление категориями:
//    'admin/category/create' => 'adminCategory/create',
//    'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
//    'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
//    'admin/category' => 'adminCategory/index',
//    // Управление заказами:
//    'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
//    'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
//    'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
//    'admin/order' => 'adminOrder/index',
//    // Админпанель:
//    'admin' => 'admin/index',
//    // О магазине
//    'contacts' => 'site/contact',
//    'about' => 'site/about',
//    // Главная страница
//    'index.php' => 'site/index', // actionIndex в SiteController
//    '' => 'site/index', // actionIndex в SiteController
//
//
//
//
//'books_list' => new Route('/books', 'Book', 'index'),
//    'book_page' => new Route('/book-{id}\.html', 'Book', 'show', array('id' => '[0-9]+') ),
//    'contact_us' => new Route('/contact-us', 'Site', 'contact'),
//    'login' => new Route('/login', 'Security', 'login'),
//    'logout' => new Route('/logout', 'Security', 'logout'),
//    'cart_list' => new Route('/cart', 'Cart', 'showList'),
//    'cart_add' => new Route('/cart/add/{id}', 'Cart', 'add', array('id' => '[0-9]+')),
//
//    // admin routes
//    'admin_default' => new Route('/admin', 'Admin\\Default', 'index'),
//    'admin_books' => new Route('/admin/books', 'Admin\\Book', 'index'),
//    'admin_book_edit' => new Route('/admin/books/edit/{id}', 'Admin\\Book', 'edit', array('id' => '[0-9]+')),