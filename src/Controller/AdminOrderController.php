<?php

namespace Controller;

use Library\Request;
use Model\Order;
use Model\Product;
/**
 * Контроллер AdminOrderController
 * Управление заказами в админпанели
 */
class AdminOrderController extends AdminBase
{

    /**
     * Action для страницы "Управление заказами"
     */
    public function indexAction()
    {
        // Проверка доступа
        $this->checkAdmin();

        $order = $this->container->get('repository_manager')->getRepository('Order');

        // Получаем список заказов
        $ordersList = $order->getOrdersList();

        // Подключаем вид
        return $this->render('index.php', ['ordersList' => $ordersList, 'Order' => $order]);
    }

    /**
     * Action для страницы "Редактирование заказа"
     */
    public function updateAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();

        $id = $request->get('id');

        $order = $this->container->get('repository_manager')->getRepository('Order');

        // Получаем данные о конкретном заказе
        $orders = $order->getOrderById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userComment = $_POST['userComment'];
            $date = $_POST['date'];
            $status = $_POST['status'];

            // Сохраняем изменения
            $order->updateOrderById($id, $userName, $userPhone, $userComment, $date, $status);

            // Перенаправляем пользователя на страницу управлениями заказами
            header("Location: /admin/order/view/$id");
        }

        // Подключаем вид
        return $this->render('update.php', ['order' => $orders, 'id' => $id]);
    }

    /**
     * Action для страницы "Просмотр заказа"
     */
    public function viewAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();

        $order = $this->container->get('repository_manager')->getRepository('Order');
        $product =$this->container->get('repository_manager')->getRepository('Product');

        $id = $request->get('id');

        // Получаем данные о конкретном заказе
        $order = $order->getOrderById($id);

        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);

        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);

        // Получаем список товаров в заказе
        $products = $product->getProductsByIds($productsIds);

        // Подключаем вид
        return $this->render('view.php', ['order' => $order, 'productsQuantity' => $productsQuantity, 'products' => $products]);
}

    /**
     * Action для страницы "Удалить заказ"
     */
    public function deleteAction(Request $request)
    {
        // Проверка доступа
        $this->checkAdmin();

        $order = $this->container->get('repository_manager')->getRepository('Order');

        $id = $request->get('id');

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем заказ
            $order->deleteOrderById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/order");
        }

        // Подключаем вид
        return $this->render('delete.php', ['id' => $id]);
    }

}
