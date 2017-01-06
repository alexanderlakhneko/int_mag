<?php

namespace IntMag\Controller;

use IntMag\Library\Request;


/**
 * Контроллер CartController
 * Корзина
 */
class CartController
{

    /**
     * Action для добавления товара в корзину синхронным запросом<br/>
     * (для примера, не используется)
     * @param integer $id <p>id товара</p>
     */
    public function indexAction()
    {
        return 'cart';
    }

    public function addAction(Request $request)
    {
        // Добавляем товар в корзину

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
//        // Добавляем товар в корзину и печатаем результат: количество товаров в корзине
//        echo Cart::addProduct($id);
//        return true;
        return 'add Ajax';
    }
    
    /**
     * Action для добавления товара в корзину синхронным запросом
     * @param integer $id <p>id товара</p>
     */
    public function deleteAction(Request $request)
    {
//        // Удаляем заданный товар из корзины
//        Cart::deleteProduct($id);
//
//        // Возвращаем пользователя в корзину
//        header("Location: /cart");
        $id = $request->get('id');
        return 'delete ' . $id;
    }

    /**
     * Action для страницы "Корзина"
     */


}
