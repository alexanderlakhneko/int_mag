<?php

namespace Controller;

use Library\Request;
use Model\Cart;
use Model\Product;
use Library\Controller;
use Model\User;
use Model\Order;


/**
 * Контроллер CartController
 * Корзина
 */
class CartController extends Controller
{

    /**
     * Action для добавления товара в корзину синхронным запросом<br/>
     * (для примера, не используется)
     * @param integer $id <p>id товара</p>
     */
    public function indexAction()
    {
        $product = $this->container->get('repository_manager')->getRepository('Product');
        // Список категорий для левого меню
        $categories = $product->getCategoriesList();

        // Получим идентификаторы и количество товаров в корзине
        $productsInCart = Cart::getProducts();

        $productsIds = false;
        $products = false;
        $totalPrice = false;


        if ($productsInCart) {
            // Если в корзине есть товары, получаем полную информацию о товарах для списка
            // Получаем массив только с идентификаторами товаров
            $productsIds = array_keys($productsInCart);

            // Получаем массив с полной информацией о необходимых товарах
            $products = $product->getProductsByIds($productsIds);

            // Получаем общую стоимость товаров
            $totalPrice = Cart::getTotalPrice($products);
        }

        // Подключаем вид
        return $this->render('index.php', ['categories' => $categories, 'productsInCart' => $productsInCart, 'productsIds' => $productsIds, 'products' => $products, 'totalPrice' => $totalPrice]);
    }

    public function addAction(Request $request)
    {
        // Добавляем товар в корзину
        Cart::addProduct($request->get('id'));

        // Возвращаем пользователя на страницу с которой он пришел
        $referrer = $_SERVER['HTTP_REFERER'];
        header("Location: $referrer");
    }

    /**
     * Action для добавления товара в корзину при помощи асинхронного запроса (ajax)
     * @param integer $id <p>id товара</p>
     */
    public function addAjaxAction(Request $request)
    {
        // Добавляем товар в корзину и печатаем результат: количество товаров в корзине
        return Cart::addProduct($request->get('id'));
    }
    
    /**
     * Action для добавления товара в корзину синхронным запросом
     * @param integer $id <p>id товара</p>
     */
    public function deleteAction(Request $request)
    {
        // Удаляем заданный товар из корзины
        Cart::deleteProduct($request->get('id'));

        // Возвращаем пользователя в корзину
        header("Location: /cart");
    }

    /**
     * Action для страницы "Корзина"
     */

    public function checkoutAction(Request $request)
    {
        $product = $this->container->get('repository_manager')->getRepository('Product');
        // Получием данные из корзины      
        $productsInCart = Cart::getProducts();
        $User = $this->container->get('repository_manager')->getRepository('User');
        $order = $this->container->get('repository_manager')->getRepository('Order');

        // Если товаров нет, отправляем пользователи искать товары на главную
        if ($productsInCart == false) {
            header("Location: /");
        }

        // Список категорий для левого меню
        $categories = $product->getCategoriesList();

        // Находим общую стоимость
        $productsIds = array_keys($productsInCart);
        $products = $product->getProductsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);

        // Количество товаров
        $totalQuantity = Cart::countItems();

        // Поля для формы
        $userName = false;
        $userPhone = false;
        $userComment = false;

        // Статус успешного оформления заказа
        $result = false;

        // Флаг ошибок
        $errors = false;

        // Проверяем является ли пользователь гостем
        if (!$User->isGuest()) {
            // Если пользователь не гость
            // Получаем информацию о пользователе из БД
            $userId = $User->checkLogged();
            $user = $User->getUserById($userId);
            $userName = $user['name'];
        } else {
            // Если гость, поля формы останутся пустыми
            $userId = false;
        }

        // Обработка формы
        if ($request->isPost()) {
            // Если форма отправлена
            // Получаем данные из формы
            $userName = $request->post('userName');
            $userPhone = $request->post('userPhone');
            $userComment = $request->post('userComment');

            // Флаг ошибок
            $errors = false;

            // Валидация полей
            if (!$User->checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!$User->checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Сохраняем заказ в базе данных
                $result = $order->save($userName, $userPhone, $userComment, $userId, $productsInCart);

                if ($result) {
                    // Если заказ успешно сохранен
                    // Оповещаем администратора о новом заказе по почте                
                    $adminEmail = 'php.test@mail.ru';
                    $message = '<a href="http://site_uri.net/admin/orders">Список заказов</a>';
                    $subject = 'Новый заказ!';
                    mail($adminEmail, $subject, $message);

                    // Очищаем корзину
                    Cart::clear();
                }
            }
        }

        // Подключаем вид
        return $this->render('checkout.php', ['categories' => $categories, 'result' => $result, 'totalQuantity' => $totalQuantity, 'errors' => $errors, 'totalPrice' => $totalPrice, 'userName' => $userName, 'userPhone' => $userPhone, 'userComment' => $userComment]);
    }


}
