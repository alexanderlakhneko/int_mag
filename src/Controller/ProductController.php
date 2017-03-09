<?php

namespace Controller;

use Library\Request;
use Library\Controller;
use Model\Product;



/**
 * Контроллер ProductController
 * Товар
 */
class ProductController extends Controller
{
    /**
     * Action для страницы просмотра товара
     * @param integer $productId <p>id товара</p>
     */
    public function showAction(Request $request)
    {
        $products = $this->container->get('repository_manager')->getRepository('Product');
        // Список категорий для левого меню
        $categories = $products->getCategoriesList();

        // Получаем инфомрацию о товаре
        $product = $products->getProductById($request->get('id'));

        // Подключаем вид
        return $this->render('view.php', ['categories' => $categories, 'product' => $product, 'products' => $products]);
    }

    public function searchAction(Request $request)
    {
        $products = $this->container->get('repository_manager')->getRepository('Product');

        $product = $request->post('search');
        $result = $products->getProductsSearch($product);

        include VIEW_DIR . 'Product' . DS . 'Show.php';
    }

    public function searchListAction(Request $request)
    {
        $products = $this->container->get('repository_manager')->getRepository('Product');

        $product = $request->post('search');
        $result = $products->getProductsSearch($product);

        // Подключаем вид
        return $this->render('ShowList.php', ['result' => $result]);
    }
}
