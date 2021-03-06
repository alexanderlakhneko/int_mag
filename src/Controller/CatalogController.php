<?php

namespace Controller;

use Library\Request;
use Library\Controller;
use Model\Product;
use Library\Pagination;

/**
 * Контроллер CatalogController
 * Каталог товаров
 */
class CatalogController extends Controller
{

    /**
     * Action для страницы "Каталог товаров"
     */
    public function indexAction()
    {
        $Products = $this->container->get('repository_manager')->getRepository('Product');
        return $this->render('index.php', ['Products' => $Products]);
    }

    /**
     * Action для страницы "Категория товаров"
     */
    public function categoryAction(Request $request)
    {
        $Products = $this->container->get('repository_manager')->getRepository('Product');

        $categoryId = $request->get('id');
        $total = $Products->getTotalProductsInCategory($categoryId);
        $page = $request->get('st');
        $categoryProducts = $Products->getProductsListByCategory($categoryId, $page);
        
//        // Создаем объект Pagination - постраничная навигация
         $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
//
        return $this->render('category.php', ['Products' => $Products, 'pagination' => $pagination, 'categoryId' => $categoryId, 'categoryProducts' => $categoryProducts]);
    }

}
