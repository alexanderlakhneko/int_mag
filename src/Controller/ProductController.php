<?php

namespace Controller;

use Library\Request;
use Library\Controller;
use Library\Router;
use Model\Product;
use Library\Session;



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
        $comments = $this->container->get('repository_manager')->getRepository('Comment');

        $comment = $comments->getComments($request->get('id'));
        // Список категорий для левого меню
        $categories = $products->getCategoriesList();

        // Получаем инфомрацию о товаре
        $product = $products->getProductById($request->get('id'));
        
        $user = Session::get('user');
        
        $id = $request->get('id');

        if($request->isPost('comment')){

            $data['comments'] = $comments->addComment($user, $id, $request->post('comment'));
            Router::redirect("/product/$id");
        }

        // Подключаем вид
        return $this->render('view.php', ['categories' => $categories, 'product' => $product, 'products' => $products, 'comment' => $comment, 'user' => $user ]);
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
